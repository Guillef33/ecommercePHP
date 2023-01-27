<?php

class Producto
{
    private $id;
    private $title;
    // private $regID;
    //  static $regNombre;
    private $image;
    private $description;
    private $category;
    private $price;

    public function listarProductos()
    {
        $link = Connection::conectar();
        /* table relation
            $sql = "SELECT
                        id, destNombre, 
                        d.regID, regNombre,
                        destPrecio, destAsientos, destDisponibles
                     FROM destinos d, regiones r
                     WHERE d.regID = r.regID";
                     Aca hay un JOIN con los campos de la otra tabla, revisar en nuestro caso
            */
        $sql = "SELECT id, title, price, 
                           image, description, 
                           category, price
                        FROM destinos d 
                        INNER JOIN regiones r 
                        ON d.regID = r.regID";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $destinos = $stmt->fetchAll();
        return $destinos;
    }

    public function verProductoPorID()
    {
        $id = $_GET['id'];
        $link = Connection::conectar();
        $sql = "SELECT
                        id, destNombre, 
                        d.regID, regNombre,
                        destPrecio, destAsientos, destDisponibles
                     FROM destinos d, regiones r
                     WHERE d.regID = r.regID
                       AND id = :id";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $destino = $stmt->fetch();
        //registrar todos los atributos
        $this->setid($destino['id']);
        $this->setDestNombre($destino['destNombre']);
        $this->setRegID($destino['regID']);
        self::setRegNombre($destino['regNombre']);
        $this->setDestPrecio($destino['destPrecio']);
        $this->setDestAsientos($destino['destAsientos']);
        $this->setDestDisponibles($destino['destDisponibles']);
        return $this;
    }

    public function agregarProducto()
    {
        $destNombre = $_POST['destNombre'];
        $regID = $_POST['regID'];
        $destPrecio = $_POST['destPrecio'];
        $destAsientos = $_POST['destAsientos'];
        $destDisponibles = $_POST['destDisponibles'];
        $link = Connection::conectar();
        $sql = "INSERT INTO destinos
                        ( destNombre, regID, destPrecio, destAsientos, destDisponibles )
                        VALUE
                        ( :destNombre, :regID, :destPrecio, :destAsientos, :destDisponibles )";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':destNombre', $destNombre, PDO::PARAM_STR);
        $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
        $stmt->bindParam(':destPrecio', $destPrecio, PDO::PARAM_INT);
        $stmt->bindParam(':destAsientos', $destAsientos, PDO::PARAM_INT);
        $stmt->bindParam(':destDisponibles', $destDisponibles, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $this->setid($link->lastInsertId());
            $this->setDestNombre($destNombre);
            $this->setRegID($regID);
            $this->setDestPrecio($destPrecio);
            $this->setDestAsientos($destAsientos);
            $this->setDestDisponibles($destDisponibles);
            $this->setDestActivo(1); //default
            return $this;
        }
        return false;
    }

    public function modificarProducto()
    {
        $id = $_POST['id'];
        $destNombre = $_POST['destNombre'];
        $regID = $_POST['regID'];
        $destPrecio = $_POST['destPrecio'];
        $destAsientos = $_POST['destAsientos'];
        $destDisponibles = $_POST['destDisponibles'];
        $link = Connection::conectar();
        $sql = "UPDATE destinos
                        SET 
                            destNombre = :destNombre,
                            regID = :regID,
                            destPrecio = :destPrecio,
                            destAsientos = :destAsientos,
                            destDisponibles = :destDisponibles
                      WHERE id = :id";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':destNombre', $destNombre, PDO::PARAM_STR);
        $stmt->bindParam(':regID', $regID, PDO::PARAM_INT);
        $stmt->bindParam(':destPrecio', $destPrecio, PDO::PARAM_INT);
        $stmt->bindParam(':destAsientos', $destAsientos, PDO::PARAM_INT);
        $stmt->bindParam(':destDisponibles', $destDisponibles, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $this->setid($id);
            $this->setDestNombre($destNombre);
            $this->setRegID($regID);
            $this->setDestPrecio($destPrecio);
            $this->setDestAsientos($destAsientos);
            $this->setDestDisponibles($destDisponibles);
            $this->setDestActivo(1); //default
            return $this;
        }
        return false;
    }

    public function eliminarProducto()
    {
        $id = $_POST['id'];
        $destNombre = $_POST['destNombre'];
        $link = Connection::conectar();
        $sql = "DELETE FROM destinos
                        WHERE id = :id";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            //registramos los atributos
            $this->setid($id);
            $this->setDestNombre($destNombre);
            return $this;
        }
        return false;
    }


    /**
     * @return mixed
     */
    public function getid()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setid($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDestNombre()
    {
        return $this->destNombre;
    }

    /**
     * @param mixed $destNombre
     */
    public function setDestNombre($destNombre)
    {
        $this->destNombre = $destNombre;
    }

    /**
     * @return mixed
     */
    public function getRegID()
    {
        return $this->regID;
    }

    /**
     * @param mixed $regID
     */
    public function setRegID($regID)
    {
        $this->regID = $regID;
    }

    /**
     * @return mixed
     */
    public function getDestPrecio()
    {
        return $this->destPrecio;
    }

    /**
     * @param mixed $destPrecio
     */
    public function setDestPrecio($destPrecio)
    {
        $this->destPrecio = $destPrecio;
    }

    /**
     * @return mixed
     */
    public function getDestAsientos()
    {
        return $this->destAsientos;
    }

    /**
     * @param mixed $destAsientos
     */
    public function setDestAsientos($destAsientos)
    {
        $this->destAsientos = $destAsientos;
    }

    /**
     * @return mixed
     */
    public function getDestDisponibles()
    {
        return $this->destDisponibles;
    }

    /**
     * @param mixed $destDisponibles
     */
    public function setDestDisponibles($destDisponibles)
    {
        $this->destDisponibles = $destDisponibles;
    }

    /**
     * @return mixed
     */
    public function getDestActivo()
    {
        return $this->destActivo;
    }

    /**
     * @param mixed $destActivo
     */
    public function setDestActivo($destActivo)
    {
        $this->destActivo = $destActivo;
    }

    public static function getRegNombre()
    {
        return self::$regNombre;
    }
    public static function setRegNombre($regNombre)
    {
        self::$regNombre = $regNombre;
    }
}
