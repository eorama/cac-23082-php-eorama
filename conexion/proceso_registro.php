<?php
session_start();
include 'db.php';

$conexion = new Conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['clave'];

    // Verificar si el correo ya está registrado en la base de datos
    $query = "SELECT * FROM usuarios WHERE correo = :correo";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // El correo ya está registrado, redireccionar al formulario de registro con mensaje de error
        header("Location: ../register.php?error=1");
        exit();
    }

    // Encriptar la contraseña antes de guardarla en la base de datos
    $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar el nuevo usuario en la base de datos
    $query = "INSERT INTO usuarios (nombre, apellido, correo, clave) VALUES (:nombre, :apellido, :correo, :clave)";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':clave', $hashedPassword);

    if ($stmt->execute()) {
        // Registro exitoso, redireccionar al formulario de login
        header("Location: ../login.php?success=1");
        exit();
    } else {
        // Error en el registro, redireccionar al formulario de registro con mensaje de error
        header("Location: ../register.php?error=2");
        exit();
    }
}