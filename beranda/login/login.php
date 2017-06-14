<?php
include 'koneksi.php';

    		session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$login    = mysqli_query($connect, "select * from login where username='$username' and password='$password'");
$result   = mysqli_num_rows($login);
if (isset($_POST['cek'])){
		if($_SESSION['captcha']==$_POST['captcha']){
			if($result>0){
    		$user = mysqli_fetch_array($login);
    		$_SESSION['username'] = $user['username'];
    		header("location:welcome.php");
		}else{
    		header("location:false.php");
		}
		}else{
			echo "<script>alert('Kode Captcha Tidak Valid!')</script>";
		}
	}