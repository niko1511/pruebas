<!--
<searchbar id="searchcontainer">
        <input
          type="search"
          name=""
          value=""
          placeholder="Search"
          id="input-search"
        />
        <i class="fa-solid fa-magnifying-glass" id="btn_search"></i>
      </searchbar> -->
<?php

echo '<table>';
echo '<tr>';
echo '<th>Libro</th>';
echo '<th>Estado</th>';
echo '<th>Prestamo</th>';
echo '</tr>';
if(!empty($biblioteca->autores)){
foreach ($biblioteca->autores as $fila) {
	$id = $fila['id'];

	$statusName = "<td id='disponible'><strong>Disponible</strong></td>";
	echo '<tr>';
	echo '<td><a href="../../controllers/leerControllers/leerLibroController.php?id_libro=' . $id . '">' . $fila['nombre'] . '</a></td>';

	if ($fila['status'] > 0) {
		echo $statusName = "<td id='ocupado'><strong>Ocupado</strong></td>";
		echo '<td><a href="../../controllers/estadoControllers/asignarEstadoController.php?id_libro=' . $id  . '&status=' . $fila['status'] . '"> <i class="fa-sharp fa-solid fa-eye">ver</i> </a></td>';
	} else {
		echo  $statusName;
		echo '<td><a href="../../controllers/estadoControllers/asignarEstadoController.php?id_libro=' . $fila['id'] . '"> Asignar </a></td>';
	}
	echo '</tr>';
}
}else{
	echo 'La base de datos "libros" esta vacia ';
	//echo '<br>';
	echo 'Agrege un nuevo libro';
}
echo '</table>';
?>

<?php
include_once '../../views/footerView.php';
?>
