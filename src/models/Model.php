<?php 

class Model {
    protected static $tableName = "";
    protected static $columns = [];
    protected $values = [];

    function __construct($arrData) {
        $this->loadDataFromArray($arrData);
    }

    public function loadDataFromArray($arrData) {
        if (count($arrData) > 0) {
            foreach ($arrData as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function __get($key) {
        return $this->values[$key];
    }

    public function __set($key, $value) {
        $this->values[$key] = $value;
    }

    public static function get($columns = ["*"], $filters = []) {
        $objects = [];
        $result = static::getResultSetFromSelect($columns, $filters);
        if (isset($result)) {
            $class = get_called_class();
            while($row = $result->fetch_assoc()) {
                array_push($objects, new $class($row));
            }
        }
        return $objects;
    }
    public static function getOne($columns = ["*"], $filters = []) {
        $class = get_called_class();
        $result = static::getResultSetFromSelect($columns, $filters);
        return $result ? new $class($result->fetch_assoc()) : null;
    }

    public static function getResultSetFromSelect($columns = ["*"], $filters = []) {
        $columnsStr = implode(", ", $columns);
        $where = static::getFormatedWhere($filters);
        $sql = "SELECT {$columnsStr} FROM " . static::$tableName . $where;
        $result = Database::getResultFromQuery($sql);
        if ($result->num_rows === 0) {
            return null;
        } else {
            return $result;
        }
    }

    public function insert() {
        $insertColumnsNames = implode(",", static::$columns);
        $sql = "INSERT INTO " . static::$tableName . " ($insertColumnsNames) VALUES (";
        foreach(static::$columns as $col) {
            $sql .= static::getFormatedValue($this->$col) . ",";
        }
        $sql[strlen($sql) - 1] = ")";
        $id = Database::executeSql($sql);
        $this->id = $id;
    }

    public function update() {
        $sql = "UPDATE " . static::$tableName . " SET ";
        // this is ugly - every call to this method make a update for all the columns .-.
        foreach(static::$columns as $col) {
            $sql .= "$col = " . static::getFormatedValue($this->$col) . ",";
        }
        $sql[strlen($sql) - 1] = " ";
        $sql .= "WHERE id = {$this->id}";
        Database::executeSql($sql);
    }

    public static function getFormatedWhere($dataWhere = [["=", []]]) {
        $filters = [];
        if (count($dataWhere) > 0) {
            foreach ($dataWhere as $data) {
                $operator = $data[0];
                $columns = $data[1];
                if ($operator == "=") {
                    foreach ($columns as $colName => $colValue) {
                        $formatedValue = static::getFormatedValue($colValue);
                        $filters[] = "{$colName} = {$formatedValue}";
                    }
                } else if ($operator == "in") {
                    foreach ($columns as $colName => $colValue) {
                        $formatedValue = static::getFormatedValue($colValue);
                        $filters[] = "{$colName} IN ({$formatedValue})";
                    }
                } else if ($operator == "not in") {
                    foreach ($columns as $colName => $colValue) {
                        $formatedValue = static::getFormatedValue($colValue);
                        $filters[] = "{$colName} NOT IN ({$formatedValue})";
                    }
                } else if ($operator == "between") {
                    foreach ($columns as $colName => $colValue) {
                        $firstFormatedValue = static::getFormatedValue($colValue[0]);
                        $secondFormatedValue = static::getFormatedValue($colValue[1]);
                        $filters[] = "{$colName} BETWEEN {$firstFormatedValue} AND {$secondFormatedValue}";
                    }
                } else if ($operator == "like") {
                    foreach ($columns as $colName => $colValue) {
                        $formatedValue = static::getFormatedValue($colValue);
                        $filters[] = "{$colName} LIKE {$formatedValue}%";
                    }
                }
            }
            return " WHERE " . implode(" AND ", $filters);
        }
        return "";
    }

    public static function getFormatedValue($value) {
        if (!isset($value) || $value == '') {
            return "NULL";
        } else if (gettype($value) === "string") {
            return "'{$value}'";
        } else if (is_array($value)) {
            $formatedvalue = array_map(function ($element) {
                return is_numeric($element) ? $element : "'$element'";
            }, $value);
            return implode(", ", $formatedvalue);
        } else {
            return $value;
        }
    }
}

?>