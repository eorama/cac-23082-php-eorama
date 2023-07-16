<?php
session_start();

function isUserLoggedIn(){
    return isset($_SESSION['correo']) && $_SESSION['correo'] === 'Admin';
}

function requireLoggedIn(){
    if (!isUserLoggedIn()) {
        // No realizamos redirección automática, simplemente retornamos false
        return false;
    }
    return true;
}
?>
