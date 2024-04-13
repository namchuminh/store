<?php require(APPPATH.'views/'.'layouts/header.php'); ?>


<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Quản Lý Cài Đặt</h1>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                    <li class="active">Cài Đặt</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /# column -->
</div>

<form method="POST" enctype="multipart/form-data" class="row">

    <div class="col-lg-12">
        <div class="card alert">
            <div class="card-header">
                <h4>Nhập Thông Tin Quán</h4>
                <div class="card-header-right-icon">
                    <ul>
                        <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card-body">
                <div class="basic-form">
                        <div class="form-group">
                            <label>Tên Quán</label>
                            <input type="text" class="form-control" placeholder="Tên Quán *" name="tenquan" value="<?php echo $detail[0]['TenQuan'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input type="text" class="form-control" placeholder="Số Điện Thoại *" name="sodienthoai" value="<?php echo $detail[0]['SoDienThoai'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Mã QR Trang Chủ</label>
                            <br>
                            <img class="qr_img" src="<?php echo $detail[0]['MaQR'] ?>">
                            <input type="hidden" class="form-control maqr" name="maqr">
                            <br>
                            <br>
                            <a class="btn btn-warning print">In Mã QR</a>
                            <a class="btn btn-danger get">Lấy Mã Mới</a>
                        </div>
                        <div class="form-group">
                            <label>Mã QR Thanh Toán</label>
                            <input type="file" class="form-control" name="maqrthanhtoan">
                        </div>
                        <div class="form-group">
                            <label>Giờ Mở Cửa</label>
                            <input type="time" class="form-control" placeholder="Giờ Mở Cửa *" name="giomocua" value="<?php echo $detail[0]['GioMoCua'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Giờ Đóng Cửa</label>
                            <input type="time" class="form-control" placeholder="Giờ Đóng Cửa *" name="giodongcua" value="<?php echo $detail[0]['GioDongCua'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ Quán</label>
                            <input type="text" class="form-control" placeholder="Địa Chỉ Quán *" name="diachiquan" value="<?php echo $detail[0]['DiaChiQuan'] ?>">
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card alert">
            <div class="card-header">
                <h4>Nhập Thông Tin Ngân Hàng MB BANK</h4>
                <div class="card-header-right-icon">
                    <ul>
                        <li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
                    </ul>
                </div>
            </div>
            <br>
            <div class="card-body">
                <div class="basic-form">
                    <div class="form-group">
                        <label>Chủ Tài Khoản (MB BANK)</label>
                        <input type="text" class="form-control" placeholder="Chủ Tài Khoản" name="chutaikhoan" oninput="this.value = this.value.toUpperCase()" value="<?php echo $detail[0]['ChuTaiKhoan'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Số Tài Khoản (MB BANK)</label>
                        <input type="text" class="form-control" placeholder="Số Tài Khoản" name="sotaikhoan" value="<?php echo $detail[0]['SoTaiKhoan'] ?>">
                    </div>
                    <div class="form-group">
                        <label>API Lịch Sử Giao Dịch (<a href="https://my.casso.vn/login">Casso.vn</a>)</label>
                        <input type="text" class="form-control" placeholder="Api Key Lấy Bên Casso.vn *" name="apikeygiaodich" value="<?php echo $detail[0]['ApiGiaoDich'] ?>">
                    </div>
                    <div>
                        <a class="btn btn-default" href="<?php echo base_url('admin/'); ?>">Quay Lại</a>
                        <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</form>

<?php require(APPPATH.'views/'.'layouts/footer.php'); ?>

<script type="text/javascript">
    $(document).ready(function(){
        $('.print').click(function(){
            var qrImgSrc = $('.qr_img').attr('src');
            
            // Ẩn tất cả các phần tử khác trên trang
            $('body > *').hide();
            
            // Tạo một khung ảo để chứa hình ảnh QR và in nó
            var iframe = $('<iframe>', { 
                width: 1, 
                height: 1,
                css: { 
                    display: 'none' 
                },
                load: function() {
                    var iframeWindow = this.contentWindow || this.contentDocument.defaultView;
                    var printDocument = iframeWindow.document;
                    printDocument.open();
                    printDocument.write('<html><head><title>QR Code</title></head><body style="margin: 0;">');
                    printDocument.write('<img src="' + qrImgSrc + '" style="max-width: 100%;">');
                    printDocument.write('</body></html>');
                    printDocument.close();
                    iframeWindow.focus();
                    iframeWindow.print();
                    
                    // Hiển thị lại tất cả các phần tử sau khi in hoàn tất
                    $('body > *').show();
                }
            }).appendTo('body');
        });

        $('.get').click(function(e){
            var qr_code = 'https://api.qrserver.com/v1/create-qr-code/?data=' + '<?php echo base_url() ?>';
            $('.maqr').val(qr_code);
            $('.qr_img').attr('src', qr_code);
        })
    });
</script>
