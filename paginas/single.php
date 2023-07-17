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
    $query_tecnologias = "SELECT Nombre_de_Tecnologia FROM tecnologias WHERE proyecto_id = :id";
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
    <div>
        <h1><?php echo $proyecto['Titulo']; ?></h1>
        <img src=".<?php echo $proyecto['Imagen']; ?>" alt="">
        <p>Descripción: <?php echo $proyecto['Descripcion']; ?></p>
        <p>Fecha del Proyecto: <?php echo $proyecto['Fecha_del_Proyecto']; ?></p>
        <p>Nombre del Cliente: <?php echo $proyecto['Nombre_del_Cliente']; ?></p>

        <!-- Mostrar las tecnologías utilizadas en el proyecto -->
        <h2>Tecnologías utilizadas:</h2>
        <?php
        // Realizar una consulta a la base de datos para obtener las tecnologías del proyecto
        $query_tecnologias = "SELECT Nombre_de_Tecnologia FROM tecnologias WHERE proyecto_id = :id";
        $stmt_tecnologias = $conexion->prepare($query_tecnologias);
        $stmt_tecnologias->bindParam(':id', $id_proyecto);
        $stmt_tecnologias->execute();

        // Obtener todas las tecnologías como un array asociativo
        $tecnologias = $stmt_tecnologias->fetchAll(PDO::FETCH_COLUMN);

        // Mostrar las tecnologías
        foreach ($tecnologias as $tecnologia) {
            echo '<p>' . $tecnologia . '</p>';
        }
        ?>
    </div>
    <div class="volver">
        <a href="./portafolio.php" class="btn">Volver al Portafolio</a>
    </div>

<?php include '../includes/footer.php'; ?>
