<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles1.css">
    <link rel="stylesheet" href="fonts.css">
    <script src="https://kit.fontawesome.com/63b835f25a.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatibttfle" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deporweb.desd.com.ar</title>
</head>
<body>
    <header><!--header gris con una sombra-->
        <div id="parte_de_arriba">
            
            <div id="polito">
                <img src="/imagenes/logodefinitivoOMG.png" alt="logotipo" width="100px" height="100px">
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
        <li>
            <a href="http://localhost/index1.php"><button>Inicio</button></a>
        </li>
        <li>
            <a href="http://localhost/lista.php"><button>Productos</button></a>
        </li>
        <li>
            Contacto
        </li>
    </ul>
</div>

            <div id="carritoyusuario">
                <a href="http://localhost/carrito.php"><button id="carrito"><img src="/imagenes/cart-alt-regular-240.png" alt="carrito"></button></a>
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
    <!--trabajar en la parde del header alinearlo
    mejorar la distribuciòn y las fuentes que son una garcha-->
    <main>
        <div id="pagina">
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
                        
                    </div>

                    <!-- Botón para aplicar los filtros -->
                    <button type="submit" id="btn-aplicar-filtros">Aplicar Filtros</button>
                </div>
            </form>
            <div id="carruseles">    
                <div class="carousel">
                    <div id="partecentraleizquierda">    
                        <div id="descuento">
                            <h2>¡DESCUENTOS ESPECIALES!</h2>
                        </div> 
                        <div class="carousel-inner">
                        <!-- Agrupamos los productos en un solo item del carrusel -->
                        <div class="carousel-item">
                        <?php
            $servername = "127.0.0.1";
            $database = "Pagina_web";
            $username = "alumno";
            $password = "alumnoipm";//se cambia el username entre notebook de san y compu del el cole
            $conexion = mysqli_connect($servername, $username, $password, $database);
            if (!$conexion) {
                die("Conexion fallida: " . mysqli_connect_error());
            }
            else{
                $query = "select *, ID_producto, monto_des, precio-(precio*monto_des)/100 as precio_nuevo from productos join ofertas on productos.id_descuento=ofertas.id_descuento;";
                $resultados=mysqli_query($conexion, $query);
            }?>
            <?php
            $contador=1;
            while($fila=mysqli_fetch_assoc($resultados)){
                if($contador%5==0){
                    ?></div><div class="carousel-item"><?php
                }
                ?>
                <div class="productos">
    <article class="producto_data">
        <a href="http://localhost/producto.php?id=<?php echo $fila['ID_producto']; ?>">
            <img class="producto_imagen" src="<?php echo $fila['imagen']; ?>" alt="Pelota de futbol Nike">
            <h3 class="producto_nombre"><?php echo $fila['descripcion']; ?></h3><!--$row['ID_producto'] donde se poneeee -->
            <div class="pr">
                <?php if ($fila['monto_des'] != null) { ?>
                    <span class="producto_nuevo_precio">$<?php echo $fila['precio']; ?></span>
                    <span class="nuevo_precio">$<?php echo (int) $fila['precio_nuevo']; ?></span>
                <?php } else { ?>
                    <span class="producto_precio">$<?php echo $fila['precio']; ?></span>
                <?php } ?>
            </div>
        </a>
    </article>
</div>

        <?php  $contador++;  }
        ?> </div>
                        </div>
                        <!-- Añadir más grupos de productos según sea necesario -->
                    </div>
                    <button class="carousel-controlprev" onclick="prevSlide()">&#10094;</button>
                    <button class="carousel-controlnext" onclick="nextSlide()">&#10095;</button>
                </div>
                <!-- bestsellers -->
                <div class="carousel">
                    <div id="partecentraleizquierda">    
                        <div id="mas-vendidos">
                            <h2>¡MÁS VENDIDOS!</h2>
                        </div> 
                        <div class="carousel-inner">
                            <div class="carousel-item">
                                <?php
                                $servername = "127.0.0.1";
                                $database = "Pagina_web";
                                $username = "alumno";
                                $password = "alumnoipm";
                                $conexion = mysqli_connect($servername, $username, $password, $database);
                                if (!$conexion) {
                                    die("Conexion fallida: " . mysqli_connect_error());
                                }
                                else{
                                    $query = "SELECT p.*,monto_des,precio-(precio*monto_des)/100 as precio_nuevo,COUNT(c.ID_producto_producto) AS total_compras
                                    FROM productos p
                                    JOIN compra c ON p.ID_producto = c.ID_producto_producto
                                    left join ofertas o on p.id_descuento = o.id_descuento
                                    GROUP BY p.ID_producto
                                    ORDER BY total_compras DESC
                                    LIMIT 15;"; 
                                    $resultados = mysqli_query($conexion, $query);
                                }
                                $contador = 1;
                                while($fila = mysqli_fetch_assoc($resultados)){
                                    if($contador % 5 == 0){
                                        ?></div><div class="carousel-item"><?php
                                    }
                                    ?>
                                    <div class="productos">
                                        <article class="producto_data">
                                            <a href="producto.php?id=<?php echo $fila['ID_producto']; ?>">
                                            <img class="producto_imagen" src="<?php echo $fila["imagen"]?>" alt="<?php echo $fila["descripcion"]?>">
                                            <h3 class="producto_nombre"><?php echo $fila["descripcion"]?></h3>
                                            <div class="pr">
                <?php if ($fila['monto_des'] != null) { ?>
                    <span class="producto_nuevo_precio">$<?php echo $fila['precio']; ?></span>
                    <span class="nuevo_precio">$<?php echo (int) $fila['precio_nuevo']; ?></span>
                <?php } else { ?>
                    <span class="producto_precio">$<?php echo $fila['precio']; ?></span>
                <?php } ?>
            </div>
                                            </a>
                                        </article>
                                    </div>
                                <?php
                                    $contador++;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-controlprev" onclick="prevSlideBestsellers()">&#10094;</button>
                    <button class="carousel-controlnext" onclick="nextSlideBestsellers()">&#10095;</button>
                </div>
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
    let currentIndex = 0;
    let currentIndexBestsellers = 0;
    const itemsToShow = 1;

    function showSlide(index, carouselClass) {
        const slides = document.querySelectorAll(`${carouselClass} .carousel-item`);
        if (index >= slides.length) {
            index = 0;
        } else if (index < 0) {
            index = slides.length - 1;
        }
        const newTransform = `translateX(-${index * 100}%)`;
        document.querySelector(`${carouselClass} .carousel-inner`).style.transform = newTransform;
        return index;
    }

    function nextSlide() {
        currentIndex = showSlide(currentIndex + itemsToShow, '.carousel:not(.bestsellers-carousel)');
    }

    function prevSlide() {
        currentIndex = showSlide(currentIndex - itemsToShow, '.carousel:not(.bestsellers-carousel)');
    }

    function nextSlideBestsellers() {
        currentIndexBestsellers = showSlide(currentIndexBestsellers + itemsToShow, '.bestsellers-carousel');
    }

    function prevSlideBestsellers() {
        currentIndexBestsellers = showSlide(currentIndexBestsellers - itemsToShow, '.bestsellers-carousel');
    }
    </script>
</body>
</html>
    