<?php require(APPPATH.'views/'.'layouts/header.php'); ?>


<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Đổi Mật Khẩu</h1>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                    <li class="active">Đổi Mật Khẩu</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /# column -->
</div>

<div class="row">

    <div class="col-lg-12">
        <div class="card alert">
            <div class="card-header">
                <h4>Nhập Mật Khẩu</h4>
                <div class="card-header-right-icon">
                    <ul>
                        <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card-body">
                <div class="basic-form">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Mật Khẩu Cũ</label>
                            <input type="password" class="form-control" placeholder="Mật Khẩu Cũ *" name="matkhaucu">
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu Mới</label>
                            <input type="password" class="form-control" placeholder="Mật Khẩu Mới *" name="matkhaumoi">
                        </div>
                        <div class="form-group">
                            <label>Nhập Lại Mật Khẩu</label>
                            <input type="password" class="form-control" placeholder="Nhập Lại Mật Khẩu *" name="matkhaumoi2">
                        </div>
                        <div>
                        	<a class="btn btn-default" href="<?php echo base_url('admin/'); ?>">Quay Lại</a>
                        	<button type="submit" class="btn btn-primary">Đổi Mật Khẩu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require(APPPATH.'views/'.'layouts/footer.php'); ?>
