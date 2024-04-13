<?php require(APPPATH.'views/'.'layouts/header.php'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="page-title">
                        <h1>Danh Sách Chuyên Mục</h1>
                    </div>
                </div>
                <div class="card alert">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Hình Ảnh</th>
                                        <th>Tên Chuyên Mục</th>
                                        <th>Mô Tả</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list as $key => $value): ?>
                                        <tr>
                                            <th scope="row"><?php echo $key + 1; ?></th>
                                            <th style="width: 0px;">
                                                <img src="<?php echo $value['HinhAnh']; ?>" style="width: 100px; height: 100px;">
                                            </th>
                                            <td><b><?php echo $value['TenChuyenMuc']; ?></b></td>
                                            <td>
                                                <?php echo substr($value['MoTa'], 0, 50); ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-success w-100" href="<?php echo base_url('admin/category/'.$value['MaChuyenMuc'].'/update/') ?>">Xem Chi Tiết</a>
                                                <?php if($_SESSION['role'] == 1){ ?>
                                                    <hr>
                                                    <a class="btn btn-danger w-100" href="<?php echo base_url('admin/category/'.$value['MaChuyenMuc'].'/delete/') ?>">Xóa Chuyên Mục</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require(APPPATH.'views/'.'layouts/footer.php'); ?>
