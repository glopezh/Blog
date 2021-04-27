<!DOCTYPE html

"html://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang="es">

<head>
    <title>Blog</title>
    <meta http-equiv="Content-Type" content="text/html";
charset=utf-8"/>
</head>
<body>
<?php
include ('Blog.class.php');
include ('Manager.class.php');

try
{
    //Conexión a la base de datos
    $base = new PDO ('mysql:host=127.0.0.1;dbname=Blog','root','');
    $base ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    if ($_FILES['imagen']['error']){
        switch ($_FILES['imagen']['error']){
            case 1: // UPLOAD_ERR_INI_SIZE
                echo "El tamaño del archivo supere el limite permitido por el servidor 
                (parámetro upload_max_filesize del archivo php.ini).";
                break;
            case 2: //UPLOAD_ERR_FORM_SIZE
                echo "El tamaño del archivo supera el límite permitido por el formulario
                (parámetro post_max_size del archivo php.ini).";
                break;
            case 3: //UPLOAD_ERR_PARTIAL
                echo "El envio del formulario se ha interrumpido durante su transmisión.";
                break;
            case 4: //UPLOAD_ERR_NO_FILE
                echo "El tamaño del archivo que ha enviado es nulo.";
                break;
        }
    }
    else{
    //Si no hay error entonces $_FILES['nombre del archivo']
    //['error'] vale 0

        echo "Ningún error durante la transmisión del archivo.<br />";
        if ((isset($_FILES['imagen']['name'])&&($_FILES['imagen']['error']== UPLOAD_ERR_OK))) {
            $destino_de_ruta = 'imagenes/';
            //desplazamiento del archivo del directorio temporal
            //(almacenamiento por defecto) al directorio de destino
            move_uploaded_file($_FILES['imagen']['tmp_name'],
                $destino_de_ruta . $_FILES['imagen']['name']);
            echo "El archivo" . $_FILES['imagen']['name'] . "Se ha copiado en el directorio imagenes";
        }
        else {
            echo "El archivo no se ha copiado en el directorio imágenes.";

        }
    }
$manager = new Manager($base);
    //crear un objeto Blog con los valores de sus atributosç
    //completados con aquellas recibidas por $_POST
    $blog = new Blog();
    $blog ->setTitulo(htmlentities(addslashes($_POST['titulo']),
    ENT_QUOTES));
    $blog->setFecha(Date("Y-m-d H:i:s"));
    $blog->setComentario
    (htmlentities(addslashes($_POST['comentario']),ENT_QUOTES));
    $blog->setImagen($_FILES['imagen']['name']);
    $iniciar_sesion = $manager->insercionContenido($blog);

    if ($iniciar_sesion !=0){
        echo "<br/>Añadir comentario de éxito.<br/>";
    }else{
        echo "<br/>El comentario no se ha podido añadir.<br />";
    }

}
catch(Exception $e)
{
    //mensaje en caso de error
    die('Error: '.$e->getMessage());
}
?>
<a href="formulario_añadir.php"> Volver a la página de inserción </a>

</body>
</html>

