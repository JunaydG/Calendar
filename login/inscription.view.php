<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Inscription</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/login.css">
</head>

<body>
	<div class="background">
		<div class="shape"></div>
		<div class="shape"></div>
	</div>
	<form method="POST" action="login.php">

		<h3>Inscription</h3>

		<div class="email" data-validate="Email is required">
			<label for="email">Email</label>
			<input type="text" name="email" placeholder="Email" id="email">
		</div>
		<div class="password" data-validate="Password is required">
			<label for="password">Password</label>
			<input type="password" name="password" placeholder="Password" id="password">
		</div>

		<button name="submitInscription">S'inscrire</button>
		<br>
		<br>
		<a href="./login.view.php">Se Connecter</a>
	</form>

</body>

</html>