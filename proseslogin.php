<?php
require_once ("koneksi.php");
 
// mengambil variabel username dan password dari form login
$username = $_POST["username"];
$password = $_POST["password"];
 
// proteksi MySQL terhadap injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
 
$sql="SELECT * FROM user";
$result=mysql_query($sql);
$row = mysql_fetch_array($result);
 
if($username != $row["username"]) {
	echo "<script>alert(\"Username salah!\");</script>";
	echo "<meta http-equiv='refresh' content='1;URL=login.php'>";
 
} elseif ($password != $row["password"]) {
	echo "<script>alert(\"Password salah!\");</script>";
	echo "<meta http-equiv='refresh' content='1;URL=login.php'>";
}
 
$sql="SELECT * FROM user WHERE username='$username' and password='$password'";
$result=mysql_query($sql);
 
// mysql_num_row menghitung jumlah baris dalam tabel
$count = mysql_num_rows($result);
$row = mysql_fetch_array($result);
	
// jika hasil query sesuai dengan $myusername dan $mypassword, jumlah baris dalam tabel harus bernilai 1
 
if($count==1){
 
// registrasi $myusername, $mypassword dan mengarahkan aksi ke file "login_sukses.php"
$_SESSION["username"] = $row["nama"];
$_SESSION["password"] = $row["password"];
$_SESSION["level"] = $row["level"];
header("location:beranda/index.php");
}
?>