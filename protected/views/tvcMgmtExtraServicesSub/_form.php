<?php
/* @var $this TvcMgmtExtraServicesSubController */
/* @var $model TvcMgmtExtraServicesSub */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'tvc-mgmt-extra-services-sub-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<div class="col-md-6 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">

					<form class="forms-sample">
						<div class="mb-3">
							<label for="name" class="form-label">Service</label>
							<?php

							echo $form->dropDownList(
								$model,
								'serv_id',
								CHtml::listData(TvcMgmtExtraServices::model()->findAll(), 'id', 'name'),
								array('class' => 'form-control', 'empty' => '-Select-')
							);
							?>
						</div>
						<div class="mb-3">
							<label for="name" class="form-label">Sub Category</label>
							<?php echo $form->textField($model, 'sub_category', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
						</div>
						<div class="mb-3">
							<label for="name" class="form-label">Price</label>
							<?php echo $form->textField($model, 'price', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>

						</div>


						<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary me-2')); ?>

					</form>

				</div>
			</div>
		</div>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->