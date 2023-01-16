<?php
 session_start();
 require_once '../login/login.php';
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/login.css">
</head>

<body>

	<div class="background">
		<div class="shape"></div>
		<div class="shape"></div>
	</div>
	<form method="POST">
		<h3>Connexion</h3>

		<div class="email" data-validate="Email is required">
			<label for="email">Email</label>
			<input type="text" name="email" placeholder="Email" id="email">
		</div>
		<div class="password" data-validate="Password is required">
			<div class="error-message">
				<?php echo $error_message; ?>
			</div>
			<label for="password">Password</label>
			<input type="password" name="password" placeholder="Password" id="password">
		</div>

		<button name="submit">Se connecter</button>

		<br>
		<br>

		<a href="./inscription.view.php">S'inscrire</a>
	</form>


</body>

</html>