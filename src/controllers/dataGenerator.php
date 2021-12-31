<?php
loadModel("WorkingHours");

Database::executeSql("DELETE FROM working_hours");
Database::executeSql("DELETE FROM users WHERE id > 5");

function getDayTemplateByOdds($regularRate, $extraRate, $lazyRate) {
    $regularDayTemplate = [
        "time1" => "08:00:00",
        "time2" => "12:00:00",
        "time3" => "13:00:00",
        "time4" => "17:00:00",
        "worked_time" => DAILY_TIME
    ];
    
    $extraHourDayTemplate = [
        "time1" => "08:00:00",
        "time2" => "12:00:00",
        "time3" => "13:00:00",
        "time4" => "18:00:00",
        "worked_time" => DAILY_TIME + 3600
    ];
    
    $lazyDayTemplate = [
        "time1" => "08:30:00",
        "time2" => "12:00:00",
        "time3" => "13:00:00",
        "time4" => "17:00:00",
        "worked_time" => DAILY_TIME - 1800
    ];

    $value = rand(0, 100);
    if ($value <= $regularRate) {
        return $regularDayTemplate;
    } else if ($value <= $regularRate + $extraRate) {
        return $extraHourDayTemplate;
    } else {
        return $lazyDayTemplate;
    }
}

function populateWorkingHours($userId, $initialDate, $regularDate, $extraDate, $lazyRate) {
    $currentDate = $initialDate;
    $today = new DateTime();
    $columns = ["id" => null, "user_id" => $userId, "work_date" => $currentDate];
    while (dateCmp($currentDate, $today) < 0) {
        // if (!isWeekend($currentDate)) {
            $template = getDayTemplateByOdds($regularDate, $extraDate, $lazyRate);
            $columns = array_merge($columns, $template);
            $workingHours = new WorkingHours($columns);
            $workingHours->insert();
        // }
        $currentDate = getNextDay($currentDate)->format("Y-m-d");
        $columns["work_date"] = $currentDate;
    }
}

$lastMonth = strtotime("first day of last month");
$regularDatePercentage = rand(5, 70);
$extraDatePercentage = rand(5, 20);
$lazyDatePercentage = rand(5, 10);
populateWorkingHours(
    1, date('Y-m-d', $lastMonth), 
    $regularDatePercentage, 
    $extraDatePercentage, 
    $lazyDatePercentage
);
populateWorkingHours(
    3, date('Y-m-d', $lastMonth), 
    $regularDatePercentage, 
    $extraDatePercentage, 
    $lazyDatePercentage
);
populateWorkingHours(
    4, date('Y-m-d', $lastMonth), 
    $regularDatePercentage, 
    $extraDatePercentage, 
    $lazyDatePercentage
);
?>