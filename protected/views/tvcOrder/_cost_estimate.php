<!-- <script src="https://cdn.jsdelivr.net/npm/datalist-css/dist/datalist-css.min.js"></script> -->
<?php
/* @var $this TvcOrderController */
/* @var $model TvcOrder */
/* @var $form CActiveForm */
?>
<style>
	/* <datalist> and <option> styling */
	datalist {
		position: absolute;
		max-height: 20em;
		border: 0 none;
		overflow-x: hidden;
		overflow-y: auto;
	}

	datalist option {
		font-size: 0.8em;
		padding: 0.3em 1em;
		background-color: white;
		cursor: pointer;
	}

	/* option active styles */
	datalist option:hover,
	datalist option:focus {
		color: black;
		background-color: orange;
		outline: 0 none;
	}
</style>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', [
		'id' => 'tvc-order-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
		'method' => 'post',
		//This is very important when uploading files
		'htmlOptions' => ['enctype' => 'multipart/form-data'],
	]); ?>

<?php $userdata = Users::model()->findByAttributes(array('username' => Yii::app()->user->name)); ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row mb-3">
		<div class="col-md-12 stretch-card">
			<div class="card">
				<div class="card-body">
					<h6 class="card-title">Order Information</h6>
					<div class="row">
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">Advertiser</label>
								<!-- <?php echo $form->textField($model, 'advertiser', [
											'list' => 'list-advertiser', 'size' => 60,
											'maxlength' => 255, 'class' => 'form-control', 'autocomplete' => 'off',
										]); ?>
								<datalist id="list-advertiser">
									<?php ?>
								<option value="Brackets" label="by Adobe" />
									<option value="Coda" label="by Panic" />
									<option value="Dreamweaver" />
									<option value="Espresso" />
									<option value="jEdit" />
									<option value="Komodo Edit" />
								</datalist> -->
								<?php
								echo $form->dropDownList(
									$model,
									'advertiser',
									CHtml::listData(TvcMgmtAdvertiser::model()->findAll(), 'name', 'name'),
									[
										'class' => 'js-example-basic-single form-select', 'empty' => '-Select-',
										// 'options' => array('3' => array('selected' => true))
									]
								);
								?>
							</div>
						</div><!-- Col -->
						<div class="col-sm-3">
							<div class="mb-3">
								<label class="form-label">Agency Company Name</label>
								<?php echo $form->textField($model, 'agency_company', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'value' => $userdata['agency_name'] ]); ?>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">Length (Seconds)</label>
								<?php echo $form->dropDownList(
									$model,
									'length',
									[
										'5' => '5 Sec',
										'15' => '15 Sec',
										'30' => '30 Sec',
										'60' => '60 Sec',
										'300' => '5 Min',
										'600' => '10 Min',
										'900' => '15 Min',
										'1200' => '20 Min',
										'1800' => '30 Min',
									],
									['class' => 'form-control']
								); ?>
							</div>
						</div><!-- Col -->

					</div><!-- Row -->


				</div>
			</div>
		</div>
	</div>
	<div class="row mb-3">
		<div class="col-md-12 stretch-card">
			<div class="card">
				<div class="card-body">
					<h6 class="card-title">Service</h6>
					<div class="row">
						<div class="col-sm-4">
							<div class="row mb-3">
								<div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input" name="TvcOrder[service_type]" id="service_type1" value="1">
										<label class="form-check-label" for="service_type1">
											Transmission
										</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input" name="TvcOrder[service_type]" id="service_type2" value="2">
										<label class="form-check-label" for="service_type2">
											Non-Transmission
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row mb-3" id="transmission_show">
		<div class="col-md-12 stretch-card">
			<div class="card">
				<div class="card-body">
					<h6 class="card-title">MEDIA DETAILS</h6>
					<div class="row">
						<div class="col-sm-4">
							<div class="row mb-3">
								<label class="form-label">Platform</label>
								<div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input" name="TvcOrder[platform]" id="platform_type1" value="1">
										<label class="form-check-label" for="platform_type1">
											TV
										</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input" name="TvcOrder[platform]" id="platform_type2" value="2">
										<label class="form-check-label" for="platform_type2">
											Radio
										</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input" name="TvcOrder[platform]" id="platform_type3" value="2">
										<label class="form-check-label" for="platform_type3">
											Online
										</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input" name="TvcOrder[platform]" id="platform_type4" value="2">
										<label class="form-check-label" for="platform_type4">
											Print
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row mb-3" id="tv_platform">
						<div class="row col-lg-12">
							<?php
							$cluster_data = TvcMgmtChannelCluster::model()->search()->getData();
							foreach ($cluster_data as $val) {
							?>
								<div class="col">
									<label class="custom-control-label" for="<?php echo $val['name']; ?>"><strong><?php echo $val['name']; ?></strong>
									</label><br>
									<?php
									$channel_data = TvcMgmtChannel::model()->get_channels($val['id'])->getData();
									foreach ($channel_data as $val2) {
									?>
										<input type="checkbox" class="form-check-input" id="channel" name="channel[]" value="<?php echo $val['id'] ?>">
										<label class="form-check-label" for="channel">
											<?php echo $val2['name']; ?>
										</label><br>

									<?php
									} ?>
								</div>
							<?php
							} ?>
						</div>
					</div>




				</div>
			</div>
		</div>
	</div>


	<div class="row mb-3" id="nt_platform">
		<div class="col-md-12 stretch-card">
			<div class="card">
				<div class="card-body">
					<h6 class="card-title">MEDIA DETAILS</h6>
					<div class="row mb-3">
						<div class="row col-lg-12">
							<?php
							$non_tran_data = TvcMgmtExtraServices::model()->search()->getData();
							foreach ($non_tran_data as $val) {
							?>
								<div class="col-sm-2 mb-3">
									<label class="custom-control-label" for="<?php echo $val['name']; ?>"><strong><?php echo $val['name']; ?></strong>
									</label><br>
									<?php
									$non_tran_subcat_data = TvcMgmtExtraServicesSub::model()->get_subcat($val['id'])->getData();
									foreach ($non_tran_subcat_data as $val2) {
									?>
										<input type="checkbox" class="form-check-input" id="non_tran" name="non_tran[id][]" value="<?php echo $val2['id']; ?>">
										<label class="form-check-label" for="non_tran">
											<?php echo $val2['sub_category']; ?>
										</label>
										<strong> | Qty : </strong><input type="text" name="non_tran[qty][]" class="col-sm-2">
										<br>
									<?php
									} ?>
								</div>

							<?php
							} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bd-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Cost Estimate</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
				</div>
				<div class="modal-body">
					<div id="cost"></div>
				</div>
			</div>
		</div>
	</div>



	<div class="col-lg-12">
		<div class="row ms-2  d-grid gap-2">
			<button type="button" class="btn btn-primary me-2" onclick="compute_form()">COMPUTE COST</button>
			<!-- <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => 'btn btn-primary me-2']); ?> -->
		</div>
	</div>
	<?php $this->endWidget(); ?>



</div><!-- form -->

<script>
	$("#transmission_show").hide();
	$("#nt_platform").hide();


	$('input[type="radio"][name="TvcOrder[service_type]"]').click(function() {

		if ($(this).attr("value") == "1") {
			$("#transmission_show").show();
			$("#nt_platform").hide();
		}
		if ($(this).attr("value") == "2") {
			$("#transmission_show").hide();
			$("#nt_platform").show();
		}

	})

	$("#tv_platform").hide();
	$('input[type="radio"][name="TvcOrder[platform]"]').click(function() {

		if ($(this).attr("value") == "1") {
			$("#tv_platform").show();
		}
		if ($(this).attr("value") == "2") {
			$("#tv_platform").hide();
		}
		if ($(this).attr("value") == "3") {
			$("#tv_platform").hide();
		}
		if ($(this).attr("value") == "4") {
			$("#tv_platform").hide();
		}


	})



	function compute_form() {

		$.ajax({
			url: '<?php echo $this->createUrl('TvcOrder/Compute_estimate'); ?>',
			type: 'POST',
			data: new FormData(document.getElementById("tvc-order-form")),
			contentType: false,
			cache: false,
			processData: false,
			success: function(response, status, data) {

				$('.bd-example-modal-lg').modal('show')
				// var url = "<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=tvcOrder/view&id=" + response;
				// location.href = url;
				// var res = JSON.parse(response)
				$("#cost").html(response)
				console.log("response" + response)
			},
			error: function(xhr, status, error) {
				console.log(xhr.responseText);
				console.log(xhr.responseText.Message);
				console.log(status);
				console.log(error);
				var jsonResponse = JSON.parse(xhr.responseText);
				console.log(jsonResponse);
				//$("#errorDialog").dialog("open");



			}
		});


	}
</script>