<?php
session_start();
if (isset($_POST["login"])) {

    require '../partials/connect.php';

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT username, password FROM admins WHERE username=?";

    $stmt = $connect->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->bind_result($db_username, $db_password);
    $stmt->fetch();

    if ($username == $db_username && password_verify($password, $db_password)) {
        $_SESSION["logged"] = true;
        header('location: index.php');
    } else {
        header('location: login.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php
include './admin_partials/head.php';
?>

<style>

</style>

<body style="padding-top: 100px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Login</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="login.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Username</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" placeholder="admin" name="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" placeholder="admin" name="password">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right" name="login">Sign in</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>