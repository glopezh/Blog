<!DOCTYPE html

    "html://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang="es">
    <head>
        <title>Blog</title>
        <meta http-equiv="Content-Type" content="text/html;
        charset=utf-8">
    </head>
<body>
    <h2>Blog</h2>
    <hr />
<?php
include ('Blog.class.php');
include('Manager.class.php');

try {
    // Conexión a la base de datos
    $base = new PDO('mysql:host=127.0.0.1;dbname=Blog','root','');
    $base = setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $manager =  new Manager($base);
    $tabla_volver =$manager->getContenidoPorFecha();

    if (empty($tabla_volver))
    {
        echo 'Ningun mensaje.';
    }
    else {
        date_default_timezone_set('Europe/Paris');
        foreach ($tabla_volver as $valor) {
            //$valor contiene
            //el objeto blog
            $dt_inicio = date_create_from_format(
                'Y-m-d H:i:s', $valor->getFecha());
            echo "<h3>" . $valor->getTitulo() . "</h3>";
            echo "<h4>El" . $dt_inicio->format('d/m/Y H:i:s') . "</h4>";
            echo "<div style ='width: 400px'>";
            echo $valor->getComentario() . "</div>";
            if ($valor->getImagen() != "") {
                echo "<img src='imagenes/";
                echo $valor->getImagen() . "'width='200px' height='200px'/>";
            }
            echo "<hr />";

        }
        }
    }
    catch(Exception $e)
    {
        //mensaje en caso de error
        die('Error : '.$e->getMessage());
    }
    ?>
    <br />
    <a href="formulario_añadir.php">Volver a la página de inserción</a>
</body>
</html>
