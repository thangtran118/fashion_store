<?php
include './admin_partials/check_logged.php';
require '../partials/connect.php';
?>

<!DOCTYPE html>
<html>
<?php
include './admin_partials/head.php';
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php
        include './admin_partials/aside.php';
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h1 class="box-title">Product</h1>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php
                                $order_sql = "SELECT * FROM orders";
                                $result = $connect->query($order_sql);
                                $i = 0;
                                while ($row = $result->fetch_assoc()) {
                                    $i++;
                                ?>
                                    <h2>Orders: <?php echo $i ?></h2>
                                    <button class="btn btn-danger" onclick="location.href='./handler/remove_order.php?order_id=<?php echo $row['id'] ?>'">Xoá</button>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên người nhận</th>
                                                <th>Địa chỉ người nhận</th>
                                                <th>SĐT người nhận</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá sản phẩm</th>
                                                <th>Số lương</th>
                                                <th>Ngày đặt</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "
                                            SELECT
                                                orders.name, orders.address, orders.phone, orders.created_at,
                                                products.name, products.price,
                                                order_details.quantity
                                            FROM
                                                orders
                                            JOIN order_details ON orders.id = order_details.order_id
                                            JOIN products ON products.id = order_details.product_id
                                        ";
                                            $stmt = $connect->prepare($sql);
                                            $stmt->execute();
                                            $stmt->store_result();
                                            $stmt->bind_result($cus_name, $cus_address, $cus_phone, $order_time, $pro_name, $pro_price, $pro_quantity);
                                            $order = 1;
                                            while ($stmt->fetch()) { ?>
                                                <tr>
                                                    <td><?php echo $order; ?></td>
                                                    <td><?php echo $cus_name ?></td>
                                                    <td><?php echo $cus_address ?></td>
                                                    <td><?php echo $cus_phone ?></td>
                                                    <td><?php echo $pro_name ?></td>
                                                    <td>$<?php echo $pro_price ?></td>
                                                    <td><?php echo $pro_quantity ?></td>
                                                    <td><?php echo $order_time ?></td>
                                                </tr>
                                            <?php
                                                $order += 1;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <br><br>
                                <?php } ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php
        include './admin_partials/footer.php';
        $connect->close();
        ?>
    </div>
</body>

</html>