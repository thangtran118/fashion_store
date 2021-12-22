<?php
include './admin_partials/check_logged.php';
require '../partials/connect.php';
?>

<!DOCTYPE html>
<html>
<?php
require '../partials/connect.php';
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
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên</th>
                                            <th>Giá</th>
                                            <th>Mô tả</th>
                                            <th>Thể loại</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "
                                            SELECT
                                                products.id,
                                                products.picture,
                                                products.name,
                                                products.price,
                                                products.description,
                                                categories.name
                                            FROM
                                                products
                                            JOIN categories ON products.category_id = categories.id
                                        ";
                                        $stmt = $connect->prepare($sql);
                                        $stmt->execute();
                                        $stmt->store_result();
                                        $stmt->bind_result($id, $photo_path, $name, $price, $desc, $category);

                                        $order = 1;
                                        while ($stmt->fetch()) { ?>
                                            <tr>
                                                <td><?php echo $order; ?></td>
                                                <td class="text-center"><img src="../<?php echo $photo_path ?>" alt="" width="100"></td>
                                                <td><?php echo $name ?></td>
                                                <td>$<?php echo $price ?></td>
                                                <td><?php echo $desc ?></td>
                                                <td><?php echo $category ?></td>
                                                <td class="text-center">
                                                    <a href="update_product.php?id=<?php echo $id ?>" class="btn btn-primary" style="width: 80px; margin-bottom: 10px;">Sửa</a>
                                                    <br>
                                                    <a href="handler/handle_delete_product.php?id=<?php echo $id ?>" class="btn btn-danger" style="width: 80px; margin-bottom: 10px;">Xoá</a>
                                                </td>
                                            </tr>
                                        <?php
                                            $order += 1;
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
        ?>
    </div>
</body>

</html>