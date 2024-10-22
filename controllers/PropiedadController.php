<?php

namespace Controllers;

use MVC\Router;

use Model\Propiedad;

use Model\Vendedor;

use Intervention\Image\ImageManager;

use Intervention\Image\Drivers\Gd\Driver;

class PropiedadController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $resultado = $_GET['resultado'] ?? null;
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }

    public static function crear(Router $router)
    {
        $propiedad = new Propiedad();
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $propiedad = new Propiedad($_POST['propiedad']);
            //crear carpeta imagenes
            $nombreImagen = md5(uniqid(rand(), true)) . ".png";

            //resize con intervention
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $manager = new ImageManager(Driver::class);
                $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen']);
                $image->cover(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            $errores = $propiedad->validar();
            if (empty($errores)) {
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                //subir Imagen
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                $propiedad->guardar();
            }
        }
        //Renderizar vista
        $router->render('propiedades/crear', ['propiedad' => $propiedad, 'vendedores' => $vendedores, 'errores' => $errores]);
    }

    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar("/admin");
        $propiedad = Propiedad::find($id);
        $errores = Propiedad::getErrores();
        $vendedores = Vendedor::all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['propiedad'];
            $propiedad->sincronizar($args);

            //validacion
            $errores = $propiedad->validar();

            //subida de archivos
            $nombreImagen = md5(uniqid(rand(), true)) . ".png";
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $manager = new ImageManager(Driver::class);
                $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen']);
                $image->cover(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            if (empty($errores)) {
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $propiedad->guardar();
            }
        }
        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id) {
                $tipo = $_POST['tipo'];
                if (validarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
}
