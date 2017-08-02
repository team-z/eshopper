<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Admin</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugin/FontAwesome/css/font-awesome.min.css'); ?>">
</head>
<body>
	<div id="container" data-background="<?php echo base_url('assets/images/bg.jpg'); ?>">
		<div class="logo">
				<span style="color:rgba(255,255,255,.4);">Sign in form</span>
				<h1 style="font-size:32pt;letter-spacing:-3px;">BUNG<span style="color:yellow">LOON</span></h1>
			</div>
			<div class="form">
				<form method="POST" action="<?php echo base_url('index.php/login/aksi_login'); ?>">
					<div class="form-group">
						<span class="form-icon"><i class="fa fa-user"></i></span>
						<input type="text" class="form-input" name="username" placeholder="username">
					</div>
					<div class="form-group">
						<span class="form-icon"><i class="fa fa-lock"></i></span>
						<input type="password" class="form-input" name="password" placeholder="password">
					</div>
					<input type="submit" class="btn btn-warning btn-block" value="Login">
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url('assets/plugin/jQuery/jquery-3.2.1.slim.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/script.js'); ?>"></script>
</body>
</html>