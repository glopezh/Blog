<!DOCTYPE html
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="es">
<head>
    <title>Blog</title>
    <meta http-equiv="Content-Type" content="text/html" ;
          charset=utf-8"/>
</head>
<body>
<h2>
    Formulario para añadir contenido al blog
</h2>
<form action="insertar_contenido.php" method="POST"
      enctype="multipart/form-data">
    <p>Título:<input type="text" name="titulo"/></p>
    <p>Comentario: <br/><textarea name="comentario" rows="10" cols="50"></textarea></p>
    <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
    <p>Seleccione una foto que tenga un tamaño inferior a 2MB.</p>
    <input type="file" name="imagen">
    <br/><br/>
    <input type="submit" name="ok" value="Enviar">
</form>
<br/>
<a href="mostrar_blog.php">
    Página de visualización del blog
</a>
</body>
</html>