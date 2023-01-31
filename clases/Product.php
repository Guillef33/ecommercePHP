<?php

class Producto
{
    private $productId;
    private $productTitle;
    private $productImage;
    private $productCategory;
    private $productPrice;
    private $productDescription;

    public function listarProductos()
    {
        $link = Connection::conectar();
        $sql = 'SELECT * FROM productos';
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $productos = $stmt->fetchAll();
        return $productos;
    }

    public function verProductoPorID()
    {
        $id = $_GET['productId'];
        var_dump($id);
        $link = Connection::conectar();
        $sql = "SELECT 
                    *
                     FROM productos
                     WHERE productId = :productId";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':productId', intval($id), PDO::PARAM_INT);
        var_dump($stmt);

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


        var_dump($_POST['productTitle']);

        $link = Connection::conectar();
        $sql = "INSERT INTO productos
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
            // $this->setProductId($link->lastInsertId());
            $this->setProductTitle($productTitle);
            $this->setProductId($productId);
            $this->setProductPrice($productPrice);
            $this->setProductCategory($productCategory);
            $this->setProductImage($productImage);
            return $this;
        }
        return false;
    }

    public function modificarProducto()
    {
        if (isset($_POST['productId'])) {
            $productId = $_POST['productId'];
        }
        if (isset($_POST['productTitle'])) {
            $productTitle = $_POST['productTitle'];
        }
        if (isset($_POST['productPrice'])) {

            $productPrice = $_POST['productPrice'];
        }
        if (isset($_POST['productCategory'])) {

            $productCategory = $_POST['productCategory'];
        }
        if (isset($_POST['productImage'])) {

            $productImage = $_POST['productImage'];
        }

        $link = Connection::conectar();
        $sql = "UPDATE productos
                        SET 
                            productTitle = :productTitle,
                            productPrice = :productPrice,
                            productCategory = :productCategory,
                            productImage = :productImage
                      WHERE productId = :productId";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':productTitle', $productTitle, PDO::PARAM_STR);
        $stmt->bindParam(':productPrice', $productPrice, PDO::PARAM_INT);
        $stmt->bindParam(':productCategory', $productCategory, PDO::PARAM_INT);
        $stmt->bindParam(':productImage', $productImage, PDO::PARAM_INT);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        if ($stmt->execute()) {
            if (isset($productId)) {
                $this->setProductId($productId);
            }
            if (isset($productTitle)) {
                $this->setProductTitle($productTitle);
            }
            if (isset($productPrice)) {

                $this->setProductPrice($productPrice);
            }
            if (isset($productCategory)) {

                $this->setProductCategory($productCategory);
            }
            if (isset($productImage)) {

                $this->setProductImage($productImage);
            }
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
            $this->setProductId($productId);
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
        return $this->productId;
    }

    /**
     * @param mixed $id
     */
    public function setProductId($id)
    {
        $this->productId = $id;
    }

    /**
     * @return mixed
     */
    public function getProductTitle()
    {
        return $this->productTitle;
    }

    /**
     * @param mixed 
     */
    public function setProductTitle($productTitle)
    {
        $this->productTitle = $productTitle;
    }

    /**
     * @return mixed
     */
    public function getProductPrice()
    {
        return $this->productPrice;
    }

    /**
     * @param mixed 
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
     * @param mixed 
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
     * @param mixed 
     */
    public function setProductImage($productImage)
    {
        $this->productImage = $productImage;
    }


    /**
     * @return mixed
     */
    public function getProductDescription()
    {
        return $this->productDescription;
    }

    /**
     * @param mixed 
     */
    public function setProductDescription($productDescription)
    {
        $this->productDescription = $productDescription;
    }
}
