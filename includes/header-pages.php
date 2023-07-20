<?php
include_once '../conexion/sessions.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://kit.fontawesome.com/23ab549407.js" crossorigin="anonymous"></script>
    <script src="../js/app.js"></script>
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">    
    <title>Portafolio | Eliezer Orama</title>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <img src="../assets/images/logo.png" class="logo" alt="logo">
                <ul id="sidemenu">
                <li><a href="../index.php#header">Inicio</a></li>
                <li><a href="../index.php#acerca">Sobre Mi</a></li>
                <li><a href="../index.php#servicios">Servicios</a></li>
                <li><a href="../index.php#portafolio">Portafolio</a></li>
                <li><a href="../index.php#contacto">No Contacto</a></li>
                    <i class="fa-solid fa-square-xmark" onclick="closemenu()"></i>
                </ul>
                <i class="fa-solid fa-bars" onclick="openmenu()"></i>
            </nav>
        </div>
    </div>
