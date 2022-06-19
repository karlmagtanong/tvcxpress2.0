<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tvc-order-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>




<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-lg-10">
						<h3 class="card-title">ORDER LIST</h3>
					</div>
					<div class="col-lg-2 d-grid gap-2">
						<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=TvcOrder/create" type=" button" class="btn btn-primary btn-xs btn-icon-text">
							<i class="btn-icon-prepend" data-feather="plus"></i>ADD ORDER
						</a>
					</div>
				</div>
				<BR>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>ORDER NO</th>
								<th>ADVERTISER</th>
								<th>ASC BRAND</th>
								<th>ASC PROJECT TITLE</th>
								<th>LENGTH</th>
								<th>SERVICE</th>
								<th>DATE</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							foreach ($model->search()->getData() as $val) { ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo strtoupper($val['order_code']); ?></td>
									<td><?php echo strtoupper($val['advertiser']); ?></td>
									<td><?php echo strtoupper($val['asc_brand']); ?></td>
									<td><?php echo strtoupper($val['asc_project_title']); ?></td>
									<td><?php echo strtoupper($val['length']); ?> sec</td>
									<td><?php echo strtoupper($val['service_type'] == 1 ? "Transmission" : "Non-Transmission"); ?></td>
									<td><?php echo strtoupper($val['created_at']); ?></td>
									<td>
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=tvcOrder/update&id=<?php echo $val['orderid']; ?>" type="button" class="btn btn-primary btn-icon btn-xs">
											<i data-feather="edit"></i>
										</a>
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=tvcOrder/viewsummary&id=<?php echo $val['orderid']; ?>" type="button" class="btn btn-primary btn-icon btn-xs">
											<i data-feather="eye"></i>
										</a>
										
									</td>
								</tr>
							<?php
								++$i;
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>