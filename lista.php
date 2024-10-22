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
            <a href="http://localhost/producto.php"><button>Productos</button></a>
        </li>
        <li>
            Contacto
        </li>
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
        <form method="GET" action="http://localhost/producto.php">
            <div id="filtros">
                <h2>FILTROS</h2><br>
                <h3 class="textofiltros">DEPORTE</h3>
                <div class="filtrinios">
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
                </div>    
                <h3 class="textofiltros">COLOR</h3>   
                <div class="filtrinios">
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
                </div>    
                <h3 class="textofiltros">MARCA</h3>   
                <div class="filtrinios">
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
                </div>    
                <h3 class="textofiltros">GENERO</h3>   
                <div class="filtrinios">
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
            </div>
        </form>
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