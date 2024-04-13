<?php require(APPPATH.'views/'.'layouts/header.php'); ?>


<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Quản Lý Sản Phẩm</h1>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                    <li><a href="<?php echo base_url('admin/product/'); ?>">Sản Phẩm</a></li>
                    <li><a href="<?php echo base_url('admin/product/'); ?>">Nhập Số Lượng</a></li>
                    <li class="active"><?php echo $detail[0]['TenSanPham'] ?></li>
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
                <h4>Thông Tin Sản Phẩm</h4>
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
                            <label>Tên Sản Phẩm</label>
                            <input type="text" class="form-control" placeholder="Tên Sản Phẩm *" name="tensanpham" value="<?php echo $detail[0]['TenSanPham'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Giá Bán</label>
                            <input type="number" class="form-control" placeholder="Giá Bán *" name="giaban" value="<?php echo $detail[0]['GiaBan'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Số Lượng Hiện Tại</label>
                            <input type="number" class="form-control" placeholder="Số Lượng *" name="soluong" value="<?php echo $detail[0]['SoLuong'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Số Lượng Nhập</label>
                            <input type="number" class="form-control" placeholder="Số Lượng Nhập Thêm *" name="soluongnhap">
                        </div>
                        <div class="form-group">
                            <label>Tổng Tiền Nhập</label>
                            <input type="number" class="form-control" placeholder="Tổng Tiền Nhập *" name="tongtien">
                        </div>
                        <div class="form-group">
                            <label>Nhà Cung Cấp</label>
                            <select class="form-control" name="manhacungcap">
                                <?php foreach ($supplier as $key => $value): ?>
                                    <option value="<?php echo $value['MaNhaCungCap']; ?>" selected><?php echo $value['TenNhaCungCap']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        
                        <br>
                        <div>
                        	<a class="btn btn-default" href="<?php echo base_url('admin/product/'); ?>">Quay Lại</a>
                        	<button type="submit" class="btn btn-primary">Nhập Số Lượng</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require(APPPATH.'views/'.'layouts/footer.php'); ?>

