<?php
session_start();
require '../partials/connect.php';
include '../admin/admin_partials/alert.php';

$password = $_POST["password"];
$email = $_POST["email"];

$sql = "
    SELECT 
        id, name, email, password
    FROM 
        customers
    WHERE 
        email = ?
";

$stmt = $connect->prepare($sql);
$stmt->bind_param('s', $email);
$stmt->execute();

$stmt->bind_result($user_name, $user_id, $user_email, $user_password);
$stmt->fetch();
if ($email == $user_email and password_verify($password, $user_password)) {
    $_SESSION["user_id"] = $user_id;
    $_SESSION["name"] = $user_name;
    $stmt->close();
    alert("login successful", "../index.php");
} else {
    alert("Error, missing email or password", "../login.php");
}
