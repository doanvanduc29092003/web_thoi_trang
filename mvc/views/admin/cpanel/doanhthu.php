<!DOCTYPE html>
<html>

<head>
    <title>Lấy doanh thu theo ngày</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center;
        }

        .home_not {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            font-weight: bold;
        }

        input[type="date"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: #000;
        }
    </style>
</head>

<body>
    <h1><a href="http://localhost/web_quan_ao/admin/home">&larr; Quay về trang quản trị</a></h1>

    <div class="home_not">
        <h1>Lấy doanh thu theo ngày</h1>

        <form method="POST">
            <label for="date">Chọn ngày:</label>
            <input type="date" name="date">
            <input type="submit" value="Tìm kiếm">
        </form>

        <?php
        // Kết nối đến cơ sở dữ liệu
        $db = new mysqli('localhost', 'root', '', 'web_quanao');

        // Kiểm tra kết nối
        if ($db->connect_error) {
            die("Kết nối không thành công: " . $db->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $date = $_POST['date'];

            // Truy vấn doanh thu cho ngày được chọn
            $query1 = "SELECT SUM(total_mony) AS total_revenue FROM order_product WHERE DATE(create_at) = '$date'";

            $result1 = $db->query($query1);

            if ($result1) {
                $row = $result1->fetch_assoc();
                $totalRevenue = $row['total_revenue'];

                echo "Tổng số tiền cho ngày $date là: " . number_format($totalRevenue, 0, ',', '.') . " VNĐ";
            } else {
                echo "Không có dữ liệu doanh thu cho ngày $date.";
            }
        }

        $db->close();
        ?>
    </div>

    
</body>

</html>
