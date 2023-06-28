<!DOCTYPE html>
<html>

<head>
	<title>Página de cadastro</title>
	<style>
		body {
			background: #e8fdff;
		}
		.container {
			background-color: #99f6ff;
			padding: 20px;
			margin: 50px auto;
			width: 400px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
			border-radius: 30px;
		}

		h1 {
			text-align: center;
			margin-top: 0;
		}

		form {
			display: flex;
			flex-direction: column;
		}

		label {
			margin-bottom: 10px;
		}

		input[type="text"],
		input[type="password"],
		input[type="email"] {
			padding: 10px;
			margin-bottom: 20px;
			border-radius: 5px;
			border: none;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			border: none;
			border-radius: 10px;
			padding: 10px;
			cursor: pointer;
			font-size: 16px;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
		}

		.btn {
			background-color: #ff4f4f;
			color: white;
			padding: 10px 30px;
			text-decoration: none;
			border-radius: 10px;
		}

		.btn:hover {
			background-color: #b83535;
		}

		.sim {
			background-color: #46aae3;
			color: white;
			padding: 10px 30px;
			text-decoration: none;
			border-radius: 10px;
		}

		.sim:hover {
			background-color: #3b7ca1;
		}
	</style>
</head>

<body>
	<div class="container">
		<h1>CADASTRAR CHAVE</h1>
		<form action="CRUD/cad_chaves.php" method="post">

			<label for="name">Sala: </label>
			<input type="text" id="" name="sala">
			<input type="hidden" id="" name="disponivel" value="Sim">
			<br>

			<input type="submit" value="Registrar">
		</form>
		<br>
		<a href="tabela_chaves.php" class="btn btn-primary">Voltar</a>
	</div>
</body>

</html>