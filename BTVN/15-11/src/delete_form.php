<?php
    // Khởi tạo session
    session_start();

    // Lấy id từ URL
    $index = $_GET['id'] ?? null;

    $products = $_SESSION['products'] ?? [];

    // Lấy thông tin sản phẩm cần xóa
    $productToDelete = $products[$index];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận xóa sản phẩm</title>
    <link rel="stylesheet" href="../public/output.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="w-full h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-lg w-[400px]">
            <h2 class="text-2xl font-bold mb-4">Xác nhận xóa</h2>
            <p>Bạn có chắc chắn muốn xóa sản phẩm: <strong><?= htmlspecialchars($productToDelete['name']); ?></strong>?</p>
            <form action="delete_process.php" method="post" class="mt-4">
                <input type="hidden" name="id" value="<?= $index ?>">
                <button type="submit" name="confirm" value="yes" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 mr-4">Có</button>
                <a href="index.php" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Không</a>
            </form>
        </div>
    </div>
</body>
</html>
