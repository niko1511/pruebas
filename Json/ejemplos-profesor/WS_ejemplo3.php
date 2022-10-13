<html>
<head>
<meta http-equiv="Content-Type" content="text/html;" />
<meta charset="utf-8">
<title>Plantas</title>
</head>

<body>
<?php
if (isset($_POST['metodo']))
{
$metodo=$_POST['metodo'];
$servicio_url="https://nascor13.md360.es/modulo2/WS/wsrest_plantas3.php";	
     if ($metodo=='DELETE') {
		$id=$_POST['id_planta'];
		$parametros='?id='.$id;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$servicio_url.$parametros);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		$result = curl_exec($ch);
		echo "Borrado el registro ".$id;
		echo $result;
		curl_close($ch);		 
	 }
	elseif ($metodo=='GET') {
		$datos_formulario = json_decode( file_get_contents('https://nascor13.md360.es/modulo2/WS/wsrest_plantas3.php?id='.$_POST['id']), true );
	}
	
	elseif ($metodo=='POST') {
		$nombre_comun=$_POST['nombre_comun'];
		$nombre_cientifico=$_POST['nombre_cientifico'];
		$descripcion=$_POST['descripcion'];
		$stock=$_POST['stock'];
		$ubicacion=$_POST['interior'];
		$data = array(
    	'nombre_comun' => $nombre_comun,
    	'nombre_cientifico' => $nombre_cientifico,
		'descripcion' => $descripcion,
		'id_ubicacion'=> $ubicacion,
		'stock'=>$stock);
		$param = json_encode($data);
		$ch = curl_init($servicio_url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		echo $result;
		echo 'Se ha insertado el nuevo registro';
		curl_close($ch);		
	}	
	elseif ($metodo=='PUT') {
		$nombre_comun=$_POST['nombre_comun'];
		$nombre_cientifico=$_POST['nombre_cientifico'];
		$descripcion=$_POST['descripcion'];
		$stock=$_POST['stock'];
		$ubicacion=$_POST['interior'];
		$id=$_POST['id'];
		$data = array(
    	'id' => $id,			
    	'nombre_comun' => $nombre_comun,
    	'nombre_cientifico' => $nombre_cientifico,
		'descripcion' => $descripcion,
		'id_ubicacion'=> $ubicacion,
		'stock'=>$stock);
		print_r($data);
		$param = json_encode($data);
		$ch = curl_init($servicio_url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		echo $result;
		echo 'Se ha modificado el registro'.$id;
		curl_close($ch);		
	}		
}
?>


<h2>Consulta</h2>

<form method="POST" action="">
  <label for="plantas">Plantas</label>
  <select id="plantas" name="id">
	<option>- Selecciona -</option>
<?php

$data = json_decode( file_get_contents('https://nascor13.md360.es/modulo2/WS/wsrest_plantas3.php'), true );
foreach ($data['plantas'] as $clave => $valor)
{
   echo '<option value="'.$valor['id'].'">'.$valor['Nombre_comun'].'</option>';
}

?>
  </select>
</form>	
	
<h2>Inserta una planta de interior</h2>
<form action="" method="POST">
		<input type="hidden" name="metodo" value="POST" />
	<label>Nombre común:</label><input type="text" name="nombre_comun"><br> 
	<label>Nombre cientifico:</label><input type="text" name="nombre_cientifico" ><br>
	<label>Descripción:</label><input type="text" name="descripcion" ><br>
	<label>Stock:</label><input type="text" name="stock"><br> 
	<input type="hidden" name="id" value=<? echo $_POST['id']; ?>> 
	<input type="hidden" name="interior" value=1>
	<input type="submit" value="Enviar">
</form>

	
<h2>Modifica una planta de interior</h2>

<form method="POST" action="">
  <label for="plantas">Plantas</label>
  <select id="plantas" name="id">
	<option>- Selecciona -</option>
<?php

$data = json_decode( file_get_contents('https://nascor13.md360.es/modulo2/WS/wsrest_plantas3.php'), true );
foreach ($data['plantas'] as $clave => $valor)
{
   echo '<option value="'.$valor['id'].'">'.$valor['Nombre_comun'].'</option>';
}

?>
  </select>
	<input type="hidden" name="metodo" value="GET" />
  	<input type="submit" value="Ver registro">
</form>	
<?php if (isset($datos_formulario)) { ?>
<form action="" method="POST">
	<input type="hidden" name="metodo" value="PUT" />
	<label>Nombre común:</label><input type="text" name="nombre_comun" value="<?php echo $datos_formulario['plantas'][0]['Nombre_comun'] ?>"><br> 
	<label>Nombre cientifico:</label><input type="text" name="nombre_cientifico" value="<?php echo $datos_formulario['plantas'][0]['Nombre_cientifico'] ?>"><br>
	<label>Descripción:</label><input type="text" name="descripcion" value="<?php echo $datos_formulario['plantas'][0]['Descripcion'] ?>"><br>
	<label>Stock:</label><input type="text" name="stock" value="<?php echo $datos_formulario['plantas'][0]['stock'] ?>"><br> 
	<input type="hidden" name="id" value=<? echo $_POST['id']; ?>>
	<input type="hidden" name="interior" value=1>
	<input type="submit" value="Enviar">
</form>
<?php } ?>
	
	
<h2>Borrar una planta</h2>
<form action="" method="POST">
  <input type="hidden" name="metodo" value="DELETE" />
  <label for="plantas">Plantas</label>
  <select id="plantas" name="id_planta">
	<option>- Selecciona planta a borrar -</option>
<?php

$data = json_decode( file_get_contents('https://nascor13.md360.es/modulo2/WS/wsrest_plantas3.php'), true );
foreach ($data['plantas'] as $clave => $valor)
{
   echo '<option value="'.$valor['id'].'">'.$valor['Nombre_comun'].'</option>';
}

?>
  </select>
	<input type="submit" value="Borrar planta">
</form>	