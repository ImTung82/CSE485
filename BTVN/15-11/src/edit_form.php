<?php
    session_start();

    $products = $_SESSION['products'] ?? [];

    // Lấy id từ URL
    $index = $_GET['id'] ?? null;

    // Xác định sản phẩm dựa trên chỉ số
    $product = $products[$index];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sản phẩm</title>
    <link rel="stylesheet" href="../public/output.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class='w-full h-[100px] flex justify-between px-[50px] mb-[40px] shadow-xl'>
            <div class='flex items-center gap-7 text-[22px] text-gray-700'>
                <a href="index.php" class='font-bold text-black'>
                    Administration
                </a>
                <button>Trang chủ</button>
                <button>Trang ngoài</button>
                <button class='font-bold text-black'>Thể loại</button>
                <button>Tác giả</button>
                <button>Bài viết</button>
            </div>
        </div>
    </header>

    <main class="mx-[250px] pt-[20px] pb-[75px]">
        <div class="w-full pb-[50px]">
            <div>
                <p class="font-bold text-[30px]">Sửa thông tin sản phẩm</p>
            </div>
        </div>

        <div>
            <form action="edit_process.php" method="post">
                <input type="hidden" name="id" value="<?= $index ?>">
                Tên sản phẩm: 
                <input type="text" name="name" value="<?= htmlspecialchars($product['name']); ?>" class="border-2 border-gray-500 rounded p-2 mb-4 mr-20" required>
                Giá: 
                <input type="text" name="price" value="<?= htmlspecialchars($product['price']); ?>" class="border-2 border-gray-500 rounded p-2 mb-4 mr-20" required> <br>
                <input type="submit" value="Cập nhật" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded cursor-pointer mr-10">
            </form>
        </div>
    </main>

    <footer>
        <div class="w-full border-t-2 border-black pt-[20px]">
            <div class="flex justify-center">
                <p class="font-bold text-[30px]">TLU'S MUSIC GARDEN</p>
            </div>
        </div>
    </footer>
</body>
</html>
