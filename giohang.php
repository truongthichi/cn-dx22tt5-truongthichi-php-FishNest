<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <title>Giỏ hàng của bạn | FishNest</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    .navbar-brand {
      font-weight: bold;
      font-size: 18px;
    }

    .cart-item {
      border: 1px solid #ddd;
      padding: 10px;
      margin-bottom: 15px;
      display: flex;
      align-items: center;
    }

    .cart-item img {
      max-width: 120px;
      margin-right: 15px;
    }

    .cart-details {
      flex-grow: 1;
    }

    .cart-actions {
      text-align: right;
    }

    .cart-summary {
      text-align: right;
      margin-top: 20px;
    }

    .cart-summary h4 {
      display: inline-block;
      margin-right: 20px;
      font-size: 18px;
      color: #333;
    }

    .cart-summary .btn {
      margin-left: 10px;
    }

    .btn-glow {
      box-shadow: 0 0 8px rgba(255, 193, 7, 0.6);
      position: relative;
      overflow: hidden;
    }

    .btn-glow::after {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
      animation: sparkle 4s linear infinite;
      pointer-events: none;
    }

    @keyframes sparkle {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }
  </style>
</head>

<body>

  <!-- 🔝 Navbar -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="trangchu.php">FishNest</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="trangchu.php">🏠 Trang chủ</a></li>
    </div>
  </nav>

  <!-- 🛒 Giỏ hàng -->
  <div class="container">
    <h2 class="text-center">🛒 Giỏ hàng của bạn</h2>
    <hr>

    <form action="update_quantity.php" method="POST">
      <?php

// Lấy giỏ hàng hoặc gán mảng rỗng nếu chưa tồn tại
$cart = $_SESSION['cart'] ?? [];

$tongTien = 0;

echo "<h2>Giỏ hàng của bạn 🐟</h2>";

if (!empty($cart)) {
    foreach ($cart as $id => $item) {
        $soLuong = isset($item['quantity']) ? intval($item['quantity']) : 1;
        $thanhTien = $item['price'] * $soLuong;
        $tongTien += $thanhTien;

        echo "<div class='cart-item'>";
        echo "<img src='hinhanh/" . htmlspecialchars($item['image_url']) . "' alt='Ảnh sản phẩm'>";
        echo "<div class='cart-details'>";
        echo "<strong>" . htmlspecialchars($item['description']) . "</strong><br>";
        echo "Giá: " . number_format($item['price']) . " VND<br>";

        echo "<label>Số lượng:</label> ";
        echo "<input type='number' name='quantity[$id]' value='{$soLuong}' min='1' style='width:60px;'> <br>";
        echo "Thành tiền: " . number_format($thanhTien) . " VND<br>";
        echo "</div>";
        echo "</div><hr>";
    }

    echo "<h3>Tổng tiền: " . number_format($tongTien) . " VND</h3>";
} else {
    echo "<p>Giỏ hàng đang trống 🛍️</p>";
}
?>

      <hr>
      <div class="cart-summary">
        <h4>Tổng tiền: <strong><?php echo number_format($tongTien); ?> VND</strong></h4>
        <a href="trangchu.php" class="btn btn-success">🎣 Mua thêm</a>
        <a href="clear_cart.php" class="btn btn-warning">🧹 Xóa tất cả</a>
        <button type="submit" class="btn btn-info">🔁 Cập nhật số lượng</button>
        <?php if (isset($_SESSION['username'])): ?>
          <a href="thanhtoan.php" class="btn btn-primary">💳 Thanh toán</a>
        <?php else: ?>
          <a href="#" onclick="yeuCauDangNhap(); return false;" class="btn btn-warning btn-glow">💳 Thanh toán</a>

        <?php endif; ?>
      </div>
    </form>
    <script>
      function yeuCauDangNhap() {
        alert("🔒 Vui lòng đăng nhập để tiếp tục thanh toán!");
        setTimeout(function() {
          window.location.href = "trangchu.php"; // hoặc đổi thành "dangnhap.php" nếu muốn
        }, 500); // đợi nửa giây để alert đóng xong
      }
    </script>



  </div>
</body>

</html>