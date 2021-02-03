<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&subset=greek-ext');

        body {
            overflow: hidden;
            background-color: #242833;
            
            min-height: 100vh;
            font-family: 'Noto Sans', sans-serif;
        }

        .text-center {
            color: #fff;
            text-transform: uppercase;
            font-size: 23px;
            margin: -30px 0 50px 0;
            display: block;
            text-align: center;
        }

        .box {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #343b4c;
            border-radius: 6px;
            padding: 70px 40px 40px;
            width: 20%;
        }

        .input-container {
            position: relative;
            margin-bottom: 25px;
        }

        .input-container label {
            position: absolute;
            top: 0px;
            left: 0px;
            font-size: 16px;
            color: #fff;
            transition: all 0.5s ease-in-out;
        }

        .input-container input {
            border: 0;
            border-bottom: 1px solid #555;
            background: transparent;
            width: 100%;
            padding: 8px 0 5px 0;
            font-size: 16px;
            color: #fff;
        }

        .input-container input:focus {
            border: none;
            outline: none;
            border-bottom: 1px solid #e74c3c;
        }

        .btn {
            color: #fff;
            background-color: #e74c3c;
            outline: none;
            border: 0;
            color: #fff;
            padding: 10px 20px;
            text-transform: uppercase;
            margin-top: 20px;
            border-radius: 6px;
            width: 100%;
            cursor: pointer;
            position: relative;
        }

        .btn:hover {
            color: #e74c3c;
            background-color: #fff;
        }

        .input-container input:focus~label,
        .input-container input:valid~label {
            top: -12px;
            font-size: 12px;
        }

        .forgot {
            float: right;
            font-size: 12px;
            color:#f57b51;
            text-decoration: none;
        }

        .icon-group a {
            text-decoration: none;
        }

        .fa {
            padding: 10px;

            width: 20px;
            text-align: center;
            text-decoration: none;
            margin: 5px 7px;
            border-radius: 50%;
        }

        .icon-group {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        .icon-group label {
            color: white;
            display: flex;
            flex-direction: row;
        }

        .icon-group label:before,
        .icon-group label:after {
            content: "";
            flex: 1 1;
            border-bottom: 2px solid white;
            margin: auto;
        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-facebook {
            background: #3B5998;
            color: white;
        }

        .fa-google {
            background: #dd4b39;
            color: white;
        }

        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        .account {
            margin-top: 20px;
            text-align: center;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .account:before,
        .account:after {
            flex-grow: 1;
            height: 1px;
            content: '\a0';
            background-color: #ddd;
            position: relative;
            margin-top: 5px;
        }

        .account:before {
            margin-right: 10px;
        }

        .account:after {
            margin-left: 10px;
        }

        .sign-up {
            margin-top: 60px;
            font-size: 14px;
           
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="box">
        <form method="POST" action="auth.php">
            <span class="text-center">login</span>
            <div class="input-container">
                <input type="text" name="username" required="" />
                <label>Username</label>
            </div>
            <div class="input-container">
                <input type="password" name="password" required="" />
                <label>password</label>
            </div>
            <a class="forgot" href="">forget your password ?</a> <br>
            <input type="submit" name="login" value="Login"class="btn"></input>
        </form>

        <div class="account">
            or continue using
        </div>

        <div class="icon-group">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-google"></a>
        </div>
        <div class="icon-group sign-up">
            <label for="">didn't have an account</label>
            <a href="signup.php" style="margin-left:5px; margin-right:5px;  color:#f57b51;"> Sign up </a>
            <label for=""> now</label>
        </div>
    </div>

</body>

</html>