<?php
require_once './conexion/db.php';
// Crear una instancia de la clase de conexión
$conexion = new Conexion();

// Aquí puedes utilizar la conexión y realizar consultas a la base de datos
// Por ejemplo:
$resultado = $conexion->consultar("SELECT * FROM Usuarios");

// Ahora $resultado contiene los datos de la tabla Usuarios y puedes usarlos en tu página
?>
<?php
// Obtener los datos de los tres proyectos más recientes desde la base de datos
$sql = "SELECT id, Titulo, Descripcion, Imagen FROM Proyectos ORDER BY id DESC LIMIT 3";
$proyectos = $conexion->consultar($sql);
?>
<?php include './includes/header.php'; ?>

    <div id="heading">
        <div class="container">
        <div class="heading-texto">
                <p>Diseñador UI/UX</p>
                <h1>Hola, soy <span>Eliézer</span> Orama<br>desde Argentina</h1>
            </div>
        </div>
    </div>
    <!-- Acerca de -->
    <div id="acerca">
        <div class="container">
            <div class="row">
                <div class="sobre-mi-col-1">
                    <img src="./assets/images/user.png" alt="Sobre Mi">
                </div>
                <div class="sobre-mi-col-2">
                    <h2 class="subtitulo">Sobre Mi</h2>
                    <p class="descripcion">Desarrollador web con experiencia en WordPress, diseño gráfico, PHP y JavaScript.
                    </p>
                    <p class="descripcion">¡Hola! Soy Eliezer, un desarrollador web experimentado con más de ocho años de experiencia profesional. 
                        Tengo una gran pasión por crear sitios web impresionantes y hacer realidad las visiones digitales. 
                        Con una comprensión profunda de Html/Css, WordPress, diseño gráfico, PHP y JavaScript, he desarrollado una 
                        amplia gama de proyectos exitosos que han ayudado a las empresas a establecer su presencia en línea de 
                        manera efectiva.
                    </p>
                    <p class="descripcion">
                    Mi viaje como desarrollador web comenzó con una profunda curiosidad por todo lo digital. 
                    A lo largo de los años, perfeccioné mis habilidades y obtuve una comprensión integral del 
                    panorama de desarrollo web en constante evolución. A lo largo de mi carrera, he tenido el 
                    placer de trabajar en varios proyectos, desde sitios web de pequeña escala hasta soluciones 
                    empresariales a gran escala.
                    </p>
                    <div class="tabs-titulos">
                        <p class="tab-links link-activo" onclick="opentab('habilidades')">Habilidades</p>
                        <p class="tab-links" onclick="opentab('experiencia')">Experiencia</p>
                        <p class="tab-links" onclick="opentab('educacion')">Educación</p>
                    </div>
                    <div class="tab-contenido tab-activo" id="habilidades">
                        <ul>
                            <li><span>UI/UX</span><br>Diseño de interfases Web/Apps</li>
                            <li><span>Desarrollo Web</span><br>Diseño y Desarrollo Web Responsivo</li>
                            <li><span>Desarrollo de Apps</span><br>Desarrollo de Apps Android/iOs</li>
                        </ul>
                    </div>
                    <div class="tab-contenido" id="experiencia">
                        <ul>
                            <li><span>2020 - Actual</span><br>Gerente de Agencia en Panoramas Digital Marketing</li>
                            <li><span>2019 - 2019</span><br>Gerente de Producto en Swabu</li>
                            <li><span>2017 - 2019</span><br>Freelancer</li>
                            <li><span>2016 - 2017</span><br>Diseñador Web en La Cacatúa Servicios Digitales</li>
                        </ul>
                    </div>
                    <div class="tab-contenido" id="educacion">
                        <ul>
                            <li><span>2023</span><br>Curso Codo a Codo</li>
                            <li><span>2020</span><br>Bootcamp Desarrollo UI/UX</li>
                            <li><span>2013</span><br>Tecnicatura de Sistemas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Servicios -->
    <div id="servicios">
        <div class="container">
            <h2 class="subtitulo">Mis Servicios</h2>
            <div class="lista-servicios">
                <div>
                    <i class="fa-solid fa-code"></i>
                    <h3 class="titulo-h3">Diseño Web</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Modi quia rerum beatae deleniti dolor inventore tempora
                        doloremque provident incidunt porro explicabo at culpa
                        quis quisquam error, quibusdam magnam quasi ex.</p>
                        <a href="#">Conocer más</a>
                </div>
                <div>
                    <i class="fa-solid fa-crop-simple"></i>
                    <h3 class="titulo-h3">Diseño UI/UX</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Modi quia rerum beatae deleniti dolor inventore tempora
                        doloremque provident incidunt porro explicabo at culpa
                        quis quisquam error, quibusdam magnam quasi ex.</p>
                        <a href="#">Conocer más</a>
                </div>
                <div>
                    <i class="fa-solid fa-mobile-button"></i>
                    <h3 class="titulo-h3">Desarrollo Apps</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Modi quia rerum beatae deleniti dolor inventore tempora
                        doloremque provident incidunt porro explicabo at culpa
                        quis quisquam error, quibusdam magnam quasi ex.</p>
                        <a href="#">Conocer más</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Portafolio -->
    <div id="portafolio">
        <div class="container">
            <h2 class="subtitulo">Mis Trabajos</h2>
            <div class="lista-trabajos">
                <?php
                    foreach ($proyectos as $proyecto) {
                        echo '<div class="trabajos">';
                        echo '<img src="' . $proyecto['Imagen'] . '" alt="">';
                        echo '<div class="capa">';
                        echo '<h3>' . $proyecto['Titulo'] . '</h3>';
                        echo '<p>' . $proyecto['Descripcion'] . '</p>';
                        echo '<a href="./paginas/single.php?id=' . $proyecto['id'] . '"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>';
                        echo '</div>';
                        echo '</div>';
                    }
                ?>
            </div>
            <a href="./paginas/portafolio.php" class="btn">Ver más</a>
        </div>
    </div>
    <!-- Contacto -->
    <div id="contacto">
        <div class="container">
            <div class="row">
                <div class="contacto-izq">
                    <h2 class="subtitulo">Contactame</h2>
                    <p><i class="fa-solid fa-paper-plane"></i> contacto@eliezerorama.com</p>
                    <p><i class="fa-solid fa-phone"></i> +54 9 11 1234 5678</p>
                    <div class="iconos-sociales">
                        <a href="https://facebook.com/eorama"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://Instagram.com/eorama"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://Github.com/eorama"><i class="fa-brands fa-github"></i></a>
                        <a href="https://Linkedin.com/eorama"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="login.php"><i class="fa-regular fa-user"></i></a>
                        
                    </div>
                    <a href="assets/documents/my-cv.pdf" download class="btn btn2">Descargar CV</a>
                </div>
                <div class="contacto-der">
                    <form action="">
                        <input type="text" name="nombre" placeholder="Tu Nombre" required>
                        <input type="email" name="email" id="" placeholder="Tu Correo Electronico" required>
                        <textarea name="mensaje" id="" cols="30" rows="6" placeholder="Tu Mensaje"></textarea>
                        <button type="submit" class="btn btn2">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include './includes/footer.php'; ?>