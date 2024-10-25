<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];

    // Verificar si el carrito está en la sesión
    if (!isset($_SESSION['cart'])) {
        echo json_encode(['success' => false, 'message' => 'El carrito está vacío.']);
        exit;
    }

    // Buscar el producto por ID y eliminarlo
    foreach ($_SESSION['cart'] as $key => $producto) {
        if ($producto['id'] == $id) {
            unset($_SESSION['cart'][$key]);
            echo json_encode(['success' => true, 'message' => 'Producto eliminado.']);
            exit;
        }
    }

    // Si el producto no se encontró
    echo json_encode(['success' => false, 'message' => 'Producto no encontrado.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Método de solicitud no válido.']);
}
?>
