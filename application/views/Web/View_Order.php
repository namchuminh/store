<?php require(APPPATH.'views/'.'webLayouts/header.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="row">
    <div class="col-lg-8 detail-order">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="page-title">
                        <h1>Chi Tiết Hóa Đơn </h1>
                    </div>
                </div>
                <div class="card alert">
                    <div class="card-body">
                        <div style="line-height: 30px; word-spacing: 2px;">
                            <span style="display: flex;">
                                <b>Mã Hóa Đơn: </b>
                                <p style="margin-left: 10px;" class="code-order">Chưa Có</p>
                            </span>
                            <span style="display: flex;">
                                <b>Thời Gian: </b>
                                <p style="margin-left: 10px;"><?php echo date('d/m/Y H:i:s'); ?></p>
                            </span>
                            <span style="display: flex;">
                                <b>Tổng Tiền: </b>
                                <p style="margin-left: 10px;"><?php echo number_format($sumOrder) ?> VND</p>
                            </span>
                            <span style="display: flex;">
                                <b>Thanh Toán: </b>
                                <p style="margin-left: 10px;" class="pay-status">Chưa Thanh Toán</p>
                            </span>
                        </div>
                        <div class="table-responsive" style="border: none;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="width: 150px;">Hình Ảnh</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                        <th style="text-align: left;">Đơn Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($detail as $key => $value): ?>
                                        <tr>
                                            <th scope="row"><?php echo $key + 1; ?></th>
                                            <td>
                                                <img src="<?php echo $value['hinhanh']; ?>" width="100px" height="100px">
                                            </td>
                                            <td><b><?php echo $value['tensanpham']; ?></b></td>
                                            <td><?php echo $value['soluong']; ?> sản phẩm</td>
                                            <td style="text-align: left;"><?php echo number_format($value['soluong'] * $value['giaban']); ?> VND</td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <br>
                            <a class="btn btn-success" href="<?php echo base_url(); ?>">Tiếp Tục Mua</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 pay-order">
       <div class="page-header">
            <div class="page-title">
                <h1>Thông Tin Thanh Toán</h1>
            </div>
        </div>

        <div class="card alert">
            <div class="card-body">
                <div class="table-responsive" style="border: none;">
                    <table class="table table">
                        <thead>
                            <tr>
                                <th>Nội Dung CK</th>
                                <th>Tổng Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span class="badge badge-primary" style="letter-spacing: 2px;">
                                        <?php echo $_SESSION['noidung']; ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-danger">
                                        <?php echo number_format($sumOrder) ?> VND
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <img src="https://api.vietqr.io/image/mbbank-<?php echo $setting[0]['SoTaiKhoan'] ?>-fTpTJka.jpg?accountName=<?php echo $setting[0]['ChuTaiKhoan'] ?>&amount=<?php echo $_SESSION['sumMenu']; ?>&addInfo=<?php echo $_SESSION['noidung']; ?>" style="display: block; margin-left: auto; margin-right: auto; width: 100%; height: 100%;">
                    <hr>
                    <p style="line-height: 30px; font-family: system-ui; font-size: 14px;">Lưu ý: 
                        <br>1. Bạn cần chuyển khoản đúng NỘI DUNG và SỐ TIỀN!
                        <br>2. Nếu nhập sai NỘI DUNG hoặc SỐ TIỀN, hệ thống không hoàn lại tiền!
                        <br>3. Hệ thống sẽ tự động xác nhận thanh toán khi khách hàng nhập đúng thông tin chuyển khoản!"    
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- /# column -->
</div>

<?php require(APPPATH.'views/'.'webLayouts/footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        var timeOutPost = 0;
        let intervalId = setInterval(function(){
            if(timeOutPost >= 40){
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    positionClass: 'toast-top-right', // Vị trí hiển thị
                    timeOut: 500000 // Thời gian tự động đóng
                };
                toastr.warning('Vui lòng tải lại trang và giao dịch lại!', 'Hết Thời Gian!');
                clearInterval(intervalId); // Ngừng setInterval khi timeOutPost quá 1 phút
            }else{
                let url_check_bank = '<?php echo base_url('order/pay/'); ?>';
                $.post(url_check_bank, function(data){
                    if(!isNaN(data)){
                        $('.pay-order').hide();
                        $('.pay-status').html('Thanh Toán QR');
                        $('.code-order').html('#' + data);
                        $('.col-lg-8.detail-order').removeClass('col-lg-8').addClass('col-lg-12');
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right', // Vị trí hiển thị
                            timeOut: 5000 // Thời gian tự động đóng
                        };
                        toastr.success('Thanh toán thành công! Xin cảm ơn!', 'Thành Công');
                        clearInterval(intervalId); // Ngừng setInterval khi data trả về là mã đơn hàng
                    }
                });
            }
            timeOutPost = timeOutPost + 1;
        }, 3000);
    });
</script>




