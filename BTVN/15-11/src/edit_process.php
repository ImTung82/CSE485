<?php
    // Sử dụng POST & session
    // Khởi tạo session
    session_start();

    $products = $_SESSION['products'] ?? [];

    // Kiểm tra nếu có dữ liệu POST từ form (id, name, price)
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price'])) {
        $index = intval($_POST['id']); // Lấy chỉ số sản phẩm từ form và chuyển thành số nguyên
        $name = htmlspecialchars($_POST['name']);
        $price = htmlspecialchars($_POST['price']);

        $products[$index] = ['name' => $name, 'price' => $price];

        // Cập nhật session với dữ liệu đã sửa
        $_SESSION['products'] = $products;

        // Chuyển hướng về trang index.php để hiển thị sản phẩm đã sửa
        header("Location: index.php");
        exit();
    } else {
        // Nếu không có dữ liệu hợp lệ (ID, tên sản phẩm, giá), quay lại trang chỉnh sửa
        header("Location: edit_form.php");
        exit();
    }
?>