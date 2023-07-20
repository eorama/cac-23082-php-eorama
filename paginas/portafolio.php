<?php
require_once '../conexion/db.php'; // Asegúrate de incluir la conexión a la base de datos

// Crear una instancia de la clase de conexión
$conexion = new Conexion();

// Obtener todos los datos de los proyectos desde la base de datos
$sql = "SELECT id, titulo, descripcion, imagen FROM proyectos";
$proyectos = $conexion->consultar($sql);
?>
<?php
include_once '../conexion/sessions.php';
?>
<?php include '../includes/header-pages.php'; ?>

<div id="portafolio">
        <div class="container">
            <h2 class="subtitulo portfolio">Portafolio</h2>
            <div class="lista-trabajos">
                <?php
                    // Generar el HTML dinámico para mostrar todos los proyectos en la página portafolio.php
                    foreach ($proyectos as $proyecto) {
                        echo '<div class="trabajos">';
                        echo '<img src=".' . $proyecto['imagen'] . '" alt="">';
                        echo '<div class="capa">';
                        echo '<h3>' . $proyecto['titulo'] . '</h3>';
                        echo '<p>' . $proyecto['descripcion'] . '</p>';
                        echo '<a href="../paginas/single.php?id=' . $proyecto['id'] . '"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>';
                        echo '</div>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </div>



<?php include '../includes/footer.php'; ?>