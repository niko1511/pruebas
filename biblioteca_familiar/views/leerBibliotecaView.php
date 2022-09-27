
<?php

echo '<pre>';
//print_r($biblioteca);
//print_r($statusLibro->statusLibro);
echo '<pre>';
echo '<table>';
echo '<tr>';
echo '<th>Libro</th>';
echo '<th>Estado</th>';
echo '<th>Ubicación</th>';
echo '</tr>';
foreach ($biblioteca->autores as $fila) {
	$id = $fila['id'];
	
	$statusName = "<td id='disponible'><strong>Disponible</strong></td>";
	echo '<tr>';
	echo '<td><a href="../controllers/leerLibroController.php?id_libro=' . $id . '">' . $fila['nombre'] . '</a></td>';
	
	if ($fila['status']== 1) {
		echo $statusName = "<td id='ocupado'><strong>Ocupado</strong></td>";
		echo '<td><a href="../controllers/leerEstadoController.php?id_libro=' . $id  . '&status='.$fila['status'].'"> Ver </a></td>';
		}else{
	echo  $statusName;
	echo '<td><a href="../controllers/asignarEstadoController.php?id_libro=' . $fila['id'] . '"> Asignar </a></td>';
		}
	echo '</tr>';
}
echo '</table>';


