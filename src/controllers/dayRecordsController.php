<?php 
session_start();
validateSession();

$date = (new DateTime())->getTimestamp();
setlocale(LC_ALL,"US");
$today = strftime("%d %B %Y", $date);

loadTemplateView("dayRecordsView", ["today" => $today]); 
 
?>