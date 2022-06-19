<?php
/* @var $this TvcTrafficController */
/* @var $model TvcTraffic */
/* @var $form CActiveForm */
?>

<div class="wide form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'action' => Yii::app()->createUrl($this->route),
		'method' => 'get',
	)); ?>


	<div class="row">
		<div class="col-md-2  ">
			<div class="mb-3">
				<label for="name" class="form-label"><strong>ORDER NO.</strong></label>
				<input size="60" maxlength="255" class="form-control" name="orderno" id="orderno" type="text" value="<?php echo $_GET['orderno'] ?>">
			</div>
		</div>
		<div class="col-md-2  ">
			<div class="mb-3">
				<label for="name" class="form-label"><strong>ADVERTISER</strong></label>
				<input size="60" maxlength="255" class="form-control" name="advertiser" id="advertiser" type="text" value="<?php echo $_GET['advertiser'] ?>">

			</div>
		</div>
		<div class="col-md-2 ">
			<div class="mb-3">
				<label for="name" class="form-label"><strong>AGENCY</strong></label>
				<input size="60" maxlength="255" class="form-control" name="agency" id="agency" type="text" value="<?php echo $_GET['agency'] ?>">

			</div>
		</div>
		<div class="col-md-2 ">
			<div class="mb-3">
				<label for="name" class="form-label"><strong>PROJECT TITLE</strong></label>
				<input size="60" maxlength="255" class="form-control" name="title" id="title" type="text" value="<?php echo $_GET['title'] ?>">

			</div>
		</div>
		<div class="col-md-2 ">
			<div class="mb-3">
				<label for="name" class="form-label"><strong>SERVICE</strong></label>
				<select class="form-control" name="service" id="service">
					<option value="">-Select-</option>
					<option value="1" <?php echo $_GET['service'] == 1 ? "selected" : "" ?>>Transmission</option>
					<option value="2" <?php echo $_GET['service'] == 2 ? "selected" : "" ?>>Non-Transmission</option>
				</select>
			</div>
		</div>
		<div class="col-md-2 ">
			<div class="mb-3">
				<label for="name" class="form-label"><strong>SCHEDULE</strong></label>
				<input class="form-control" name="sched" id="sched" type="date" value="<?php echo $_GET['sched'] ?>">

			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 ">
			<div class="mb-3">
				<label for="name" class="form-label"><strong>ORDER DATE FROM</strong></label>
				<input class="form-control" name="orderfrom" id="orderfrom" type="date" value="<?php echo $_GET['orderfrom'] ?>">

			</div>
		</div>
		<div class="col-md-2 ">
			<div class="mb-3">
				<label for="name" class="form-label"><strong>ORDER DATE TO</strong></label>
				<input class="form-control" name="orderto" id="orderto" type="date" value="<?php echo $_GET['orderto'] ?>">

			</div>
		</div>
		<div class="col-md-2 ">
			<div class="mb-3">
				<label for="name" class="form-label"><strong>TRAFFIC STATUS</strong></label>
				<select class="form-control" name="trastat" id="trastat">
					<option value="">-Select-</option>
					<option value="1" <?php echo $_GET['trastat'] == 1 ? "selected" : "" ?>> PENDING ORDER</option>
					<option value="2" <?php echo $_GET['trastat'] == 2 ? "selected" : "" ?>>SCHEDULED TODAY</option>
					<option value="3" <?php echo $_GET['trastat'] == 3 ? "selected" : "" ?>>SCHEDULED ORDER</option>
					<option value="4" <?php echo $_GET['trastat'] == 4 ? "selected" : "" ?>>COMPLETED ORDER</option>
				</select>
			</div>
		</div>
	</div>

	<?php echo CHtml::submitButton('SEARCH', array('class' => 'btn btn-primary me-2')); ?>



</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->