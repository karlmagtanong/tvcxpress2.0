<?php
/* @var $this TvcOrderController */
/* @var $model TvcOrder */
/* @var $form CActiveForm */
?>

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


	<?php echo $form->errorSummary($model); ?>

	<div class="row mb-3">
		<div class="col-md-12 stretch-card">
			<div class="card">
				<div class="card-body">
					<h6 class="card-title">General Information</h6>
					<?php echo $form->hiddenField($model, 'order_id', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
					<?php echo $form->hiddenField($model, 'order_code', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>

					<div class="row">
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">Advertiser<span style="color:red">&nbsp*</span></label>
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
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">ASC Brand<span style="color:red">&nbsp*</span></label>
								<?php
								echo $form->dropDownList(
									$model,
									'asc_brand',
									CHtml::listData(TvcMgmtAscBrand::model()->findAll(), 'name', 'name'),
									['class' => 'js-example-basic-single form-select', 'empty' => '-Select-']
								);
								?>
							</div>
						</div><!-- Col -->
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">Product Category<span style="color:red">&nbsp*</span></label>
								<?php
								echo $form->dropDownList(
									$model,
									'product_category',
									CHtml::listData(TvcMgmtProductCat::model()->findAll(), 'name', 'name'),
									['class' => 'js-example-basic-single form-select', 'empty' => '-Select-']
								);
								?>
							</div>
						</div><!-- Col -->
					</div><!-- Row -->

					<div class="row">
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">ASC Project Title<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'asc_project_title', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
							</div>
						</div><!-- Col -->
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">Length (Seconds)<span style="color:red">&nbsp*</span></label>
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
						<div class="col-sm-2">
							<div class="mb-3">
								<label class="form-label">Break Date<span style="color:red">&nbsp*</span></label>
								<input size="60" maxlength="255" class="form-control" name="TvcOrder[break_date]" id="TvcOrder_break_date" type="date" value="<?php echo $model->break_date; ?>">
							</div>
						</div>
						<div class="col-sm-2">
							<div class="mb-3">
								<label class="form-label">Break Time<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'break_time_hh', [
									'size' => 60, 'maxlength' => 255, 'value' => "<?php echo $model->break_date ?>", 'class' => 'form-control',
									'data-inputmask' => "'alias': 'datetime'", 'data-inputmask-inputformat' => 'HH:MM tt'
								]); ?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">Producer Name<span style="color:red">&nbsp*</span></label>
								<?php
								echo $form->dropDownList(
									$model,
									'producer',
									CHtml::listData(TvcMgmtProducer::model()->findAll(), 'name', 'name'),
									['class' => 'js-example-basic-single form-select', 'empty' => '-Select-']
								);
								?>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="mb-3">
								<label class="form-label">Producer Contact Number<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'producer_contact', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
							</div>
						</div><!-- Col -->
						<div class="col-sm-2">
							<div class="mb-3">
								<label class="form-label">Producer Contact Landline<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'producer_landline', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
							</div>
						</div><!-- Col -->
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">Producer Email Address<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'producer_email', [
									'size' => 60, 'maxlength' => 255, 'class' => 'form-control',
									'data-inputmask' => "'alias': 'email'", 'inputmode' => 'email'
								]); ?>
							</div>
						</div><!-- Col -->
					</div>

					<div class="row">
						<div class="col-sm-3">
							<div class="mb-3">
								<label class="form-label">Agency Company Name<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'agency_company', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="mb-3">
								<label class="form-label">Agency Contact Person<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'agency_contact_person', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
							</div>
						</div><!-- Col -->
						<div class="col-sm-2">
							<div class="mb-3">
								<label class="form-label">Agency Contact No.<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'agency_contact_no', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
							</div>
						</div><!-- Col -->
						<div class="col-sm-2">
							<div class="mb-3">
								<label class="form-label">Agency Contact Landline<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'agency_landline', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
							</div>
						</div><!-- Col -->
						<div class="col-sm-2">
							<div class="mb-3">
								<label class="form-label">Agency Contact Email<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'agency_email', [
									'size' => 60, 'maxlength' => 255, 'class' => 'form-control',
									'data-inputmask' => "'alias': 'email'", 'inputmode' => 'email'
								]); ?>
							</div>
						</div><!-- Col -->
					</div>


				</div>
			</div>
		</div>
	</div>

	<div class="row mb-3">
		<div class="col-md-12 stretch-card">
			<div class="card">
				<div class="card-body">
					<h6 class="card-title">Billing Information</h6>
					<div class="row">
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">CE/PO/MIO/DO/BO Number<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'billing_ce', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
							</div>
						</div><!-- Col -->
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">Company Name<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'billing_company', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
							</div>
						</div><!-- Col -->
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">Company Address<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'billing_address', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
							</div>
						</div><!-- Col -->
					</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">Company Finance Contact Person<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'billing_contact_person', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
							</div>
						</div><!-- Col -->
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">Company Contact Number<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'billing_contact_no', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
							</div>
						</div><!-- Col -->
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">Company Email<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'billing_contact_email', [
									'size' => 60, 'maxlength' => 255, 'class' => 'form-control',
									'data-inputmask' => "'alias': 'email'", 'inputmode' => 'email'
								]); ?>
							</div>
						</div><!-- Col -->
					</div>

					<div class="row">
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">TIN<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'billing_tin', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
							</div>
						</div><!-- Col -->
						<div class="col-sm-4">
							<div class="mb-3">
								<label class="form-label">Business Style<span style="color:red">&nbsp*</span></label>
								<?php echo $form->textField($model, 'billing_business_type', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
							</div>
						</div><!-- Col -->
						<div class="col-sm-4">
							<div class="mb-3">
								<div>
									<div class="row mb-3">
										<label class="form-label">Upload PDF/JPEG (PO/MIO/DO/BO/CE/LOA/COC/BIR2303) </label>
										<!-- <input type="file" class="custom-file-input" id="customFileLang" name="po_file[]"> -->
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-12">
										<div>
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="TvcOrder[billing_upload_type]" id="billing_upload_type1" value="1" <?php echo $model->billing_upload_type == "1" ? 'checked' : ''; ?>>
												<label class="form-check-label" for="billing_upload_type1">
													Upload Now
												</label>
											</div>
											<div class="form-check form-check-inline">
												<input type="radio" class="form-check-input" name="TvcOrder[billing_upload_type]" id="billing_upload_type2" value="2" <?php echo $model->billing_upload_type == "2" ? 'checked' : ''; ?>>
												<label class="form-check-label" for="billing_upload_type2">
													Upload Later
												</label>
											</div>
										</div>
									</div>
								</div>

								<div class="row mb-3" id="upload_billing_show_now">
									<div class="col-sm-12">
										<div class="mb-3">
											<div id="pofile">
												<div class="row mb-3">
													<table id="myTableRowpo">

														<?php $mat = TvcOrderAttachment::model()->get_po($model->order_id)->getData();

														foreach ($mat as $val) { ?>
															<tr>
																<td><a href="<?php echo $val['path']; ?>" target="_blank"><?php echo $val['filename']; ?></a>
																	<input type="text" style="display:none" id="customFileLang" name="poid[]" value="<?php echo $val['id']; ?>">
																</td>
																<td><button type="button" class="btn btn-primary btn-icon btn-xs" id="DeleteButtonpo"><i data-feather="trash"></i></button></td>
															</tr>



														<?php } ?>
													</table>
													<input type="file" class="custom-file-input" id="customFileLang" name="po_file[]">
												</div>
											</div>
											<div class="row d-grid gap-2 mb-3">
												<button type="button" class="btn btn-primary btn-xs btn-icon-text btn-block" onclick="add_item()">
													<i class="btn-icon-prepend" data-feather="plus"></i> ADD PDF/JPEG (PO/MIO/DO/BO/CE/LOA/COC/BIR2303)
												</button>

											</div>
										</div>
									</div>
								</div><!-- Col -->
							</div>

							<div class="row mb-3" id="upload_billing_show_later">
								<div class="row">
									<div class="col-sm-6 mb-3">
										<label class="form-label">Upload Date</label>
										<input size="60" maxlength="255" class="form-control" name="TvcOrder[billing_upload_date]" id="TvcOrder_billing_upload_date" type="date" value="<?php echo $model->billing_upload_date ?>"> </div>
										<div class="col-sm-6 mb-3">
											<label class="form-label">Upload Time</label>
											<?php echo $form->textField($model, 'billing_upload_time', [
												'size' => 60, 'maxlength' => 255, 'class' => 'form-control',
												'data-inputmask' => "'alias': 'datetime'", 'data-inputmask-inputformat' => 'HH:MM tt'
											]); ?>

										</div>
									</div>
								</div>

							</div><!-- Col -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12 stretch-card">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Payment</h6>
						<div class="row">
							<div class="col-sm-8">
								<div class="row mb-3">
									<label class="form-label">Terms<span style="color:red">&nbsp*</span></label>
									<div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[payment_terms]" id="term1" value="30" <?php echo $model->payment_terms == 30 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="term1">
												Minimum 30 days upon receipt of invoice
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[payment_terms]" id="term2" value="1" <?php echo $model->payment_terms == 1 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="term2">
												Same day payment
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

		<div class="row mb-3">
			<div class="col-md-12 stretch-card">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Currency<span style="color:red">&nbsp*</span></h6>
						<div class="row">
							<div class="col-sm-4">
								<div class="row mb-3">
									<div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[currency]" id="currency1" value="1" <?php echo $model->currency == 1 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="currency1">
												Philippine Peso
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[currency]" id="currency2" value="2" <?php echo $model->currency == 2 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="currency2">
												US Dollars
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

		<div class="row mb-3">
			<div class="col-md-12 stretch-card">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Mode of Payment<span style="color:red">&nbsp*</span></h6>
						<div class="row">
							<div class="col-sm-12">
								<div class="row mb-3">
									<div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[mode_payment]" id="mode_payment1" value="1" <?php echo $model->mode_payment == 1 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="mode_payment1">
												Cash Payment
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[mode_payment]" id="mode_payment2" value="2" <?php echo $model->mode_payment == 2 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="mode_payment2">
												Check Payment
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[mode_payment]" id="mode_payment3" value="3" <?php echo $model->mode_payment == 3 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="mode_payment3">
												Bank Deposit/Transfer
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[mode_payment]" id="mode_payment8" value="8" <?php echo $model->mode_payment == 8 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="mode_payment8">
												Bank Deposit(Cash/Check)
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[mode_payment]" id="mode_payment4" value="4" <?php echo $model->mode_payment == 4 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="mode_payment4">
												Paypal
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[mode_payment]" id="mode_payment5" value="5" <?php echo $model->mode_payment == 5 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="mode_payment5">
												GCash
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[mode_payment]" id="mode_payment6" value="6" <?php echo $model->mode_payment == 6 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="mode_payment6">
												PayMaya
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[mode_payment]" id="mode_payment7" value="7" <?php echo $model->mode_payment == 7 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="mode_payment7">
												Credit / Debit
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


		<div class="row mb-3">
			<div class="col-md-12 stretch-card">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Service<span style="color:red">&nbsp*</span></h6>
						<div class="row">
							<div class="col-sm-4">
								<div class="row mb-3">
									<div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[service_type]" id="service_type1" value="1" <?php echo $model->service_type == 1 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="service_type1">
												Transmission
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[service_type]" id="service_type2" value="2" <?php echo $model->service_type == 2 ? 'checked' : ''; ?>>
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
						<h6 class="card-title">MEDIA DETAILS<span style="color:red">&nbsp*</span></h6>
						<div class="row">
							<div class="col-sm-4">
								<div class="row mb-3">
									<label class="form-label">Platform</label>
									<div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[platform]" id="platform_type1" value="1" <?php echo $model->platform == 1 ? 'checked' : ''; ?> <label class="form-check-label" for="platform_type1">
											Network Category
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[platform]" id="platform_type2" value="2" <?php echo $model->platform == 2 ? 'checked' : ''; ?> <label class="form-check-label" for="platform_type2">
											Channel Category
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[platform]" id="platform_type3" value="2" <?php echo $model->platform == 3 ? 'checked' : ''; ?> <label class="form-check-label" for="platform_type3">
											Sub Channel Category
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
											<input type="checkbox" class="form-check-input" id="<?php echo $val2['id']; ?>" name="channel[]" value="<?php echo $val2['id']; ?>" <?php echo TvcOrderChannel::model()->get_channel_selected($val2['id'], $model->order_id) != '' ? 'checked' : ''; ?>>
											<label class="form-check-label" for="<?php echo $val2['id']; ?>">
												<!-- <?php echo TvcOrderChannel::model()->get_channel_selected($val2['id'], $model->order_id); ?> -->
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
											<input type="checkbox" class="form-check-input" id="non_tran" name="non_tran[id][]" value="<?php echo $val2['id']; ?>" <?php echo TvcOrderServices::model()->get_service_selected($val2['id'], $model->order_id) != '' ? 'checked' : ''; ?>>
											<label class="form-check-label" for="non_tran">
												<?php echo $val2['sub_category']; ?>
											</label>
											<!-- <strong> | Qty : </strong><input type="text" name="non_tran[qty][]" class="col-sm-2" value="<?php echo TvcOrderServices::model()->get_service_selected_qty($val2['id'], $model->order_id) ?>"> -->
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





		<div class="row mb-3">
			<div class="col-md-12 stretch-card">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Delivery Method</h6>
						<div class="row mb-3">
							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">Company<span style="color:red">&nbsp*</span></label>
									<?php echo $form->textField($model, 'delivery_company', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
								</div>
							</div><!-- Col -->
							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">Contact Name<span style="color:red">&nbsp*</span></label>
									<?php echo $form->textField($model, 'delivery_contact_name', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
								</div>
							</div><!-- Col -->
							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">Contact Number<span style="color:red">&nbsp*</span></label>
									<?php echo $form->textField($model, 'delivery_number', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
								</div>
							</div><!-- Col -->
							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">Contact Landline<span style="color:red">&nbsp*</span></label>
									<?php echo $form->textField($model, 'delivery_landline', ['size' => 60, 'maxlength' => 255, 'class' => 'form-control']); ?>
								</div>
							</div><!-- Col -->
							<div class="col-sm-3">
								<div class="mb-3">
									<label class="form-label">Email<span style="color:red">&nbsp*</span></label>
									<?php echo $form->textField($model, 'delivery_email', [
										'size' => 60, 'maxlength' => 255, 'class' => 'form-control',
										'data-inputmask' => "'alias': 'email'", 'inputmode' => 'email'
									]); ?>
								</div>
							</div><!-- Col -->
						</div>
						<div class="row mb-3">
							<div class="col-sm-8">
								<div class="row mb-3">
									<div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[delivery_method]" id="delivery_method1" value="1" <?php echo $model->delivery_method == 1 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="delivery_method1">
												Physical Delivery
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[delivery_method]" id="delivery_method2" value="2" <?php echo $model->delivery_method == 2 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="delivery_method2">
												Shared Drive or Download Link
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[delivery_method]" id="delivery_method3" value="3" <?php echo $model->delivery_method == 3 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="delivery_method3">
												Upload Materials
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row mb-3" id="pd_show">
							<div class="col-sm-6">
								o <strong>Deliver to:</strong> TVCXpress Manila, Unit 2A Torre de Salcedo 184 <br>
								Salcedo St. Legaspi Village Makati City <br>
								o <strong>Day | Time: </strong>Monday - Friday | 9:00 AM - 6:00 PM
							</div>
						</div>

						<div class="row mb-3" id="shared_show">
							<div class="col-sm-6">
								<div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input" name="TvcOrder[share_type]" id="share_type1" value="1" <?php echo $model->share_type == 1 ? 'checked' : ''; ?>>
										<label class="form-check-label" for="share_type1">
											Share Now
										</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input" name="TvcOrder[share_type]" id="share_type2" value="2" <?php echo $model->share_type == 2 ? 'checked' : ''; ?>>
										<label class="form-check-label" for="share_type2">
											Share Later
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row mb-3" id="shared_show_now">

							<div id="link_item">
								<div class="row mb-3">
									<label class="form-label">Link or Drive</label>
									<table id="myTableRowlink">
										<?php $linkd = TvcOrderShareLink::model()->get_link($model->order_id)->getData();
										foreach ($linkd as $val) {
										?>
											<tr>

												<td><input size="60" maxlength="255" class="form-control" name="share_link[]" id="share_link" type="text" value="<?php echo $val['share_link']; ?>"></td>
												<td><button type="button" class="btn btn-primary btn-icon btn-xs" id="DeleteButtonlink"><i data-feather="trash"></i></button></td>
											</tr>
											</tr>

										<?php
										} ?>

									</table>

								</div>
							</div>
							<div class="row">
								<div class="mb-3 col-sm-6">
									<button type="button" class="btn btn-primary btn-xs btn-icon-text btn-block" onclick="add_item_link()">
										<i class="btn-icon-prepend" data-feather="plus"></i> ADD SHARED LINK / DRIVE
									</button>
								</div>
							</div>

						</div>

						<div class="row mb-3" id="shared_show_later">
							<div class="row">
								<div class="col-sm-6 mb-3">
									<label class="form-label">Share Date</label>
									<input size="60" maxlength="255" class="form-control" name="TvcOrder[share_date]" id="TvcOrder_share_date" type="date">
								</div>
								<div class="col-sm-6 mb-3">
									<label class="form-label">Share Time</label>
									<?php echo $form->textField($model, 'share_time_hh', [
										'size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'data-inputmask' => "'alias': 'datetime'",
										'data-inputmask-inputformat' => 'HH:MM tt'
									]); ?>
								</div>
							</div>
						</div>

						<div class="row mb-3" id="upload_show">
							<div class="col-sm-6">
								<div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input" name="TvcOrder[share_type]" id="upload_type1" value="3" <?php echo $model->share_type == 3 ? 'checked' : ''; ?>>
										<label class="form-check-label" for="upload_type1">
											Upload Now
										</label>
									</div>
									<div class="form-check form-check-inline">
										<input type="radio" class="form-check-input" name="TvcOrder[share_type]" id="upload_type2" value="4" <?php echo $model->share_type == 4 ? 'checked' : ''; ?>>
										<label class="form-check-label" for="upload_type2">
											Upload Later
										</label>
									</div>
								</div>
							</div>
						</div>

						<div class="row mb-3" id="upload_show_now">
							<div class="col-sm-5">
								<div class="mb-3">
									<div id="upload_mat">
										<div class="row mb-3">
											<label class="form-label"><b>Material List</b></label><br>
											<table id="myTableRow">



												<?php $mat = TvcOrderAttachment::model()->get_materials($model->order_id)->getData();

												foreach ($mat as $val) { ?>
													<tr>
														<td><a href="<?php echo $val['path']; ?>" target="_blank"><?php echo $val['filename']; ?></a>
															<input type="text" style="display:none" id="customFileLang" name="materialid[]" value="<?php echo $val['id']; ?>">
														</td>
														<td><button type="button" class="btn btn-primary btn-icon btn-xs" id="DeleteButton"><i data-feather="trash"></i></button></td>
													</tr>



												<?php } ?>
											</table>

										</div>
										<div class="row mb-3">
											<label class="form-label"><b>Upload Material </b></label>
											<input type="file" class="custom-file-input" id="customFileLang" name="material_file[]">
										</div>
									</div>
									<div class="row d-grid gap-2 mb-3">
										<button type="button" class="btn btn-primary btn-xs btn-icon-text btn-block" onclick="add_item_upload()">
											<i class="btn-icon-prepend" data-feather="plus"></i> ADD MATERIAL ITEM
										</button>

									</div>
								</div>
							</div><!-- Col -->
						</div>

						<div class="row mb-3" id="upload_show_later">
							<div class="row">
								<div class="col-sm-6 mb-3">
									<label class="form-label">Upload Date</label>
									<input size="60" maxlength="255" class="form-control" name="TvcOrder[share_date]" id="TvcOrder_share_date" type="date">
								</div>
								<div class="col-sm-6 mb-3">
									<label class="form-label">Upload Time</label>
									<?php echo $form->textField($model, 'share_time_hh', [
										'size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'data-inputmask' => "'alias': 'datetime'",
										'data-inputmask-inputformat' => 'HH:MM tt'
									]); ?>

								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12 stretch-card">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">ASC Clearance</h6>
						<div class="row mb-3">
							<div class="col-sm-12">
								<div class="row mb-3">
									<div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[asc_upload]" id="asc_upload1" value="1" <?php echo $model->asc_upload == 1 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="asc_upload1">
												Upload Now
											</label>
										</div>
										<div class="form-check form-check-inline">
											<input type="radio" class="form-check-input" name="TvcOrder[asc_upload]" id="asc_upload2" value="2" <?php echo $model->asc_upload == 2 ? 'checked' : ''; ?>>
											<label class="form-check-label" for="asc_upload2">
												Upload Later
											</label>
										</div>
									</div>
								</div>

								<div class="row mb-3 col-sm-12" id="asc_upload_now">
									<div class="row mb-3">
										<div class="col-sm-12">
											<table id="myTableRowasc">



												<?php $mat = TvcOrderAttachment::model()->get_attachment($model->order_id)->getData();

												foreach ($mat as $val) { ?>
													<tr>
														<td><a href="<?php echo $val['path']; ?>" target="_blank"><?php echo $val['filename']; ?></a>
															<input type="text" style="display:none" id="customFileLang" name="ascclid[]" value="<?php echo $val['id']; ?>">
														</td>
														<td><button type="button" class="btn btn-primary btn-icon btn-xs" id="DeleteButtonasc"><i data-feather="trash"></i></button></td>
													</tr>



												<?php } ?>
											</table>
											<input type="file" class="custom-file-input" id="customFileLang" name="asc_file[]" accept="application/pdf,image/jpeg" multiple="">
										</div>
									</div>
									<div class="col-sm-4">
										<div class="mb-3">
											<label class="form-label">Reference Code</label>
											<?php echo $form->textField($model, 'asc_reference_code', ['size' => 60, 'value' => $model->asc_reference_code, 'maxlength' => 255, 'class' => 'form-control']); ?>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="mb-3">
											<label class="form-label">Valid From</label>
											<input size="60" maxlength="255" class="form-control" name="TvcOrder[asc_valid_from]" id="TvcOrder_asc_valid_from" type="date" value="<?php echo $model->asc_valid_from; ?>">
										</div>
									</div>
									<div class="col-sm-4">
										<div class="mb-3">
											<label class="form-label">Valid To</label>
											<input size="60" maxlength="255" class="form-control" name="TvcOrder[asc_valid_to]" id="TvcOrder_asc_valid_to" type="date" value="<?php echo $model->asc_valid_to; ?>">
										</div>
									</div>
								</div>
							</div>

							<div class="row mb-3" id="asc_upload_later">
								<div class="col-sm-6 mb-3">
									<label class="form-label">Upload ASC Date</label>
									<input size="60" maxlength="255" class="form-control" name="TvcOrder[asc_date]" id="TvcOrder_asc_date" type="date" value="<?php echo $model->asc_date; ?>">

								</div>
								<div class="col-sm-6 mb-3">
									<label class="form-label">Upload ASC Time</label>
									<?php echo $form->textField($model, 'asc_time_hh', [
										'size' => 60, 'maxlength' => 255, 'value' => $model->asc_time_hh, 'class' => 'form-control',
										'data-inputmask' => "'alias': 'datetime'", 'data-inputmask-inputformat' => 'HH:MM tt'
									]); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="row ms-2  d-grid gap-2">
					<button type="button" class="btn btn-primary me-2" onclick="submitform()">UPDATE ORDER ORDER</button>
				</div>
			</div>
		</div>





		<?php $this->endWidget(); ?>

	</div><!-- form -->

	<script>
		function add_item() {

			$("#pofile").append('<div class="row mb-3">\n\
										<input type="file" class="custom-file-input" id="customFileLang" name="po_file[]">\n\
									</div>');
		}

		function add_item_upload() {

			$("#upload_mat").append('<div class="row mb-3">\n\
								<input type="file" class="custom-file-input" id="customFileLang" name="material_file[]">\n\
							</div>');
		}

		function add_item_link() {

			$("#link_item").append('<div class="row mb-3">\n\
		<input size="60" maxlength="255" class="form-control" name="share_link[]" id="share_link" type="text">\n\
					</div>');
		}

		if ('<?php echo $model->service_type; ?>' == 1) {
			$("#transmission_show").show();
			$("#nt_platform").hide();
		}
		if ('<?php echo $model->service_type; ?>' == 2) {
			$("#transmission_show").hide();
			$("#nt_platform").show();
		}

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

		if ('<?php echo $model->platform; ?>' == 1) {
			$("#tv_platform").show();
		} else {
			$("#tv_platform").hide();
		}


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



		if ('<?php echo $model->delivery_method; ?>' == 1) {
			$("#tv_platform").show();
			$("#shared_show").hide();
			$("#upload_show").hide();
			$("#shared_show_now").hide();
			$("#shared_show_later").hide();
			$("#upload_show_now").hide();
			$("#upload_show_later").hide();
		}

		if ('<?php echo $model->delivery_method; ?>' == 2) {
			$("#pd_show").hide();
			$("#shared_show").show();
			$("#upload_show").hide();
			$("#shared_show_now").hide();
			$("#shared_show_later").hide();
			$("#upload_show_now").hide();
			$("#upload_show_later").hide();
		}

		if ('<?php echo $model->delivery_method; ?>' == 3) {
			$("#pd_show").hide();
			$("#shared_show").hide();
			$("#upload_show").show();
			$("#shared_show_now").hide();
			$("#shared_show_later").hide();
			$("#upload_show_now").hide();
			$("#upload_show_later").hide();
		}





		$('input[type="radio"][name="TvcOrder[delivery_method]"]').click(function() {

			if ($(this).attr("value") == "1") {
				$("#pd_show").show();
				$("#shared_show").hide();
				$("#upload_show").hide();
				$("#shared_show_now").hide();
				$("#shared_show_later").hide();
				$("#upload_show_now").hide();
				$("#upload_show_later").hide();
			}
			if ($(this).attr("value") == "2") {
				$("#pd_show").hide();
				$("#shared_show").show();
				$("#upload_show").hide();
				$("#shared_show_now").hide();
				$("#shared_show_later").hide();
				$("#upload_show_now").hide();
				$("#upload_show_later").hide();
			}
			if ($(this).attr("value") == "3") {
				$("#pd_show").hide();
				$("#shared_show").hide();
				$("#upload_show").show();
				$("#shared_show_now").hide();
				$("#shared_show_later").hide();
				$("#upload_show_now").hide();
				$("#upload_show_later").hide();
			}


		})

		if ('<?php echo $model->share_type; ?>' == 1) {
			$("#shared_show_now").show();
			$("#shared_show_later").hide();
		}
		if ('<?php echo $model->share_type; ?>' == 2) {
			$("#shared_show_now").hide();
			$("#shared_show_later").show();
		}
		if ('<?php echo $model->share_type; ?>' == 3) {
			$("#upload_show_now").show();
			$("#upload_show_later").hide();
		}
		if ('<?php echo $model->share_type; ?>' == 4) {
			$("#upload_show_now").hide();
			$("#upload_show_later").show();
		}

		$('input[type="radio"][name="TvcOrder[share_type]"]').click(function() {

			if ($(this).attr("value") == "1") {
				$("#shared_show_now").show();
				$("#shared_show_later").hide();
			}
			if ($(this).attr("value") == "2") {
				$("#shared_show_now").hide();
				$("#shared_show_later").show();
			}
			if ($(this).attr("value") == "3") {
				$("#upload_show_now").show();
				$("#upload_show_later").hide();
			}
			if ($(this).attr("value") == "4") {
				$("#upload_show_now").hide();
				$("#upload_show_later").show();
			}



		})

		if ('<?php echo $model->asc_upload; ?>' == 1) {
			$("#asc_upload_now").show();
			$("#asc_upload_later").hide();
		}
		if ('<?php echo $model->asc_upload; ?>' == 2) {
			$("#asc_upload_now").hide();
			$("#asc_upload_later").show();
		}


		$('input[type="radio"][name="TvcOrder[asc_upload]"]').click(function() {

			if ($(this).attr("value") == "1") {
				$("#asc_upload_now").show();
				$("#asc_upload_later").hide();
			}
			if ($(this).attr("value") == "2") {
				$("#asc_upload_now").hide();
				$("#asc_upload_later").show();
			}



		})

		if ('<?php echo $model->billing_upload_type; ?>' == 1) {
			$("#upload_billing_show_now").show();
			$("#upload_billing_show_later").hide();
		}


		if ('<?php echo $model->billing_upload_type; ?>' == 2) {
			$("#upload_billing_show_now").hide();
			$("#upload_billing_show_later").show();
		}


		$('input[type="radio"][name="TvcOrder[billing_upload_type]"]').click(function() {

			if ($(this).attr("value") == "1") {

				$("#upload_billing_show_now").show();
				$("#upload_billing_show_later").hide();
			}

			if ($(this).attr("value") == "2") {
				$("#upload_billing_show_now").hide();
				$("#upload_billing_show_later").show();

			}


		})
		// $(document).ready(function() {

		// 	advertiser()

		// 	function advertiser() {
		// 		$.ajax({
		// 			url: '<?php echo $this->createUrl('TvcOrder/advertiser'); ?>',
		// 			type: 'POST',
		// 			dataType: 'html',
		// 			data: {
		// 				'YII_CSRF_TOKEN': '<?php echo Yii::app()->request->csrfToken; ?>',
		// 			},
		// 			success: function(response, status, data) {

		// 				var advertiser = response;

		// 				var advertiser = new Bloodhound({
		// 					datumTokenizer: Bloodhound.tokenizers.whitespace,
		// 					queryTokenizer: Bloodhound.tokenizers.whitespace,
		// 					local: advertiser
		// 				});

		// 				$('.aaa').typeahead({
		// 					hint: true,
		// 					highlight: true,
		// 					/* Enable substring highlighting */
		// 					minLength: 1 /* Specify minimum characters required for showing result */
		// 				}, {
		// 					name: 'cars',
		// 					source: cars
		// 				});

		// 				console.log("response" + response)
		// 			},
		// 			error: function(xhr, status, error) {
		// 				alert("Error Update")
		// 			}
		// 		});
		// 	}



		// 	// Defining the local dataset

		// 	var cars2 = ['Audi', 'BMW', 'Bugatti', 'Ferraris', 'Ford', 'Lamborghini', 'Mercedes Benz', 'Porsche', 'Rolls-Royce', 'Volkswagen'];

		// 	// Constructing the suggestion engine
		// 	var cars = new Bloodhound({
		// 		datumTokenizer: Bloodhound.tokenizers.whitespace,
		// 		queryTokenizer: Bloodhound.tokenizers.whitespace,
		// 		local: cars
		// 	});



		// 	// Initializing the typeahead
		// 	$('.aaa').typeahead({
		// 		hint: true,
		// 		highlight: true,
		// 		/* Enable substring highlighting */
		// 		minLength: 1 /* Specify minimum characters required for showing result */
		// 	}, {
		// 		name: 'cars',
		// 		source: cars
		// 	});


		// });


		$("#myTableRow").on("click", "#DeleteButton", function() {
			$(this).closest("tr").remove();
		});

		$("#myTableRowpo").on("click", "#DeleteButtonpo", function() {
			$(this).closest("tr").remove();
		});

		$("#myTableRowasc").on("click", "#DeleteButtonasc", function() {
			$(this).closest("tr").remove();
		});

		$("#myTableRowlink").on("click", "#DeleteButtonlink", function() {
			$(this).closest("tr").remove();
		});


		function submitform() {




			$.ajax({
				url: '<?php echo $this->createUrl('TvcOrder/UpdateTran'); ?>',
				type: 'POST',
				data: new FormData(document.getElementById("tvc-order-form")),
				contentType: false,
				cache: false,
				processData: false,
				success: function(response, status, data) {

					var url = "<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=tvcOrder/view&id=" + response;
					location.href = url;
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