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
                    <li class="active">Thêm Sản Phẩm</li>
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
                <h4>Nhập Thông Tin Sản Phẩm</h4>
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
                            <input type="text" class="form-control" placeholder="Tên Sản Phẩm *" name="tensanpham">
                        </div>
                        <div class="form-group">
                            <label>Giá Bán</label>
                            <input type="number" class="form-control" placeholder="Giá Bán *" name="giaban">
                        </div>
                        <div class="form-group">
                            <label>Loại Sản Phẩm</label>
                            <select class="form-control" name="chuyenmuc">
                                <?php foreach ($category as $key => $value): ?>
                                    <option value="<?php echo $value['MaChuyenMuc']; ?>"><?php echo $value['TenChuyenMuc']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <input type="file" class="form-control" placeholder="Hình Ảnh *" name="hinhanh">
                        </div>
                        <div class="form-group">
                            <label>Mô Tả</label>
                            <textarea class="form-control editor" rows="5" name="mota" placeholder="Mô Tả *"></textarea>
                        </div>
                        <br>
                        <div>
                        	<a class="btn btn-default" href="<?php echo base_url('admin/product/'); ?>">Quay Lại</a>
                        	<button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require(APPPATH.'views/'.'layouts/footer.php'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.0/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea.editor',  // chọn các textarea muốn biến thành trình soạn thảo
    plugins: 'advlist autolink lists link image charmap print preview anchor',
    toolbar: 'undo redo | formatselect | bold italic strikethrough forecolor backcolor | link image | alignleft aligncenter alignright alignjustify | outdent indent | bullist numlist | removeformat | code',    
    menubar: false,
    height: 400
  });
</script>
