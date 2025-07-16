<?php
session_start();
$conn = new mysqli("localhost", "root", "", "tonghop");
$conn->set_charset("utf8");

if ($conn->connect_error) {
  die("Lỗi kết nối: " . $conn->connect_error);
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT * FROM nguoidung WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
  $_SESSION['username'] = $user['username'];
  $_SESSION['role'] = $user['role']; // 👈 nếu bảng `nguoidung` có cột `role`


  echo '
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div style="display:flex;justify-content:center;align-items:center;height:100vh;">
      <div class="alert alert-success text-center" style="font-size:20px;">
        ✅ Đăng nhập thành công! Đang chuyển về trang chủ...
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <div style="display:flex;justify-content:center;align-items:center;height:100vh;">
      <div class="alert alert-danger text-center" style="font-size:20px;">
        ❌ Sai thông tin đăng nhập!
      </div>
    </div>
    <script>
      setTimeout(function() {
        history.back();
      }, 2000);
    </script>
  ';
  
}

$stmt->close();
$conn->close();
?>
