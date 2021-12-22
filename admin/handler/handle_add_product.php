<?php

require '../../partials/connect.php';
require '../admin_partials/alert.php';

$name = $_POST["name"];
$price = $_POST["price"];
$description = $_POST["description"];
$category_id = $_POST["category_id"];

$target = "uploads/";
$file_path = $target . basename($_FILES['file']['name']);
$file_store = "../../uploads/" . basename($_FILES['file']['name']);

//Lấy phần mở rộng của file (jpg, png, ...)
$image_type = pathinfo($file_path, PATHINFO_EXTENSION);

//Những loại file được phép upload
$allow_types = array('jpg', 'png', 'jpeg');

if (in_array($image_type, $allow_types) && getimagesize($_FILES['file']['tmp_name'])) {
    move_uploaded_file($_FILES['file']['tmp_name'], $file_store);
} else {
    alert("chỉ được dùng file .png, .jpg, .jpeg!", "../add_product.php");
}

$sql = "
    INSERT INTO products( name, price, picture, description, category_id )
    VALUES(?,?,?,?,?)
";

$stmt = $connect->prepare($sql);
$stmt->bind_param('sdssi', $name, $price, $file_path, $description, $category_id);

if ($stmt->execute()) {
    $connect->close();
    alert("Success!", "../add_product.php");
} else {
    $connect->close();
    alert("error when query", "../add_product.php");
}
