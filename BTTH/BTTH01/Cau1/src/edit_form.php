<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoa | Sửa</title>
    <link rel="stylesheet" href="../public/output.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<?php
    session_start();

    // Lấy id từ URL
    $index = $_GET['id'] ?? null;

    // Xác định hoa dựa trên chỉ số
    $flower = $_SESSION['flowers'][$index];
?>

<body class="bg-gray-100">
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

    <main class="mx-auto max-w-4xl pt-10 pb-16">
        <div class="w-full mb-8">
            <p class="font-bold text-[30px] text-gray-800">Sửa thông tin hoa</p>
            <p class="text-gray-600">Vui lòng điền đầy đủ thông tin bên dưới trước khi xác nhận sửa.</p>
        </div>

        <form action="edit_process.php" method="post" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-8 space-y-6">
            <input type="hidden" name="id" value="<?= $index ?>">
            <div class="grid grid-cols-12 gap-8 items-center">
                <label for="name" class="col-span-2 font-medium text-gray-700">Tên:</label>
                <input 
                    type="text"
                    id="name" 
                    name="name"
                    value="<?= htmlspecialchars($flower['name']); ?>"
                    class="col-span-10 border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" 
                    required>
            </div>

            <div class="grid grid-cols-12 gap-8 items-center">
                <label for="description" class="col-span-2 font-medium text-gray-700">Mô tả:</label>
                <textarea 
                    id="description" 
                    name="description" 
                    class="col-span-10 border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" 
                    required><?= htmlspecialchars($flower['description']); ?></textarea>
            </div>

            <div class="grid grid-cols-12 gap-8 items-center">
                <label for="image1" class="col-span-2 font-medium text-gray-700">Ảnh 1:</label>
                <img src="<?= htmlspecialchars($flower['image1']); ?>" alt="Ảnh 1" class="col-span-2 w-28 h-28 object-cover rounded-lg">
                <input 
                    type="file"  
                    id="image1" 
                    name="image1" 
                    class="col-span-8 border border-gray-300 rounded-lg p-2 focus:outline-none" 
                >
            </div>

            <div class="grid grid-cols-12 gap-8 items-center">
                <label for="image2" class="col-span-2 font-medium text-gray-700">Ảnh 2:</label>
                <img src="<?= htmlspecialchars($flower['image2']); ?>" alt="Ảnh 2" class="col-span-2 w-28 h-28 object-cover rounded-lg">
                <input 
                    type="file" 
                    id="image2"
                    name="image2" 
                    class="col-span-8 border border-gray-300 rounded-lg p-2 focus:outline-none" 
                >
            </div>

            <div class="text-center">
                <input 
                    type="submit" 
                    value="Cập nhật hoa" 
                    class="bg-blue-500 hover:bg-blue-700 text-white px-6 py-2 rounded-lg cursor-pointer transition">
            </div>
        </form>
    </main>
</body>
</html>
