<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoa | Chọn người dùng</title>
    <link rel="stylesheet" href="../public/output.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-100 via-teal-200 to-green-300">
    <header class="bg-white">
        <div class='w-full h-[100px] flex justify-between px-[50px] mb-[40px] shadow-xl'>
            <div class='flex items-center gap-7 text-[22px] text-gray-700'>
                <a href="index.php" class='text-red-500 font-bold'>
                    Trang chủ
                </a>

                <a href="guest_view.php" class='pl-7 border-l-2 border-black text-black'>
                    Khách
                </a>

                <a href="admin_view.php" class='text-black'>
                    Quản trị
                </a>
            </div>
        </div>
    </header>

    <main>
        <div class="bg-white flex flex-col items-center justify-center py-20 mx-96 shadow-xl rounded-xl">
            <p class="font-bold text-4xl text-center text-black">
                Bạn là?
            </p>

            <div class="flex justify-center gap-10 pt-12">
                <button class="px-6 py-4 text-lg font-semibold text-white bg-blue-500 rounded-xl shadow-lg transform transition-transform hover:scale-105 hover:bg-blue-400 focus:outline-none">
                    <a href="guest_view.php">Người dùng khách</a> 
                </button>
                <button class="px-6 py-3 text-lg font-semibold text-white bg-red-500 rounded-xl shadow-lg transform transition-transform hover:scale-105 hover:bg-red-400 focus:outline-none">
                    <a href="admin_view.php">Người dùng quản trị</a>
                </button>
            </div>
        </div>
    </main>
</body>
</html>
