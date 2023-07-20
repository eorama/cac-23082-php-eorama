<?php
require_once '../conexion/db.php';

// Crear una instancia de la clase de conexión
$conexion = new Conexion();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_proyecto = $_GET['id'];

    // Realizar una consulta a la base de datos para obtener los datos del proyecto específico
    $query = "SELECT * FROM proyectos WHERE id = :id";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id', $id_proyecto);
    $stmt->execute();

    $proyecto = $stmt->fetch();

    // Verificar si se encontró el proyecto
    if (!$proyecto) {
        // Redireccionar a una página de error o mostrar un mensaje indicando que el proyecto no existe
        echo "El proyecto no existe";
        exit();
    }

    // Realizar una consulta a la base de datos para obtener las tecnologías del proyecto
    $query_tecnologias = "SELECT nombre FROM tecnologias WHERE proyecto_id = :id";
    $stmt_tecnologias = $conexion->prepare($query_tecnologias);
    $stmt_tecnologias->bindParam(':id', $id_proyecto);
    $stmt_tecnologias->execute();

    // Obtener todas las tecnologías como un array asociativo
    $tecnologias = $stmt_tecnologias->fetchAll(PDO::FETCH_COLUMN);
} else {
    // Redireccionar a una página de error o mostrar un mensaje indicando que no se proporcionó un ID válido
    echo "ID de proyecto no válido";
    exit();
}
?>
<?php include '../includes/header-pages.php'; ?>

    <!-- Mostrar la información del proyecto -->
    <div id="proyecto">
        <div class="container">
                <div class="proyectos-single">
                    <div class="proyecto-col-1">
                        <h1><?php echo $proyecto['titulo']; ?></h1>
                        <p>Descripción: <?php echo $proyecto['descripcion']; ?></p>
                        <p>Fecha del Proyecto: <?php echo $proyecto['fecha']; ?></p>
                        <p>Nombre del Cliente: <?php echo $proyecto['cliente']; ?></p>
                        <!-- Mostrar las tecnologías utilizadas en el proyecto -->
                        <h2 class="test23">Tecnologías utilizadas:</h2>
                        <?php
                        // Realizar una consulta a la base de datos para obtener las tecnologías del proyecto
                        $query_tecnologias = "SELECT nombre FROM tecnologias WHERE proyecto_id = :id";
                        $stmt_tecnologias = $conexion->prepare($query_tecnologias);
                        $stmt_tecnologias->bindParam(':id', $id_proyecto);
                        $stmt_tecnologias->execute();
                        // Obtener todas las tecnologías como un array asociativo
                        $tecnologias = $stmt_tecnologias->fetchAll(PDO::FETCH_COLUMN);
                        // Mostrar las tecnologías
                        foreach ($tecnologias as $tecnologia) {
                            echo '<p class="tech-bl">' . $tecnologia . '</p>';
                        }
                        ?>
                    </div>
                    <div class="proyecto-col-2">
                        <img src=".<?php echo $proyecto['imagen']; ?>" alt="">
                    </div>
                </div>
        </div>
    </div>
    <div class="volver">
        <a href="./portafolio.php" class="btn">Volver al Portafolio</a>
    </div>

<?php include '../includes/footer.php'; ?>
