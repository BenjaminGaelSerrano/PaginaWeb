<!DOCTYPE html>
<html lang="en">
    <!--control alt z para ir a live server-->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles_producto.css">
    <link rel="stylesheet" href="/PaginaWeb/fonts.css">
    <script src="https://kit.fontawesome.com/63b835f25a.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatibttfle" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hoytengoganasdeverte</title>
</head>
<body>
    <header><!--eh ato q onda -->
        <div id="parte_de_arriba">

            <div id="polito">
                <img src="/PaginaWeb/imagenes/logodefinitivoOMG.png" alt="logotipo" width="100px" height="100px">
                <div id="buscar">
                    <div id="barritadecereal">
                        <input type="text" placeholder="Buscar...">
                        <button id="lupita">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>
            </div>
            <div id="cositas_arriba">
                <ul id="cositas_arribita">
                    <li> <a class="unline-cla" href="http://localhost/PaginaWeb/index1.php">Inicio</a></li>
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
    <main>
        <div id="conte-pay">
            <div id="col-fot">
            <?php
            // Obtener el ID del producto desde la URL
            if (isset($_GET['id'])) {
                $id_producto = $_GET['id'];

                // Conectar a la base de datos
                $servername = "127.0.0.1";
                $username = "alumno";
                $password = "alumnoipm";
                $database = "Pagina_web";
                $conexion = mysqli_connect($servername, $username, $password, $database);

                if (!$conexion) {
                    die("Conexión fallida: " . mysqli_connect_error());
                }

                // Consultar los detalles del producto desde la base de datos usando el ID
                $query = "SELECT * FROM productos WHERE ID_producto = $id_producto";
                $resultados = mysqli_query($conexion, $query);

                if (mysqli_num_rows($resultados) > 0) {
                    // Obtener los datos del producto
                    $producto = mysqli_fetch_assoc($resultados);
                    ?>
                    <div class="thumbnail-container">
                        <img src="<?php echo $producto['imagen']; ?>" alt="Imagen del producto" class="thumbnail">
                        <!-- Puedes agregar más miniaturas aquí si las tienes en la base de datos -->
                    </div>

                    <div id="f-princi">
                        <img src="<?php echo $producto['imagen']; ?>" alt="Imagen principal del producto" id="main-image">
                    </div>

                    <div id="product-details">
                        <h1><?php echo $producto['marca']; ?></h1>
                        <p class="price">$<?php echo number_format($producto['precio'], 2); ?></p>
                        <p class="description"><?php echo $producto['descripcion']; ?></p>
                        <div class="product-options">
                            <label for="size">Talla:</label>
                            <select id="size">
                                <option>S</option>
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                            </select>
                        </div>
                        <button class="add-to-cart">Añadir al Carrito</button>
                    </div>
                    <?php
                } else {
                    echo "<p>Producto no encontrado.</p>";
                }

                // Cerrar conexión
                mysqli_close($conexion);
            } else {
                echo "<p>No se ha especificado un producto.</p>";
            }
            ?>
            </div>
        </div>
    </main>

    </main>      
    <footer>
        <div id="futigod">
            <div class="ayuda">
                <h2>Ayuda</h2>
                <ul id="lista-ayuda">
                    <li class="li-sheiju">carlos</li>
                    <li class="li-sheiju">te pusiste nerviosa?</li>
                    <li class="li-sheiju">cavani</li>
                    <li class="li-sheiju">gabibol</li>
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
                <div id="on-image">
                    <a href=""><img class="foto-suger" src="/PaginaWeb/imagenes/md_5b321ca3631b8-removebg-preview.png" alt="ig"></a>
                    <a href="https://www.instagram.com/santiortizzz_/"><img class="foto-suger" src="/PaginaWeb/imagenes/twitter-logo-1.png" alt="twitter"></a>
                </div>
            </div>
            <div class="ayuda">
                <h2>Politcas y privacidad</h2>
                <ul id="lista-acerca"></ul>
                    <!--si abro un li acordate de poner esta class="li-sheiju"-->
                </ul>
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
