<?php

    if(isset($_POST['signUp']))
    {
        include_once 'koneksi.php';
        $username    = $_POST['username'];
        $email  = $_POST['email'];
        $password = md5($_POST['password']);
        $rpassword = md5($_POST['rpassword']);
        if($rpassword == $password){
             $input  ="insert into account
            values(null,'$username', '$email', '$password', 'User')";
            if(mysqli_query($koneksi, $input))
            {
                session_start();
                $_SESSION['idUser'] = mysqli_insert_id($koneksi);
                $_SESSION['username'] = $username;
                $_SESSION['status'] = "User";
                echo "<script>window.location='home.php'</script>";
            }
            else
            {   
                echo "Error: " . $input . "<br>" . mysqli_error($koneksi);
            }
        }
       
        
    }
    else
    {
        echo " oll";
    }


?>