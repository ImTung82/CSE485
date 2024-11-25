<?php
    // Khởi tạo session
    session_start();

    // Kiểm tra nếu có dữ liệu POST từ form (id, name, price)
    if (isset($_POST['id'])) {
        $index = intval($_POST['id']);  // Lấy chỉ số hoa từ form và chuyển thành số nguyên

        unset($_SESSION['flowers'][$index]);

        // Cập nhật session
        $_SESSION['flowers'] = array_values($_SESSION['flowers']);

        header("Location: admin_view.php");
        exit();
    } else {
        header("Location: edit_form.php");
        exit();
    }
?>