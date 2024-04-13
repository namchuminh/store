<?php require(APPPATH.'views/'.'layouts/header.php'); ?>


<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Xin chào, <?php echo $_SESSION['fullname']; ?>!</h1>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo base_url('admin/'); ?>">Trang Chủ</a></li>
                    <li class="active">Thống Kê</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /# column -->
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="card p-0">
            <div class="stat-widget-three">
                <div class="stat-icon bg-primary">
                    <i class="ti-write"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-digit"><?php echo $order; ?></div>
                    <div class="stat-text">Hóa Đơn Chưa Thanh Toán</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card p-0">
            <div class="stat-widget-three">
                <div class="stat-icon bg-success">
                    <i class="ti-file"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-digit"><?php echo $orderToday; ?></div>
                    <div class="stat-text">Hóa Đơn Hôm Nay</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card p-0">
            <div class="stat-widget-three">
                <div class="stat-icon bg-info">
                    <i class="ti-server"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-digit"><?php echo $product; ?></div>
                    <div class="stat-text">Sản Phẩm Hiện Còn</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card p-0">
            <div class="stat-widget-three">
                <div class="stat-icon bg-danger">
                    <i class="ti-package"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-digit"><?php echo $category; ?></div>
                    <div class="stat-text">Chuyên Mục Sản Phẩm</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($_SESSION['role'] == 1){ ?>

	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
		        <div class="page-title">
		            <h1>Thống Kê</h1>
		        </div>
		    </div>
		</div>
		
	</div>

	<div class="row">
	    <div class="col-lg-4">
	        <div class="card">
	            <div class="stat-widget-one">
	                <div class="stat-icon dib"><i class="ti-money color-success border-success"></i></div>
	                <div class="stat-content dib">
	                    <div class="stat-text">Doanh Thu Tháng</div>
	                    <div class="stat-digit"><?php echo number_format($revenueMonth); ?> VND</div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col-lg-4">
	        <div class="card">
	            <div class="stat-widget-one">
	                <div class="stat-icon dib"><i class="ti-money color-primary border-primary"></i></div>
	                <div class="stat-content dib">
	                    <div class="stat-text">Tiền Nhập Theo Tháng</div>
	                    <div class="stat-digit"><?php echo number_format($importMonth); ?> VND</div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col-lg-4">
	        <div class="card">
	            <div class="stat-widget-one">
	                <div class="stat-icon dib"><i class="ti-receipt color-pink border-pink"></i></div>
	                <div class="stat-content dib">
	                    <div class="stat-text">Hóa Đơn Theo Tháng</div>
	                    <div class="stat-digit"><?php echo $orderMonth; ?> Hóa Đơn</div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="row">
	    <div class="col-lg-4">
	        <div class="card">
	            <div class="stat-widget-one">
	                <div class="stat-icon dib"><i class="ti-money color-success border-success"></i></div>
	                <div class="stat-content dib">
	                    <div class="stat-text">Doanh Thu Tuần</div>
	                    <div class="stat-digit"><?php echo number_format($revenueWeek); ?> VND</div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col-lg-4">
	        <div class="card">
	            <div class="stat-widget-one">
	                <div class="stat-icon dib"><i class="ti-money color-primary border-primary"></i></div>
	                <div class="stat-content dib">
	                    <div class="stat-text">Tiền Nhập Theo Tuần</div>
	                    <div class="stat-digit"><?php echo number_format($importWeek); ?> VND</div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col-lg-4">
	        <div class="card">
	            <div class="stat-widget-one">
	                <div class="stat-icon dib"><i class="ti-receipt color-pink border-pink"></i></div>
	                <div class="stat-content dib">
	                    <div class="stat-text">Hóa Đơn Theo Tuần</div>
	                    <div class="stat-digit"><?php echo $orderWeek; ?> Hóa Đơn</div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="row">
	    <div class="col-lg-4">
	        <div class="card">
	            <div class="stat-widget-one">
	                <div class="stat-icon dib"><i class="ti-money color-success border-success"></i></div>
	                <div class="stat-content dib">
	                    <div class="stat-text">Doanh Thu Ngày</div>
	                    <div class="stat-digit"><?php echo number_format($revenueDay); ?> VND</div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col-lg-4">
	        <div class="card">
	            <div class="stat-widget-one">
	                <div class="stat-icon dib"><i class="ti-money color-primary border-primary"></i></div>
	                <div class="stat-content dib">
	                    <div class="stat-text">Tiền Nhập Trong Ngày</div>
	                    <div class="stat-digit"><?php echo number_format($importDay); ?> VND</div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col-lg-4">
	        <div class="card">
	            <div class="stat-widget-one">
	                <div class="stat-icon dib"><i class="ti-receipt color-pink border-pink"></i></div>
	                <div class="stat-content dib">
	                    <div class="stat-text">Hóa Đơn Trong Ngày</div>
	                    <div class="stat-digit"><?php echo $orderToday; ?> Hóa Đơn</div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

<?php } ?>

<div class="row">
	<div class="col-lg-12">
		<div class="page-header">
            <div class="page-title">
                <h1>Hóa Đơn Chưa Thanh Toán</h1>
            </div>
        </div>
        <div class="card alert">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Mã Hóa Đơn</th>
                                <th>Thời Gian</th>
                                <th>Tổng Tiền</th>
                                <th>Trạng Thái</th>
                                <th>Thanh Toán</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php foreach ($list as $key => $value): ?>
                                <tr>
                                    <th scope="row"><?php echo $value['MaHoaDon']; ?></th>
                                    <td>
                                        <span class="badge badge-dark">
                                            <?php echo $value['ThoiGian']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">
                                            <?php echo number_format($value['TongTien']); ?> VND
                                        </span>
                                    </td>
                                    <td>
                                        <?php if($value['ThanhToan'] == 0){ ?>
                                            <span class="badge badge-danger">
                                                Chưa Thanh Toán
                                            </span>
                                        <?php }else{ ?>
                                            <span class="badge badge-success">
                                                Thanh Toán
                                            </span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($value['ThanhToan'] == 0){ ?>
                                            <a class="btn btn-danger w-100" href="<?php echo base_url('admin/order/'.$value['MaHoaDon'].'/pay/') ?>">Thanh Toán</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-success w-100" href="<?php echo base_url('admin/order/'.$value['MaHoaDon'].'/detail/') ?>">Xem Chi Tiết</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                   		</tbody>
                    </table>
                    <?php if(count($list) <= 0){ ?>
                    	<br>
                    	<p class="text-center">Không có hóa đơn nào chưa thanh toán!</p>
                    <?php } ?>
               	</div>
            </div>
        </div>
    </div>
</div>


<?php require(APPPATH.'views/'.'layouts/footer.php'); ?>
