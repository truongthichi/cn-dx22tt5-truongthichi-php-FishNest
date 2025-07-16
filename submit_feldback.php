<?php
// Kết nối CSDL
$conn = new mysqli('localhost', 'root', '', 'tonghop');
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("❌ Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$comments = $_POST['comments'] ?? '';

// Bảo vệ dữ liệu
$name = trim($name);
$email = trim($email);
$comments = trim($comments);

// Lưu dữ liệu vào bảng feldback
$stmt = $conn->prepare("INSERT INTO feldback (name, email, comments) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $comments);

if ($stmt->execute()) {
    echo '
    <style>
      .success-box {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: linear-gradient(135deg, #dff9fb, #c7ecee);
        color: #2f3640;
        padding: 30px;
        border-radius: 12px;
        font-size: 20px;
        font-family: "Segoe UI", sans-serif;
        text-align: center;
        box-shadow: 0 0 15px rgba(0,0,0,0.2);
        z-index: 9999;
        animation: fadeIn 0.8s ease;
      }

      @keyframes fadeIn {
        from { opacity: 0; transform: translate(-50%, -60%); }
        to { opacity: 1; transform: translate(-50%, -50%); }
      }
    </style>

    <div class="success-box">
      ✅ Gửi phản hồi thành công!<br>Cảm ơn bạn đã liên hệ 🐟
    </div>

    <script>
      setTimeout(function() {
        window.location.href = "trangchu.php";
      }, 3000);
    </script>
    ';
}

else {
    echo "<div class='alert alert-danger'>❌ Có lỗi khi gửi phản hồi: " . $stmt->error . "</div>";
}

$stmt->close();
$conn->close();
?>
