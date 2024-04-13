<?php require(APPPATH.'views/'.'layouts/header.php'); ?>


<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Quản Lý Nhân Viên</h1>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                    <li><a href="<?php echo base_url('admin/staff/'); ?>">Nhân Viên</a></li>
                    <li class="active">Thêm Nhân Viên</li>
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
                <h4>Nhập Thông Tin Nhân Viên</h4>
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
                            <label>Tên Nhân Viên</label>
                            <input type="text" class="form-control" placeholder="Tên Nhân Viên *" name="tennhanvien">
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input type="text" class="form-control" placeholder="Số Điện Thoại *" name="sodienthoai">
                        </div>
                        <div class="form-group">
                            <label>Quê Quán</label>
                            <input type="text" class="form-control" placeholder="Quê Quán *" name="quequan">
                        </div>
                        <div class="form-group">
                            <label>Tài Khoản</label>
                            <input type="text" class="form-control" placeholder="Tài Khoản *" name="taikhoan">
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu</label>
                            <input type="password" class="form-control" placeholder="Mật Khẩu *" name="matkhau">
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <input type="file" class="form-control" placeholder="Hình Ảnh *" name="hinhanh">
                        </div>
                        <div class="form-group">
                            <label>Phân Quyền</label>
                            <select class="form-control" name="phanquyen">
                                <option value="0" selected>Nhân Viên</option>
                                <option value="1">Quản Lý</option>
                            </select>
                        </div>
                        <br>
                        <div>
                        	<a class="btn btn-default" href="<?php echo base_url('admin/staff/'); ?>">Quay Lại</a>
                        	<button type="submit" class="btn btn-primary">Thêm Nhân Viên</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require(APPPATH.'views/'.'layouts/footer.php'); ?>
