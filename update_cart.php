<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    $quantity = $data['quantity'];

    // Verificar si el carrito está en la sesión
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Buscar el producto por ID
    foreach ($_SESSION['cart'] as $key => $producto) {
        if ($producto['id'] == $id) {
            if ($quantity <= 0) {
                // Si la cantidad es cero o menor, eliminar el producto
                unset($_SESSION['cart'][$key]);
                echo json_encode(['success' => true, 'message' => 'Producto eliminado del carrito.']);
            } else {
                // Actualizar la cantidad del producto
                $_SESSION['cart'][$key]['cantidad'] = $quantity;
                echo json_encode(['success' => true, 'message' => 'Cantidad actualizada.']);
            }
            exit; // Salir después de procesar
        }
    }

    // Si el producto no se encontró
    echo json_encode(['success' => false, 'message' => 'Producto no encontrado.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Método de solicitud no válido.']);
}
?>
