<?php
session_start();
$id = $_GET["id"];
$quantity = $_GET["quantity"];
$action = $_GET["action"];
if ($action == 'up') {
    $_SESSION["cart"][$id]['quantity'] = $quantity + 1;
} else if ($action == 'down') {
    $_SESSION["cart"][$id]['quantity'] = $quantity - 1;
}
header('Location: ../cart.php');
