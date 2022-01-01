<?php

class WorkingHours extends Model {

    protected static $tableName = "working_hours";
    protected static $columns = [
        'id',
        'user_id',
        'work_date',
        'time1',
        'time2',
        'time3',
        'time4',
        'worked_time'
    ];

    public static function loadFromUserAndDate($userId, $workDate) {
        $data = self::getOne(["id", "user_id", "work_date", "time1", "time2", "time3", "time4", "worked_time"], [["=", ["user_id" => $userId, "work_date" => $workDate]]]);
        if (!$data) {
            $data = new WorkingHours([
                "user_id" => $userId, 
                "work_date" => $workDate,
                "worked_time" => 0
            ]);
        }
        return $data;
    }

    public function getNextTime() {
        if (!$this->time1) return 'time1';
        if (!$this->time2) return 'time2';
        if (!$this->time3) return 'time3';
        if (!$this->time4) return 'time4';
        return null;
    }

    public function punchClock($time) {
        $timeColumn = $this->getNextTime($time);
        if (!$timeColumn) {
            throw new AppException("You already have punched all the four clocks today!");
        }
        $this->$timeColumn = $time;
        if ($this->id) {
            $this->update();
        } else {
            $this->insert();
        }
    }

}

?>