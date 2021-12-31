<?php 


class Database {

    public static function getConnection() {
        $env_path = realpath(dirname(__FILE__) . '/../env.ini');
        $env = parse_ini_file($env_path);
        $host = $env["host"]; 
        $username = $env["username"];
        $password = $env["password"];
        $env = $env["database"];
        $conn = new mysqli($host, $username, $password, $env);
        if (isset($conn->connect_error)) {
            die("Error: {$conn->connect_error}");
        }
        return $conn;
    }

    public static function getResultFromQuery($query) {
        $conn = self::getConnection();
        $result = $conn->query($query);
        $conn->close();
        return $result;    
    }

    public static function executeSql($sql) {
        $conn = self::getConnection();
        if (!mysqli_query($conn, $sql)) {
            throw new Exception(mysqli_error($conn));
        }
        $id = $conn->insert_id;
        $conn->close();
        return $id;
    }
}

?>