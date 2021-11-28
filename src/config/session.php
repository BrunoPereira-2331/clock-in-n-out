<?php 

function validateSession() {
    $user = $_SESSION["user"];
    if (!isset($user)) {
        header("Location: loginController.php");
        exit();
    }
}

?>