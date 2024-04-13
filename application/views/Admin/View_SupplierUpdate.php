<?php require(APPPATH.'views/'.'layouts/header.php'); ?>


<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Quản Lý Nhà Cung Cấp</h1>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                    <li><a href="<?php echo base_url('admin/supplier/'); ?>">Nhà Cung Cấp</a></li>
                    <li class="active">Cập Nhật Nhà Cung Cấp</li>
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
                <h4>Nhập Thông Tin Nhà Cung Cấp</h4>
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
                            <label>Tên Nhà Cung Cấp</label>
                            <input type="text" class="form-control" placeholder="Tên Nhà Cung Cấp *" name="tennhacungcap" value="<?php echo $detail[0]['TenNhaCungCap'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Mô Tả</label>
                            <textarea class="form-control" rows="5" name="mota" placeholder="Mô Tả *"><?php echo $detail[0]['MoTa'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <input type="file" class="form-control" placeholder="Hình Ảnh *" name="hinhanh">
                        </div>

                        <div class="form-group">
                            <label>Loại Món Ăn</label>
                            <select class="form-control select2" name="loaimonan[]" multiple>
                                <?php foreach ($category as $key => $value): ?>
                                    <?php if(in_array($value['MaChuyenMuc'],$getCategory)){ ?>
                                        <option value="<?php echo $value['MaChuyenMuc'] ?>" selected><?php echo $value['TenChuyenMuc'] ?></option>
                                    <?php }else{ ?>
                                        <option value="<?php echo $value['MaChuyenMuc'] ?>"><?php echo $value['TenChuyenMuc'] ?></option>
                                    <?php } ?>
                                <?php endforeach ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Trạng Thái</label>
                            <select class="form-control" name="trangthai">
                                <?php if($detail[0]['TrangThai'] == 1){ ?>
                                    <option selected value="1">Đang Cung Cấp</option>
                                    <option value="2">Ngừng Cung Cấp</option>
                                <?php }else{ ?>
                                    <option value="1">Đang Cung Cấp</option>
                                    <option value="2" selected>Ngừng Cung Cấp</option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>
                        <div>
                        	<a class="btn btn-default" href="<?php echo base_url('admin/supplier/'); ?>">Quay Lại</a>
                            <?php if($_SESSION['role'] == 1){ ?>
                        	    <button type="submit" class="btn btn-primary">Cập Nhật Nhà Cung Cấp</button>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require(APPPATH.'views/'.'layouts/footer.php'); ?>
<!-- Bao gồm tệp CSS của Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
<script>
    // Khởi tạo Select2 cho các phần tử có lớp select2
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
