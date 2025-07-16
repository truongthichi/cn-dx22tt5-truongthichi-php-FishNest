<?php

$conn = new mysqli('localhost', 'root', '', 'tonghop');

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $result = $conn->query("SELECT * FROM cacloaica WHERE id = $id");

    if ($result && $result->num_rows > 0) {
        $product = $result->fetch_assoc();

        // Khởi tạo giỏ hàng nếu chưa có
        if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Thêm hoặc ghi đè sản phẩm vào giỏ hàng (theo id)
        $_SESSION['cart'][$id] = $product;

        // Quay lại trang giỏ hàng
        header("Location: giohang.php");
        exit();
    } else {
        echo "Không tìm thấy sản phẩm 😢";
    }
} else {
    echo "Thiếu ID sản phẩm 🧐";
}
?>
