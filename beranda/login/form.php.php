<!DOCTYPE html>
<html>
<head>
	<title>Form Login</title>
</head>
<body>
	<tr>
<form action="login.php" method="post">
<table>
	<tr>
	<p align="left">
		<td>Username</td><td> :</td> <td><input type="text" name="username" placeholder="username"></td>
	</p>
	</tr>
	<tr>
	<p align="left">
		<td>Password</td> <td>:</td> <td><input type="password" name="password" placeholder="password"></td>
	</p>
	</tr>
	<tr>
	<p align="left">
		<td>Kode Captcha</td> <td>:</td> <td><img src="captcha.php" /><br /></td>
	</p>	
	</tr>
	<p align="left">
		<td>Kode</td> <td>:</td> <td><input type="text" name="captcha" maxlength="6" /></td>
	</p>	
	</tr>
	</tr>
	<tr>
	<p align="left">
		<td><input type="submit" name="cek" value="CEK" /></td>
	</p>
	</table>
</form>
</body>
</html>

