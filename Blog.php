<?php
class Blog
{
//Declaración de atributos
private $id;
private $Titulo;
private $date;
private $Comentario;
private $Imagen;

//de acceso

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id; //vuelve al inicio de sesión
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id; //escrito en el atributo de id
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->Titulo; //devuelve el titulo
    }

    /**
     * @param mixed $Titulo
     */
    public function setTitulo($Titulo)
    {
        $this->Titulo = $Titulo; //escrito en el atributo titulo
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date; //devuelve la fecha
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date; //escrita en el atributo de fecha
    }

    /**
     * @return mixed
     */
    public function getComentario()
    {
        return $this->Comentario; //devuelve el comentario
    }

    /**
     * @param mixed $Comentario
     */
    public function setComentario($Comentario)
    {
        $this->Comentario = $Comentario; //escribe en el atributo
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->Imagen; //devuelve el nombre de la imagen
    }

    /**
     * @param mixed $Imagen
     */
    public function setImagen($Imagen)
    {
        $this->Imagen = $Imagen; //escrita en el atributo de imagen
    }
}
?>