<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Admin</title>
	<?php include "top.php"; ?>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/login.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugin/FontAwesome/css/font-awesome.min.css'); ?>">
</head>
<body>
	<div id="container" data-background="<?php echo base_url('assets/images/bg.jpg') ?>">
		<div class="box box-sm">
			<div class="logo">
				<span style="color:rgba(255,255,255,.4);">Sign in form</span>
				<h1 style="font-size:32pt;letter-spacing:-3px;">BUNG<span style="color:yellow">LOON</span></h1>
			</div>
			<div class="form">
				<form method="post" action="<?php echo base_url('index.php/login/aksi_login'); ?>">
					<div class="form-group">
						<span class="form-icon"><i class="fa fa-user"></i></span>
						<input type="text" name="username" class="form-input" placeholder="username">
					</div>
					<div class="form-group">
						<span class="form-icon"><i class="fa fa-lock"></i></span>
						<input type="password" name="password" class="form-input" placeholder="password">
					</div>
					<button type="submit" class="btn btn-warning btn-block">Sign in</button>
				</form>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('assets/js/script.js'); ?>"></script>
</body>
</html>