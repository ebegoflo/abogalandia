<?php
	include('conexion.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 
		$username =  isset($_POST['username']) ? $_POST['username'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		$enviar = isset($_POST['enviar']) ? $_POST['enviar'] : '';
	?>

	<?php
		if ($enviar == '') {
	?>
		Favor de Completar el siguiente formulario <br>
		<form action="" method="POST">
			<label>Nombre de usuario:</label> <input type="text" name="username"><br>
			<label>Email:</label> <input type="email" name="email"><br>
			<label>Contraseña:</label> <input type="password" name="password"><br>
			<input type="submit" name="enviar" value="Regístrame">
		</form>
	<?php
		} else {

				$mysqli = "SELECT email FROM usuarios WHERE email = '$email'";
				$result = $db->query($mysqli);
				if ($result->num_rows <= 0) {
					$sql = "INSERT INTO usuarios (username, email, password)
					VALUES ('$username', '$email', MD5('$password'))";
					if ($db->query($sql) === TRUE) {
						echo "<h1>Gracias por registrarte</h1>";
					} else {
						echo "Error: " . $sql . "<br>" . $db->error;
					}
				}

				else {
					echo "<h1>Email ya utilizado</h1>";
				}

		}
	?>
	

</body>
</html>