<?php
include_once '../../models/bibliotecaModel.php';

$leerUsuarios = new Biblioteca();
$leerUsuarios->leerUsuarios();

echo '<pre>';
//print_r($leerUsuarios->usuarios);
echo '</pre>';
include_once '../../views/headView.php';
?>
<section>
<form action="../../controllers/insertNewUser.php" method="post">
    <label >Nuevo Usuario</label><input type="text" name="new_user">
    <input type="submit" value="Agregar" name="agregar">
    <input type="submit" value="Cancelar" name="cancel">
</form>


<table>
    <tr>
        <th>Usuarios</th>
    </tr>
    <?php
      if(!empty($leerUsuarios->usuarios)){
    foreach ($leerUsuarios->usuarios as $user) {
        echo '<tr>';
        echo '<td>' . $user['nombre'] . '</td>';
        echo "<td> <a href='../../controllers/deleteUserController.php?id_libro=".$user['id'] ."'>Borrar</a></td>";
        echo "<td> <a href='../../controllers/editUserController.php?id_libro=".$user['id'] ."'>Modificar</a></td>";
        echo '</tr>';
    }
}else{
    echo 'La base de datos Usuarios se encuentra vacía';
}
    ?>


</table>
</section>
<?php 
include_once '../../views/footerView.php';
?>