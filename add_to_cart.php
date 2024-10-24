<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $id_producto = $data['id'];
    $cantidad = 1; // Ajusta según sea necesario

    $servername = "127.0.0.1";
    $database = "Pagina_web";
    $username = "alumno";
    $password = "alumnoipm";
    $conexion = mysqli_connect($servername, $username, $password, $database);

    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM productos WHERE ID_producto = $id_producto";
    $resultado = mysqli_query($conexion, $query);
    $producto = mysqli_fetch_assoc($resultado);

    if ($producto) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Verificar si el producto ya está en el carrito
        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] === $producto['ID_producto']) {
                $item['cantidad'] += $cantidad; // Incrementar cantidad
                $found = true;
                break;
            }
        }

        if (!$found) {
            $_SESSION['cart'][] = [
                'id' => $producto['ID_producto'],
                'descripcion' => $producto['descripcion'],
                'precio_nuevo' => $producto['precio'],
                'cantidad' => $cantidad,
                'imagen' => $producto['imagen']
            ];
        }

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Producto no encontrado.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
?>
