<html>

<head>
	<meta http-equiv="Content-Type" content="text/html;" />
	<meta charset="utf-8">
	<title>Plantas</title>

</head>

<body>
	<?php
	if (isset($_POST['metodo'])) {
		$metodo = $_POST['metodo'];
		$servicio_url = "http://localhost/poyectos/pruebas/Json/web-service/ws_intraday.php";
		if ($metodo == 'DELETE') {
			$id = $_POST['id'];
			$parametros = '?id=' . $id;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $servicio_url . $parametros);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$result = curl_exec($ch);
			echo "Borrado el registro " . $id;
			echo $result;
			curl_close($ch);
		} elseif ($metodo == 'GET') {
			$datos_formulario = json_decode(file_get_contents('http://localhost/poyectos/pruebas/Json/web-service/ws_intraday.php?id=' . $_POST['id']), true);
		} elseif ($metodo == 'POST') {
			$information = $_POST['information'];
			$symbol = $_POST['symbol'];
			$last_refreshed = $_POST['last_refreshed'];
			$out_size = $_POST['out_size'];
			$id = $_POST['id'];
			$data = array(
				'id' => $id,
				'information' => $information,
				'symbol' => $symbol,
				'last_refreshed' => $last_refreshed,
				'out_size' => $out_size
			);
			$param = json_encode($data);
			$ch = curl_init($servicio_url);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			echo $result;
			echo 'Se ha insertado el nuevo registro';
			curl_close($ch);
		} elseif ($metodo == 'PUT') {
			$information = $_POST['information'];
			$symbol = $_POST['symbol'];
			$last_refreshed = $_POST['last_refreshed'];
			$out_size = $_POST['out_size'];
			$id = $_POST['id'];
			$data = array(
				'id' => $id,
				'information' => $information,
				'symbol' => $symbol,
				'last_refreshed' => $last_refreshed,
				'out_size' => $out_size
			);
			$param = json_encode($data);
			$ch = curl_init($servicio_url);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			echo $result;
			echo 'Se ha modificado el registro' . $id;
			curl_close($ch);
		}
	}
	?>


	<h1>Lista de stock</h1>

	<form>
		<label for="stocks">Stocks</label>
		<select id="stocks">
			<option>- Selecciona -</option>
			<?php

			$data = json_decode(file_get_contents('http://localhost/poyectos/pruebas/Json/web-service/ws_intraday.php'), true);
			foreach ($data['meta_data'] as $clave => $valor) {
				echo '<option value="' . $valor['id'] . '">' . $valor['symbol'] . '</option>';
			}

			?>
		</select>

	</form>
	<h2>Modifica una Stock</h2>

	<form method="POST" action="">
		<label for="meta_data">Stock</label>
		<select id="meta_data" name="id">
			<option>- Selecciona -</option>
			<?php

			$data = json_decode(file_get_contents('http://localhost/poyectos/pruebas/Json/web-service/ws_intraday.php'), true);
			foreach ($data['meta_data'] as $clave => $valor) {
				echo '<option value="' . $valor['id'] . '">' . $valor['symbol'] . '</option>';
			}

			?>
		</select>
		<input type="hidden" name="metodo" value="GET" />
		<input type="submit" value="Ver registro">
	</form>
	<?php if (isset($datos_formulario)) {
		print_r($datos_formulario['meta_data'][0]['id']);
		echo $_POST['id'];

	?>
		<form action="" method="POST">
			<input type="hidden" name="metodo" value="PUT" />
			<label>Information:</label><input type="text" name="information" value="<?php echo $datos_formulario['meta_data'][0]['information'] ?>"><br>
			<label>Symbol:</label><input type="text" name="symbol" value="<?php echo $datos_formulario['meta_data'][0]['symbol'] ?>"><br>
			<label>Last refreshed:</label><input type="text" name="last_refreshed" value="<?php echo $datos_formulario['meta_data'][0]['last_refreshed'] ?>"><br>
			<label>Out size:</label><input type="text" name="out_size" value="<?php echo $datos_formulario['meta_data'][0]['out_size'] ?>"><br>
			<input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
			<input type="submit" value="Enviar">
		</form>

	<?php } ?>




	<h2>Borrar stock </h2>
	<form action="" method="POST">
		<input type="hidden" name="metodo" value="DELETE" />
		<label for="stocks">Stocks</label>
		<select id="stock" name="id">
			<option>- Selecciona stock a borrar -</option>
			<?php

			$data = json_decode(file_get_contents('http://localhost/poyectos/pruebas/Json/web-service/ws_intraday.php'), true);
			foreach ($data['meta_data'] as $clave => $valor) {
				echo '<option value="' . $valor['id'] . '">' . $valor['symbol'] . '</option>';
			}

			?>
		</select>
		<input type="submit" value="Borrar stock">
	</form>

	<h2>Inserta stock</h2>
	<form action="" method="POST">
		<input type="hidden" name="metodo" value="POST" />
		<label>Information:</label><input type="text" name="information"><br>
		<label>Symbol:</label><input type="text" name="symbol"><br>
		<label>Last refreshed:</label><input type="text" name="last_refreshed"><br>
		<label>Out size:</label><input type="text" name="out_size"><br>
		<input type="submit" value="Enviar">
	</form>

<hr>
	<form action="" method="POST">
		<input type="text" name="busqueda" value="" placeholder="Seach" maxlength="30" autocomplete="off" />
		<input type="submit" value="Buscar">
		</form>
		<table>
			<tr>
				<th>Symbol</th>
				<th>name </th>
			</tr>
			<?php
			$valueSearch = "";
			if (isset($_POST['busqueda'])) {
				$valueSearch = $_POST['busqueda'];
				$data = json_decode(file_get_contents('https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=' . $valueSearch . '&apikey=0XQB6K7M2RYU0QE6'), true);
				foreach ($data['bestMatches'] as $clave => $valor) {
					echo '<tr>';
					echo '<td>' . $valor['1. symbol'] . ' </td>';
					echo '<td>' . $valor['2. name']  . '</td>';
					echo '</tr>';
				}
			}
			?>
		</table>
	


</body>

</html>