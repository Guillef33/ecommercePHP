<?php

class Producto
{
    private $productId;
    private $productTitle;
    // private $regID;
    //  static $regNombre;
    private $productImage;
    private $productDescription;
    private $productCategory;
    private $productPrice;

    public function listarProductos()
    {
        $link = Connection::conectar();
        // Esto era mas fino pero no me anduvo
        // $sql = "SELECT productId, productTitle, productPrice, 
        //                    productImage, productDescription, 
        //                    productCategory
        //                 FROM productos";
        $sql = 'SELECT * FROM productos';
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $productos = $stmt->fetchAll();
        return $productos;
    }

    public function verProductoPorID()
    {
        $id = $_GET['id'];
        $link = Connection::conectar();
        $sql = "SELECT
                        productId, productTitle, productImage
                     productPrice, productCategory
                     FROM productos
                     productId = :id";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $producto = $stmt->fetch();
        //registrar todos los atributos
        $this->setProductId($producto['productId']);
        $this->setProductTitle($producto['productTitle']);
        $this->setProductPrice($producto['productPrice']);
        $this->setProductCategory($producto['productCategory']);
        $this->setProductImage($producto['productImage']);
        return $this;
    }

    public function agregarProducto()
    {
        $productTitle = $_POST['productTitle'];
        $productId = $_POST['productId'];
        $productPrice = $_POST['productPrice'];
        $productCategory = $_POST['productCategory'];
        $productImage = $_POST['productImage'];
        $link = Connection::conectar();
        $sql = "INSERT INTO destinos
                        ( productTitle, productId, productPrice, productCategory, productImage )
                        VALUE
                        ( :productTitle, :productId, :productPrice, :productCategory, :productImage )";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':productTitle', $productTitle, PDO::PARAM_STR);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':productPrice', $productPrice, PDO::PARAM_INT);
        $stmt->bindParam(':productCategory', $productCategory, PDO::PARAM_INT);
        $stmt->bindParam(':productImage', $productImage, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $this->setProductId($link->lastInsertId());
            $this->setProductTitle($productTitle);
            $this->setProductId($productId);
            $this->setProductPrice($productPrice);
            $this->setProductCategory($productCategory);
            $this->setProductImage($productImage);
            $this->setDestActivo(1); //default
            return $this;
        }
        return false;
    }

    // Hasta aca llegue

    public function modificarProducto()
    {
        $productId = $_POST['productId'];
        $productTitle = $_POST['productTitle'];
        $productPrice = $_POST['productPrice'];
        $productCategory = $_POST['productCategory'];
        $productImage = $_POST['productImage'];
        $link = Connection::conectar();
        $sql = "UPDATE productos
                        SET 
                            productTitle = :productTitle,
                            productPrice = :productPrice,
                            productCategory = :productCategory,
                            productImage = :productImage
                      WHERE productId = :id";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':productTitle', $productTitle, PDO::PARAM_STR);
        $stmt->bindParam(':productPrice', $productPrice, PDO::PARAM_INT);
        $stmt->bindParam(':productCategory', $productCategory, PDO::PARAM_INT);
        $stmt->bindParam(':productImage', $productImage, PDO::PARAM_INT);
        $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $this->setProductId($productId);
            $this->setProductTitle($productTitle);
            $this->setProductPrice($productPrice);
            $this->setProductCategory($productCategory);
            $this->setProductImage($productImage);
            return $this;
        }
        return false;
    }

    public function eliminarProducto()
    {
        $productId = $_POST['productId'];
        $productTitle = $_POST['productTitle'];
        $link = Connection::conectar();
        $sql = "DELETE FROM productos
                        WHERE productId = :id";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
        if ($stmt->execute()) {
            //registramos los atributos
            $this->setProductId($id);
            $this->setProductTitle($productTitle);
            return $this;
        }
        return false;
    }


    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setProductId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProductTitle()
    {
        return $this->productTitle;
    }

    /**
     * @param mixed $destNombre
     */
    public function setProductTitle($productTitle)
    {
        $this->productTitle = $productTitle;
    }

    // /**
    //  * @return mixed
    //  */
    // public function getProductId()
    // {
    //     return $this->productId;
    // }

    // /**
    //  * @param mixed $regID
    //  */
    // public function setProductId($productId)
    // {
    //     $this->productId = $productId;
    // }

    /**
     * @return mixed
     */
    public function getProductPrice()
    {
        return $this->productPrice;
    }

    /**
     * @param mixed $destPrecio
     */
    public function setProductPrice($productPrice)
    {
        $this->productPrice = $productPrice;
    }

    /**
     * @return mixed
     */
    public function getProductCategory()
    {
        return $this->productCategory;
    }

    /**
     * @param mixed $destAsientos
     */
    public function setProductCategory($productCategory)
    {
        $this->productCategory = $productCategory;
    }

    /**
     * @return mixed
     */
    public function getProductImage()
    {
        return $this->productImage;
    }

    /**
     * @param mixed $destDisponibles
     */
    public function setProductImage($productImage)
    {
        $this->productImage = $productImage;
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
