<?php
session_start(); // Asegúrate de iniciar la sesión al principio del archivo

$mail = $_POST["mail"];
$password1 = $_POST["contraseña"];
$servername = "127.0.0.1";
$database = "Pagina_web";
$username = "alumno";
$password = "alumnoipm";

$conexion = mysqli_connect($servername, $username, $password, $database);

if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
} else {
    $query = "select contraseña from usuario where mail = '$mail';"; 
    $resultado = mysqli_query($conexion, $query);
    $fila = mysqli_fetch_assoc($resultado);

    $query2 = "select nombre_de_usuario from usuario where mail = '$mail';";
    $resultado = mysqli_query($conexion, $query2);
    $fila2 = mysqli_fetch_assoc($resultado);

    if ($password1 == $fila['contraseña']) {
        $_SESSION['nombre'] = $fila2['nombre_de_usuario'];
        header("Location: http://localhost/index1.php");
        exit(); 
    } else {
        echo "<p style='color:red;'>Algo ha ido mal. Inténtalo de nuevo.</p>";
    }
}

mysqli_close($conexion);
?>
