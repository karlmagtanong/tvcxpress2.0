<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
	'Login',
);
?>


<style>
	.btn-outline-primary {
		color: #fff !important;
		background-color: #fb6340 !important;
		border-color: #fb6340 !important;

	}

	/* .main-wrapper {
		display: flex;
		background-color: #fb6340 !important;
	} */

	.errorMessage {
		color: red !important;
		font-size: 12px;
	}

	/* 
	.bg-gradient-warning {
		background: linear-gradient(87deg, #fb6340 0, #fbb140 100%) !important;
	} */

	#example1 {

		background: url("http://tvcxpress2.0_yii.test/images/bg3.jpg") no-repeat center center fixed !important;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;

	}
</style>

<div class="main-wrapper">
	<div class="page-wrapper full-page">
		<div class="page-content d-flex align-items-center ">
			<div class="row w-100 mx-0 auth-page">
				<div class="col-md-8 col-lg-6 mx-auto">

					<div class="card">
						<div class="row">
							<div class="col-md-4 pe-md-0">
							</div>
							<div class="col-md-8 ps-md-0">
								<div class="auth-form-wrapper px-4 py-5">
									<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Capture.png" width="50%">
								</div>
							</div>
						</div>
						<div class="row">

							<div class="col-md-12 ps-md-0">
								<div class="auth-form-wrapper px-4 py-10">
									<h2 class="text-muted fw-normal mb-4"><strong>WELCOME BACK!</strong></h2>
									<p class="text-muted fw-normal mb-4">Log in to your account.</p>


									<div class="form">
										<?php $form = $this->beginWidget('CActiveForm', array(
											'id' => 'login-form',
											'enableClientValidation' => true,
											'clientOptions' => array(
												'validateOnSubmit' => true,
											),
										)); ?>


										<form class="forms-sample">
											<div class="mb-3">
												<label for="username" class="form-label">Username</label>
												<?php echo $form->textField(
													$model,
													'username',
													array('class' => 'form-control', 'placeholder' => 'Enter your username')
												); ?>
												<?php echo $form->error($model, 'username'); ?>

											</div>
											<div class="mb-3">
												<label for="password" class="form-label">Password</label>
												<?php echo $form->passwordField(
													$model,
													'password',
													array('class' => 'form-control', 'placeholder' => 'Enter your username')
												); ?>
												<br>
												<?php echo $form->error($model, 'password'); ?>

											</div>

											<div>
												<?php echo CHtml::submitButton('Login with TVC', array('class' => 'btn btn-outline-primary btn-icon-text mb-2 mb-md-0')); ?>
												<!-- <button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
													<i class="btn-icon-prepend" data-feather="user"></i>
													Login with TVC
												</button> -->
											</div>
										</form>



										<?php $this->endWidget(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>