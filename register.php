<?php
include './conexion/sessions.php';
include './conexion/db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://kit.fontawesome.com/23ab549407.js" crossorigin="anonymous"></script>
    <script src="./js/app.js"></script>
    <link rel="icon" type="image/x-icon" href="./assets/images/favicon.ico">
    <title>Registro</title>
</head>
<body>
    
    <div class="container-register">
        <div class="wrapper">
            <form action="./conexion/proceso_registro.php" method="POST">
                <h1>Registro de Usuario</h1>
                <div class="input-box">
                    <input type="text" id="nombre" placeholder="Nombre" name="nombre" required>
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-box">
                    <input type="text" id="apellido" placeholder="Apellido" name="apellido" required>
                    <i class="fa-regular fa-user"></i>
                </div>
                <div class="input-box">
                    <input type="email" id="correo" placeholder="Correo Electrónico" name="correo" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" id="clave" placeholder="Contraseña" name="clave" required>
                    <i class="fa-solid fa-lock"></i>
                </div>
                <button type="submit">Registrarse</button>
                <div class="register-link">
                    <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a></p>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>
