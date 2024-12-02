<?php
    require_once APP_ROOT.'/models/Product.php';

    class ProductController {
        public function index() {
            $product = new Product();
            $products = $product->getAllProducts();

            include APP_ROOT . '/views/home/index.php';
        }

        public function add() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $price = $_POST['price'];

                $product = new Product();
                $product->addProduct($name, $price);

                header("Location: index.php?action=index");
                exit();
            }
            
            include APP_ROOT . '/views/product/add.php';
        }

        public function edit() {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = new Product();
                $productToEdit = $product->getProductById($id);

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = $_POST['name'];
                    $price = $_POST['price'];

                    $product->updateProduct($id, $name, $price);

                    header("Location: index.php?action=index");
                    exit();
                }

                include APP_ROOT . '/views/product/edit.php';
            } else {
                header("Location: index.php?action=index");
                exit();
            }
        }

        public function delete() {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
        
                $product = new Product();
                $productToDelete = $product->getProductById($id);
        
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $product->deleteProduct($id);
                    header("Location: index.php?action=index");
                    exit();
                }
        
                include APP_ROOT . '/views/product/delete.php';
            } else {
                header("Location: index.php?action=index");
                exit();
            }
        }
    }
?>