<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoa | Người dùng khách</title>
    <link rel="stylesheet" href="../public/output.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200">
    <header class="bg-white">
        <div class='w-full h-[100px] flex justify-between px-[50px] mb-[40px] shadow-xl'>
            <div class='flex items-center gap-7 text-[22px] text-gray-700'>
                <a href="index.php" class='text-red-500'>
                    Trang chủ
                </a>

                <a href="guest_view.php" class='pl-7 border-l-2 border-black font-bold text-black'>
                    Khách
                </a>

                <a href="admin_view.php" class='text-black'>
                    Quản trị
                </a>
            </div>
        </div>
    </header>

    <main>
        <div class="mx-80 my-10 bg-white pl-36 pr-48 rounded-xl pt-10">
            <div>
                <?php
                    include 'flowers_list.php';

                    $index = 1;

                    if (isset($flowers)) {
                        foreach ($flowers as $flower) {
                            echo "<div class='flower w-[580px]'>";
                            echo "<p class='font-bold text-xl mb-2 pb-4'>{$index}. {$flower['name']}</p>";
                            echo "<p style='width: 580px'>{$flower['description']}</p>";
                            echo "<img src='{$flower['image1']}' alt='{$flower['name']}' width='580' class='pt-4 pb-4'>";
                            echo "<img src='{$flower['image2']}' alt='{$flower['name']}' width='580' class='pb-10'>";
                            echo "</div>";
                            $index += 1;
                        }
                    } else {
                        echo "Danh sách hoa không tồn tại.";
                    }
                ?>
            </div>
        </div>
    </main>
</body>