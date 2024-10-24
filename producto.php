<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles_producto.css">
    <link rel="stylesheet" href="/PaginaWeb/fonts.css">
    <script src="https://kit.fontawesome.com/63b835f25a.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hoytengoganasdeverte</title>
</head>
<body>
    <header>
        <div id="parte_de_arriba">
            <div id="polito">
                <img src="/PaginaWeb/imagenes/logodefinitivoOMG.png" alt="logotipo" width="100px" height="100px">
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
                    <li><a class="unline-cla" href="http://localhost/index1.php">Inicio</a></li>
                    <li>Productos</li>
                    <li>Contacto</li>
                </ul>
            </div>
            <div id="carritoyusuario">
                <button id="carrito"><img src="/PaginaWeb/imagenes/cart-alt-regular-240.png" alt="carrito"></button>
                <div id="persona">
                    <img src="/PaginaWeb/imagenes/avatar.png" alt="persona">
                    <ul class="desplegable">
                        <li><a href="form_sesion.html">Iniciar Sesion</a></li>
                        <li><a href="form.html">Registrarse</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div id="conte-pay">
            <div id="col-fot">
            <?php
            $servername = "127.0.0.1";
            $database = "Pagina_web";
            $username = "alumno";
            $password = "alumnoipm";
            $conexion = mysqli_connect($servername, $username, $password, $database);
            if (!$conexion) {
                die("Conexión fallida: " . mysqli_connect_error());
            }
            
            // Obtener el ID del producto de la URL
            $id_producto = isset($_GET['id']) ? (int)$_GET['id'] : 0;

            // Consulta SQL para obtener los detalles del producto
            $query = "SELECT * FROM productos WHERE ID_producto = $id_producto";
            $resultados = mysqli_query($conexion, $query);

            // Verificar si se obtuvo el producto
            if (mysqli_num_rows($resultados) > 0) {
                $producto = mysqli_fetch_assoc($resultados);
            } else {
                echo "<p>Producto no encontrado.</p>";
                exit;
            }
            ?>
                <div class="thumbnail-container">
                    <img src="/PaginaWeb/imagenes/<?php echo $producto['min1']; ?>" alt="Miniatura" class="thumbnail">
                    <img src="/PaginaWeb/imagenes/<?php echo $producto['min2']; ?>" alt="Miniatura" class="thumbnail">
                    <img src="/PaginaWeb/imagenes/<?php echo $producto['min3']; ?>" alt="Miniatura" class="thumbnail">
                    <img src="/PaginaWeb/imagenes/<?php echo $producto['min4']; ?>" alt="Miniatura" class="thumbnail">                
                </div>
            </div>
            <div id="f-princi">
                <img src="/PaginaWeb/imagenes/<?php echo $producto['imagen']; ?>" alt="Imagen principal del producto" id="main-image">
            </div>
            <div id="product-details">
                <h1><?php echo $producto['descripcion']; ?></h1>
                <p class="price">$<?php echo $producto['precio']; ?></p>
                <p class="description"><?php echo $producto['marca']; ?></p>
                <div class="product-options">
                    <label for="size">Talla:</label>
                    <select id="size">
                        <option>S</option>
                        <option>M</option>
                        <option>L</option>
                        <option>XL</option>
                    </select>
                </div>
                <button class="add-to-cart" data-id="<?php echo $producto['ID_producto']; ?>">Añadir al Carrito</button>

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
                        <ul class="desplega-lis">
                            <li>+54 9 11 2738 7367</li>
                        </ul>
                    </div>
                    <li>nuestra historia</li>
                </ul>
            </div>
            <div class="ayuda">
                <h2>Seguinos</h2>
                <a href=""><img class="foto-suger" src="/PaginaWeb/imagenes/md_5b321ca3631b8-removebg-preview.png" alt="ig"></a>
                <a href="https://www.instagram.com/santiortizzz_/"><img class="foto-suger" src="/PaginaWeb/imagenes/twitter-logo-1.png" alt="twitter"></a>
            </div>
            <div class="ayuda">
                <h2>Políticas y privacidad</h2>
                <ul id="lista-acerca"></ul>
            </div>
        </div>
        <div id="line-down">
            <div id="only-for">
                <p>Copyright © Instituto Politécnico Modelo</p>
            </div>
        </div>
    </footer>
    <script src="produc.js"></script>
</body>
</html>
