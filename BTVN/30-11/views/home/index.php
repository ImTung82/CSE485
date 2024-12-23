<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <?php
        require_once APP_ROOT.'/views/home/header.php';
    ?>

    <div class="container">
        <h3 class="text-center text-success my-3 fw-bold">Quản lý sản phẩm</h3>
        <a href="?action=add" class="btn btn-success my-3">Thêm mới</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá bán</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($products as $product) {
            ?>
                    <tr>
                        <th scope="row"><?= $product->getName(); ?></th>
                        <td><?= $product->getPrice(); ?></td>
                        <td>
                            <a href="?action=edit&id=<?= $product->getId(); ?>">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <a href="?action=delete&id=<?= $product->getId(); ?>">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </td>
                    </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>