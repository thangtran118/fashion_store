<?php
include './admin_partials/check_logged.php';
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
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Alexander Pierce</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Products</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="show_products.php"><i class="fa fa-circle-o"></i>Show Products</a></li>
                            <li><a href="add_product.php"><i class="fa fa-circle-o"></i> Add Product</a></li>
                            <li><a href="add_category.php"><i class="fa fa-circle-o"></i> Add Product's categories</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Account</li>
                    <li>
                        <a href="logout.php">
                            <i class="fa fa-dashboard"></i> <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
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
                                <h2 class="box-title">Add Category</h2>
                            </div>
                            <!-- form start -->
                            <form role="form" action="./handler/handle_add_category.php" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="categories" placeholder="Enter category" name="category">
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
        ?>
    </div>
</body>

</html>