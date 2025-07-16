<?php
session_start();
session_destroy(); // Xóa toàn bộ dữ liệu phiên (session)
header("Location: trangchu.php"); // Chuyển về trang chủ
exit();
