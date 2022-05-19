<?php

require '../application/functions.php';
if (!empty($_SESSION['user_id'])) {
	header('Location: ../index.php');
}
if (isset($_POST['submit'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
	$results = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
	if (mysqli_num_rows($results) > 0) {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($email) && empty($username)) {
				$error = true;
			} else if (empty($email)) {
				echo "<script>alert('email wajib diisi');</script>";
			} else if (empty($username)) {
				echo "<script>alert('username wajib diisi');</script>";
			} else {
				echo 404;
			}
		} else {
			echo "<script>alert('username/email sudah ada');</script>";
		}
	} else {
		if ($password == $confirmPassword) {
			$password = password_hash($password, PASSWORD_DEFAULT);
			$query = "INSERT INTO user VALUES('', '$username', '$email', '$password', '')";
			mysqli_query($conn, $query);
			echo '<script>alert("Registration succes");
            document.location="../index.php";
            </script>';
		} else {
			echo "<script>alert('Password dont match');</script>";
		}
	} 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>POLAIR</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../img/polair.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<!--===============================================================================================-->
</head>

<body>
	<div class="limiter">
		<div class="container-login100 d-flex">
			<div class="wrap-login100 justify-content-center">

				<form class="login100-form validate-form" method="post" action="">
					<span class="login100-form-title">
						Member Regist
					</span>
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" placeholder="username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="bi bi-person"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="confirmPassword" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn btn-primary text-light" type="submit" name="submit">
							Registeration
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>





	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>