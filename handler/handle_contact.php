<?php

require '../partials/connect.php';

$email = $_POST["email"];
$msg = $_POST["msg"];

$sql = "
    INSERT INTO contact(email, msg)
    VALUES(?, ?)
";

$query = $connect->prepare($sql);
$query->bind_param('ss', $email, $msg);

if ($query->execute()) {
    $script = "
        <script type='text/javascript'>
            alert('Success!');
            window.location.href='../contact.php';
        </script>
    ";
    echo $script;
}
$connect->close();
