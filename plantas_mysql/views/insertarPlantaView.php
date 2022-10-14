<?php
/*
insertarPlantaVista.php
-----------------------
<form action="insertar2PlantaControlador.php" method="POST">
<input type="text" name="nombre_comun">
<input type="text" name="nombre_cientifico">
<textarea name="descripcion"></texarea>
<input type="number" name="stock">
<select name="idUbi">
foeach ($listaUbicaciones->ubicaciones as $ubi) {
    '<option value="'.$ubi['id'].'">'.$ubi['Ubicacion'].'</option>'
}
</select>
</form>*/

?>
<form action="../controllers/insertarNewPlantaController.php" method="POST">
<label for="">Nombre común</label><input type="text" name="nombre_comun"><br>
<label for="">Nombre cientifico</label><input type="text" name="nombre_cientifico"><br>
<label for="">Descripción</label><textarea name="descripcion"  cols="30" rows="10"></textarea><br>

<label for="">Stock</label><input type="number" name="stock"><br>
<select name="idUbi">
<?php
foreach ($ubicaciones->ubicaciones as $ubi) {
    
   echo  '<option value="'.$ubi['id'].'">'.$ubi['Ubicacion'].'</option>';
   
}
?>
</select>

<input type="submit" value="Insertar nueva planta">
</form>