<?php 

include_once '../../models/bibliotecaModel.php';

$locations = new Biblioteca();


$ubic =$locations -> editLocation($_GET['id_libro']);

include_once '../../views/headView.php';
include_once '../../views/editLocationView.php';
include_once '../../views/footerView.php';
?>