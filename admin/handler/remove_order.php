<?php

require '../../partials/connect.php';

$id = $_GET["order_id"];

$sql = "DELETE FROM orders WHERE id='$id'";

if ($connect->query($sql)) {
    header("location: ../show_orders.php");
}
