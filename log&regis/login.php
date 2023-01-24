<?php

require '../application/functions.php';
if (!empty($_SESSION['user_id'])) {
    header('Location: ../index.php');
}
if (isset($_POST['submit'])) {
    $useremail = mysqli_real_escape_string($conn, $_POST['userEmail']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $results = mysqli_query($conn, "SELECT * FROM user WHERE username = '$useremail' OR email = '$useremail'");
    $row = mysqli_fetch_assoc($results);

    if (mysqli_num_rows($results) == 1) {
        if ( password_verify( $password, $row['password'])) {
            if ($row['role'] == 1) {
                $_SESSION['login'] = true;
                $_SESSION['admin'] = $row['user_id'] ;
                header('Location: ../index.php');
            } else {
                $_SESSION['login'] = true;
                $_SESSION['user'] = $row['user_id'] ;
                header('Location: ../index.php');
            }
        } else {
            echo "<script>alert('pw salah');</script>";
        }
    } 
	else if(empty($useremail) || empty($password)){
        $error = "isi username dan password";
    } elseif (mysqli_num_rows($results) == 0) {
		echo "<script>alert('user not found');</script>";
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
	<link rel="icon" type="image/png" href="../img/polair.png"/>
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
<!--===============================================================================================-->
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../img/polair.png" alt="IMG">
				</div>
				<form class="login100-form validate-form" method="post" action="">
					<span class="login100-form-title">
						Member Login
					</span>
					<?php if (isset($error)) {
						echo $error;
					}?>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="userEmail" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn btn-primary text-light" type="submit" name="submit">
							Login
						</button>
					</div>
					<div class="container-login100-form-btn">
						<a href="regis.php" class="text-primary">SIGN UP</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>