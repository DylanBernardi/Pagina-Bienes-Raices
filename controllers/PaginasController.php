<?php

namespace Controllers;

use MVC\Router;

use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::get(3);
        $router->render('paginas/index', ['propiedades' => $propiedades, 'inicio' => TRUE]);
    }

    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', ['propiedades' => $propiedades]);
    }

    public static function propiedad(Router $router)
    {
        $propiedades = Propiedad::find($_GET['id']);
        $router->render('paginas/propiedad', ['propiedad' => $propiedades]);
    }

    public static function contacto(Router $router)
    {
        $mensaje = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuestas = $_POST['contacto'];
            //crear instancia de phpmailer
            $mail = new PHPMailer();

            //configuracion
            $mail->isSMTP();
            $mail->Host = "sandbox.smtp.mailtrap.io";
            $mail->SMTPAuth = True;
            $mail->Username = 'e5a433f3f8fab5';
            $mail->Password = 'e2b639c86a033e';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;
            $mail->setFrom('admin@bienes.com');
            $mail->addAddress('admin@bienes.com', 'Bienes.com');
            $mail->Subject = 'Tienes un nuevo Mensaje';
            $mail->isHTML(True);
            $mail->CharSet = 'UTF-8';

            //contenido del email
            $contenido = '<html>';
            $contenido .= '<p> Tienes un nuevo mensaje</p>';
            $contenido .= '<p> Nombre:' . $respuestas['nombre'] . '</p>';
            $contenido .= '<p> Mensaje:' . $respuestas['mensaje'] . '</p>';

            //Enviar de forma condicional algunos campos de email o telefono
            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p> Elijio ser contactado por telefono</p>';
                $contenido .= '<p> Telefono:' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p> Fecha Contacto:' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p> Hora:' . $respuestas['hora'] . '</p>';
            } else {
                $contenido .= '<p> Elijio ser contactado por email</p>';
                $contenido .= '<p> Email:' . $respuestas['email'] . '</p>';
            }

            $contenido .= '<p> Vende o Compra:' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p> Precio o Presupuesto: $' . $respuestas['precio'] . '</p>';
            $contenido .= '</html>';

            //Mandar el email
            $mail->Body = $contenido;
            $mail->AltBody = "Este texto es sin html";
            if ($mail->send()) {
                $mensaje = 'Mensaje enviado correctamente';
            } else {
                $mensaje = 'El mensaje no se pudo enviar...';
            }
        }
        $router->render('paginas/contacto', ['mensaje' => $mensaje]);
    }

    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada');
    }

    public static function blog(Router $router)
    {
        $router->render('paginas/blog');
    }
}
