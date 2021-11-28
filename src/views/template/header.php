<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/template.css">
    <script>
        let tag = document.createElement("script");
        tag.type = "text/javascript";
        tag.src = "assets/js/app.js";
        document.head.appendChild(tag);
    </script>
    <title>Clock In 'n Out</title>
</head>
<body class="">
    <header class="header">
        <div class="logo">
            <i class="icofont-travelling mr-2"></i>
            <span class="font-weight-light">Clock In </span>
            <span class="font-weight-bold mx-1">N'</span>
            <span class="font-weight-light">Out</span>
            <i class="icofont-runner-alt-1 ml-2"></i>  
        </div>
        <div class="menu-toggle mx-3">
            <i class="icofont-navigation-menu"></i>
        </div>
        <div class="spacer"></div>
        <div class="dropdown">
            <div class="dropdown-button">
                <span class="ml-3">User Mock</span>
                <i class="icofont-simple-down mx-2"></i>
            </div>
            <div class="dropdown-content">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="logoutController.php">
                            <i class="icofont-logout mr-2"></i>
                            Exit
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>