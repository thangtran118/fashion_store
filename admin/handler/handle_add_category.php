<?php

require '../../partials/connect.php';
require '../admin_partials/alert.php';

$category = $_POST["category"];

$sql = "
    INSERT INTO categories(name)
    VALUES(?)
";

$query = $connect->prepare($sql);
$query->bind_param('s', $category);

if ($query->execute()) {
    $connect->close();
    alert("Success!", "../add_category.php");
}
