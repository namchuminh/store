<?php require(APPPATH.'views/'.'layouts/header.php'); ?>

<div class="row">
    <div class="col-lg-12">
    	<div class="row">
    		<div class="col-lg-12">
	    		<div class="page-header">
		            <div class="page-title">
		                <h1>Danh Sách Nhà Cung Cấp</h1>
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
		                                <th>Tên Nhà Cung Cấp</th>
		                                <th>Mô Tả</th>
		                                <th>Trạng Thái</th>
		                                <th>Ngày Hợp Tác</th>
		                                <th>Lịch Sử Nhập</th>
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
			                                <td><b><?php echo $value['TenNhaCungCap']; ?></b></td>
			                                <td>
			                                	<?php echo $value['MoTa']; ?>
			                            	</td>
			                            	<td>
			                            		<?php if($value['TrangThai'] == 1){ ?>
				                                	<span class="badge badge-primary">
				                                		Đang cung cấp
				                                	</span>
				                                <?php }else{ ?>
				                                	<span class="badge badge-danger">
				                                		Ngừng cung cấp
				                                	</span>
				                                <?php } ?>
			                                </td>
			                                <td>
			                                	<span class="badge badge-dark">
			                                		<?php echo $value['NgayHopTac']; ?>
			                                	</span>
			                                </td>
			                                <td>
			                                	<a class="btn btn-success w-100" href="<?php echo base_url('admin/supplier/'.$value['MaNhaCungCap'].'/history/') ?>">Xem Lịch Sử</a>
			                                </td>
			                                <td>
			                                	<a class="btn btn-success w-100" href="<?php echo base_url('admin/supplier/'.$value['MaNhaCungCap'].'/update/') ?>">Xem Chi Tiết</a>
			                                	<?php if($_SESSION['role'] == 1){ ?>
				                                	<hr>
				                                	<a class="btn btn-danger w-100" href="<?php echo base_url('admin/supplier/'.$value['MaNhaCungCap'].'/delete/') ?>">Xóa Nhà Cung Cấp</a>
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
