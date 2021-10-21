<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icoFont.min.css">
    <title>Clock In 'n Out</title>
</head>
<body>
    <form class="form-login" action="#" method="post">
        <div class="login-card card">
            <div class="card-header">
                <i class="icofont-travelling mr-2"></i>
                <span class="font-weight-light">Clock In </span>
                <span class="font-weight-bold mx-1">N'</span>
                <span class="font-weight-light">Out</span>
                <i class="icofont-runner-alt-1 ml-2"></i>   
            </div>
            <div class="card-body">
                <?php include(TEMPLATE_PATH . '/messages.php') ?>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" 
                        value="<?= isset($email) ? $email : '' ?>"
                        <?php echo (isset($email) && strlen($email) > 0) ? $email : '' ?>
                        class="form-control <?php echo $errors && $errors["email"] ? "is-invalid" : "" ?>" placeholder="E-mail" autofocus 
                    />
                    <div class="invalid-feedback">
                        <?php echo ($errors && $errors["email"]) ? $errors["email"] : ''; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"
                        class="form-control <?php echo $errors && $errors["password"] ? "is-invalid" : "" ?>" placeholder="Password"
                    />
                    <div class="invalid-feedback">
                    <?php echo ($errors && $errors["password"]) ? $errors["password"] : ''; ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-lg btn-primary">Login</button>
            </div>
        </div>
    </form>
</body>
</html>