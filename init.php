
<?php
    $mail = $_POST["mail"];
    $password1 = $_POST["contraseña"];
    $servername = "127.0.0.1";
    $database = "Pagina_web";
    $username = "root";
    $password = "";

    $conexion = mysqli_connect($servername, $username, $password, $database);

    
    if (!$conexion) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
    else{
        $query = "select contraseña from usuario where mail = '$mail';"; 
        $resultado=mysqli_query($conexion, $query);
        $fila = mysqli_fetch_assoc($resultado);
        if ($password1 == $fila['contraseña']) {
        
            header("location: http://localhost/paginawe/Paginaweb/index1.php");
        }else {
            echo "<p style='color:red;'>algo nda mal. Inténtalo de nuevo.</p>";
        }

    }
    
    
    mysqli_close($conexion);
?>
