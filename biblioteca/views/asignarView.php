<section>
<?php

echo '<pre>';
//print_r($biblioteca->usuarios);
//print_r($datoLibro);
//print_r($locations);
echo '</pre>';

//echo $datoLibro['status'];

echo '<form action="../controllers/asignarLibroController.php" method="post">';
echo '<h1>' . $datoLibro['nombre'] . '</h1>';
echo '<label >Ubicación actual</label>';
echo '<select name="select_location" >';

echo '<option value="' . $locations['id'] . '" selected>' . $locations['cordenadas'] . '</option>';


echo '</select>';
echo '<label >Asignar libro al usuario</label>';
echo '<select name="select_user" >';
echo '<option value="0">Biblioteca</option>';
foreach ($biblioteca->usuarios as $users){
       
if ($datoLibro['status'] == $users['id']) {
        echo '<option value="' . $users['id'] . '"selected>' . $users['nombre'] .  '</option>';
} else {
        echo '<option value="' . $users['id'] . '">' . $users['nombre'] .  '</option>';
}
}
echo '</select>';
echo '<input type="submit" value="Actualizar">';
echo '</form>';
//print_r($datoLibro);
?>
</section>
