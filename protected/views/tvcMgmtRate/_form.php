<?php
/* @var $this TvcMgmtRateController */
/* @var $model TvcMgmtRate */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tvc-mgmt-rate-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<div class="col-md-6 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">

					<form class="forms-sample">
						<div class="mb-3">
							<label for="name" class="form-label">Rate Name</label>
							<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
						</div>
						<div class="mb-3">
							<label for="name" class="form-label">Length (Seconds) From</label>
							<?php echo $form->textField($model, 'length_from', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
						</div>
						<div class="mb-3">
							<label for="name" class="form-label">Length (Seconds) To</label>
							<?php echo $form->textField($model, 'length_to', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
						</div>
						<div class="mb-3">
							<label for="name" class="form-label">Type</label>
							<?php echo $form->dropDownList(
								$model,
								'type',
								array('1' => 'Standard Rate', '2' => 'Special Rate (Advertiser)', '3' => 'Special Rate (Agency)'),
								array('class' => 'form-control')
							); ?>

						</div>
						<div class="mb-3">
							<label for="name" class="form-label">Amount</label>
							<?php echo $form->textField($model, 'amount', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
						</div>

						<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary me-2')); ?>

					</form>

				</div>
			</div>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->