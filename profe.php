<style type="text/css">
    table{
        border:4px black solid;
    }
tr, td{padding :5px}
</style>
<?php
    $nombre_de_usuario= $_POST["nombre_de_usuario"];
    $nombre= $_POST["nombre"];
	$apellido = $_POST["apellido"];
    $mail = $_POST["mail"];
    $telefono = $_POST["telefono"];
    $password1 = $_POST["contraseña"];
    $servername = "127.0.0.1";
    $database = "Pagina_web";
    $username = "alumno";
    $password = "alumnoipm";

    $conexion = mysqli_connect($servername, $username, $password, $database);


    if (!$conexion) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
    else{
        $query = "insert into usuario values('$nombre_de_usuario','$nombre', '$apellido','$mail','$telefono','$password1');";
        $resultado=mysqli_query($conexion, $query);
        echo "Datos que hay en la base:\n";

        $resultados = mysqli_query($conexion,"select * from usuario;");
            
        while($fila=mysqli_fetch_assoc($resultados)){ 
            ?>
                <p><?php echo $fila['nombre_de_usuario']. " " . $fila['nombre']. " " .$fila['apellido']."".$fila['mail']. " " .$fila['telefono']. " " .$fila['contraseña']?></p>
                <?php
        }
    }
    function mostrarDatosTabla($conexion){  ?>
        <table>
            <th>Nombre de usuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>mail</th>
            <th>telefono</th>
            <th>password1</th>
    <?php
        $resultados = mysqli_query($conexion,"select * from usuario;");

        while($fila=mysqli_fetch_assoc($resultados)){ 
            ?>
            <tr>
                <td> <?php echo $fila['nombre_de_usuario']?></td>
                <td> <?php echo $fila['nombre']?></td>
                <td> <?php echo $fila['apellido']?></td>
                <td> <?php echo $fila['mail']?></td>
                <td> <?php echo $fila['telefono']?></td>
                <td> <?php echo $fila['password1']?></td>
            </tr>

        <?php
        } 
        ?>
        </table>
    <?php
    }
    mysqli_close($conexion);
?>
