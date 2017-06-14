<?php session_start();
if(isset($_SESSION['username']))
require_once("koneksi.php");
?>
<center>
<form action="proseslogin.php" method="post">
<h1>Masuk</h1>
<table>
<tbody>
<tr>
<td>Username</td>
<td>: <input name="username" type="text" /></td>
</tr>
<tr>
<td>Password</td>
<td>: <input name="password" type="password" /></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" value="Login" /> <input type="reset" value="Batal" /></td>
</tr>
</tbody>
</table>
</form>
</center>