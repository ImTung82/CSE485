<?php
    // // Sử dụng GET
    // if (isset($_GET['name']) && isset($_GET['price'])) {
    //     $name = htmlspecialchars($_GET['name']);
    //     $price = htmlspecialchars($_GET['price']);

    //     // Chuyển hướng về index.php kèm dữ liệu sản phẩm mới qua URL
    //     header("Location: index.php?name=$name&price=$price");
    //     exit();
    // } else {
    //     // Nếu không có dữ liệu hợp lệ, quay lại add_form.php
    //     header('Location: add_form.php');
    //     exit();
    // }



    // Sử dụng POST & session
    // Khởi tạo session
    session_start();

    // Kiểm tra nếu có dữ liệu POST từ form
    if (isset($_POST['name']) && isset($_POST['price'])) {
        $name = htmlspecialchars($_POST['name']);
        $price = htmlspecialchars($_POST['price']);

        // Lưu vào session
        if (!isset($_SESSION['products'])) {
            $_SESSION['products'] = [];
        }
        $_SESSION['products'][] = ['name' => $name, 'price' => $price];

        // // Debug: In ra sản phẩm để kiểm tra
        // echo '<pre>';
        // echo "Products (from default + session):\n";
        // print_r($_SESSION['products']);

        // Chuyển hướng về index.php sau khi thêm sản phẩm
        header("Location: index.php");
        exit();
    } else {
        // Nếu không có dữ liệu hợp lệ, quay lại add_form.php
        header('Location: add_form.php');
        exit();
    }
?>