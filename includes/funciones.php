<?php

define('TEMPLATES_URL', __DIR__ .  '/templates');
define('FUNCIONES_URL', __DIR__ .   'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/$nombre.php";
}

function estaAutenticado()
{
    session_start();

    if (!$_SESSION['login']) {
        return header('Location: /');
    }
}

function debuguear($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

function validarTipoContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos);
}

function mostrarNotificacion($codigo)
{
    $mensaje = '';
    switch ($codigo) {
        case 1:
            $mensaje = "Creado Correctamente";
            break;
        case 2:
            $mensaje = "Actualizado Correctamente";
            break;
        case 3:
            $mensaje = "Eliminado Correctamente";
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarORedireccionar(string $url)
{
    $id =  filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if (!$id) {
        header("location: $url");
    }
    return $id;
}

function truncate(string $texto, int $cantidad): string
{
    if (strlen($texto) >= $cantidad) {
        return "<span title='$texto'>" . substr($texto, 0, $cantidad) . " ...</span>";
    } else {
        return $texto;
    }
}
