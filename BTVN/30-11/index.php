<?php
    require_once 'config/config.php';
    require_once APP_ROOT.'/controllers/ProductController.php';

    $action = isset($_GET['action']) ? $_GET['action'] : 'index';

    $productController = new ProductController();
    
    switch ($action) {
        case 'index':
            $productController->index();
            break;
        case 'add':
            $productController->add();
            break;
        case 'edit':
            $productController->edit();
            break;
        case 'delete':
            $productController->delete();
            break;
        default:
            $productController->index();
            break;
    }
?>