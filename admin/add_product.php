<?php
include './admin_partials/check_logged.php';
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
            <section class="content">
                <div class="row">
                    <div class="col-sm-offset-3 col-sm-6">
                        <div class="box">
                            <div class="box-header">
                                <h2 class="box-title">Add Product</h2>
                            </div>
                            <!-- form start -->
                            <form role="form" action="handler/handle_add_product.php" method="post" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter product's name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control" id="price" placeholder="Enter product's price" name="price">
                                    </div>
                                    <div class="form-group">
                                        <label for="picture">File input</label>
                                        <input type="file" id="picture" name="file">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea rows="10" class="form-control" id="description" placeholder="Enter product's description" name="description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="category_id" id="category" style="display: block; min-width: 150px; min-height: 40px;">
                                            <?php
                                            $sql = "SELECT * FROM categories";
                                            $result = $connect->query($sql);
                                            while ($row = $result->fetch_assoc()) { ?>
                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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