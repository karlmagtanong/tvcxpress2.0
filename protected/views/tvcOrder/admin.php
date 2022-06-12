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
								<th>MATERIAL</th>
								<th>MATERIAL STATUS</th>
								<th>ASC CLEARANCE STATUS</th>
								<th>DATE</th>
							</tr>
						</thead>
						<!-- <tbody>
							<?php
							$i = 1;
							foreach ($model->search()->getData() as $val) { ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo strtoupper($val['name']) ?></td>
									<td><?php echo $val['length_from'] ." - " .$val['length_to'] . " sec"?></td>
									<td><?php echo TvcMgmtRate::model()->get_type_name($val['type']) ?></td>
									<td><?php echo number_format($val['amount'], 2) ?></td>
									<td>
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=TvcMgmtRate/view&id=<?php echo $val['id']; ?>" 
										type="button" class="btn btn-primary btn-icon btn-xs">
											<i data-feather="eye"></i>
										</a>
									</td>
								</tr>
							<?php
								$i++;
							} ?>
						</tbody> -->
					</table>
				</div>
			</div>
		</div>
	</div>
</div>