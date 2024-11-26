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
                <h2>Tienda</h2>
                <ul id="lista-ayuda">
                    <a class="li-sheiju" href="http://localhost/lista.php"> <li>productos</li> </a> 
                    <a class="li-sheiju" href="http://localhost/index1.php"> <li>inicio</li> </a>
                    <a class="li-sheiju" href="http://localhost/carrito.php"> <li>carrito</li> </a>
                    <a class="li-sheiju" href="http://localhost/form_sesion.php"> <li>Log-in</li> </a>
                </ul>
            </div>
            <div class="ayuda">
                <h2>Acerca de nosotros</h2>
                <ul id="lista-acerca">
                    <div id="conte-coct">
                        <li class="li-sheiju">Contactanos</li>

                    </div>
                    <li class="li-sheiju">nuestra historia</li>
                </ul>
            </div>
            <div class="ayuda">
                <h2>Seguinos</h2>
                <div id="on-image">
                    <a href="https://www.instagram.com/santiortizzz_/"><img class="foto-suger" src="imagenes/twitter.png" alt="ig"></a>
                    <a href="https://www.instagram.com/santiortizzz_/"><img class="foto-suger" src="imagenes/ig.png" alt="twitter"></a>
                </div>
            </div>
        
        </div>
        <div id="line-down">
            <div id="only-for">
                <p>Copyright © Instituto Politécnico Modelo</p>
            </div>
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