<?php
    // Khởi tạo danh sách sản phẩm mặc định
    $products = [
        ['name' => 'Sản phẩm 1', 'price' => '1000'],
        ['name' => 'Sản phẩm 2', 'price' => '2000'],
        ['name' => 'Sản phẩm 3', 'price' => '3000']
    ];

    // // Sử dụng GET
    // // Kiểm tra nếu có dữ liệu GET từ form
    // if (isset($_GET['name']) && isset($_GET['price'])) {
    //     $newProduct = [
    //         'name' => htmlspecialchars($_GET['name']),
    //         'price' => htmlspecialchars($_GET['price'])
    //     ];
    //     $products[] = $newProduct;
    // }


    // Sử dụng POST & session
    // Khởi tạo session
    session_start();
    
    // Kiểm tra nếu có sản phẩm trong session và kết hợp
    if (!isset($_SESSION['products'])) {
        $_SESSION['products'] = $products;
    }
    
    // Xóa session
    // unset($_SESSION['products']);
?>

<main class="mx-[250px] pt-[20px] pb-[75px]">
    <div class="pb-[20px]">
        <a href="add_form.php" class="bg-green-700 text-white px-3 py-2 rounded-lg shadow hover:bg-green-800">Thêm mới</a>
    </div>

    <table class="text-[20px] border-spacing-y-5 w-full">
        <thead class="text-black font-bold border-b-[1px] h-[50px]">
            <tr>
                <td class="pr-96 py-3">Sản phẩm</td>
                <td class="pr-80 py-3">Giá thành</td>
                <td class="pr-48 py-3">Sửa</td>
                <td class="pr-48 py-3">Xóa</td>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($_SESSION['products'] as $index => $product): ?>
                <tr class="border-b-[1px]">
                    <td class="pr-96 font-bold py-4"><?= htmlspecialchars($product['name']); ?></td>
                    <td class="pr-80 py-4"><?= htmlspecialchars($product['price']); ?> VND</td>
                    <td class="pr-48 text-blue-600 py-4">
                    <a href="edit_form.php?id=<?= $index ?>">
                        <button>
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>
                    </td>
                    <td class="pr-48 text-blue-600 py-4">
                        <a href="delete_form.php?id=<?= $index ?>">
                            <button>
                                <i class="fas fa-trash"></i>
                            </button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>