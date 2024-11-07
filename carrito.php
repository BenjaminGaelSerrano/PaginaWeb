<?php
session_start(); // Inicia la sesión al principio del archivo
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylescarrito.css">
    <link rel="stylesheet" href="fonts.css">
    <script src="https://kit.fontawesome.com/63b835f25a.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
</head>
<body>
    <header>
        <div id="parte_de_arriba">
            <div id="polito">
                <img src="/imagenes/logodefinitivoOMG.png" alt="logotipo" width="100px" height="100px">
                <div id="buscar">
                    <div id="barritadecereal">
                        <input type="text" placeholder="Buscar...">
                        <button id="lupita">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div id="cositas_arriba">
                <ul id="cositas_arribita">
                    <li><a href="http://localhost/index1.php"><button>Inicio</button></a></li>
                    <li><a href="http://localhost/lista.php"><button>Productos</button></a></li>
                    <li><button>Contacto</button></li>
                </ul>
            </div>
            <div id="carritoyusuario">
                <button id="carrito"><img src="/imagenes/cart-alt-regular-240.png" alt="carrito"></button>
                <div id="persona">
                    <img src="/imagenes/avatar.png" alt="persona">
                    <ul class="desplegable">
                        <li><a href="form_sesion.html">Iniciar Sesion</a></li>
                        <li><a href="form.html">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div id="pagina">
            <h2>Tu Carrito de Compras</h2>
            <div id="carrito-contenido">
                <?php
                $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

                if (empty($cart)) {
                    echo "<p>Tu carrito está vacío.</p>";
                } else {
                    $total = 0;
                    foreach ($cart as $item) {
                        $total += $item['precio_nuevo'] * $item['cantidad'];
                        ?>
                        <div class="producto">
                            <img src="<?php echo htmlspecialchars($item['imagen']); ?>" alt="<?php echo htmlspecialchars($item['descripcion']); ?>">
                            <h3><?php echo htmlspecialchars($item['descripcion']); ?></h3>
                            <p>Precio: $<?php echo htmlspecialchars($item['precio_nuevo']); ?></p>
                            <input type="number" value="<?php echo htmlspecialchars($item['cantidad']); ?>" min="1" onchange="updateQuantity(<?php echo htmlspecialchars($item['id']); ?>, this.value)">
                            <button onclick="removeItem(<?php echo htmlspecialchars($item['id']); ?>)">Eliminar</button>
                        </div>
                        <?php
                    }
                    ?>
                    <h3>Total: $<?php echo htmlspecialchars($total); ?></h3>
                    <button onclick="checkout()">Proceder al Pago</button>
                    <?php
                }
                ?>
            </div>
        </div>
    </main>

    <footer>
        <div id="futigod">
            <div class="ayuda">
                <h2>Ayuda</h2>
                <ul id="lista-ayuda">
                    <li>carlos</li>
                    <li>te felicito</li>
                    <li>miguel merentiel</li>
                    <li>gabibol</li>
                </ul>
            </div>
            <div class="ayuda">
                <h2>Acerca de nosotros</h2>
                <ul id="lista-acerca">
                    <div id="conte-coct">
                        <li id="mov-kolu">Contactanos</li>
                        
                    </div>
                    <li>nuestra historia</li>
                </ul>
            </div>
            <div class="ayuda">
                <h2>Seguinos</h2>
                <a href="https://www.instagram.com/santiortizzz_/"><img class="foto-suger" src="/PaginaWeb/imagenes/ig.png" alt="ig"></a>
                <a href="https://www.instagram.com/santiortizzz_/"><img class="foto-suger" src="/PaginaWeb/imagenes/twitter.png" alt="twitter"></a>
            </div>
            <div class="ayuda">
                <h2>Políticas y privacidad</h2>
                <ul id="lista-acerca"></ul>
            </div>
        </div>
        <div id="line-down">
            
            <p>Copyright © Instituto Politécnico Modelo</p>
            
        </div>
    </footer>

    <script>
        function updateQuantity(id, quantity) {
    fetch('update_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: id, quantity: quantity })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Actualiza el carrito según la respuesta
            location.reload(); // Recarga la página para mostrar los cambios
        } else {
            alert(data.message); // Muestra el mensaje de error
        }
    })
    .catch(error => {
        alert('Error: ' + error.message); // Manejo de errores
    });
}


        function removeItem(id) {
            fetch('remove_item.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id })
            })
            .then(response => response.json())
            .then(data => {
                // Actualiza el carrito según la respuesta
                location.reload();
            });
        }

        function checkout() {
            window.location.href = 'checkout.php'; // Redirige a la página de pago
        }
    </script>
</body>
</html>