<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 👤 Kiểm tra đăng nhập
if (!isset($_SESSION['username'])) {
    header("Location: trangchu.php");
    exit();
}

// 🛒 Kiểm tra giỏ hàng
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<script>alert('Giỏ hàng trống. Không thể thanh toán!'); window.location.href='giohang.php';</script>";
    exit();
}

// 🔗 Kết nối CSDL
$conn = new mysqli("localhost", "root", "", "tonghop");
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("❌ Lỗi kết nối CSDL: " . $conn->connect_error);
}

$username = $_SESSION['username'];
$hasError = false;

// 🧾 Lưu từng đơn và trừ kho theo số lượng mua
foreach ($_SESSION['cart'] as $index => $item) {
    if (!isset($item['id'], $item['description'], $item['price'])) {
        echo "❌ Sản phẩm thứ " . ($index + 1) . " thiếu thông tin!<br>";
        $hasError = true;
        continue;
    }

    // ⚖️ Xác định số lượng khách mua (mặc định 1)
    $soLuongMua = isset($item['quantity']) && is_numeric($item['quantity']) && $item['quantity'] > 0
        ? intval($item['quantity'])
        : 1;

    // 💾 Lưu đơn hàng
    $sql = "INSERT INTO donhang (username, sanpham_id, ten_sanpham, gia, soluong, ngay_dat)
            VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sisdi", $username, $item['id'], $item['description'], $item['price'], $soLuongMua);
        if ($stmt->execute()) {
            // 🔽 Trừ kho chính xác theo số lượng đã mua
            $updateSql = "UPDATE cacloaica SET quantity = quantity - ? WHERE id = ?";
            $updateStmt = $conn->prepare($updateSql);
            if ($updateStmt) {
                $updateStmt->bind_param("ii", $soLuongMua, $item['id']);
                $updateStmt->execute();
            } else {
                echo "⚠️ Không thể cập nhật kho: " . $conn->error . "<br>";
            }
        } else {
            echo "❌ Lỗi khi lưu đơn hàng: " . $stmt->error . "<br>";
            $hasError = true;
        }
    } else {
        echo "❌ Lỗi SQL: " . $conn->error . "<br>";
        $hasError = true;
    }
}

$conn->close();

// 🎉 Giao dịch xong xuôi
if (!$hasError) {
    unset($_SESSION['cart']);
    echo '
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div style="display:flex;justify-content:center;align-items:center;height:100vh;background:#f0fcff;">
      <div class="alert alert-success text-center" style="font-size:20px;">
        ✅ Bạn đã đặt hàng thành công!<br>
        Cảm ơn bạn đã mua sắm tại FishNest 🐟
      </div>
    </div>
    <script>
      setTimeout(function() {
        window.location.href = "trangchu.php";
      }, 3000);
    </script>
    ';
} else {
    echo "<div style='text-align:center;color:red;margin-top:20px;'>❌ Có lỗi xảy ra, hãy kiểm tra giỏ hàng và thử lại!</div>";
}
?>
