<?php

$hostname = "database";
$username = "root";
$pass = $_ENV['MYSQL_ROOT_PASSWORD'];
$db = "fashion_store";
$connect = mysqli_connect($hostname, $username, $pass, $db);
