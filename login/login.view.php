<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/login.css">
</head>

<body>

	<?php if (isset($_SESSION['email'])) {
		echo "<h1>Vous êtes connecté en tant que : </h1>" . $_SESSION['email'];
	} else {
	?>
		<div class="background">
			<div class="shape"></div>
			<div class="shape"></div>
		</div>
		<form method="POST" action="login.php">
			<h3>Connexion</h3>

			<div class="email" data-validate="Email is required">
				<label for="email">Email</label>
				<input type="text" name="email" placeholder="Email" id="email">
			</div>
			<div class="password" data-validate="Password is required">
				<label for="password">Password</label>
				<input type="password" name="pass" placeholder="Password" id="password">
			</div>

			<button name="submit">Se connecter</button>

			<br>
			<br>

			<a href="./inscription.view.php">S'inscrire</a>
		</form>
	<?php
	}
	?>

</body>

</html>