<?php

class Producto
{
    private $productId;
    private $productTitle;
    private $productImage;
    private $catId;
    static $catName;

    private $productCategory;
    private $productPrice;
    private $productDescription;

    private $image;

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
        $stmt->bindParam(':productId', $id, PDO::PARAM_STR);
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

    public function uploadImages()

    {
        //var_dump($_FILES["productImage"]);
        if ($_FILES['productImage']['error'] == 0) {
            // Ruta donde voy a guardar 
            $path = $_SERVER['DOCUMENT_ROOT'] . '/PHPTraining/calculadora/uploads/images';
            // Nombre y ubicacion temporal
            $temporal = $_FILES['productImage']['tmp_name'];
            // Renombrar el archivo
            // timestamp() + extension
            $productImage = time();
            // Move the image

            if (move_uploaded_file($temporal, $path . $productImage)) {
                return $_FILES["productImage"]["name"];
            } else {
                return false;
            }
        }
    }

    public function agregarProducto()
    {
        try {
            $productTitle = $_POST['productTitle'];
            $catId = $_POST['catId'];
            $productImage = $this->uploadImages();
            $productPrice = $_POST['productPrice'];

            $link = Connection::conectar();
            $sql = "INSERT INTO productos
                        ( productTitle, productPrice, productCategory, productImage)
                        VALUE
                        ( :productTitle, :productPrice, :catId , :productImage)";
            $stmt = $link->prepare($sql);
            $stmt->bindParam(':productTitle', $productTitle, PDO::PARAM_STR);
            $stmt->bindParam(':catId', $catId, PDO::PARAM_INT);
            $stmt->bindParam(':productPrice', $productPrice, PDO::PARAM_INT);
            $stmt->bindParam(':productImage', $productImage, PDO::PARAM_STR);
            if ($stmt->execute()) {
                $this->setProductId($link->lastInsertId());
                $this->setProductTitle($productTitle);
                $this->setProductPrice($productPrice);
                $this->setCatId($catId);
                $this->setProductImage($productImage);


                return $this;
            } else {
                return false;
            }
        } catch (Exception $e) {

            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

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
                      WHERE productId = :productId";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':productTitle', $productTitle, PDO::PARAM_STR);
        $stmt->bindParam(':productPrice', $productPrice, PDO::PARAM_INT);
        $stmt->bindParam(':productCategory', $productCategory, PDO::PARAM_INT);
        $stmt->bindParam(':productImage', $productImage, PDO::PARAM_STR);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
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

    /**
     * @return mixed
     */
    public function getCatId()
    {
        return $this->catId;
    }

    /**
     * @param mixed 
     */
    public function setCatId($catId)
    {
        $this->catId = $catId;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed 
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
}
