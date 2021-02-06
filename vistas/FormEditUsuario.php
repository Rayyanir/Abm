<?php
require '../conUser.php';

$udaimpl = new UsuarioDAOImpl();
$result = $udaimpl->getUsuarioById($id);

while ($value = mysql_fetch_array($result, MYSQL_NUM)){

?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="ISO-8859-1">
		<title>Edit Form - Usuarios</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<script type="text/javascript" src="js.js">
		</script>
	</head>

	<body>

		<div class="container" id="formAbmUsuario">
			<form action="../conUser.php" method="post" id="abmFormUsuario" name="abmFormUsuario">
				<input type="hidden" name="v3" value="3">
				<input type="hidden" name="uid" value="<?php echo $value['0']; ?>">
				
					<div class="card-body">

						<h5 class="card-title text-center">Editar Usuario</h5>

						<div class="mb-3">
							<label for="name" class="form-label">Name</label>
							<input type="text" class="form-control" name="name" id="name" placeholder="Ingresa tu nombre" value="<?php echo $value['1']; ?>">
						</div>

						<div class="mb-3">
							<label for="userName" class="form-label">UserName</label>
							<input type="text" class="form-control" name="username" id="userName" placeholder="usuario" value="<?php echo $value['2']; ?>">
						</div>

						<div class="mb-3">
							<label for="email" class="form-label">Email address</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="<?php echo $value['3']; ?> ">
						</div>

						<div class="mb-3">
							<label for="password" class="form-label">Password</label>
							<input type="password" class="form-control" name="password" id="password" value="<?php echo $value['4']; ?>">
						</div>

						<div class="mb-3">

							<button type="submit" class="btn btn-primary">Save</button>

						</div>

					</div>

			</form>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	</body>

	</html>

	<?php } ?>