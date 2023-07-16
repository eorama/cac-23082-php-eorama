<?php
session_start();
include 'db.php';

$conexion = new Conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['clave'];

    // Buscar al usuario en la base de datos por su correo
    $query = "SELECT * FROM usuarios WHERE correo = :correo";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();

    $usuario = $stmt->fetch();

    // Verificar si el usuario existe y la contraseña es correcta
    if ($usuario && password_verify($contrasena, $usuario['clave'])) {
        // Inicio de sesión exitoso, guardar datos en la sesión
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['apellido'] = $usuario['apellido'];
        $_SESSION['correo'] = $usuario['correo'];

        // Redireccionar al inicio o a la página deseada después del login exitoso
        header("Location: ../admin/admin.php");
        exit();
    } else {
        // Usuario o contraseña incorrectos, redireccionar al formulario de login con mensaje de error
        header("Location: ../login.php?error=1");
        exit();
    }
}