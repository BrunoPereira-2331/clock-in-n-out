<?php 

function getDateAsDateTime($date = "00/00/0000") {
    return is_string($date) ? new DateTime($date) : $date;
}

function isWeekend($date) {
    $dateTime = getDateAsDateTime($date);
    return $dateTime->format("N") >= 6;
}


function dateCmp($firstDate, $secondDate) {
    $firstDateTime = getDateAsDateTime($firstDate);
    $secondDateTime = getDateAsDateTime($secondDate);
    if ($firstDateTime > $secondDateTime) {
        return 1;
    } else if ($firstDateTime == $secondDateTime) {
        return 0;
    }
    $firstDateTime < $secondDateTime;
    return -1;
}

function getNextDay($date) {
    $dateTime = getDateAsDateTime($date);
    $dateTime->modify("+1 day");
    return $dateTime;
}


?>