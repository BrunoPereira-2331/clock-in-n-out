<?php 

loadModel('Login');
$exception = null;

if (count($_POST) > 0) {
    $login = new Login($_POST);
    try {
        $user = $login->checkLogin();
        header("Location: dayRecords.php");
    } catch (AppException $e) {
        $exception = $e;
    }
}

loadView('loginView', $_POST, $exception);


?>