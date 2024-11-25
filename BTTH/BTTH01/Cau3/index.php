<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" href="../public/output.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<?php
    // Đường dẫn tới file CSV
    $filename = "KTPM2.csv";

    // Mảng chứa dữ liệu sinh viên
    $sinhvien = [];

    // Mở file CSV
    if (($handle = fopen($filename, "r")) !== FALSE) {
        // Đọc dòng đầu tiên (tiêu đề)
        $headers = fgetcsv($handle, 1000, ",");

        /*
            -   File CSV KTPM2 gốc có Encoding là UTF-8 with BOM, có thể kiểm tra được bằng cách mở file CSV bằng Visual Studio Code, và nhìn vào phần Encoding ở góc dưới bên phải màn hình
            -   Khi lưu file CSV từ Excel, Excel thường lưu kèm BOM, nhất là với những file có ký tự đặc biệt hoặc dấu tiếng Việt
            -   Cụ thể là ô 'username' (key) chứa BOM, và code không thể xử lý -> Báo lỗi Undefined array key "username"
        */

        // Loại bỏ BOM nếu có trong tiêu đề
        $headers = array_map(function($header) {
            return ltrim($header, "﻿"); // Loại bỏ ký tự BOM
        }, $headers);

        // Đọc từng dòng dữ liệu
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $sinhvien[] = array_combine($headers, $data);
        }

        fclose($handle);
    }
?>

<body class="bg-slate-100">
    <main class="mx-24 pt-[20px] pb-[75px">
        <table class="text-[18px] w-full border border-gray-300 bg-white">
            <thead class="bg-gray-200 text-black font-bold h-[50px]">
                <tr>
                    <th class="py-3 px-4 border border-gray-300">Username</th>
                    <th class="py-3 px-4 border border-gray-300">Password</th>
                    <th class="py-3 px-4 border border-gray-300">Lastname</th>
                    <th class="py-3 px-4 border border-gray-300">Firstname</th>
                    <th class="py-3 px-4 border border-gray-300">City</th>
                    <th class="py-3 px-4 border border-gray-300">Email</th>
                    <th class="py-3 px-4 border border-gray-300">Course</th>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach ($sinhvien as $sv): ?>
                    <tr class="border-b-[1px] hover:bg-gray-100 transition">
                        <td class="py-4 px-4 border border-gray-300 font-bold" style="width: 15%"><?= htmlspecialchars($sv['username']); ?></td>
                        <td class="py-4 px-4 border border-gray-300 text-left" style="width: 15%"><?= htmlspecialchars($sv['password']); ?></td>
                        <td class="py-4 px-4 border border-gray-300 font-bold" style="width: 20%"><?= htmlspecialchars($sv['lastname']); ?></td>
                        <td class="py-4 px-4 border border-gray-300 text-left" style="width: 10%"><?= htmlspecialchars($sv['firstname']); ?></td>
                        <td class="py-4 px-4 border border-gray-300 font-bold" style="width: 15%"><?= htmlspecialchars($sv['city']); ?></td>
                        <td class="py-4 px-4 border border-gray-300 text-left" style="width: 20%"><?= htmlspecialchars($sv['email']); ?></td>
                        <td class="py-4 px-4 border border-gray-300 text-left" style="width: 5%"><?= htmlspecialchars($sv['course1']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>