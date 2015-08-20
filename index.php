<!DOCTYPE html>
<html>
<head>
	<title>Mongodb | Inicio</title>
	<meta charset="utf-8">
</head>
<body>

	<?php 

	error_reporting(E_ALL|E_STRICT);
	ini_set('display_errors', 1);

	require_once 'conection.class.php';

	$conexao = new Conection();
	$conexao->useBD('localhostBD');
	$conexao->useTable('listagem');
	// $conexao->insert( Array('nome'=>'pedro','email'=>'pedro@teste.com') );
	$rows = $conexao->getAll();

	function printer( $arr ) {
		echo '<pre>'.print_r($arr,1).'</pre>';
	}
	?>

	<form action="send.php" method="post">
		<table>
			<tr>
				<td>Nome</td>
				<td><input type="text" name="nome"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><button type="submit">Enviar</button></td>
			</tr>
		</table>
	</form>


	<hr>
	<h3>Lista</h3>
	<table>
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Ações</th>
		</tr>
		<?php 

			foreach ($rows as $obj) {
				echo '<tr>';
				echo '<td>'.$obj['nome'].'</td>';
				echo '<td>'.$obj['email'].'</td>';
				echo '<td><form action="edit.php" method="post"><button type="submit" name="id" value="'.$obj['_id'].'"> EDIT </button></form>';
				echo '<form action="delete.php" method="post"><button type="submit" name="id" value="'.$obj['_id'].'"> DEL </button></form></td>';
				echo '</tr>';
			}

		?>
	</table>

</body>
</html>
