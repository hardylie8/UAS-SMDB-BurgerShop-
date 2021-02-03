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
            margin: -30px 0 40px 0;
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
            padding: 70px 40px 20px 40px;
            width: 20%;
        }

        .input-container {
            position: relative;
            margin-bottom: 35px;
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
            margin-top: 25px;
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

        .term {
            font-size: 14px;
            color: #d23520;
            display: flex;
            text-align: left;
        }

        .login {
            margin-top: 50px;
            text-align: center;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            color: white;
        }
    </style>
</head>

<body>
    <div class="box">
        <form  method="POST" action="daftar.php">
            <span class="text-center">Create an account.</span>
            <div class="input-container">
                <input type="text"  name="username" required="" />
                <label>Username</label>
            </div>
            <div class="input-container">
                <input type="email"  name="email" required="" />
                <label>email</label>
            </div>
            <div class="input-container">
                <input type="password"  name="password" required="" />
                <label>Re-enter password</label>
            </div>
            <div class="input-container">
                <input type="password" name="rpassword" required="" />
                <label>password</label>
            </div>

            <div class="term">
                <input type="checkbox" id="term" name="term" value="term">
                <label for="term"> I agree all statement in
                    <label for="" style="text-decoration:underline;margin-left:5px;">Term of Service
                    </label>
                </label><br>
            </div>
            <input type="submit" name="signUp" value="Sign Up" class="btn">
        </form>
        <div class="login">
            <label for="" class="term" style="color:white;">already have an account ?</label>
            <a href="login.php" style="color:#f57b51;">Log In</a>
        </div>
    </div>
</body>

</html>