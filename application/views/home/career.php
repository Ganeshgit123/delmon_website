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

	<title>Delmon Poultry</title>
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
				<script type="text/javascript" src="https://form.jotform.com/jsform/230921182067452"></script>
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
