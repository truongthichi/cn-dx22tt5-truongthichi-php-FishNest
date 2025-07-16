<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'tonghop');
if ($conn->connect_error) {
  die("Lỗi kết nối: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Trang Quản Trị Kho Cá 🐠</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 40px;
      text-align: center;
    }
    .btn {
        font-size: 21px;
      padding: 10px 20px;
      margin: 10px;
      background-color: #27ae60;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 6px;
    }
    .btn:hover {
      background-color: #219150;
    }
    .section {
      display: none;
      margin-top: 30px;
      padding: 20px;
      border: 1px solid #ccc;
      background-color: #f9f9f9;
      text-align: left;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    th, td {
      border: 1px solid #aaa;
      padding: 8px;
      text-align: left;
    }
    img {
      width: 80px;
      height: auto;
    }
  </style>
  <script>
    function showSection(id) {
      document.querySelectorAll('.section').forEach(s => s.style.display = 'none');
      document.getElementById(id).style.display = 'block';
    }
  </script>
</head>
<body>

  <h1>Quản lý Kho Cá - FishNest Admin 🐟</h1>

  <button class="btn" onclick="showSection('loaica')">🦈 Các Loại Cá</button>
  <button class="btn" onclick="showSection('donhang')">📦 Đơn Hàng</button>
  <button class="btn" onclick="showSection('feedback')">💬 Phản Hồi</button>
  <button class="btn" onclick="showSection('nguoidung')">🙍‍♂️ Người Dùng</button>

  <!-- Các Loài Cá -->
  <div id="loaica" class="section">
    <h2>🦈 Các Loài Cá</h2>
    <?php
      $result = $conn->query("SELECT id, image_url, description, price, quantity FROM cacloaica");
      if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Ảnh</th><th>Mô tả</th><th>Giá</th><th>Số lượng</th></tr>";
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td><img src='hinhanh/{$row['image_url']}' alt='Ảnh cá'></td>
                  <td>{$row['description']}</td>
                  <td>" . number_format($row['price']) . " VND</td>
                  <td>{$row['quantity']}</td>
                </tr>";
        }
        echo "</table>";
      } else {
        echo "Không có dữ liệu.";
      }
    ?>
  </div>

  <!-- Đơn Hàng -->
  <div id="donhang" class="section">
    <h2>📦 Đơn Hàng</h2>
    <?php
      $result = $conn->query("SELECT id, username, sanpham_id, ten_sanpham, gia, soluong, ngay_dat FROM donhang");
      if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Người dùng</th><th>ID Sản phẩm</th><th>Tên SP</th><th>Giá</th><th>Số lượng</th><th>Ngày đặt</th></tr>";
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['username']}</td>
                  <td>{$row['sanpham_id']}</td>
                  <td>{$row['ten_sanpham']}</td>
                  <td>" . number_format($row['gia']) . " VND</td>
                  <td>{$row['soluong']}</td>
                  <td>{$row['ngay_dat']}</td>
                </tr>";
        }
        echo "</table>";
      } else {
        echo "Không có đơn hàng.";
      }
    ?>
  </div>

  <!-- Phản Hồi -->
  <div id="feedback" class="section">
    <h2>💬 Phản Hồi</h2>
    <?php
      $result = $conn->query("SELECT id, name, email, comments, created_at FROM feldback");
      if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Tên</th><th>Email</th><th>Bình luận</th><th>Thời gian</th></tr>";
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['comments']}</td>
                  <td>{$row['created_at']}</td>
                </tr>";
        }
        echo "</table>";
      } else {
        echo "Chưa có phản hồi.";
      }
    ?>
  </div>

  <!-- Người Dùng -->
  <div id="nguoidung" class="section">
    <h2>🙍‍♂️ Người Dùng</h2>
    <?php
      $result = $conn->query("SELECT id, username, password, email, phone, address, role FROM nguoidung");
      if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Tên Đăng Nhập</th><th>Mật khẩu</th><th>Email</th><th>Điện thoại</th><th>Địa chỉ</th><th>Vai trò</th></tr>";
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['username']}</td>
                  <td>{$row['password']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['phone']}</td>
                  <td>{$row['address']}</td>
                  <td>{$row['role']}</td>
                </tr>";
        }
        echo "</table>";
      } else {
        echo "Chưa có người dùng.";
      }
    ?>
  </div>

</body>
</html>
