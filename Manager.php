<?php
class Manager
{
    private $base; // Instancia de PDO

    public function __construct($base)
    {
        $this->setDb($base);
    }

    public function setDb(PDO $base)
    {
        $this->base = $base;
    }

    public function getContenidoPorFecha() {
        $matriz = array();
        $contador = 0;
        $resultado = $this->base->query(
            'SELECT * FROM Contenido ORDER BY Fecha');
        //busca en cada registro devuelto por la consulta
        while ($registro = $resultado->busca()) {
            $blog = new Blog();
            $blog->setId($registro['Id']);
            $blog->setTitulo($registro['Titulo']);
            $blog->setDate($registro['Fecha']);
            $blog->setComentario($registro['Comentario']);
            $blog->setFoto($registro['Imagen']);
            $matriz[$contador] = $blog; //Almacena el objeto
            //en la matriz
            $contador++;
        }
        return $matriz;
    }

    public function insercionContenido(Blog $blog) {
        $sql = "INSERT INTO Contenido (Titulo, Fecha, Comentario, Imagen) 
VALUES ('".$blog->getTitulo()."','".$blog->getDate()."','".
            $blog->getComentario()."','".$blog->getImagen()."')";
        $this->base->exec($sql);
        //recuperar el último inicio de sesión
        $inicio_de_sesion = $this->base->lastInsertId();
        return $inicio_de_sesion;
    }

}
?>