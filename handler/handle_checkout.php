<?php
session_start();
require '../partials/connect.php';
include '../admin/admin_partials/alert.php';

$name = $_POST["name"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$customer_id = $_SESSION["user_id"];
$total = 0;

foreach ($_SESSION["cart"] as $id => $item) {
    $total += ($item['quantity'] * $item['price']);
}

$sql = "
    INSERT INTO orders(
        customer_id,
        name,
        address,
        phone,
        total
    )
    VALUES(?, ?, ?, ?, ?)
";

$stmt = $connect->prepare($sql);
$stmt->bind_param('isssd', $customer_id, $name, $address, $phone, $total);
$stmt->execute();

$sql2 = "
    SELECT 
        max(id)
    FROM 
        orders 
    WHERE
        customer_id = '$customer_id'
";

$result = $connect->query($sql2);
$order_id = $result->fetch_assoc()['max(id)'];

foreach ($_SESSION["cart"] as $id => $item) {
    $quantity = $item["quantity"];
    $sql3 = "
        INSERT INTO order_details(
            order_id,
            product_id,
            quantity
        )
        VALUES('$order_id', '$id', '$quantity')
    ";
    $connect->query($sql3);
}

$connect->close();
unset($_SESSION["cart"]);
alert("Success", "../index.php");
