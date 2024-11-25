<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoa | Người dùng quản trị</title>
    <link rel="stylesheet" href="../public/output.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<?php
    include 'flowers_list.php';

    // Khởi tạo session
    session_start();

    // Kiểm tra nếu có sản phẩm trong session và kết hợp
    if (!isset($_SESSION['flowers'])) {
        $_SESSION['flowers'] = $flowers;
    }

    // Xóa session (nếu cần)
    // unset($_SESSION['flowers']);
?>

<body>
    <header class="bg-white">
        <div class='w-full h-[100px] flex justify-between px-[50px] mb-[40px] shadow-xl'>
            <div class='flex items-center gap-7 text-[22px] text-gray-700'>
                <a href="index.php" class='text-red-500'>
                    Trang chủ
                </a>

                <a href="guest_view.php" class='pl-7 border-l-2 border-black text-black'>
                    Khách
                </a>

                <a href="admin_view.php" class='text-black font-bold'>
                    Quản trị
                </a>
            </div>
        </div>
    </header>

    <main class="mx-24 pt-[20px] pb-[75px]">
        <div class="pb-10">
            <a href="add_form.php" class="bg-green-400 text-white px-5 py-3 rounded-lg shadow hover:bg-green-700 transition">
                Thêm mới
            </a>
        </div>

        <table class="text-[18px] w-full border border-gray-300">
            <thead class="bg-gray-200 text-black font-bold h-[50px]">
                <tr>
                    <th class="py-3 px-4 border border-gray-300">Hoa</th>
                    <th class="py-3 px-4 border border-gray-300">Mô tả</th>
                    <th class="py-3 px-4 border border-gray-300">Ảnh</th>
                    <th class="py-3 px-4 border border-gray-300">Sửa</th>
                    <th class="py-3 px-4 border border-gray-300">Xóa</th>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach ($_SESSION['flowers'] as $index => $flower): ?>
                    <tr class="border-b-[1px] hover:bg-gray-100 transition">
                        <td class="py-4 px-4 border border-gray-300 font-bold" style="width: 8%"><?= htmlspecialchars($flower['name']); ?></td>

                        <td class="py-4 px-4 border border-gray-300 text-left" style="width: 25%"><?= htmlspecialchars($flower['description']); ?></td>

                        <td class="py-4 px-4 border border-gray-300" style="width: 6%">
                            <div class="flex justify-center items-center gap-4">
                                <img src="<?= htmlspecialchars($flower['image1']); ?>" alt="<?= htmlspecialchars($flower['name']); ?>" 
                                    class="w-20 h-20 object-cover rounded-lg">
                                <img src="<?= htmlspecialchars($flower['image2']); ?>" alt="<?= htmlspecialchars($flower['name']); ?>" 
                                    class="w-20 h-20 object-cover rounded-lg">
                            </div>
                        </td>

                        <td class="py-4 px-4 border border-gray-300 text-center text-blue-600" style="width: 2%">
                            <a href="edit_form.php?id=<?= $index ?>" class="hover:text-blue-800 transition">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>

                        <td class="py-4 px-4 border border-gray-300 text-center text-red-600" style="width: 2%">
                            <a href="delete_form.php?id=<?= $index ?>" class="hover:text-red-800 transition">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>