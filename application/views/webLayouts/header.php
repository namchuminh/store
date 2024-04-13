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
                    <li class="active"><a href="<?php echo base_url(); ?>"><i class="ti-menu"></i>Chọn Menu </a>
                    </li>
                    <li class="label">Liên Hệ</li>

                    <li><a><i class="ti-location-pin"></i>Địa Chỉ: <?php echo $setting[0]['DiaChiQuan']; ?></span></a>
                    </li>

                    <li><a><i class="ti-headphone-alt"></i>Liên Hệ: <?php echo $setting[0]['SoDienThoai']; ?></a>
                    </li>

                
                    <li><a><i class="ti-timer"></i>Mở Cửa: <?php echo explode(":",$setting[0]['GioMoCua'])[0].":".explode(":",$setting[0]['GioMoCua'])[1]; ?></a>
                    </li>

                    <li><a><i class="ti-timer"></i>Đóng Cửa: <?php echo explode(":",$setting[0]['GioDongCua'])[0].":".explode(":",$setting[0]['GioDongCua'])[1]; ?></a>
                    </li>

                    <li class="label">QR Thanh Toán</li>
                    <li>
                        <img src="https://api.vietqr.io/image/mbbank-<?php echo $setting[0]['SoTaiKhoan'] ?>-fTpTJka.jpg?accountName=<?php echo $setting[0]['ChuTaiKhoan'] ?>&amount=<?php echo $_SESSION['sumMenu']; ?>&addInfo=<?php echo $_SESSION['noidung']; ?>" style="width: 100%; height: 100%; padding: 10px; padding-top: 0px;">
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="pull-left">
            <div class="logo"><a href="<?php echo base_url(); ?>"><span><?php echo $setting[0]['TenQuan'] ?></span></a></div>
            <div class="hamburger sidebar-toggle">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
    </div>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <!-- /# row -->
                <div id="main-content">
                    