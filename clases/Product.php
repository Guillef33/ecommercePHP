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

    public function agregarProducto()
    {
        $productTitle = $_POST['productTitle'];
        $productId = $_POST['productId'];
        $catId = $_POST['catId'];
        $productImage = $_POST['productImage'];
        $productPrice = $_POST['productPrice'];
        $productCategory = $_POST['productCategory'];
        // $productImage = $_POST['productImage'];

        $link = Connection::conectar();
        $sql = "INSERT INTO productos
                        ( productTitle, productId, productPrice, productCategory, catId, productImage)
                        VALUE
                        ( :productTitle, :productId, :productPrice, :productCategory, :catId , :productImage)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':productTitle', $productTitle, PDO::PARAM_STR);
        // $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->bindParam(':catId', $catId, PDO::PARAM_INT);
        $stmt->bindParam(':productPrice', $productPrice, PDO::PARAM_INT);
        $stmt->bindParam(':productCategory', $productCategory, PDO::PARAM_INT);
        // $stmt->bindParam(':productImage', $productImage, PDO::PARAM_STR);
        $stmt->bindParam(':productImage', $productImage, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $this->setProductId($link->lastInsertId());
            $this->setProductTitle($productTitle);
            // $this->setProductId($productId);
            $this->setProductPrice($productPrice);
            $this->setProductCategory($productCategory);
            // $this->setProductImage($productImage);
            $this->setCatId($catId);
            $this->setProductImage($productImage);


            return $this;
        }
        return false;
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


    public function uploadImages()
    {
        // if (isset($_POST['submit'])) {


        // Count total files
        $countfiles = count($_FILES['files']['name']);

        // Prepared statement
        $query = "INSERT INTO imagenes (name,image) VALUES(?,?)";

        $link = Connection::conectar();

        $statement = $link->prepare($query);

        // Loop all files
        for ($i = 0; $i < $countfiles; $i++) {

            // File name
            $filename = $_FILES['files']['name'][$i];

            // Location
            // $ubicacion = '/PHPTraining/calculadora/uploads/';

            $target_file = $_SERVER['DOCUMENT_ROOT'] . '/PHPTraining/calculadora/uploads/images' . $filename;
            //   $target_file = $ubicacion . $filename;


            // file extension
            $file_extension = pathinfo(
                $target_file,
                PATHINFO_EXTENSION
            );

            $file_extension = strtolower($file_extension);

            // Valid image extension
            $valid_extension = array("png", "jpeg", "jpg");

            if (in_array($file_extension, $valid_extension)) {

                // Upload file
                if (move_uploaded_file(
                    $_FILES['files']['tmp_name'][$i],
                    $target_file
                    // $ubicacion . $filename
                )) {

                    // Execute query
                    $statement->execute(
                        array($filename, $target_file)
                    );
                }
            }
        }

        echo "File upload successfully";
    }
    // }


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
