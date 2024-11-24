<?php
    // Khởi tạo session
    session_start();

    // Dữ liệu sản phẩm mặc định
    $products = $_SESSION['products'] ?? [];

    echo $_POST['id'];
    echo '<pre>';
    echo "Products (from default + session):\n";
    print_r($_SESSION['products']);

    // Kiểm tra nếu có dữ liệu POST từ form (id, name, price)
    if (isset($_POST['id'])) {
        $index = intval($_POST['id']); // Lấy chỉ số sản phẩm từ form và chuyển thành số nguyên

        unset($products[$index]);

        // Cập nhật session với dữ liệu đã sửa
        $_SESSION['products'] = array_values($products);

        // Chuyển hướng về trang index.php để hiển thị sản phẩm đã sửa
        header("Location: index.php");
        exit();
    } else {
        // Nếu không có dữ liệu hợp lệ (ID, tên sản phẩm, giá), quay lại trang chỉnh sửa
        header("Location: edit_form.php");
        exit();
    }
?>