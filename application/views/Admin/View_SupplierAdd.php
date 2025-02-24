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
                    <li class="active">Thêm Nhà Cung Cấp</li>
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
                            <input type="text" class="form-control" placeholder="Tên Nhà Cung Cấp *" name="tennhacungcap">
                        </div>
                        <div class="form-group">
                            <label>Mô Tả</label>
                            <textarea class="form-control" rows="5" name="mota" placeholder="Mô Tả *"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <input type="file" class="form-control" placeholder="Hình Ảnh *" name="hinhanh">
                        </div>

                        <div class="form-group">
                            <label>Loại Món Ăn</label>
                            <select class="form-control select2" name="loaimonan[]" multiple>
                                <?php foreach ($category as $key => $value): ?>
                                    <option value="<?php echo $value['MaChuyenMuc'] ?>"><?php echo $value['TenChuyenMuc'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Trạng Thái</label>
                            <select class="form-control">
                                <option>Đang Cung Cấp</option>
                            </select>
                        </div>
                        <br>
                        <div>
                        	<a class="btn btn-default" href="<?php echo base_url('admin/supplier/'); ?>">Quay Lại</a>
                        	<button type="submit" class="btn btn-primary">Thêm Nhà Cung Cấp</button>
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
