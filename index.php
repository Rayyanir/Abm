<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include(__DIR__ . "/UserClass.php");
include("includes/config.php");

$userClass = new userClass();


$errorMsgReg = '';
$errorMsgLogin = '';
/* Login Form */
if (!empty($_POST['loginSubmit'])) {
    $usernameEmail = $_POST['usernameEmail'];
    $password = $_POST['password'];
    if (strlen(trim($usernameEmail)) > 1 && strlen(trim($password)) > 1) {
        $uid = $userClass->userLogin($usernameEmail, $password);
        if ($uid) {
            $url = BASE_URL . 'vistas/crudFormUsuario.php';
            header("Location: $url"); // Page redirecting to home.php 
        } else {
            $errorMsgLogin = "Please check login details.";
        }
    }
}

/* Signup Form */
if (!empty($_POST['signupSubmit'])) {
    $username = $_POST['usernameReg'];
    $email = $_POST['emailReg'];
    $password = $_POST['passwordReg'];
    $name = $_POST['nameReg'];
    /* Regular expression check */
    $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
    $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-Z]{2,4})$~i', $email);
    $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

    if ($username_check && $email_check && $password_check && strlen(trim($name)) > 0) {
        $uid = $userClass->userRegistration($username, $password, $email, $name);
        if ($uid) {
            $url = BASE_URL . 'vistas/crudFormUsuario.php';
            header("Location: $url"); // Page redirecting to home.php 
        } else {
            $errorMsgReg = "Username or Email already exists.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        #login,
        #signup {
            width: 300px;
            border: 1px solid #d6d7da;
            padding: 0px 15px 15px 15px;
            border-radius: 5px;
            font-family: arial;
            line-height: 16px;
            color: #333333;
            font-size: 14px;
            background: #ffffff;
            rgba(200, 200, 200, 0.7) 0 4px 10px -1px
        }

        #login {
            float: left;
        }

        #signup {
            float: right;
        }

        h3 {
            color: #365D98
        }

        form label {
            font-weight: bold;
        }

        form label,
        form input {
            display: block;
            margin-bottom: 5px;
            width: 90%
        }

        form input {
            border: solid 1px #666666;
            padding: 10px;
            border: solid 1px #BDC7D8;
            margin-bottom: 20px
        }

        .button {
            background-color: #5fcf80;
            border-color: #3ac162;
            font-weight: bold;
            padding: 12px 15px;
            max-width: 100px;
            color: #ffffff;
        }

        .errorMsg {
            color: #cc0000;
            margin-bottom: 10px
        }
    </style>
</head>

<body>


    <div class="container">

        <div class="d-flex justify-content-center mt-5">

            <div id="login">
                <h3>Login</h3>
                <form method="post" action="" name="login">
                    <label>Username or Email</label>
                    <input type="text" name="usernameEmail" autocomplete="off" />
                    <label>Password</label>
                    <input type="password" name="password" autocomplete="off" />
                    <div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
                    <input type="submit" class="button" name="loginSubmit" value="Login">
                </form>
            </div>

            <div id="signup">
                <h3>Register</h3>
                <form method="post" action="" name="register">
                    <label>Name</label>
                    <input type="text" name="nameReg" autocomplete="off" />
                    <label>UserName</label>
                    <input type="text" name="usernameReg" autocomplete="off" />
                    <label>Email</label>
                    <input type="text" name="emailReg" autocomplete="off" />
                    <label>Password</label>
                    <input type="password" name="passwordReg" autocomplete="off" />
                    <div class="errorMsg"><?php echo $errorMsgLogin; ?></div>
                    <input type="submit" class="button" name="signupSubmit" value="signup">
                </form>
            </div>

        </div>





    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>