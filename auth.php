<?php 

include 'koneksi.php';
 
$username = $_POST['username'];
$password = md5($_POST['password']);
$login = mysqli_query($koneksi,"select * from account where Username='$username' and Password='$password'");
$cek = mysqli_num_rows($login);
 
if($cek > 0){
	$d = mysqli_fetch_array($login);
	session_start();
	$_SESSION['idUser'] = $d['IdUser'];
	$_SESSION['username'] = $username;
	$_SESSION['status'] = $d["Status"];
	header("location:home.php");
}else{
	header("location:login.php");
    echo"<script>alert('Username and password didnt match.');<script>";

}
