<?php

require '../partials/connect.php';
include '../admin/admin_partials/alert.php';

$name = $_POST["name"];
$password = $_POST["password"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$email = $_POST["email"];
$hashPassword = password_hash($password, PASSWORD_BCRYPT, ['salt']);

$sql = "
    INSERT INTO customers(name, email, password, phone, address)
    VALUES(?, ?, ?, ?, ?)
";

$stmt = $connect->prepare($sql);
$stmt->bind_param('sssss', $name, $email, $hashPassword, $phone, $address);
if ($stmt->execute()) {
    alert("register successful! Please login to order product!", "../login.php");
} else {
    alert("Email existed", "../register.php");
}

$connect->close();
