<?php 
session_start();
validateSession();

loadModel("WorkingHours");

$date = (new DateTime())->getTimestamp();
setlocale(LC_ALL,"US");
$today = strftime("%d %B %Y", $date);

$user = $_SESSION["user"];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));
loadTemplateView("dayRecordsView", 
    [
        "today" => $today,
        'records' => $records
    ]
); 
 
?>