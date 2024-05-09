<!DOCTYPE html>
<html>
<head>
    <title>Hiển thị mã QR</title>
</head>
<body>
    <a href="http://localhost/web_quan_ao/"> Quay Lại Trang Chủ</a>
    <h1>Mã QR thanh toán</h1>

    <form method="post">
        <label for="product_code">Nhập mã sản phẩm:</label>
        <input type="text" id="product_code" name="product_code">
        <button type="submit">Tạo mã QR</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy mã sản phẩm từ ô input
        $product_code = $_POST["product_code"];

        // Tạo dữ liệu dựa trên mã sản phẩm (ví dụ: số tiền)
        // Trong ví dụ này, chúng ta sử dụng mã sản phẩm làm số tiền, bạn cần điều chỉnh dữ liệu thật của bạn
        $amount = $product_code;

        // Tạo mã QR dựa trên dữ liệu
        include('path_to_qrcode_library/qrlib.php');
        $data = "Mã sản phẩm: $product_code\nSố tiền: $amount";
        $filename = 'qrcode.png';
        QRcode::png($data, $filename);

        // Hiển thị hình ảnh mã QR
        echo '<h2>Thông tin sản phẩm:</h2>';
        echo "<p>Mã sản phẩm: $product_code</p>";
        echo "<p>Số tiền: $amount</p>";
        echo '<h2>Mã QR thanh toán:</h2>';
        echo '<img src="' . $filename . '" alt="Mã QR">';
    }
    ?>
</body>
</html>
