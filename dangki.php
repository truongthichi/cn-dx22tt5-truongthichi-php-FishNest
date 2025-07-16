<?php
// Kết nối đến CSDL
$conn = new mysqli("localhost", "root", "", "tonghop");
$conn->set_charset("utf8");

if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}

// Nhận dữ liệu từ form
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirmPassword'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$address = $_POST['address'] ?? '';

// Kiểm tra mật khẩu khớp
if ($password !== $confirmPassword) {
  echo '
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
      <div class="alert alert-danger text-center" style="font-size: 24px;">
        ❌ Mật khẩu không trùng khớp!
      </div>
    </div>
    <script>
      setTimeout(function() {
        history.back();
      }, 2000);
    </script>
  ';
  exit();
}

// Mã hóa mật khẩu
$hashPassword = password_hash($password, PASSWORD_DEFAULT);

// Chèn vào bảng nguoidung
$sql = "INSERT INTO nguoidung (username, password, email, phone, address) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $username, $hashPassword, $email, $phone, $address);

if ($stmt->execute()) {
  echo '
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
      <div class="alert alert-success text-center" style="font-size: 24px;">
        ✅ Đăng ký thành công! Đang chuyển về trang chủ...
      </div>
    </div>
    <script>
      setTimeout(function() {
        window.location.href = "trangchu.php";
      }, 2000);
    </script>
  ';
} else {
  echo '
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
      <div class="alert alert-warning text-center" style="font-size: 24px;">
        ⚠️ Lỗi: ' . $stmt->error . '
      </div>
    </div>
  ';
}

$stmt->close();
$conn->close();
?>
