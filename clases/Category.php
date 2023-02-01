<?php

class Category
{
    private $catId;
    private $catName;

    public function listarCategorias()
    {
        $link = Connection::conectar();
        $sql = "SELECT catId, catName 
                        FROM categorias";
        $stmt = $link->prepare($sql);
        $stmt->execute();

        $categorias = $stmt->fetchAll();
        return $categorias;
    }

    public function verCategoriaPorID()
    {
        $catId = $_GET['catId'];
        $link = Connection::conectar();
        $sql = "SELECT catId, catName
                        FROM categorias
                        WHERE catId = :catId";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':catId', $catId, PDO::PARAM_INT);
        $stmt->execute();
        $datosCategoria = $stmt->fetch();
        //registramos atributos del objeto
        $this->setCatId($datosCategoria['catId']);
        $this->setCatName($datosCategoria['catName']);
        return $this;
    }
    public function agregarCategoria()
    {
        $catName = $_POST['catName'];
        $link = Connection::conectar();
        $sql = "INSERT INTO categorias
                                ( catName )
                            VALUE 
                                ( :catName )";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':catName', $catName, PDO::PARAM_STR);

        if ($stmt->execute()) {
            //registramos los atributos de objeto
            $this->setCatId($link->lastInsertId());
            $this->setCatName($catName);
            return $this; //objeto Categoria
        }
        return false;
    }
    public function modificarCategoria()
    {
        $catId = $_POST['catId'];
        $catName = $_POST['catName'];
        var_dump($catId, $catName);
        $link = Connection::conectar();
        $sql = "UPDATE categorias
                           SET catName = :catName 
                        WHERE catId = :catId";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':catId', $catId, PDO::PARAM_INT);
        $stmt->bindParam(':catName', $catName, PDO::PARAM_STR);
        if ($stmt->execute()) {
            //registramos los atributos de objeto
            $this->setCatId($catId);
            $this->setCatName($catName);
            return $this; //objeto Categoria
        }
        var_dump($stmt);
        return false;
    }

    public function confirmarBaja()
    {
        $catId = $_GET['catId'];
        var_dump('Cat ID es:', $catId);
        $this->verCategoriaPorID();
        $link = Connection::conectar();
        $sql = "SELECT 1 FROM categorias 
                        WHERE catId = :catId";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':catId', $catId, PDO::PARAM_INT);
        $stmt->execute();
        $cantidad = $stmt->rowCount();
        return $cantidad;
    }

    public function eliminarCategoria()
    {
        $catId = $_POST['catId'];
        $catName = $_POST['catName'];
        $link = Connection::conectar();
        $sql = "DELETE FROM categorias
                        WHERE catId = :catId";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':catId', $catId, PDO::PARAM_INT);
        if ($stmt->execute()) {
            //registramos atributos
            $this->setCatId($catId);
            $this->setCatName($catName);
            return $this;
        }
        return false;
    }

    #################################
    ### getters & setters
    /**
     * @return mixed
     */
    public function getCatId()
    {
        return $this->catId;
    }

    /**
     * @param mixed $catId
     */
    public function setCatId($catId)
    {
        $this->catId = $catId;
    }

    /**
     * @return mixed
     */
    public function getCatName()
    {
        return $this->catName;
    }

    /**
     * @param mixed $catName
     */
    public function setCatName($catName)
    {
        $this->catName = $catName;
    }
}
