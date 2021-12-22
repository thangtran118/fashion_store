<?php

require '../../partials/connect.php';
require '../admin_partials/alert.php';

$id = $_GET["id"];
$sql = "DELETE FROM `products` WHERE id=?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $connect->close();
    alert("Success!", "../show_products.php");
}
