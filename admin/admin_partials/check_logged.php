<?php
session_start();
if (!empty($_SESSION["logged"])) {
    header("location: login.php");
}
