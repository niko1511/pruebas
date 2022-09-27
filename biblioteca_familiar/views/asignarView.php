<?php
echo '<form action="../controllers/asignarLibroController.php" method="post">';
echo '<label >Ubicación actual</label>';
echo '<select name="select_location" >';
//if(){}
echo '<option value="' . $locations['id'] . '" selectd>' . $locations['cordenadas'] . '</option>';
echo '</select>';
echo '<label >Asignar libro al usuario</label>';
echo '<select name="select_user" >';
echo'<option value="0">Biblioteca</option>';
foreach($biblioteca->usuarios as $users)
echo '<option value="' . $users['id'] . '">' . $users['nombre'] . $users['id'] . $users['id_libro'] .   '</option>';
echo '</select>';
echo '<input type="submit" value="Actualizar">';
echo '</form>';
