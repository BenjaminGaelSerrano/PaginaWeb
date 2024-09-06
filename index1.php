<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles1.css">
    <link rel="stylesheet" href="fonts.css">
    <script src="https://kit.fontawesome.com/63b835f25a.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deporweb.desd.com.ar</title>
</head>
<body>
    <header><!--header gris con una sombra-->
        <div id="parte_de_arriba">
            
            <div id="polito">
                <img src="/imagenes/logodefinitivoOMG.png" alt="logotipo" width="100px" height="100px">
            </div>
            <div id="lema">
                <h1 id="titlepr">SI ES DEPORTIVO, ESTÁ ACÁ</h1>
            </div>
            <div id="buscar">
                <input type="text" placeholder="Buscar...">
                <button id="lupita"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <button id="carrito"><i class="fa-solid fa-cart-shopping"></i></button>
            <div><button id="login"><p id="texto">Log-In</p></button></div>

        </div>
    </header>
    <!--trabajar en la parde del header alinearlo
    mejorar la distribucion y las fuentes que son una garcha-->
    <main>
        <div id="pagina">
            <div id="filtros">
                <h2>FILTROS</h2><br>
                <h3 class="textofiltros">DEPORTE</h3>
                <div>
                    <input type="checkbox" class="deporte">
                    <label for="deporte">Fútbol</label>
                </div>
                <div>   
                    <input type="checkbox" class="deporte">
                    <label for="deporte">Basquet</label>
                </div>
                <div>   
                    <input type="checkbox" class="deporte">
                    <label for="deporte">Hockey</label>
                </div>
                <div>   
                    <input type="checkbox" class="deporte">
                    <label for="deporte">Volley</label>
                </div>
                <div>   
                    <input type="checkbox" class="deporte">
                    <label for="deporte">Golf</label>
                </div>
                <div>   
                    <input type="checkbox" class="deporte">
                    <label for="deporte">Rugby</label>
                </div>
                <h3 class="textofiltros">COLOR</h3>   
                <div>    
                    <input type="checkbox" class="color">
                    <label for="color">Verde</label>
                </div>
                <div>
                    <input type="checkbox" class="color">
                    <label for="color">Rojo</label>
                </div>
                <div>
                    <input type="checkbox" class="color">
                    <label for="color">Amarillo</label>
                </div>
                <div>
                    <input type="checkbox" class="color">
                    <label for="color">Violeta</label>
                </div>
                <div>
                    <input type="checkbox" class="color">
                    <label for="color">Naranja</label>
                </div>
                <div>
                    <input type="checkbox" class="color">
                    <label for="color"> Negro</label>
                </div>    
                <div>
                    <input type="checkbox" class="color">
                    <label for="color">Blanco</label>
                </div>
                <div>
                    <input type="checkbox" class="color">
                    <label for="color">Marron</label>
                </div>
                <h3 class="textofiltros">MARCA</h3>   
                <div>    
                    <input type="checkbox" class="marca">
                    <label for="marca">Adidas</label>
                </div>
                <div>
                    <input type="checkbox" class="marca">
                    <label for="marca">Nike</label>
                </div>
                <div>
                    <input type="checkbox" class="marca">
                    <label for="marca">Under Armour</label>
                </div>
                <div>
                    <input type="checkbox" class="marca">
                    <label for="marca">Puma</label>
                </div>
                <div>
                    <input type="checkbox" class="marca">
                    <label for="marca">Jordan</label>
                </div>
                <div>
                    <input type="checkbox" class="marca">
                    <label for="marca">Topper</label>
                </div>    
                <div>
                    <input type="checkbox" class="marca">
                    <label for="marca">New Balance</label>
                </div>
                <div>
                    <input type="checkbox" class="marca">
                    <label for="marca">Fila</label>
                </div>
                <h3 class="textofiltros">GENERO</h3>   
                <div>    
                    <input type="checkbox" class="genero">
                    <label for="genero">Femenino</label>
                </div>
                <div>
                    <input type="checkbox" class="genero">
                    <label for="genero">Masculino</label>
                </div>
                <div>
                    <input type="checkbox" class="genero">
                    <label for="genero">Ninguno</label>
                </div>
                <div>
                    <input type="checkbox" class="genero">
                    <label for="genero">niño/a</label>
                </div>
                <div>
                    <input type="checkbox" class="genero">
                    <label for="genero">bebe</label>
                </div>
                <div>
                    <input type="checkbox" class="genero">
                    <label for="genero">Unisex</label>
                </div>    
            </div>     
            <div class="carousel">
                <div class="carousel-inner">
                    <!-- Agrupamos los productos en un solo item del carrusel -->
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
            $query = "select * from productos;";
            $resultados=mysqli_query($conexion, $query);
        }?>
        
            <!-- Agrupamos los productos en un solo item del carrusel -->
        <?php
        while($fila=mysqli_fetch_assoc($resultados)){?>
            <div class="productos"><article class="producto_data"><img class="producto_imagen" src=<?php echo $fila["imagen"]?> alt="Pelota de futbol Nike"><h3 class="producto_nombre"><?php echo $fila["descripcion"]?></h3>
            <span class="producto_precio"><?php echo $fila["precio"]?></span></article></div>
    <?php    }
    ?>
                    </div>
                    <!-- Añadir más grupos de productos según sea necesario -->
                </div>
                <button class="carousel-control prev" onclick="prevSlide()">&#10094;</button>
                <button class="carousel-control next" onclick="nextSlide()">&#10095;</button>
            </div>
            
        </div>                           
    </main>
    <footer>
    </footer>
    <script>
        let currentIndex = 0;
        const itemsToShow = 1; // Cambia esto a la cantidad de items que quieras mostrar en el carrusel
        function showSlide(index) {
            const slides = document.querySelectorAll('.carousel-item');
            if (index >= slides.length) {
                currentIndex = 0;
            } else if (index < 0) {
                currentIndex = slides.length - 1;
            } else {
                currentIndex = index;
            }
            const newTransform = `translateX(-${currentIndex * 100}%)`;
            document.querySelector('.carousel-inner').style.transform = newTransform;
        }
        function nextSlide() {
            showSlide(currentIndex + itemsToShow);
        }
        function prevSlide() {
            showSlide(currentIndex - itemsToShow);
        }
        // Optional: Automatically move to the next slide every 5 seconds
        setInterval(nextSlide, 5000);
    </script>
</body>
</html>