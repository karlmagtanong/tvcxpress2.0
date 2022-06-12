<?php
/* @var $this TvcMgmtProductCatController */
/* @var $model TvcMgmtProductCat */


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tvc-mgmt-product-cat-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<div class="row">
	<div class="col-lg-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<h3 class="card-title">PRODUCT CATEGORY lIST</h3>
					</div>
					<div class="col-lg-6 text-right">
						<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=TvcMgmtProductCat/create" type=" button" class="btn btn-primary btn-xs btn-icon-text">
							<i class="btn-icon-prepend" data-feather="plus"></i>ADD PRODUCT CATEGORY
						</a>
					</div>
				</div>

				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>PRODUCT CATEGORY</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							foreach ($model->search()->getData() as $val) { ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $val['name'] ?></td>
									<td>
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=TvcMgmtProductCat/update&id=<?php echo $val['id']; ?>" type="button" class="btn btn-success btn-icon btn-xs">
											<i data-feather="edit"></i>
										</a>
										<button onclick="deletetran(<?php echo $val['id']; ?>)" type="button" class="btn btn-danger btn-icon btn-xs">
											<i data-feather="trash"></i>
										</button>
									</td>
								</tr>
							<?php
								$i++;
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function deletetran(id) {

		Swal.fire({
			title: 'Are you sure?',
			text: 'You want to delete this item?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: 'red',
			cancelButtonColor: 'gray',
			confirmButtonText: 'Yes, delete it!'

		}).
		then((result) => {

			if (result.isConfirmed) {
				$.ajax({
					url: '<?php echo $this->createUrl('tvcMgmtProductCat/delete'); ?>',
					type: 'POST',
					dataType: 'html',
					data: {
						'id': id,
						'YII_CSRF_TOKEN': '<?php echo Yii::app()->request->csrfToken; ?>',
					},
					success: function(response, status, data) {

						Swal.fire('Deleted',
							'Transaction successfully deleted',
							'success').
						then((result) => {
							location.reload();
						})
					},
					error: function(xhr, status, error) {
						alert("Error Update")
					}
				});
			} else if (result.isDenied) {

			}


		});

	}
</script>