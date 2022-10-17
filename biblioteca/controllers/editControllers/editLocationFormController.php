<?php 
//Array ( [cordenadas] => arribaaa [id] => 7 [id_cordenadas] => 0 [agregar] => Agregar ) 
include_once '../../models/bibliotecaModel.php';

$locations = new Biblioteca();
$locations -> modificarLocation($_POST['id'],$_POST['cordenadas']);

$ubicaciones = new Biblioteca();
$ubicaciones->leerUbicaciones();

include_once '../../views/headView.php';
include_once '../../views/insertLocationView.php';
include_once '../../views/footerView.php';

?>