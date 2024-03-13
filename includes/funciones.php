<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ .  'funciones.php');

function incluirTemplates( $nombre, $inicio = false ) {
    include TEMPLATES_URL . "/${nombre}.php";
}



function debuguear($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / sanitizar el html
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function validarORedireccionar(string $url) {
    // Validar la URL que sea un ID válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if(!$id) {
        header("Location: ${url}");
    }

    return $id;
}

// Funcion que revisa si el usuario esta autenticado
function isAuth() : void {
    if(!isset($_SESSION['login'])) {
        header('Location: /');
    }
}

function isAdmin() : void {
    if(!isset($_SESSION['admin'])) {
        header('Location: /');
    }
}