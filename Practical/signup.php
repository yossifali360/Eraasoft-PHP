<!DOCTYPE html>
<html lang="en">

<head>
	<title>Sign up</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="stylesheet" href="Assets/stylesheets/login.css" />
	<link rel="stylesheet" href="Assets/stylesheets/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
	<?php include('./inc/navbar.php') ?>
	<section class="d-flex align-items-center justify-content-center mainSection">
		<div class="row align-items-stretch justify-content-center col-7 rounded-3 overflow-hidden">
			<div class="col-6 d-none d-md-block p-0 m-0 ">
				<div class="leftImg h-100"></div>
			</div>
			<div class="form col-12 col-md-6 bg-white py-5">
				<h3 class="text-center">Sign up</h3>
				<form action="./handlers/handleregister.php" method="post" class="signin-form h-100 px-2">
					<div class="form-group mb-3">
						<label class="label" for="email">Email</label>
						<input type="text" name="email" class="form-control" placeholder="Email" required />
					</div>
					<div class="form-group mb-3">
						<label class="label" for="name">Name</label>
						<input type="text" name="name" class="form-control" placeholder="Your Name" required />
					</div>
					<div class="form-group mb-3">
						<label class="label" for="password">Password</label>
						<input type="password" name="password" class="form-control" placeholder="Password" required />
					</div>
					<div class="form-group mb-3">
						<label class="label" for="confirm-password">Confirm Password</label>
						<input type="password" name="confirm-password" class="form-control" placeholder="confirm-password" required />
					</div>
					<div class="form-group">
						<input type="submit" value="Sign up" class="form-control btn btn-primary rounded submit px-3">
					</div>
					<div class="form-group d-md-flex justify-content-between align-items-center mt-2">
						<div class="t">
							<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
								<input type="checkbox" checked />
								<span class="checkmark"></span>
							</label>
						</div>
						<a href="#">Forgot Password</a>
					</div>
					<a href="login.html">Already a member ? Sign in</a>
					<div class="icons text-center mt-3">
						<h6 class="text-dark"> or sign up with</h6>
						<i class="fab fa-facebook mx-2 fs-4"></i>
						<i class="fab fa-google mx-2 fs-4"></i>
						<i class="fab fa-twitter mx-2 fs-4"></i>
					</div>
				</form>
			</div>
		</div>
	</section>
</body>

</html>