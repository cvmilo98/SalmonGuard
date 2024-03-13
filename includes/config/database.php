<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', 'Bastianfelipe21.', 'salmonguard');
    $db->set_charset('utf8');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    }

    return $db;
}