<?php
require '../conUser.php';
$result = getAllFuncionario();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="ISO-8859-1">
	<title>Amb Form - Usuarios</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script type="text/javascript" src="js.js">
	</script>
</head>

<body>

	<div class="container" id="formAbmUsuario">
		<form action="../conUser.php" method="post" id="abmFormUsuario" name="abmFormUsuario">
			<input type="hidden" name="1" value="1">

			<div class="card-body">

				<h5 class="card-title text-center">Añadir Usuarios</h5>

				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="text" name="name" class="form-control" id="name" placeholder="Ingresa tu nombre">
				</div>

				<div class="mb-3">
					<label for="userName" class="form-label">UserName</label>
					<input type="text" name="username" class="form-control" id="userName" placeholder="usuario">
				</div>

				<div class="mb-3">
					<label for="email" class="form-label">Email address</label>
					<input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
				</div>

				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" name="password" class="form-control" id="password">
				</div>

				<div class="mb-3">

					<button type="submit" class="btn btn-primary">Save</button>

				</div>

			</div>

		</form>
	</div>


	<br><br>
	<div class="container">

	<div id="abmUsuario" align="center">

		<table class="table">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>UserName</th>
					<th>Email</th>
					<th>Password</th>
					<th>Editar</th>
					<th>Borrar</th>
				</tr>
			</thead>
			<?php
			while ($fila = mysql_fetch_array($result, MYSQL_NUM)) {
				//printf("Nombre: %s  Apellido: %s", $fila[0], $fila[1]); 	
			?>
				<tr>
					<td id="id"><?php echo $fila['0']; ?></td>
					<td><?php echo $fila['1']; ?></td>
					<td><?php echo $fila['2']; ?></td>
					<td><?php echo $fila['3']; ?></td>
					<td><?php echo $fila['4']; ?></td>
					<td align="center">
						<a href="FormEditUsuario.php?id=<?php echo $fila['0']; ?>&v2=3">
							<img alt="" src="../images/editar.png" width="15" height="15">
						</a>
					</td>
					<td align="center">
						<a href="../conUser.php?id=<?php echo $fila['0']; ?>&v2=2">
							<img alt="" src="../images/delete.png" width="15" height="15">
						</a>
					</td>
				</tr>
			<?php } ?>
		</table>

		<a class="btn btn-danger" href="../logout.php">Salir de la aplicacion</a>



	</div>

	</div>
	

	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>