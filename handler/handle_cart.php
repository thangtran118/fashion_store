<?php
session_start();
include '../admin/admin_partials/alert.php';
$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];
$photo = $_POST["photo"];

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

$checker = array_column($_SESSION["cart"], 'id');
if (in_array($id, $checker)) {
    $_SESSION["cart"][$id]['quantity']++;
} else {
    $_SESSION["cart"][$id] = array('id' => $id, 'price' => $price, 'name' => $name, 'quantity' => 1, 'photo' => $photo);
}
alert("Product Added", "../product.php");
