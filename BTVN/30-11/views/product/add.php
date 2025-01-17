<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
        require_once APP_ROOT.'/views/home/header.php';
    ?>
    <div class="container mt-5">
        <h2 class="mb-4 fw-bold">Thêm sản phẩm</h2>
        
        <form action="index.php?action=add" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Tên sản phẩm:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label fw-semibold">Giá:</label>
                <input type="text" id="price" name="price" class="form-control" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
                <a href="index.php?action=index" class="btn btn-secondary ms-2">Quay lại</a>
            </div>
        </form>
    </div>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>