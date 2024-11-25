<?php
    // Khởi tạo session
    session_start();

    // Kiểm tra nếu có dữ liệu POST từ form
    if (isset($_POST['name']) && isset($_POST['description']) && isset($_FILES['image1']) && isset($_FILES['image2'])) {
        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);

        // Lấy thông tin ảnh image1 và image2
        $image1 = $_FILES['image1'];
        $image2 = $_FILES['image2'];

        // Kiểm tra lỗi trong quá trình upload ảnh
        if ($image1['error'] !== UPLOAD_ERR_OK) {
            echo "Lỗi tải ảnh 1. Mã lỗi: " . $image1['error'];
            exit();
        }

        if ($image2['error'] !== UPLOAD_ERR_OK) {
            echo "Lỗi tải ảnh 2. Mã lỗi: " . $image2['error'];
            exit();
        }

        // Kiểm tra nếu ảnh hợp lệ
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];  // Các định dạng ảnh được phép
        $image1_extension = strtolower(pathinfo($image1['name'], PATHINFO_EXTENSION));
        $image2_extension = strtolower(pathinfo($image2['name'], PATHINFO_EXTENSION));

        // Kiểm tra ảnh 1
        if (!in_array($image1_extension, $allowed_extensions)) {
            echo "Ảnh 1 không hợp lệ! Chỉ hỗ trợ các định dạng jpg, jpeg, png, gif, webp.";
            exit();
        }

        // Kiểm tra ảnh 2
        if (!in_array($image2_extension, $allowed_extensions)) {
            echo "Ảnh 2 không hợp lệ! Chỉ hỗ trợ các định dạng jpg, jpeg, png, gif, webp.";
            exit();
        }

        // Kiểm tra kích thước tệp (max 10MB)
        $maxFileSize = 10 * 1024 * 1024;  // 10MB
        if ($image1['size'] > $maxFileSize) {
            echo "Ảnh 1 quá lớn! Chỉ chấp nhận tệp có kích thước dưới 10MB.";
            exit;
        }

        if ($image2['size'] > $maxFileSize) {
            echo "Ảnh 2 quá lớn! Chỉ chấp nhận tệp có kích thước dưới 10MB.";
            exit;
        }

        // Đặt tên file mới và đường dẫn lưu
        $image1_name = uniqid('flower_') . '.' . $image1_extension;
        $image2_name = uniqid('flower_') . '.' . $image2_extension;

        // Đảm bảo target_dir được khai báo trước khi sử dụng
        $target_dir = "../images/";

        // Tạo thư mục nếu chưa tồn tại
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 777, true); 
        }

        $image1_target = $target_dir . $image1_name;
        $image2_target = $target_dir . $image2_name;

        // Di chuyển ảnh vào thư mục đích
        if (move_uploaded_file($image1['tmp_name'], $image1_target) && move_uploaded_file($image2['tmp_name'], $image2_target)) {
            // Lưu thông tin vào session
            if (!isset($_SESSION['flowers'])) {
                $_SESSION['flowers'] = [];
            }

            // Thêm thông tin sản phẩm vào session, bao gồm ảnh
            $_SESSION['flowers'][] = [
                'name' => $name,
                'description' => $description,
                'image1' => $image1_target,
                'image2' => $image2_target
            ];

            // Chuyển hướng về trang quản lý sản phẩm
            header("Location: admin_view.php");
            exit();
        } else {
            echo "Lỗi khi tải lên ảnh. Vui lòng thử lại.";
            exit();
        }
    } else {
        // Nếu không có dữ liệu hợp lệ, quay lại form

        var_dump($_FILES);

        header('Location: add_form.php');
        exit();
    }
?>
