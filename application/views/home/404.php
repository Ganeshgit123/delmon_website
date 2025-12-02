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

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
		integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Vendor CSS Files -->
	<link href="<?php echo base_url()?>assets/home_assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/home_assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/home_assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/home_assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/home_assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<?php if($this->session->userdata('lang') !='en') {?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
		integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
	<?php } ?>
	<link href="<?php echo base_url()?>assets/home_assets/css/variables.css" rel="stylesheet">


	<!-- Template Main CSS File -->
	<link href="<?php echo base_url()?>assets/home_assets/css/main.css" rel="stylesheet">


</head>

<body>

<section>
<div class="container">
<div class="row">
<div class="col-md-12">
<p class="text-center"><img src="<?php echo base_url()?>assets/home_assets/img/chi-1.gif" width="200px" height="200px"></p>
<h1 class="text-center">404</h1>
<h3  class="text-center">SOMETHING IS WRONG</h3>
</div>
</div>
<br>
<div class="row">
<div class="col-md-5"></div>
<div class="col-md-7">
<a href="https://liastaging.com/delmon_cms/" class="text-center cta-btn">Go To Homepage</a>
</div>
</div>
</div>
</section>




	<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
	<!-- Vendor JS Files -->
	<script src="<?php echo base_url()?>assets/home_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url()?>assets/home_assets/vendor/aos/aos.js"></script>
	<script src="<?php echo base_url()?>assets/home_assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="<?php echo base_url()?>assets/home_assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="<?php echo base_url()?>assets/home_assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="<?php echo base_url()?>assets/home_assets/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="<?php echo base_url()?>assets/home_assets/js/main.js"></script>

</body>
<script>
if(navigator.userAgent.indexOf('Mac') > 0)
$('body').addClass('mac-os');if(navigator.userAgent.indexOf('Safari') > 0)
$('body').addClass('safari');if(navigator.userAgent.indexOf('Chrome') > 0)
$('body').addClass('chrome');
</script>
</html>
