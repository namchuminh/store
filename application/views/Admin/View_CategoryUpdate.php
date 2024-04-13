<?php require(APPPATH.'views/'.'layouts/header.php'); ?>


<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Quản Lý Chuyên Mục</h1>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                    <li><a href="<?php echo base_url('admin/category/'); ?>">Chuyên Mục</a></li>
                    <li class="active"><?php echo $detail[0]['TenChuyenMuc']; ?></li>
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
                <h4>Nhập Thông Tin Chuyên Mục</h4>
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
                            <label>Tên Chuyên Mục</label>
                            <input type="text" class="form-control" placeholder="Tên Chuyên Mục *" name="tenchuyenmuc" value="<?php echo $detail[0]['TenChuyenMuc']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Mô Tả</label>
                            <textarea class="form-control" rows="5" name="mota" placeholder="Mô Tả *"><?php echo $detail[0]['MoTa']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <input type="file" class="form-control" placeholder="Hình Ảnh *" name="hinhanh">
                        </div>
                        <br>
                        <div>
                        	<a class="btn btn-default" href="<?php echo base_url('admin/category/'); ?>">Quay Lại</a>
                            <?php if($_SESSION['role'] == 1){ ?>
                        	    <button type="submit" class="btn btn-primary">Cập Nhật Chuyên Mục</button>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require(APPPATH.'views/'.'layouts/footer.php'); ?>
