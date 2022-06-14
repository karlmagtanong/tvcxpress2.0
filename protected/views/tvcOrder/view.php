<h4 class="card-title text-center">SUMMARY OF ORDER</h4>


<div class="row">
	<div class="col-md-1">
	</div>
	<div class="col-md-10">
		<div class="card">
			<div class="card-body">
				<h4 class="mb-3 mt-4 ">ORDER INFORMATION</h4>
				<br>
				<div class="row ms-2">
					<div class="row mb-3">
						<div class="col-lg-2 ps-0"><b>Advertiser:</b></div>
						<div class="col-lg-5 pe-0"><?php echo $model->advertiser ?></div>
						<div class="col-lg-2 ps-0"><b>ASC Brand:</b></div>
						<div class="col-lg-3 pe-0"><?php echo $model->asc_brand ?></div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-2 ps-0"><b>Product Category:</b></div>
						<div class="col-lg-5 pe-0"><?php echo $model->product_category ?></div>
						<div class="col-lg-2 ps-0"><b>ASC Project Title:</b></div>
						<div class="col-lg-3 pe-0"><?php echo $model->asc_project_title ?></div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-2 ps-0"><b>Length (Seconds):</b></div>
						<div class="col-lg-5 pe-0"><?php echo $model->length ?></div>
						<div class="col-lg-2 ps-0"><b>Break Date:</b></div>
						<div class="col-lg-3 pe-0"><?php echo $model->break_date ?></div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-2 ps-0"><b>Break Time:</b></div>
						<div class="col-lg-5 pe-0"><?php echo $model->break_time_hh ?></div>
						<div class="col-lg-2 ps-0"><b>Producer Name:</b></div>
						<div class="col-lg-3 pe-0"><?php echo $model->producer ?></div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-2 ps-0"><b>Producer Contact No.:</b></div>
						<div class="col-lg-5 pe-0"><?php echo $model->producer_contact ?></div>
						<div class="col-lg-2 ps-0"><b>Producer Email: </b></div>
						<div class="col-lg-3 pe-0"><?php echo $model->producer_email ?></div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-2 ps-0"><b>Agency Company:</b></div>
						<div class="col-lg-5 pe-0"><?php echo $model->agency_company ?></div>
						<div class="col-lg-2 ps-0"><b>Agency Contact Person: </b></div>
						<div class="col-lg-3 pe-0"><?php echo $model->agency_contact_person ?></div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-2 ps-0"><b>Agency Contact No.:</b></div>
						<div class="col-lg-5 pe-0"><?php echo $model->agency_contact_no ?></div>
						<div class="col-lg-2 ps-0"><b>Agency Contact Email: </b></div>
						<div class="col-lg-3 pe-0"><?php echo $model->agency_email ?></div>
					</div>
				</div>
			</div>
			<hr>
			<div class="card-body">
				<h4 class="mb-3 mt-4 ">BILLING INFORMATION</h4>
				<br>
				<div class="row ms-2">
					<div class="row mb-3">
						<div class="col-lg-2 ps-0"><b>CE Number:</b></div>
						<div class="col-lg-5 pe-0"><?php echo $model->billing_ce ?></div>
						<div class="col-lg-2 ps-0"><b>Company :</b></div>
						<div class="col-lg-3 pe-0"><?php echo $model->billing_company ?></div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-2 ps-0"><b>Contact Person:</b></div>
						<div class="col-lg-5 pe-0"><?php echo $model->billing_contact_person ?></div>
						<div class="col-lg-2 ps-0"><b>Contact Number:</b></div>
						<div class="col-lg-3 pe-0"><?php echo $model->billing_contact_no ?></div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-2 ps-0"><b>Address :</b></div>
						<div class="col-lg-5 pe-0"><?php echo $model->billing_address ?></div>
						<div class="col-lg-2 ps-0"><b>Email :</b></div>
						<div class="col-lg-3 pe-0"><?php echo $model->billing_contact_email ?></div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-2 ps-0"><b>Tin :</b></div>
						<div class="col-lg-5 pe-0"><?php echo $model->billing_tin ?></div>
						<div class="col-lg-2 ps-0"><b>Business Style:</b></div>
						<div class="col-lg-3 pe-0"><?php echo $model->billing_business_type ?></div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-2 ps-0"><b>Uploaded File:</b></div>
						<div class="col-lg-5 pe-0"><?php echo $model->producer_contact ?></div>
					</div>
				</div>
			</div>
			<hr>
			<div class="card-body">
				<h4 class="mb-3 mt-4 ">PAYMENT METHOD</h4>
				<br>
				<div class="row ms-2">
					<div class="row mb-3">
						<div class="col-lg-2 ps-0"><b>Terms :</b></div>
						<div class="col-lg-5 pe-0"><?php echo $model->payment_terms ?></div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-2 ps-0"><b>Currency </b></div>
						<div class="col-lg-5 pe-0"><?php echo $model->currency ?></div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-2 ps-0"><b>Mode of Payment:</b></div>
						<div class="col-lg-5 pe-0"><?php echo $model->mode_payment ?></div>
					</div>

				</div>
			</div>
			<hr>
			<div class="card-body">
				<h4 class="mb-3 mt-4 ">MEDIA DETAILS</h4>
				<br>
				<div class="row ms-2">
					<div class="row mb-3">
						<div class="col-lg-2 ps-0"><b>Service:</b></div>
						<div class="col-lg-5 pe-0"><?php echo $model->service_type ?></div>
					</div>

					<?php if ($model->service_type == 1) { ?>
						<div class="row mb-3">
							<div class="col-lg-2 ps-0"><b>Platform:</b></div>
							<div class="col-lg-5 pe-0"><?php echo $model->platform ?></div>
						</div>
						<div class="row mb-3">
							<div class="col-lg-2 ps-0"><b>Selected Channels:</b></div>
							<table class="table align-items-center" style="font-size:10px;padding:1px;border-spacing: 5px;">
								<thead class="thead-light">
									<tr style="background-color: ##8898aa;">
										<th>PARTICULARS</th>
										<th>LENGTH</th>
										<th>AMOUNT</th>
									</tr>
								</thead>
								<br>
								<tbody>
									<?php $channel_sel = TvcOrderChannel::model()->get_order_channel($model->order_id)->getData();
									$price_total = 0.0;
									foreach ($channel_sel as $val) {
										$price_total += $val['price'];
									?>

										<tr>
											<td class="text-start"><b><?php echo TvcMgmtChannelCluster::model()->get_name($val['cluster_id']); ?></b></td>
											<td><?php echo $model->length; ?> sec</td>
											<td><?php echo number_format($val['price'], 2); ?></td>
											<?php $channel_sel2 = TvcOrderChannel::model()->get_order_channel_per_cluster($model->order_id, $val['cluster_id'])->getData();

											foreach ($channel_sel2 as $val2) { ?>
										<tr>
											<td> &nbsp;&nbsp;- <?php echo TvcMgmtChannel::model()->get_name($val2['channel_id']); ?></td>
										</tr>
									<?php } ?>

									</tr>

								<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<td class="text-end"><b>SUB-TOTAL</b></td>
										<td></td>
										<td><b><?php echo number_format($price_total, 2) ?></b></td>
									</tr>
								</tfoot>
							</table>

						</div>
					<?php } ?>

					<?php if ($model->service_type == 2) { ?>
						<div class="row mb-3">
							<div class="col-lg-2 ps-0"><b>Selected Services:</b></div>
						</div>
					<?php } ?>

				</div>
			</div>
			<hr>
			<div class="card-body">
				<h4 class="mb-3 mt-4 ">DELIVERY METHOD</h4>
				<br>
				<div class="row ms-2">
					<div class="row mb-3">
						<div class="col-lg-1 ps-0"><b>Method :</b></div>
						<div class="col-lg-5 pe-0"><?php echo $model->delivery_method ?></div>
					</div>
					<div class="row mb-3">
						<div class="col-lg-1 ps-0"><b>Company :</b></div>
						<div class="col-lg-2 pe-0"><?php echo $model->delivery_company ?></div>
						<div class="col-lg-1 ps-0"><b>Contact Name :</b></div>
						<div class="col-lg-2 pe-0"><?php echo $model->delivery_contact_name ?></div>
						<div class="col-lg-1 ps-0"><b>Contact No. :</b></div>
						<div class="col-lg-2 pe-0"><?php echo $model->delivery_number ?></div>
						<div class="col-lg-1 ps-0"><b>Email :</b></div>
						<div class="col-lg-2 pe-0"><?php echo $model->delivery_email ?></div>
					</div>

					<?php if ($model->delivery_method == 1) { ?>
						<div class="row mb-3">
							<div class="col-lg-4 ps-0">
								o <strong>Deliver to:</strong> TVCXpress Manila, Unit 2A Torre de Salcedo 184 Salcedo St. Legaspi Village Makati City<br>
								o <strong>Day | Time:</strong> Monday - Friday | 9:00 AM - 6:00 PM

							</div>
						</div>
					<?php } ?>
					<?php if ($model->delivery_method == 2) { ?>
						<?php if ($model->share_type == 1) { ?>
							<div class="row mb-3">
								<div class="col-lg-1 ps-0"><b>Link or Drive :</b></div>
							</div>
						<?php } ?>
						<?php if ($model->share_type == 2) { ?>
							<div class="row mb-3">
								<div class="col-lg-1 ps-0"><b>Share Later :</b></div>
							</div>
							<div class="row mb-3">
								<div class="col-lg-1 ps-0"><b>Share Date :</b></div>
								<div class="col-lg-2 pe-0"><?php echo $model->share_date ?></div>
								<div class="col-lg-1 ps-0"><b>Share Time :</b></div>
								<div class="col-lg-2 pe-0"><?php echo $model->share_time_hh ?></div>
							</div>
						<?php } ?>
					<?php } ?>

					<?php if ($model->delivery_method == 3) { ?>
						<?php if ($model->share_type == 3) { ?>
							<div class="row mb-3">
								<div class="col-lg-1 ps-0"><b>Materials :</b></div>
							</div>
						<?php } ?>
						<?php if ($model->share_type == 4) { ?>
							<div class="row mb-3">
								<div class="col-lg-1 ps-0"><b>Upload Later :</b></div>
							</div>
							<div class="row mb-3">
								<div class="col-lg-1 ps-0"><b>Upload Date :</b></div>
								<div class="col-lg-2 pe-0"><?php echo $model->share_date ?></div>
								<div class="col-lg-1 ps-0"><b>Upload Time :</b></div>
								<div class="col-lg-2 pe-0"><?php echo $model->share_time_hh ?></div>
							</div>
						<?php } ?>
					<?php } ?>


				</div>
			</div>
			<hr>
			<div class="card-body">
				<h4 class="mb-3 mt-4 ">ASC CLEARANCE</h4>
				<br>
				<div class="row ms-2">
					<?php if ($model->asc_upload == 1) { ?>

						<div class="row mb-3">
							<div class="col-lg-1 ps-0"><b>Reference Code :</b></div>
							<div class="col-lg-2 pe-0"><?php echo $model->asc_reference_code ?></div>
							<div class="col-lg-1 ps-0"><b>Valid From :</b></div>
							<div class="col-lg-2 pe-0"><?php echo $model->asc_valid_from ?></div>
							<div class="col-lg-1 ps-0"><b>Valid To :</b></div>
							<div class="col-lg-2 pe-0"><?php echo $model->asc_valid_to ?></div>
						</div>
					<?php } ?>
					<?php if ($model->asc_upload == 2) { ?>
						<div class="row mb-3">
							<div class="col-lg-1 ps-0"><b>Upload ASC Date :</b></div>
							<div class="col-lg-2 pe-0"><?php echo $model->asc_date ?></div>
							<div class="col-lg-1 ps-0"><b>Upload ASC Time :</b></div>
							<div class="col-lg-2 pe-0"><?php echo $model->asc_time_hh ?></div>
						</div>
					<?php } ?>
				</div>


			</div>
		</div>
		<div class="col-md-1">
		</div>
	</div>