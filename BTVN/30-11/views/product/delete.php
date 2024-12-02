<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận xóa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 fw-bold">Xác nhận xóa sản phẩm</h2>
        <p class="my-4">Bạn có chắc chắn muốn xóa sản phẩm <strong><?php echo $productToDelete->getName(); ?></strong> không?</p>

        <form action="index.php?action=delete&id=<?php echo $productToDelete->getId(); ?>" method="POST">
            <button type="submit" class="btn btn-danger">Xác nhận xóa</button>
            <a href="index.php?action=index" class="btn btn-secondary">Hủy bỏ</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>