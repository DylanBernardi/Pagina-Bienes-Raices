<?php

function conectarDB()
{
    $db = new mysqli('localhost', 'root', '29841', 'bienesraices_crud');
    if (!$db) {
        echo 'No se pudo conectar a la base de datos';
        exit;
    }
    return $db;
}
