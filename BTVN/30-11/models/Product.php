<?php
    require_once APP_ROOT.'/libs/DBConnection.php';
    class Product {
        private $id;
        private $name;
        private $price;

        public function __construct($id = null, $name = null, $price = null) {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getPrice() {
            return $this->price;
        }

        public function setPrice($price) {
            $this->price = $price;
        }

        public function getAllProducts() {
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();
    
            if ($conn === null) {
                throw new Exception("Kết nối cơ sở dữ liệu thất bại.");
            }
    
            try {
                $sql = 'SELECT id, name, price FROM products';
                $stmt = $conn->query($sql);
                
                $products = [];
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $product = new Product($row['id'], $row['name'], $row['price']);
                    $products[] = $product;
                }
    
                return $products;
            } catch (PDOException $e) {
                throw new Exception("Lỗi trong khi truy vấn: " . $e->getMessage());
            }
        }

        public function addProduct($name, $price) {
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();

            if ($conn === null) {
                throw new Exception("Kết nối cơ sở dữ liệu thất bại.");
            }

            try {
                $sql = "INSERT INTO products (name, price) VALUES (:name, :price)";
                $stmt = $conn->prepare($sql);

                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':price', $price);

                $stmt->execute();
            } catch (PDOException $e) {
                throw new Exception("Lỗi khi thêm sản phẩm: " . $e->getMessage());
            }
        }
        public function getProductById($id) {
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();
        
            if ($conn === null) {
                throw new Exception("Kết nối cơ sở dữ liệu thất bại.");
            }
        
            try {
                $sql = "SELECT id, name, price FROM products WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
        
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($row) {
                    return new Product($row['id'], $row['name'], $row['price']);
                } else {
                    throw new Exception("Sản phẩm không tồn tại.");
                }
            } catch (PDOException $e) {
                throw new Exception("Lỗi khi truy vấn: " . $e->getMessage());
            }
        }

        public function updateProduct($id, $name, $price) {
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();

            if ($conn === null) {
                throw new Exception("Kết nối cơ sở dữ liệu thất bại.");
            }

            try {
                $sql = "UPDATE products SET name = :name, price = :price WHERE id = :id";
                $stmt = $conn->prepare($sql);

                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':price', $price);

                $stmt->execute();
            } catch (PDOException $e) {
                throw new Exception("Lỗi khi cập nhật sản phẩm: " . $e->getMessage());
            }
        }

        public function deleteProduct($id) {
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();
        
            if ($conn === null) {
                throw new Exception("Kết nối cơ sở dữ liệu thất bại.");
            }
        
            try {
                $sql = "DELETE FROM products WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
            } catch (PDOException $e) {
                throw new Exception("Lỗi khi xóa sản phẩm: " . $e->getMessage());
            }
        }
    }
?>