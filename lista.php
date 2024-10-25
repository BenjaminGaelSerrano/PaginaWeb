<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylis.css">
    <link rel="stylesheet" href="fonts.css">
    <script src="https://kit.fontawesome.com/63b835f25a.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produlis.desd.com.ar</title>
</head>
<body>
    <header>
        <div id="parte_de_arriba">
            <div id="polito">
                <img src="/imagenes/logodefinitivoOMG.png" alt="logotipo" width="100px" height="100px">
                <div id="buscar">
                    <form method="GET" action="http://localhost/lista.php" id="barritadecereal">
                        <input type="text" name="busqueda" placeholder="Buscar...">
                        <button id="lupita" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div id="cositas_arriba">
                <ul id="cositas_arribita">
                    <li><a href="http://localhost/index1.php"><button>Inicio</button></a></li>
                    <li><a href="http://localhost/lista.php"><button>Productos</button></a></li>
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
        <div id="pagina">
            <!-- Formulario con filtros -->
            <form method="GET" action="http://localhost/lista.php">
                <div id="filtros">
                    <h2>FILTROS</h2><br>
                    <!-- Filtros de deporte -->
                    <h3 class="textofiltros">DEPORTE</h3>
                    <div class="filtrinios">
                        <div>
                            <input type="checkbox" class="deporte" name="deporte[]" value="Fútbol">
                            <label for="deporte">Fútbol</label>
                        </div>
                        <div>
                            <input type="checkbox" class="deporte" name="deporte[]" value="Basquet">
                            <label for="deporte">Basquet</label>
                        </div>
                        <!-- Otros deportes... -->
                    </div>
                    <!-- Filtros de color -->
                    <h3 class="textofiltros">COLOR</h3>
                    <div class="filtrinios">
                        <div>
                            <input type="checkbox" class="color" name="color[]" value="Verde">
                            <label for="color">Verde</label>
                        </div>
                        <div>
                            <input type="checkbox" class="color" name="color[]" value="Rojo">
                            <label for="color">Rojo</label>
                        </div>
                        <!-- Otros colores... -->
                    </div>
                    <!-- Filtros de marca -->
                    <h3 class="textofiltros">MARCA</h3>
                    <div class="filtrinios">
                        <div>
                            <input type="checkbox" class="marca" name="marca[]" value="Adidas">
                            <label for="marca">Adidas</label>
                        </div>
                        <div>
                            <input type="checkbox" class="marca" name="marca[]" value="Nike">
                            <label for="marca">Nike</label>
                        </div>
                        <!-- Otras marcas... -->
                    </div>
                    <!-- Filtros de género -->
                    <h3 class="textofiltros">GÉNERO</h3>
                    <div class="filtrinios">
                        <div>
                            <input type="checkbox" class="genero" name="genero[]" value="Femenino">
                            <label for="genero">Femenino</label>
                        </div>
                        <div>
                            <input type="checkbox" class="genero" name="genero[]" value="Masculino">
                            <label for="genero">Masculino</label>
                        </div>
                        <!-- Otros géneros... -->
                    </div>
                    <!-- Botón para aplicar los filtros -->
                    <button type="submit" id="btn-aplicar-filtros">Aplicar Filtros</button>
                </div>
            </form>

            <div id="te-nervios-pint">
                <?php
                $servername = "127.0.0.1";
                $database = "Pagina_web";
                $username = "root";
                $password = ""; // Cambiar el password según tu configuración
                $conexion = mysqli_connect($servername, $username, $password, $database);

                if (!$conexion) {
                    die("Conexión fallida: " . mysqli_connect_error());
                } else {
                    $query = "SELECT productos.*, ofertas.monto_des, productos.precio - (productos.precio * ofertas.monto_des / 100) AS precio_nuevo 
                              FROM productos 
                              LEFT JOIN ofertas ON productos.id_descuento = ofertas.id_descuento";

                    // Aplicar filtros si los hay
                    $filtros = [];
                    if (!empty($_GET['deporte'])) {
                        $deportes = implode("','", $_GET['deporte']);
                        $filtros[] = "productos.deporte IN ('$deportes')";
                    }
                    if (!empty($_GET['color'])) {
                        $colores = implode("','", $_GET['color']);
                        $filtros[] = "productos.color IN ('$colores')";
                    }
                    if (!empty($_GET['marca'])) {
                        $marcas = implode("','", $_GET['marca']);
                        $filtros[] = "productos.marca IN ('$marcas')";
                    }
                    if (!empty($_GET['genero'])) {
                        $generos = implode("','", $_GET['genero']);
                        $filtros[] = "productos.genero IN ('$generos')";
                    }

                    // Filtro de búsqueda
                    if (!empty($_GET['busqueda'])) {
                        $busqueda = mysqli_real_escape_string($conexion, $_GET['busqueda']);
                        $filtros[] = "productos.descripcion LIKE '%$busqueda%'";
                    }

                    if (count($filtros) > 0) {
                        $query .= " WHERE " . implode(" AND ", $filtros);
                    }

                    $resultados = mysqli_query($conexion, $query);
                }

                // Mostrar productos
                while ($fila = mysqli_fetch_assoc($resultados)) {
                ?>
                    <div class="productos">
                        <article class="producto_data">
                            <a href="http://localhost/producto.php?id=<?php echo $fila['ID_producto']; ?>">
                                <img class="producto_imagen" src="<?php echo $fila['imagen']; ?>" alt="Imagen del producto">
                                <h3 class="producto_nombre"><?php echo $fila['descripcion']; ?></h3>
                                <div class="pr">
                                    <?php if ($fila['monto_des'] != null) { ?>
                                        <span class="nuevo_precio">$<?php echo (int) $fila['precio_nuevo']; ?></span>
                                        <span class="producto_precio"><s>$<?php echo $fila['precio']; ?></s></span>
                                    <?php } else { ?>
                                        <span class="producto_precio">$<?php echo $fila['precio']; ?></span>
                                    <?php } ?>
                                </div>
                            </a>
                        </article>
                    </div>
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
</body>
</html>