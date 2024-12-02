<?php
    $product = $productToEdit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <body>
        <?php
            require_once APP_ROOT.'/views/home/header.php';
        ?>
        <div class="container mt-5">
            <h2 class="mb-4 fw-bold">Cập nhật sản phẩm</h2>
            <form action="index.php?action=edit&id=<?php echo $product->getId(); ?>" method="POST">
                
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Tên sản phẩm:</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo $product->getName(); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label fw-semibold">Giá:</label>
                    <input type="number" id="price" name="price" class="form-control" value="<?php echo $product->getPrice(); ?>" required>
                </div>

                <div class="mb-3">
                    <input type="submit" value="Cập nhật" class="btn btn-success">
                    <a href="index.php?action=index" class="btn btn-secondary ms-2">Quay lại</a>
                </div>
            </form>
        </div>  
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>