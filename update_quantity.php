<?php
session_start();

if (isset($_POST['quantity']) && is_array($_POST['quantity'])) {
    foreach ($_POST['quantity'] as $id => $qty) {
        $qty = max(1, intval($qty)); // Đảm bảo số lượng ≥ 1
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] = $qty;
        }
    }
}

header("Location: giohang.php");
exit();
