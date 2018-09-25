<!DOCTYPE html>
<meta charset = "UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Formulario</title>

<?php
$con =mysqli_connect ("localhost", "root", "","crud") or die ("ERROR DE CONEXIÓN");
?>
<head>
	<title>Consulta de usuarios</title>
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<script type="text/javascript" src="js/jquery-1.6.js" ></script>
	<script type="text/javascript" src="js/cufon-yui.js"></script>
	<script type="text/javascript" src="js/cufon-replace.js"></script><script type="text/javascript" src="js/Vegur_300.font.js"></script>
	<script type="text/javascript" src="js/PT_Sans_700.font.js"></script>
	<script type="text/javascript" src="js/PT_Sans_400.font.js"></script>
	<script type="text/javascript" src="js/tms-0.3.js"></script>
	<script type="text/javascript" src="js/tms_presets.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/atooltip.jquery.js"></script>
</head>
<body id="page1">
	<a href="http://localhost/Pagina%20web/index.php#">IR A INICIO</a>
	<form method="POST" action="Formulario.php">
		<label> NOMBRE:</label>
		<input type="text" name="nombre" placeholder="Escriba su nombre"><br/><br/>
		<label> CONTRASEÑA:</label>
		<input type="password" name="pass" placeholder="Escriba su contraseña"><br/><br/>
		<label> EMAIL:</label>
		<input type="text" name="email" placeholder="Escriba su correo electrónico"><br/><br/>
		<input type="submit" name="insert" value="INSERTAR DATOS"><br/><br/>
	</form>
	<?php
	if (isset($_POST['insert'])){
		$usuario = $_POST['nombre'];	
		$pass = $_POST['pass'];
		$email = $_POST['email'];
		$insertar = "INSERT INTO usuario (usuario, password, email) VALUES ('$usuario', '$pass', '$email')";
		$ejecutar = mysqli_query ($con, $insertar);
		if ($ejecutar)
			{echo "<h3>INSERTADO CORRECTAMENTE</h3>";}
	}
	?>
	<br/>
	<table width="500" border ="2">
		<tr>
			<th>ID</th>
			<th>Usuario</th>
			<th>Password</th>
			<th>Email</th>
			<th>Editar</th>
			<th>Borrar</th>
		</tr>
		<?php
		$consulta = "SELECT * FROM usuario";
		$ejecutar = mysqli_query($con, $consulta);
		$i = 0;
		while($fila = mysqli_fetch_array($ejecutar)){
			$id = $fila['id'];
			$usuario = $fila ['usuario'];
			$password = $fila['password'];
			$email = $fila ['email'];
			$i++;
			?>
			<tr aling = "center">
				<td><?php echo $id; ?> </td>
				<td><?php echo $usuario; ?> </td>
				<td><?php echo $password; ?> </td>
				<td><?php echo $email; ?> </td>
				<td><a href="formulario.php?editar=<?php echo $id; ?>">Editar</a></td>
				<td><a href="formulario.php?borrar=<?php echo $id; ?>">Borrar</a></td>
			</tr>	
		<?php } ?>
	</table><br/><br/>
