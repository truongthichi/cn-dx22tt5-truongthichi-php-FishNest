<?php
// Nhận từ khóa người dùng nhập
$query = $_GET['query'] ?? '';
$query = strtolower(trim($query));

// Điều hướng theo từ khóa
if (strpos($query, 'cá rồng') !== false || strpos($query, 'ca rong') !== false) {
    header("Location: carong.php");
    exit();
} elseif (strpos($query, 'cá betta') !== false || strpos($query, 'ca betta') !== false) {
    header("Location: cabetta.php");
    exit();
} elseif (strpos($query, 'cá lóc') !== false || strpos($query, 'ca loc') !== false) {
    header("Location: caloc.php");
    exit();
} else {
    echo "<div style='text-align:center;padding:50px;'>
      <h3>🔍 Không tìm thấy kết quả phù hợp!</h3>
      <a href='trangchu.php' class='btn btn-primary'>⬅ Quay về trang chủ</a>
    </div>";
}
?>
