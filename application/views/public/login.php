<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="<?php echo base_url('index.php/shopping/proseslogin'); ?>">
		<input type="name" placeholder="E-mail Anda" name="user"><br>
		<input type="password" placeholder="Password Anda" name="pwd"><br>
		<input type="submit" value="login">	
	</form>
</body>
</html>