<?php
  $session = $this->session->userdata('lang');
    if(empty($session)){ 
    $this->session->set_userdata('lang', 'en');
    $this->session->set_userdata('dir', 'ltr');
    } 
?>
<!doctype html>
<html lang="<?php echo $_SESSION["lang"] ?>" dir="<?php echo $_SESSION["dir"] ?>">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Delmon</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="<?php echo base_url()?>assets/home_assets/img/fav.png" rel="icon">


	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/home_assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
		integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Vendor CSS Files -->
	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>


	<link href="<?php echo base_url()?>assets/home_assets/vendor/aos/aos.css" rel="stylesheet">


	<link href="<?php echo base_url()?>assets/home_assets/css/variables.css" rel="stylesheet">

	<?php if($this->session->userdata('lang') !='en') {?>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<?php } ?>
	<!-- Template Main CSS File -->
	<link href="<?php echo base_url()?>assets/home_assets/css/main.css" rel="stylesheet">

	<style>
		/*------------------------*/

		/*---------signup-step-------------*/
		html[dir="rtl"] .footer .footer-content .footer-info p {
			text-align: right;
		}

		html[dir="rtl"] .footer .footer-content h4 {
			text-align: right;
		}

		html[dir="rtl"] .social-links {
			text-align: right;
		}

		html[dir="rtl"] .form-group {
			text-align: right !important;
		}

		html[dir="rtl"] .c-career {
			text-align: right !important;
		}

		html[dir="rtl"] .form-check-label {
			margin-right: 10px !important;
		}

		html[dir="rtl"] .list-inline li {
			margin-left: 30%;
		}

		.c-career {
			color: var(--color-black);
		}

		textarea.form-control {
			height: 140px !important;
		}

		.signup-step-container {
			padding: 0px 0px;
			padding-bottom: 30px;
			position: relative;
			top: -20px;
		}

		.wizard .nav-tabs {
			position: relative;
			margin-bottom: 0;
			border-bottom-color: transparent;
		}

		.wizard>div.wizard-inner {
			position: relative;
			margin-bottom: 50px;
			text-align: center;
		}

		.connecting-line {
			height: 2px;
			background: #e0e0e0;
			position: absolute;
			width: 75%;
			margin: 0 auto;
			left: 0;
			right: 0;
			top: 15px;
			z-index: 1;
		}

		.wizard .nav-tabs>li.active>a,
		.wizard .nav-tabs>li.active>a:hover,
		.wizard .nav-tabs>li.active>a:focus {
			color: #555555;
			cursor: default;
			border: 0;
			border-bottom-color: transparent;
		}

		span.round-tab {
			width: 30px;
			height: 30px;
			line-height: 30px;
			display: inline-block;
			border-radius: 50%;
			background: #fff;
			z-index: 2;
			position: absolute;
			left: 0;
			text-align: center;
			font-size: 16px;
			color: #0e214b;
			font-weight: 500;
			border: 1px solid #ddd;
		}

		span.round-tab i {
			color: #555555;
		}

		.wizard li.active span.round-tab {
			background: #0db02b;
			color: #fff;
			border-color: #0db02b;
		}

		.wizard li.active span.round-tab i {
			color: #5bc0de;
		}

		.wizard .nav-tabs>li.active>a i {
			color: #0db02b;
		}

		.wizard .nav-tabs>li {
			width: 25%;
		}

		.wizard li:after {
			content: " ";
			position: absolute;
			left: 46%;
			opacity: 0;
			margin: 0 auto;
			bottom: 0px;
			border: 5px solid transparent;
			border-bottom-color: red;
			transition: 0.1s ease-in-out;
		}



		.wizard .nav-tabs>li a {
			width: 30px;
			height: 30px;
			margin: 20px auto;
			border-radius: 100%;
			padding: 0;
			background-color: transparent;
			position: relative;
			top: 0;
		}

		.wizard .nav-tabs>li a i {
			position: absolute;
			top: -15px;
			font-style: normal;
			font-weight: 400;
			white-space: nowrap;
			left: 50%;
			transform: translate(-50%, -50%);
			font-size: 12px;
			font-weight: 700;
			color: #000;
		}

		.wizard .nav-tabs>li a:hover {
			background: transparent;
		}

		.wizard .tab-pane {
			position: relative;
			padding-top: -20px;
		}


		.wizard h3 {
			margin-top: 0;
		}

		.prev-step,
		.next-step {
			font-size: 13px;
			padding: 8px 24px;
			border: none;
			border-radius: 4px;
			margin-top: 30px;
		}

		.next-step {
			background-color: #0db02b;
		}

		.skip-btn {
			background-color: #cec12d;
		}

		.step-head {
			font-size: 20px;
			text-align: center;
			font-weight: 500;
			margin-bottom: 20px;
		}

		.term-check {
			font-size: 14px;
			font-weight: 400;
		}

		.custom-file {
			position: relative;
			display: inline-block;
			width: 100%;
			height: 40px;
			margin-bottom: 0;
		}

		.custom-file-input {
			position: relative;
			z-index: 2;
			width: 100%;
			height: 40px;
			margin: 0;
			opacity: 0;
		}

		.custom-file-label {
			position: absolute;
			top: 0;
			right: 0;
			left: 0;
			z-index: 1;
			height: 40px;
			padding: .375rem .75rem;
			font-weight: 400;
			line-height: 2;
			color: #495057;
			background-color: #fff;
			border: 1px solid #ced4da;
			border-radius: .25rem;
		}

		.custom-file-label::after {
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			z-index: 3;
			display: block;
			height: 38px;
			padding: .375rem .75rem;
			line-height: 2;
			color: #495057;
			content: "Browse";
			background-color: #e9ecef;
			border-left: inherit;
			border-radius: 0 .25rem .25rem 0;
		}


		.list-content {
			margin-bottom: 10px;
		}

		.list-content a {
			padding: 10px 15px;
			width: 100%;
			display: inline-block;
			background-color: #f5f5f5;
			position: relative;
			color: #565656;
			font-weight: 400;
			border-radius: 4px;
		}

		.list-content a[aria-expanded="true"] i {
			transform: rotate(180deg);
		}

		.list-content a i {
			text-align: right;
			position: absolute;
			top: 15px;
			right: 10px;
			transition: 0.5s;
		}

		.list-box {
			padding: 10px;
		}

		.signup-logo-header .logo_area {
			width: 200px;
		}

		.signup-logo-header .nav>li {
			padding: 0;
		}

		.signup-logo-header .header-flex {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.list-inline li {
			display: inline-block;
		}

		.pull-right {
			float: center;
		}

		/*-----------custom-checkbox-----------*/
		/*----------Custom-Checkbox---------*/
		input[type="checkbox"] {
			position: relative;
			display: inline-block;
			margin-right: 5px;
		}

		input[type="checkbox"]::before,
		input[type="checkbox"]::after {
			position: absolute;
			content: "";
			display: inline-block;
		}

		input[type="checkbox"]::before {
			height: 16px;
			width: 16px;
			border: 1px solid #999;
			left: 0px;
			top: 0px;
			background-color: #fff;
			border-radius: 2px;
		}

		input[type="checkbox"]::after {
			height: 5px;
			width: 9px;
			left: 4px;
			top: 4px;
		}

		input[type="checkbox"]:checked::after {
			content: "";
			border-left: 1px solid #fff;
			border-bottom: 1px solid #fff;
			transform: rotate(-45deg);
		}

		input[type="checkbox"]:checked::before {
			background-color: #18ba60;
			border-color: #18ba60;
		}

		@media (max-width: 767px) {
			.sign-content h3 {
				font-size: 40px;
			}

			.wizard .nav-tabs>li a i {
				display: none;
			}

			.signup-logo-header .navbar-toggle {
				margin: 0;
				margin-top: 8px;
			}

			.signup-logo-header .logo_area {
				margin-top: 0;
			}

			.signup-logo-header .header-flex {
				display: block;
			}
		}

	  .avatar-upload {
  position: relative;
  max-width: 205px;
  margin: 50px auto;
  height: 230px;
    width: 250px;
    background: #EAEAEA;
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    margin-top: 29px;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: -9px;
  z-index: 1;
  top: -10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 40px;
  height: 40px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: 'FontAwesome';
  color: #757575;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  
  }
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
 
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
	</style>
</head>

<body>

	<!-- ======= Header ======= -->
		<?php 
	$data['page'] = 'career' ;
	$data['menu'] = $menu ;
	$data['link'] = $link ;
	$data['address'] = $address ;
	$data['contact'] = $contact ;
	$this->load->view('home/header',$data);
 	?>
<script type="text/javascript" src="https://form.jotform.com/jsform/230921182067452"></script>
	<section id="career"
		style="background:url(<?php echo base_url()?>uploads/images/banners/<?php echo $banner->image ?>) !important;background-repeat:no-repeat !important;background-size:cover !important;"
		class="hero-animated d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="career-head">
						<h2 class="text-center"><?php if($session == 'en') {
echo $banner->banner_title;}
elseif ($session == 'ar') {
  echo $banner->banner_title_ar;} ?></h2>
					</div>

				</div>
			</div>

		</div>
	</section>
	<!-- End Header -->
	<section class="signup-step-container">
		<div class="container">
			<div class="row d-flex justify-content-center box-career">

				<div class="col-lg-10">
					<div class="form-wizard">
						<form action="add_career" id="contactForm" method="post" role="form">
							<div class="form-wizard-header">
								<p>Fill all form field to go next step</p>
								<ul class="list-unstyled form-wizard-steps clearfix">
									<li class="active"><span>1</span></li>
									<li><span>2</span></li>
									<li><span>3</span></li>
									<li><span>4</span></li>
								</ul>
							</div>
							<fieldset class="wizard-fieldset show">
								<div class="row">
								<div class="col-md-4">
									
										<div class="avatar-upload">
											<div class="avatar-edit">
												<input type='file' id="imageUpload" name="file"
													accept=".png, .jpg, .jpeg" />
												<label for="imageUpload"></label>
											</div>
											<div class="avatar-preview">
												<div id="imagePreview"
													style="background-image: url(../assets/home_assets/img/user_icon.svg);background-position:center;">
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-8">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group has-validation">
													<label class="fl-career" for="name"><?php if($session == 'en') {
echo $career->form_field2;}
elseif ($session == 'ar') {
  echo $career->form_field2_ar;} ?><span class="sp">*<span></label>
													<input class="form-control form-career  wizard-required" type="text" name="form_field2"
														id="name" placeholder="" required>
													<div class="wizard-form-error">Enter Valid Name</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field3;}
elseif ($session == 'ar') {
  echo $career->form_field3_ar;} ?></label>
													<input class="form-control form-career wizard-required" type="text" name="form_field3"
														placeholder="" required>
													<div class="wizard-form-error">Enter Father Name</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field4;}
elseif ($session == 'ar') {
  echo $career->form_field4_ar;} ?></label>
													<input class="form-control form-career" type="text" name="form_field4"
														placeholder="">
													
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="fl-career"><?php if($session == 'en') {
echo  $career->form_field5;}
elseif ($session == 'ar') {
  echo  $career->form_field5_ar;} ?><span class="sp">*<span></label>
													<input class="form-control form-career wizard-required" type="text" name="form_field5" placeholder="">
												<div class="wizard-form-error">Enter the field</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<h6 class="text-left add-red"><?php if($session == 'en') {
echo "Address";}
elseif ($session == 'ar') {
  echo "العنوان";} ?></h6>
								<div class="row">

									<div class="col-md-8">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field6;}
elseif ($session == 'ar') {
  echo $career->form_field6_ar;} ?><span class="sp">*<span></label>
											<input class="form-control form-career wizard-required" type="text" name="form_field6"
												placeholder="">
											<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field7;}
elseif ($session == 'ar') {
  echo $career->form_field7_ar;} ?><span class="sp">*<span></label>
											<input class="form-control form-career  wizard-required" type="text" name="form_field7"
												placeholder="">
											<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field8;}
elseif ($session == 'ar') {
  echo $career->form_field8_ar;} ?><span class="sp">*<span></label>
											<input class="form-control form-career  wizard-required" type="text" name="form_field8"
												placeholder="">
											<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field9;}
elseif ($session == 'ar') {
  echo $career->form_field9_ar;} ?><span class="sp">*<span></label>
											<input class="form-control form-career  wizard-required" type="text" name="form_field9"
												placeholder="">
											<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>


								</div>
								<!-- end row -->
								<h6 class="text-left add-red"><?php if($session == 'en') {
echo "Marital Information";}
elseif ($session == 'ar') {
  echo "المعلومات الاجتماعية";} ?></h6>
								<div class="row">

									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field10;}
elseif ($session == 'ar') {
  echo $career->form_field10_ar;} ?><span class="sp">*<span></label>
											<input class="form-control form-career  wizard-required" type="text" name="form_field10"
												placeholder="">
											<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field11;}
elseif ($session == 'ar') {
  echo $career->form_field11_ar;} ?><span class="sp">*<span></label>
											<input class="form-control form-career  wizard-required" type="text" name="form_field11"
												placeholder="">
											<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field12;}
elseif ($session == 'ar') {
  echo $career->form_field12_ar;} ?><span class="sp">*<span></label>
											<input class="form-control form-career  wizard-required" type="text" name="form_field12"
												placeholder="">
											<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>



									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field13;}
elseif ($session == 'ar') {
  echo $career->form_field13_ar;} ?><span class="sp">*<span></label>
											<input class="form-control form-career  wizard-required" type="text" name="form_field13"
												placeholder="">
											<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field14;}
elseif ($session == 'ar') {
  echo $career->form_field14_ar;} ?><span class="sp">*<span></label>
											<input class="form-control form-career  wizard-required" type="text" name="form_field14"
												placeholder="">
											<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>

								</div>
								<!-- end-row -->
								<div class="row">
									<div class="col-md-4"></div>
									<div class="col-md-6">
										<div class="form-group clearfix">
											<a href="javascript:;" class="form-wizard-next-btn float-center">Next</a>
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset class="wizard-fieldset">
								<h6 class="text-left add-red"><?php if($session == 'en') {
echo "Education Level";}
elseif ($session == 'ar') {
  echo "المستوى التعليمي";} ?></h6>
								<div class="row">

									<div class="col-md-6">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field15;}
elseif ($session == 'ar') {
  echo $career->form_field15_ar;} ?></label>
											<input class="form-control form-career wizard-required" type="text" name="form_field15"
												placeholder="">
											<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field16;}
elseif ($session == 'ar') {
  echo $career->form_field16_ar;} ?></label>
											<input class="form-control form-career wizard-required" type="text" name="form_field16"
												placeholder="">
											<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>
								</div>
								<h6 class="text-left add-red"><?php if($session == 'en') {
echo "Contacts";}
elseif ($session == 'ar') {
  echo "الاتصال";} ?></h6>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field17;}
elseif ($session == 'ar') {
  echo $career->form_field17_ar;} ?><span class="sp">*<span></label>
											<input class="form-control form-career wizard-required" type="email" name="form_field17"
												placeholder="">
											<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field18;}
elseif ($session == 'ar') {
  echo $career->form_field18_ar;} ?><span class="sp">*<span></label>
											<input class="form-control form-career wizard-required" type="number" name="form_field18"
												placeholder="">
<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field19;}
elseif ($session == 'ar') {
  echo $career->form_field19_ar;} ?></label>
											<input class="form-control form-career wizard-required" type="number" name="form_field19"
												placeholder="">
											<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field20;}
elseif ($session == 'ar') {
  echo $career->form_field20_ar;} ?></label>
											<input class="form-control form-career" type="text" name="form_field20" placeholder="">
											<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>

								</div>
								<h6 class="text-left add-red"><?php if($session == 'en') {
echo "Relative Telephone No";}
elseif ($session == 'ar') {
  echo "أرقام ذات صلة";} ?></h6>
								<h6 class="c-career"><?php if($session == 'en') {
echo "First Person";}
elseif ($session == 'ar') {
  echo "الشخص الاول";} ?></h6>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field21;}
elseif ($session == 'ar') {
  echo $career->form_field21_ar;} ?><span class="sp">*<span></label>
											<input class="form-control form-career wizard-required" type="text" name="form_field21" placeholder="">
									<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field22;}
elseif ($session == 'ar') {
  echo $career->form_field22_ar;} ?><span class="sp">*<span></label>
											<input class="form-control form-career wizard-required" type="text" name="form_field22" placeholder="">
										<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field23;}
elseif ($session == 'ar') {
  echo $career->form_field23_ar;} ?><span class="sp">*<span></label>
											<input class="form-control form-career wizard-required" type="text" name="form_field23" placeholder="">
										<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field24;}
elseif ($session == 'ar') {
  echo $career->form_field24_ar;} ?><span class="sp">*<span></label>
											<input class="form-control form-career wizard-required" type="text" name="form_field24" placeholder="">
										<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>

								</div>
								<h6 class="c-career"><?php if($session == 'en') {
echo "Second Person";}
elseif ($session == 'ar') {
  echo "الشخص الثاني";} ?></h6>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field25;}
elseif ($session == 'ar') {
  echo $career->form_field25_ar;} ?></label>
											<input class="form-control form-career" type="text" name="form_field25" placeholder="">
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field26;}
elseif ($session == 'ar') {
  echo $career->form_field26_ar;} ?></label>
											<input class="form-control form-career" type="text" name="form_field26" placeholder="">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field27;}
elseif ($session == 'ar') {
  echo $career->form_field27_ar;} ?></label>
											<input class="form-control form-career" type="text" name="form_field27" placeholder="">
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field28;}
elseif ($session == 'ar') {
  echo $career->form_field28_ar;} ?></label>
											<input class="form-control form-career" type="text" name="form_field28" placeholder="">
										</div>
									</div>

								</div>
								<div class="form-group clearfix">
									<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
									<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
								</div>
							</fieldset>
							<fieldset class="wizard-fieldset">
								<h6 class="text-left add-red"><?php if($session == 'en') {
echo "General Information";}
elseif ($session == 'ar') {
  echo "المعلومات العامة";} ?></h6>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field29;}
elseif ($session == 'ar') {
  echo $career->form_field29_ar;} ?></label>

										</div>
									</div>
									<div class="col-md-2"></div>
									<div class="col-md-1">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="form_field29" id="inlineRadio1"
												value="1">
											<label class="form-check-label" for="form_field29"><?php if($session == 'en') {
echo "Yes";}
elseif ($session == 'ar') {
  echo "لا";} ?></label>
										</div>
									</div>
									<div class="col-md-1">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="form_field29" id="inlineRadio2" value="0">
											<label class="form-check-label" for="form_field29"><?php if($session == 'en') {
echo "No";}
elseif ($session == 'ar') {
  echo "نعم";} ?></label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field30;}
elseif ($session == 'ar') {
  echo $career->form_field30_ar;} ?></label>

										</div>
									</div>
									<div class="col-md-2"></div>
									<div class="col-md-1">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="form_field30" id="inlineRadio1"
												value="1">
											<label class="form-check-label" for="form_field30"><?php if($session == 'en') {
echo "Yes";}
elseif ($session == 'ar') {
  echo "لا";} ?></label>
										</div>
									</div>
									<div class="col-md-1">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="form_field30" id="inlineRadio2"
												value="0">
											<label class="form-check-label" for="form_field30"><?php if($session == 'en') {
echo "No";}
elseif ($session == 'ar') {
  echo "نعم";} ?></label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field31;}
elseif ($session == 'ar') {
  echo $career->form_field31_ar;} ?></label>

										</div>
									</div>
									<div class="col-md-2"></div>
									<div class="col-md-1">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="form_field31" id="inlineRadio1"
												value="1">
											<label class="form-check-label" for="form_field31"><?php if($session == 'en') {
echo "Yes";}
elseif ($session == 'ar') {
  echo "لا";} ?></label>
										</div>
									</div>
									<div class="col-md-1">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="form_field31" id="inlineRadio2"
												value="0">
											<label class="form-check-label" for="form_field31"><?php if($session == 'en') {
echo "No";}
elseif ($session == 'ar') {
  echo "نعم";} ?></label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field32;}
elseif ($session == 'ar') {
  echo $career->form_field32_ar;} ?></label>
										</div>
									</div>
									<div class="col-md-2"></div>
									<div class="col-md-1">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="form_field32" id="inlineRadio1"
												value="1">
											<label class="form-check-label" for="form_field32"><?php if($session == 'en') {
echo "Yes";}
elseif ($session == 'ar') {
  echo "لا";} ?></label>
										</div>
									</div>
									<div class="col-md-1">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="form_field32" id="inlineRadio2"
												value="0">
											<label class="form-check-label" for="form_field32"><?php if($session == 'en') {
echo "No";}
elseif ($session == 'ar') {
  echo "نعم";} ?></label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field33;}
elseif ($session == 'ar') {
  echo $career->form_field33_ar;} ?></label>
										</div>
									</div>
									<div class="col-md-2"></div>
									<div class="col-md-1">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="form_field33" id="inlineRadio1"
												value="1">
											<label class="form-check-label" for="form_field33"><?php if($session == 'en') {
echo "Yes";}
elseif ($session == 'ar') {
  echo "لا";} ?></label>
										</div>
									</div>
									<div class="col-md-1">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="form_field33" id="inlineRadio2"
												value="0">
											<label class="form-check-label" for="form_field33"><?php if($session == 'en') {
echo "No";}
elseif ($session == 'ar') {
  echo "نعم";} ?></label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field34;}
elseif ($session == 'ar') {
  echo $career->form_field34_ar;} ?></label>
										</div>
									</div>
									<div class="col-md-2"></div>
									<div class="col-md-1">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="form_field34" id="inlineRadio1"
												value="1">
											<label class="form-check-label" for="form_field34"><?php if($session == 'en') {
echo "Yes";}
elseif ($session == 'ar') {
  echo "لا";} ?></label>
										</div>
									</div>
									<div class="col-md-1">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="form_field34" id="inlineRadio2"
												value="0">
											<label class="form-check-label" for="form_field34"><?php if($session == 'en') {
echo "No";}
elseif ($session == 'ar') {
  echo "نعم";} ?></label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field35;}
elseif ($session == 'ar') {
  echo $career->form_field35_ar;} ?></label>
											<input class="form-control form-career wizard-required" type="text" name="form_field35"
												placeholder="">
												<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field36;}
elseif ($session == 'ar') {
  echo $career->form_field36_ar;} ?></label>
											<input class="form-control form-career wizard-required" type="text" name="form_field36"
												placeholder="">
												<div class="wizard-form-error">Enter the field</div>
										</div>
									</div>
								</div>
								<hr class="hr">
								<h6 class="text-left add-red"><?php if($session == 'en') {
echo "Work Experince";}
elseif ($session == 'ar') {
  echo " الخبرات العملية";} ?></h6>
								<h6 class="c-career"><?php if($session == 'en') {
echo "Company (1)";}
elseif ($session == 'ar') {
  echo "اسم الشركة";} ?></h6>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field37;}
elseif ($session == 'ar') {
  echo $career->form_field37_ar;} ?></label>
											<input class="form-control form-career" type="text" name="form_field37" placeholder="">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field38;}
elseif ($session == 'ar') {
  echo $career->form_field38_ar;} ?></label>
											<input class="form-control form-career" type="text" name="form_field38" placeholder="">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field39;}
elseif ($session == 'ar') {
  echo $career->form_field39_ar;} ?></label>
											<input class="form-control form-career" type="text" name="form_field39" placeholder="">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field40;}
elseif ($session == 'ar') {
  echo $career->form_field40_ar;} ?></label>
											<input class="form-control form-career" type="text" name="form_field40" placeholder="">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="fl-career" for="validationTextarea"><?php if($session == 'en') {
echo $career->form_field41;}
elseif ($session == 'ar') {
  echo $career->form_field41_ar;} ?></label>
											<textarea class="form-control form-career" name="form_field41" required></textarea>
										</div>
									</div>
								</div>
								<br>
								<h6 class="c-career">Company (2)</h6>

								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field42;}
elseif ($session == 'ar') {
  echo $career->form_field42_ar;} ?></label>
											<input class="form-control form-career" type="text" name="form_field42" placeholder="">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field43;}
elseif ($session == 'ar') {
  echo $career->form_field43_ar;} ?></label>
											<input class="form-control form-career" type="text" name="form_field43" placeholder="">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field44;}
elseif ($session == 'ar') {
  echo $career->form_field44_ar;} ?></label>
											<input class="form-control form-career" type="text" name="form_field44" placeholder="">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field45;}
elseif ($session == 'ar') {
  echo $career->form_field45_ar;} ?></label>
											<input class="form-control form-career" type="text" name="form_field45" placeholder="">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="fl-career" for="validationTextarea"><?php if($session == 'en') {
echo $career->form_field46;}
elseif ($session == 'ar') {
  echo $career->form_field46_ar;} ?></label>
											<textarea class="form-control form-career" name="form_field46" required></textarea>
										</div>
									</div>
								</div>
								<br>
								<h6 class="c-career">Company (3)</h6>

								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field47;}
elseif ($session == 'ar') {
  echo $career->form_field47_ar;} ?></label>
											<input class="form-control form-career" type="text" name="form_field47" placeholder="">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field48;}
elseif ($session == 'ar') {
  echo $career->form_field48_ar;} ?></label>
											<input class="form-control form-career" type="text" name="form_field48" placeholder="">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field49;}
elseif ($session == 'ar') {
  echo $career->form_field49_ar;} ?></label>
											<input class="form-control form-career" type="text" name="form_field3749" placeholder="">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="fl-career"><?php if($session == 'en') {
echo $career->form_field50;}
elseif ($session == 'ar') {
  echo $career->form_field50_ar;} ?></label>
											<input class="form-control form-career" type="text" name="form_field50" placeholder="">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="fl-career" for="validationTextarea"><?php if($session == 'en') {
echo $career->form_field51;}
elseif ($session == 'ar') {
  echo $career->form_field51_ar;} ?></label>
											<textarea class="form-control form-career" name="form_field51" required></textarea>
										</div>
									</div>

									<div class="form-group clearfix">
										<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
										<button type="submit" class="form-wizard-submit float-right"><?php if($session == 'en') {
echo "Submit";}
elseif ($session == 'ar') {
  echo "إرسال";} ?></button>
									</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>


	<script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
	<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
	<script>
		// ------------step-wizard-------------

		jQuery(document).ready(function () {
			// click on next button
			jQuery('.form-wizard-next-btn').click(function () {
				var parentFieldset = jQuery(this).parents('.wizard-fieldset');
				var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
				var next = jQuery(this);
				var nextWizardStep = true;
				parentFieldset.find('.wizard-required').each(function () {
					var thisValue = jQuery(this).val();

					if (thisValue == "") {
						jQuery(this).siblings(".wizard-form-error").slideDown();
						nextWizardStep = false;
					} else {
						jQuery(this).siblings(".wizard-form-error").slideUp();
					}
				});
				if (nextWizardStep) {
					next.parents('.wizard-fieldset').removeClass("show", "400");
					currentActiveStep.removeClass('active').addClass('activated').next().addClass('active', "400");
					next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show", "400");
					jQuery(document).find('.wizard-fieldset').each(function () {
						if (jQuery(this).hasClass('show')) {
							var formAtrr = jQuery(this).attr('data-tab-content');
							jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function () {
								if (jQuery(this).attr('data-attr') == formAtrr) {
									jQuery(this).addClass('active');
									var innerWidth = jQuery(this).innerWidth();
									var position = jQuery(this).position();
									jQuery(document).find('.form-wizard-step-move').css({
										"left": position.left,
										"width": innerWidth
									});
								} else {
									jQuery(this).removeClass('active');
								}
							});
						}
					});
				}
			});
			//click on previous button
			jQuery('.form-wizard-previous-btn').click(function () {
				var counter = parseInt(jQuery(".wizard-counter").text());;
				var prev = jQuery(this);
				var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
				prev.parents('.wizard-fieldset').removeClass("show", "400");
				prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show", "400");
				currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active', "400");
				jQuery(document).find('.wizard-fieldset').each(function () {
					if (jQuery(this).hasClass('show')) {
						var formAtrr = jQuery(this).attr('data-tab-content');
						jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function () {
							if (jQuery(this).attr('data-attr') == formAtrr) {
								jQuery(this).addClass('active');
								var innerWidth = jQuery(this).innerWidth();
								var position = jQuery(this).position();
								jQuery(document).find('.form-wizard-step-move').css({
									"left": position.left,
									"width": innerWidth
								});
							} else {
								jQuery(this).removeClass('active');
							}
						});
					}
				});
			});
			//click on form submit button
			jQuery(document).on("click", ".form-wizard .form-wizard-submit", function () {
				var parentFieldset = jQuery(this).parents('.wizard-fieldset');
				var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
				parentFieldset.find('.wizard-required').each(function () {
					var thisValue = jQuery(this).val();
					if (thisValue == "") {
						jQuery(this).siblings(".wizard-form-error").slideDown();
					} else {
						jQuery(this).siblings(".wizard-form-error").slideUp();
					}
				});
			});
			// focus on input field check empty or not
			jQuery(".form-control").on('focus', function () {
				var tmpThis = jQuery(this).val();
				if (tmpThis == '') {
					jQuery(this).parent().addClass("focus-input");
				} else if (tmpThis != '') {
					jQuery(this).parent().addClass("focus-input");
				}
			}).on('blur', function () {
				var tmpThis = jQuery(this).val();
				if (tmpThis == '') {
					jQuery(this).parent().removeClass("focus-input");
					jQuery(this).siblings('.wizard-form-error').slideDown("3000");
				} else if (tmpThis != '') {
					jQuery(this).parent().addClass("focus-input");
					jQuery(this).siblings('.wizard-form-error').slideUp("3000");
				}
			});
		});
		//selecting all required elements
		const dropArea = document.querySelector(".drag-area"),
			dragText = dropArea.querySelector("header"),
			button = dropArea.querySelector("button"),
			input = dropArea.querySelector("input");
		let file; //this is a global variable and we'll use it inside multiple functions

		button.onclick = () => {
			input.click(); //if user click on the button then the input also clicked
		}

		input.addEventListener("change", function () {
			//getting user select file and [0] this means if user select multiple files then we'll select only the first one
			file = this.files[0];
			dropArea.classList.add("active");
			showFile(); //calling function
		});


		//If user Drag File Over DropArea
		dropArea.addEventListener("dragover", (event) => {
			event.preventDefault(); //preventing from default behaviour
			dropArea.classList.add("active");
			dragText.textContent = "Release to Upload File";
		});

		//If user leave dragged File from DropArea
		dropArea.addEventListener("dragleave", () => {
			dropArea.classList.remove("active");
			dragText.textContent = "Drag & Drop to Upload File";
		});

		//If user drop File on DropArea
		dropArea.addEventListener("drop", (event) => {
			event.preventDefault(); //preventing from default behaviour
			//getting user select file and [0] this means if user select multiple files then we'll select only the first one
			file = event.dataTransfer.files[0];
			showFile(); //calling function
		});

		function showFile() {
			let fileType = file.type; //getting selected file type
			let validExtensions = ["image/jpeg", "image/jpg", "image/png"]; //adding some valid image extensions in array
			if (validExtensions.includes(fileType)) { //if user selected file is an image file
				let fileReader = new FileReader(); //creating new FileReader object
				fileReader.onload = () => {
					let fileURL = fileReader.result; //passing user file source in fileURL variable
					let imgTag =
					`<img src="${fileURL}" alt=""><input type="hidden" name="pro_file" value="${fileURL}">`; //creating an img tag and passing user selected file source inside src attribute
					dropArea.innerHTML = imgTag; //adding that created img tag inside dropArea container
				}
				fileReader.readAsDataURL(file);
			} else {
				alert("This is not an Image File!");
				dropArea.classList.remove("active");
				dragText.textContent = "Drag & Drop to Upload File";
			}
		}

	</script>
	<!-- ======= Footer ======= -->
	<?php $this->load->view('home/footer',$data);?>

	<!-- End Footer -->
	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script> -->
	<!-- Vendor JS Files -->
	<!-- <script src="<?php echo base_url()?>assets/home_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
	<script src="<?php echo base_url()?>assets/home_assets/vendor/aos/aos.js"></script>
	<script src="<?php echo base_url()?>assets/home_assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="<?php echo base_url()?>assets/home_assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="<?php echo base_url()?>assets/home_assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="<?php echo base_url()?>assets/home_assets/vendor/php-email-form/validate.js"></script>
	<script src="<?php echo base_url() ?>assets/home_assets/js/jquery-3.5.1.min.js"></script>

	<!-- Template Main JS File -->
	<script src="<?php echo base_url()?>assets/home_assets/js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


	<script type="text/javascript">
		$(function () {

			$('#contactForm').on('submit', function (e) {
				e.preventDefault();
				var section = $(this).data('value');
				var controllerfun = '<?php echo base_url() ?>' + "home/add_career";
				var formData = new FormData($('#contactForm')[0]);
				$.ajax({
					url: controllerfun,
					type: "POST",
					data: formData,
					contentType: false,
					cache: false,
					processData: false,
					success: function (response) {
						var objData = jQuery.parseJSON(response);
						if (objData.status === 'ERROR') {
							swal({
								title: objData.status,
								text: objData.message,
								icon: "error",
								button: "Ok",
							});
						} else if (objData.status === 'SUCCESS') {
							$('#contactForm').trigger("reset");
							swal({
								title: objData.status,
								text: objData.message,
								icon: "success",
								button: "Ok",

							});
							setTimeout(function () {
								location.reload();
							}, 5000);
						}
					}
				});

			});
		});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
	</script>
<script>
if(navigator.userAgent.indexOf('Mac') > 0)
$('body').addClass('mac-os');if(navigator.userAgent.indexOf('Safari') > 0)
$('body').addClass('safari');if(navigator.userAgent.indexOf('Chrome') > 0)
$('body').addClass('chrome');
</script>
</body>

</html>
