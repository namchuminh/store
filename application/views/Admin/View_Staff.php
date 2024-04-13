<?php require(APPPATH.'views/'.'layouts/header.php'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="page-title">
                        <h1>Danh Sách Nhân Viên</h1>
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
                                        <th>Tên Nhân Viên</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Quê Quán</th>
                                        <th>Tài Khoản</th>
                                        <th>Phân Quyền</th>
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
                                            <td><b><?php echo $value['TenNhanVien']; ?></b></td>
                                            <td>
                                                <span class="badge badge-warning">
                                                    <?php echo $value['SoDienThoai']; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php echo $value['QueQuan']; ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-primary">
                                                    <?php echo $value['TaiKhoan']; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php if($value['PhanQuyen'] == 0){ ?>
                                                    <span class="badge badge-success">
                                                        Nhân Viên
                                                    </span>
                                                <?php }else{ ?>
                                                    <span class="badge badge-danger">
                                                        Quản Lý
                                                    </span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-success w-100" href="<?php echo base_url('admin/staff/'.$value['MaNhanVien'].'/update/') ?>">Xem Chi Tiết</a>
                                                <hr>
                                                <a class="btn btn-danger w-100" href="<?php echo base_url('admin/staff/'.$value['MaNhanVien'].'/delete/') ?>">Xóa Nhân Viên</a>
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
