<?php 

loadModel('Login');

if (isset($_POST) && count($_POST) > 0) {
    $login = new Login($_POST);
    try {
        $user = $login->checkLogin();
    } catch (\Throwable $th) {
    }
}

loadView('loginView', $_POST);

?>