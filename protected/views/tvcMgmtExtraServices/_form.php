<?php
/* @var $this TvcMgmtExtraServicesController */
/* @var $model TvcMgmtExtraServices */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'tvc-mgmt-extra-services-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-4">
							<div class="mb-3">
								<label for="name" class="form-label">Service</label>
								<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="mb-3">
								<label for="name" class="form-label">Description</label>
								<?php echo $form->textArea($model, 'description', array('class' => 'form-control')); ?>
							</div>
						</div>
					</div>
					<!-- <div class="row" id="item">
						<div class="col-sm-6">
							<div class="mb-3">
								<label for="name" class="form-label">Sub Category</label>
								<?php echo $form->textField($model, 'sub_category[]', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-3">
								<label for="name" class="form-label">Price</label>
								<?php echo $form->textField($model, 'price[]', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
							</div>
						</div>
					</div> -->
					<!-- <div class="row">
						<div class="col-sm-10 ">
						</div>
						<div class="col-sm-2 d-grid gap-2">
							<button type="button" class="btn btn-primary btn-xs btn-icon-text btn-block" onclick="add_item()">
								<i class="btn-icon-prepend" data-feather="plus"></i>ADD SUB CATEGORY
							</button>
						</div>
					</div> -->
					<br>

					<div class="row">
						<div class="col-sm-6">
							<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary me-2')); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
	// function add_item() {

	// 	$("#item").append('<div class="col-sm-6">\n\
	// 						<div class="mb-3">\n\
	// 							<input size="60" maxlength="255" class="form-control" name="TvcMgmtExtraServices[sub_category][]" id="TvcMgmtExtraServices_sub_category" type="text">	\n\
	// 							</div></div>\n\
	// 							<div class="col-sm-6">\n\
	// 						<div class="mb-3">\n\
	// 							<input size="60" maxlength="255" class="form-control" name="TvcMgmtExtraServices[price][]" id="TvcMgmtExtraServices_price" type="text">	\n\
	// 							</div></div>');
	// }
</script>