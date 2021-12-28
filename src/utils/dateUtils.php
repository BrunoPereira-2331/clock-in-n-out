<?php 

function getDateAsDateTime($date = "00/00/0000") {
    return is_string($date) ? new DateTime($date) : $date;
}

function isWeekend($date) {
    $dateTime = getDateAsDateTime($date);
    return $dateTime->format("N") >= 6;
}


function dateCmp($firstDate, $secondDate) {
    $comparison = 0;
    $firstDateTime = getDateAsDateTime($firstDate);
    $secondDateTime = getDateAsDateTime($secondDate);
    switch ($comparison) {
        case $firstDateTime > $secondDateTime:
            return 1;
            break;
        case $firstDateTime = $secondDateTime:
            return 0;
            break;
        case $firstDateTime < $secondDateTime:
            return -1;
            break;
    }
}

function getNextDay($date) {
    $dateTime = getDateAsDateTime($date);
    $dateTime->modify("+1 day");
    return $dateTime;
}


?>