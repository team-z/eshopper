<!DOCTYPE html>
<html>
<head>
	<?php include "head.php" ?>
</head>
<body>
	<header id="header"><!--header-->
		<!--/header_top-->
		<?php include "header-top.php"; ?>
		<!--/header-middle-->
	    <?php include "header-middle.php"; ?>
		<!--/header-bottom-->
		<?php include "header-bottom.php"; ?>
	</header>
	<section style="padding: 5%;"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="post" action="<?php echo base_url('index.php/shopping/proseslogin'); ?>">
							<input type="email" placeholder="E-mail Anda" name="user" />
							<input type="password" placeholder="Password Anda" name="pwd" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="#">
							<input type="text" placeholder="Name"/>
							<input type="email" placeholder="Email Address"/>
							<input type="password" placeholder="Password"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	<?php include "footer.php"; ?>
<?php include "bottom.php"; ?>
</body>
</html>