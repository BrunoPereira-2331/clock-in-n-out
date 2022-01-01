<?php
session_start();
validateSession();

loadModel("WorkingHours");

$user = $_SESSION["user"];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

try {
    $currentTime = strftime("%H:%M:%S", time());
    if ($_POST["punchClockController"]) {
        $currentTime = $_POST["punchClockController"]; 
    }

    $records->punchClock($currentTime);
    addSuccessMessage("Successful clock punch");
} catch (AppException $e) {
    addErrorMessage($e->getMessage());
}

header("LOCATION: dayRecordsController.php");

?>