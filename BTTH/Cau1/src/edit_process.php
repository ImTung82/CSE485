<?php
// Khởi tạo session
session_start();

$flowers = $_SESSION['flowers'] ?? [];

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description'])) {
    $index = intval($_POST['id']);
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);

    // Lấy thông tin ảnh image1 và image2 (nếu có)
    $image1 = $_FILES['image1'] ?? null;
    $image2 = $_FILES['image2'] ?? null;

    // Kiểm tra ảnh 1 và ảnh 2
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp']; 
    $maxFileSize = 10 * 1024 * 1024;
    $target_dir = "../images/"; 
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Nếu không có ảnh mới, giữ ảnh cũ
    $image1_target = $flowers[$index]['image1'];
    $image2_target = $flowers[$index]['image2'];

    // Kiểm tra ảnh 1 nếu có ảnh mới
    if ($image1 && $image1['error'] === UPLOAD_ERR_OK) {
        $image1_extension = strtolower(pathinfo($image1['name'], PATHINFO_EXTENSION));
        if (!in_array($image1_extension, $allowed_extensions)) {
            echo "Ảnh 1 không hợp lệ! Chỉ hỗ trợ các định dạng jpg, jpeg, png, gif, webp.";
            exit();
        }

        if ($image1['size'] > $maxFileSize) {
            echo "Ảnh 1 quá lớn! Chỉ chấp nhận tệp có kích thước dưới 10MB.";
            exit();
        }

        $image1_target = $target_dir . uniqid('flower_') . '.' . $image1_extension;
        if (!move_uploaded_file($image1['tmp_name'], $image1_target)) {
            echo "Lỗi tải ảnh 1.";
            exit();
        }
    }

    // Kiểm tra ảnh 2 nếu có ảnh mới
    if ($image2 && $image2['error'] === UPLOAD_ERR_OK) {
        $image2_extension = strtolower(pathinfo($image2['name'], PATHINFO_EXTENSION));
        if (!in_array($image2_extension, $allowed_extensions)) {
            echo "Ảnh 2 không hợp lệ! Chỉ hỗ trợ các định dạng jpg, jpeg, png, gif, webp.";
            exit();
        }

        if ($image2['size'] > $maxFileSize) {
            echo "Ảnh 2 quá lớn! Chỉ chấp nhận tệp có kích thước dưới 10MB.";
            exit();
        }

        $image2_target = $target_dir . uniqid('flower_') . '.' . $image2_extension;
        if (!move_uploaded_file($image2['tmp_name'], $image2_target)) {
            echo "Lỗi tải ảnh 2.";
            exit();
        }
    }

    $flowers[$index] = [
        'name' => $name,
        'description' => $description,
        'image1' => $image1_target,
        'image2' => $image2_target
    ];

    $_SESSION['flowers'] = $flowers;

    header("Location: admin_view.php");
    exit();
} else {
    header("Location: edit_form.php");
    exit();
}
?>
