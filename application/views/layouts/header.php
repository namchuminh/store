<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="<?php echo base_url('public/admin/'); ?>css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('public/admin/'); ?>css/lib/themify-icons.css" rel="stylesheet">
    <link href="<?php echo base_url('public/admin/'); ?>css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="<?php echo base_url('public/admin/'); ?>css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('public/admin/'); ?>css/lib/unix.css" rel="stylesheet">
    <link href="<?php echo base_url('public/admin/'); ?>css/style.css" rel="stylesheet">
    <script src="<?php echo base_url('public/admin/'); ?>js/lib/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <li class="label">Hệ Thống</li>
                    <li class="active"><a href="<?php echo base_url('admin/'); ?>"><i class="ti-home"></i>Trang Chủ </a>
                    </li>
                    <li class="label">Thực Đơn</li>

                    <?php if($_SESSION['role'] == 1){ ?>

                        <li><a class="sidebar-sub-toggle"><i class="ti-view-grid"></i>Sản Phẩm <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="<?php echo base_url('admin/product/'); ?>">Danh Sách</a></li>
                                <li><a href="<?php echo base_url('admin/product/add/'); ?>">Thêm Mới</a></li>
                            </ul>
                        </li>

                        <li><a class="sidebar-sub-toggle"><i class="ti-menu"></i>Chuyên Mục <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="<?php echo base_url('admin/category/'); ?>">Danh Sách</a></li>
                                <li><a href="<?php echo base_url('admin/category/add/'); ?>">Thêm Mới</a></li>
                            </ul>
                        </li>

                        <li><a class="sidebar-sub-toggle"><i class="ti-truck"></i>Nhà Cung Cấp <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="<?php echo base_url('admin/supplier/'); ?>">Danh Sách</a></li>
                                <li><a href="<?php echo base_url('admin/supplier/add/'); ?>">Thêm Mới</a></li>
                            </ul>
                        </li>

                    <?php }else{ ?>
                        <li><a href="<?php echo base_url('admin/food/'); ?>"><i class="ti-view-grid"></i>Món Ăn </a>
                        </li>

                        <li><a href="<?php echo base_url('admin/category/'); ?>"><i class="ti-menu"></i>Loại Món Ăn </span></a>
                        </li>

                        <li><a href="<?php echo base_url('admin/supplier/'); ?>"><i class="ti-truck"></i>Nhà Cung Cấp </a>
                        </li>
                    <?php } ?>

                    <li class="label">Bán Hàng</li>
                    <li>
                        <a href="<?php echo base_url('admin/order/'); ?>"><i class="ti-receipt"></i>Hóa Đơn </a>
                    </li>

                    <?php if($_SESSION['role'] == 1){ ?>
                        <li class="label">Cửa Hàng</li>

                        <li><a class="sidebar-sub-toggle"><i class="ti-user"></i>Nhân Viên <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="<?php echo base_url('admin/staff/'); ?>">Danh Sách</a></li>
                                <li><a href="<?php echo base_url('admin/staff/add/'); ?>">Thêm Mới</a></li>
                            </ul>
                        </li>

                        <li><a href="<?php echo base_url('admin/setting/'); ?>"><i class="ti-settings"></i> Cài Đặt</a></li>
                    <?php } ?>

                    <li class="label">Cá Nhân</li>
                    <li><a href="<?php echo base_url('admin/password/'); ?>"><i class="ti-lock"></i> Đổi Mật Khẩu</a></li>
                    <li><a href="<?php echo base_url('admin/logout/'); ?>"><i class="ti-power-off"></i> Đăng Xuất</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="pull-left">
            <div class="logo"><a href="<?php echo base_url('admin/'); ?>"><span>Quản Trị Hệ Thống</span></a></div>
            <div class="hamburger sidebar-toggle">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>

        <div class="pull-right p-r-15">
            <ul>
                <li class="header-icon dib"><span class="user-avatar"> <?php echo $_SESSION['fullname']; ?> <i class="ti-angle-down f-s-10"></i></span>
                    <div class="drop-down dropdown-profile">
                        <div class="dropdown-content-body">
                            <ul>
                                <li><a href="<?php echo base_url('admin/password/'); ?>"><i class="ti-lock"></i> <span>Đổi Mật Khẩu</span></a></li>
                                <li><a href="<?php echo base_url('admin/logout/'); ?>"><i class="ti-power-off"></i> <span>Đăng Xuất</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <!-- /# row -->
                <div id="main-content">
                    