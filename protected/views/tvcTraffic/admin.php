<script src="js/animatenumber/jquery.animateNumber.min.js"></script>


<?php


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tvc-traffic-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row">
	<div class="col-12 col-xl-12 stretch-card">
		<div class="row flex-grow-1">
			<div class="col-md-3 grid-margin stretch-card ">
				<div class="card <?php echo $_GET['idstat'] == 1 ? "border border-warning" : "" ?>">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-baseline">
							<h6 class="card-title mb-0">PENDING ORDER</h6>
						</div>
						<div class="row">
							<div class="col-6 col-md-12 col-xl-5">
								<h3 class="mb-2" id="pending"></h3>
							</div>
							<div class="col-6 col-md-12 col-xl-7">
								<div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
									<i class="ni ni-ruler-pencil"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 grid-margin stretch-card">
				<div class="card <?php echo $_GET['idstat'] == 2 ? "border border-warning" : "" ?>">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-baseline">
							<h6 class="card-title mb-0">SCHEDULED TODAY</h6>

						</div>
						<div class="row">
							<div class="col-6 col-md-12 col-xl-5">
								<h3 class="mb-2" id="schedtoday"></h3>
							</div>
							<div class="col-6 col-md-12 col-xl-7">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 grid-margin stretch-card">
				<div class="card <?php echo $_GET['idstat'] == 3 ? "border border-warning" : "" ?>">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-baseline">
							<h6 class="card-title mb-0">SCHEDULED ORDERS</h6>
						</div>
						<div class="row">
							<div class="col-6 col-md-12 col-xl-5">
								<h3 class="mb-2" id="schedord"></h3>
							</div>
							<div class="col-6 col-md-12 col-xl-7">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 grid-margin stretch-card">
				<div class="card <?php echo $_GET['idstat'] == 4 ? "border border-warning" : "" ?>">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-baseline">
							<h6 class="card-title mb-0">COMPLETED ORDERS</h6>
						</div>
						<div class="row">
							<div class="col-6 col-md-12 col-xl-5">
								<h3 class="mb-2" id="complete"></h3>
							</div>
							<div class="col-6 col-md-12 col-xl-7">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- row -->

<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="search-form" style="display:block">
					<?php
					$this->renderPartial('_search', array(
						'model' => $model,
					));
					?>
				</div><!-- search-form  -->
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<h3 class="card-title">TRAFFIC DASHBOARD</h3>
					</div>
				</div>

				<div class="table-responsive">
					<table class="table table-striped" id="traffictable" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>ORDER NO.</th>
								<th>ADVERTISER</th>
								<th>ASC BRAND</th>
								<th>ASC PROJECT TITLE</th>
								<th>LENGTH (SEC)</th>
								<th>SERVICE</th>
								<th>ORDER FORM STATUS</th>
								<th class="col-2 ">MATERIAL STATUS</th>
								<th>ASC CLEARANCE STATUS</th>
								<th>BILLING STATUS</th>
								<th>ORDER STATUS</th>
								<th>SCHEDULE</th>
								<th>ACTION</th>


							</tr>
						</thead>
						<tbody style="font-size: 10px;">
							<?php
							$i = 1;
							foreach ($model->get_traffic($_GET)->getData() as $val) { ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $val['order_code'] ?></td>
									<td><?php echo $val['advertiser'] ?></td>
									<td><?php echo $val['asc_brand'] ?></td>
									<td><?php echo $val['asc_project_title'] ?></td>
									<td><?php echo $val['length'] ?></td>
									<td><?php echo strtoupper($val['service_type'] == 1 ? "Transmission" : "Non-Transmission"); ?></td>
									<td style="cursor:pointer;<?php echo TvcTraffic::model()->get_status($val['ordrstat'], 1) == "Not Set" ? "color:red" : "" ?>" onclick="opensetstatus('<?php echo $val['sched'] ?>','<?php echo $val['order_code'] ?>',1)">
										<?php echo TvcTraffic::model()->get_status($val['ordrstat'], 1) ?>
									</td>
									<td style="cursor:pointer;<?php echo TvcTraffic::model()->get_status($val['matstat'], 2) == "Not Set" ? "color:red" : "" ?>" onclick="opensetstatus('<?php echo $val['sched'] ?>','<?php echo $val['order_code'] ?>',2)">
										<?php echo TvcTraffic::model()->get_status($val['matstat'], 2) ?>
									</td>
									<td style="cursor:pointer;<?php echo TvcTraffic::model()->get_status($val['ascstat'], 3) == "Not Set" ? "color:red" : "" ?>" onclick="opensetstatus('<?php echo $val['sched'] ?>','<?php echo $val['order_code'] ?>',3)">
										<?php echo TvcTraffic::model()->get_status($val['ascstat'], 3) ?>
									</td>
									<td style="cursor:pointer;<?php echo TvcTraffic::model()->get_status($val['billignstat'], 4) == "Not Set" ? "color:red" : "" ?>" onclick="opensetstatus('<?php echo $val['sched'] ?>','<?php echo $val['order_code'] ?>',4)">
										<?php echo TvcTraffic::model()->get_status($val['billignstat'], 4) ?>
									</td>
									<td style="cursor:pointer;<?php echo TvcTraffic::model()->get_status($val['trafficstat'], 5) == "Not Set" ? "color:red" : "" ?>" onclick="opensetstatus('<?php echo $val['sched'] ?>','<?php echo $val['order_code'] ?>',5)"><?php echo TvcTraffic::model()->get_status($val['trafficstat'], 5) ?></td>
									<td style="<?php echo $val['sched'] == "" ? "color:red" : "" ?>"><?php echo $val['sched'] == "" ? "Not Set" : $val['sched'] ?></td>
									<td>
										<?php if ($val['trafficstat'] != 3) { ?>
											<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=tvcOrder/update&id=<?php echo $val['id']; ?>" type="button" class="btn btn-primary btn-icon btn-xs">
												<i data-feather="edit"></i>
											</a>
										<?php } ?>

										<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=tvcOrder/viewtraffic&id=<?php echo $val['id']; ?>" type="button" class="btn btn-primary btn-icon btn-xs">
											<i data-feather="eye"></i>
										</a>
										<button type="button" class="btn btn-primary btn-icon btn-xs" onclick="opensetsched('<?php echo $val['order_code'] ?>','<?php echo $val['sched'] ?>')">
											<i data-feather="calendar"></i>
										</button>
									</td>
									<td style="display:none"><?php echo $val['sched'] == "" ? "" : 1 ?></td>
									<td style="display:none"><?php echo TvcTraffic::model()->get_status($val['trafficstat'], 5) ?></td>

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


<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#setschedmodal">
	Launch demo modal
</button>-->
<!-- Modal -->
<div class="modal fade bd-example-modal-sm" id="setschedmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">SET SCHEDULE</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<label class="form-label"><strong>ORDER NO.</strong></label>
					<input type="text" class="form-control" id="order_code_val" style="font-weight:bold;font-size:16px" readOnly>
				</div><br>
				<div class="row">
					<label class="form-label"><strong>SCHEDULE</strong></label>
					<input type="date" class="form-control" id="order_sched_val">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="setsched()">Save Schedule</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade bd-example-modal-sm" id="setstatusmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">SET STATUS</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<label class="form-label"><strong>ORDER NO.</strong></label>
					<input type="text" class="form-control" id="order_code_val_stat" style="font-weight:bold;font-size:16px" readOnly>
					<input type="hidden" class="form-control" id="order_code_val_stat_set" style="font-weight:bold;font-size:16px" readOnly>
				</div><br>
				<div class="row" id="divstatus">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="setstatus()">Save Status</button>
			</div>
		</div>
	</div>
</div>
<script>
	function opensetsched(code, sched) {

		$('#setschedmodal').modal('show')
		$("#order_code_val").val(code)
		$("#order_sched_val").val(sched)

	}

	function setsched() {
		date = $("#order_sched_val").val()
		code = $("#order_code_val").val()
		// alert(code + " - " + date)

		$.ajax({
			url: '<?php echo $this->createUrl('tvcTraffic/updateSched'); ?>',
			type: 'POST',
			dataType: 'html',
			data: {
				'code': code,
				'date': date,
				'YII_CSRF_TOKEN': '<?php echo Yii::app()->request->csrfToken; ?>',
			},
			success: function(response, status, data) {

				console.log(response)
				Swal.fire('Success',
					'Transaction successfully scheduled',
					'success').
				then((result) => {
					location.reload();
				})
			},
			error: function(xhr, status, error) {
				alert("Error Update")
			}
		});

	}

	function opensetstatus(sched, ordercode, stat) {

		if (sched == "") {

			Swal.fire('Error!',
				'You need to create <b>SCHEDULE</b> first to set status',
				'error').
			then((result) => {

			})

		} else {

			$('#setstatusmodal').modal('show')
			$("#order_code_val_stat").val(ordercode)
			$("#order_code_val_stat_set").val(stat)
			if (stat == 1) {
				$('#divstatus').html(
					'<label class="form-label"><strong>ORDER FORM STATUS</strong</label>\n\
				<select class="form-control" id="order_status_val">\n\
				<option value="">-Select-</option>\n\
				<option value="1">For Checking</option>\n\
					<option value="2">Complete</option>\n\
					<option value="3">Issue Found</option>\n\
					</select>'
				)
			}
			if (stat == 2) {
				$('#divstatus').html(
					'<label class="form-label"><strong>MATERIAL STATUS</strong</label>\n\
				<select class="form-control" id="order_status_val">\n\
				<option value="">-Select-</option>\n\
				<option value="1">Pending</option>\n\
					<option value="2">Upload Verified</option>\n\
					<option value="3">For Approval</option>\n\
					<option value="4">Processing</option>\n\
					<option value="5">Issue Found</option>\n\
					<option value="6">Approved</option>\n\
					</select>'
				)
			}

			if (stat == 3) {
				$('#divstatus').html(
					'<label class="form-label"><strong>ASC CLEARANCE STATUS</strong</label>\n\
				<select class="form-control" id="order_status_val">\n\
				<option value="">-Select-</option>\n\
				<option value="1">Pending</option>\n\
					<option value="2">Attached</option>\n\
					<option value="3">Issue Found</option>\n\
					</select>'
				)
			}
			if (stat == 4) {
				$('#divstatus').html(
					'<label class="form-label"><strong>BILLING STATUS</strong</label>\n\
				<select class="form-control" id="order_status_val">\n\
				<option value="">-Select-</option>\n\
				<option value="1">Pending</option>\n\
					<option value="2">Cleared</option>\n\
					</select>'
				)
			}
			if (stat == 5) {
				$('#divstatus').html(
					'<label class="form-label"><strong>ORDER STATUS</strong</label>\n\
				<select class="form-control" id="order_status_val">\n\
				<option value="">-Select-</option>\n\
				<option value="1">Processing</option>\n\
					<option value="2">Incomplete</option>\n\
					<option value="3">Ready to Transmit</option>\n\
					</select>'
				)
			}

		}


		// alert(ordercode + "-" + stat)
	}

	function setstatus() {
		stat = $("#order_status_val").val()
		code = $("#order_code_val_stat").val()
		statset = $("#order_code_val_stat_set").val()


		// alert(code + "-" + stat)

		$.ajax({
			url: '<?php echo $this->createUrl('tvcTraffic/updateStatus'); ?>',
			type: 'POST',
			dataType: 'html',
			data: {
				'code': code,
				'stat': stat,
				'statset': statset,
				'YII_CSRF_TOKEN': '<?php echo Yii::app()->request->csrfToken; ?>',
			},
			success: function(response, status, data) {

				console.log(response)
				Swal.fire('Success',
					'Status successfully saved',
					'success').
				then((result) => {
					location.reload();
				})
			},
			error: function(xhr, status, error) {
				alert("Error Update")
			}
		});
	}

	var datenow = GetTodayDate()
	var count_pending = $("#traffictable td:nth-child(12):contains('Not Set')").length;
	var count_sched_today = $("#traffictable td:nth-child(13):contains('" + datenow + "')").length;
	var count_sched_orders = $("#traffictable td:nth-child(15):contains(1)").length;
	var count_sched_complete = $("#traffictable td:nth-child(16):contains('Ready to Transmit')").length;

	// alert(count_sched_complete)

	// $('#germ').animateNumber({number: response}).css({'font-size': '30px', 'font-weight': 'bold', 'text-align': 'center'});

	$("#pending").animateNumber({
		number: count_pending
	})
	$("#schedtoday").animateNumber({
		number: count_sched_today
	})
	$("#schedord").animateNumber({
		number: count_sched_orders
	})
	$("#complete").animateNumber({
		number: count_sched_complete
	})

	function GetTodayDate() {
		var tdate = new Date();
		var dd = tdate.getDate(); //yields day
		var MM = tdate.getMonth(); //yields month
		var yyyy = tdate.getFullYear(); //yields year
		var currentDate = yyyy + "-" + addZero(MM + 1) + "-" + dd;

		return currentDate;
	}

	function addZero(i) {
		if (i < 10) {
			i = "0" + i;
		}
		return i;
	}

	function getdata(card) {
		// alert("asdasd" + card)

		var url = "<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=tvcTraffic/admin&idstat=" + card;
		location.href = url;

	}
</script>