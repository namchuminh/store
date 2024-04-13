<?php require(APPPATH.'views/'.'layouts/header.php'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <div class="page-title">
                        <h1>Chi Tiết Hóa Đơn #<?php echo $order[0]['MaHoaDon'] ?></h1>
                    </div>
                </div>
                <div class="card alert">
                    <div class="card-body" id="printableArea">
                        <div style="line-height: 30px; word-spacing: 2px;">
                            <span style="display: flex;">
                                <b>Mã Hóa Đơn: </b>
                                <p style="margin-left: 10px;">#<?php echo $order[0]['MaHoaDon'] ?></p>
                            </span>
                            <span style="display: flex;">
                                <b>Thời Gian: </b>
                                <p style="margin-left: 10px;"><?php echo $order[0]['ThoiGian'] ?></p>
                            </span>
                            <span style="display: flex;">
                                <b>Tổng Tiền: </b>
                                <p style="margin-left: 10px;"><?php echo number_format($order[0]['TongTien']) ?> VND</p>
                            </span>
                            <span style="display: flex;">
                                <b>Thanh Toán: </b>
                                <p style="margin-left: 10px;"><?php echo $order[0]['ThanhToan'] == 1 ? "Thanh Toán QR" : "Chưa Thanh Toán"; ?> </p>
                            </span>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="width: 150px;" class="print_none">Hình Ảnh</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                        <th style="text-align: left;">Đơn Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($detail as $key => $value): ?>
                                        <tr>
                                            <th scope="row"><?php echo $key + 1; ?></th>
                                            <td class="print_none">
                                                <img src="<?php echo $value['HinhAnh']; ?>" width="100px" height="100px">
                                            </td>
                                            <td><b><?php echo $value['TenSanPham']; ?></b></td>
                                            <td><?php echo $value['SoLuong']; ?> sản phẩm</td>
                                            <td style="text-align: left;"><?php echo number_format($value['SoLuong'] * $value['GiaBan']); ?> VND</td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div>
                            <a class="btn btn-default" id="backBtn" href="<?php echo base_url('admin/order/'); ?>">Quay Lại</a>
                            <button id="printInvoiceBtn" type="submit" class="btn btn-primary" onclick="printDiv()">Xuất Hóa Đơn</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require(APPPATH.'views/'.'layouts/footer.php'); ?>

<style type="text/css">
    @media print {
        .sidebar {
            display: none !important;
            width: 0px;
        }

        .sidebar.sidebar-shrink ~ .content-wrap{
            margin-left: 0px;
        }

        #printInvoiceBtn{
            display: none !important;
        }

        #backBtn{
            display: none !important;
        }

        .main .page-header h1{
            text-align: center;
            padding: 0;
        }

        .card{
            margin: 0px;
            padding: 0px;
        }

        .print_none{
            display: none !important;
        }
    }
</style>

<script>
    // JavaScript function to print the content of card-body and hide the print button
    function printDiv() {
        
        window.print();
        
    }
</script>

