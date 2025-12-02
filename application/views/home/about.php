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
	<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>


	<!-- Template Main CSS File -->
	<link href="<?php echo base_url()?>assets/home_assets/css/main.css" rel="stylesheet">
<style>
	[aria-expanded="false"] > .expanded,
[aria-expanded="true"] > .collapsed {
  display: none;
}
</style>

</head>

<body>

	<!-- ======= Header ======= -->
		<?php 
	$data['page'] = 'about' ;
	$data['menu'] = $menu ;
	$data['link'] = $link ;
	$data['address'] = $address ;
	$data['contact'] = $contact ;
	$this->load->view('home/header',$data);
 	?>


	<section id="about-ban"
		style="background:url(<?php echo base_url()?>uploads/images/banners/<?php echo $banner->image ?>) !important;"
		class="hero-animated d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header head-ab">
					
<h1 class="about-head"><?php if($session == 'en') {
echo $banner->banner_title;}
elseif ($session == 'ar') {
  echo $banner->banner_title_ar;} ?><h1>
					
					
						<p class="text-center"><?php 
            if($session == 'en'){
                echo $banner->banner_content  ;
            }else{
                echo $banner->banner_content_ar ; 
            }
            ?></p>
					</div>


				</div>
			</div>
		</div>
	</section>
	<!-- ======= About Section ======= -->
	<section id="about" class="about">
		<div class="container">




			<div class="row g-4 g-lg-5">

				<!-- <div class="col-lg-5">
          <div class="about-img">
            <img src="<?php echo base_url()?>assets/home_assets/img/about.jpg" class="img-fluid" alt="">
          </div>
        </div> -->
				<p data-aos="fade-up" data-aos-delay="300"><?php if($session == 'en') {
echo $about->sec1_content;}
elseif ($session == 'ar') {
  echo $about->sec1_content_ar;} ?></p>
				<div class="col-lg-12">

					<h2><?php if($session == 'en') {
echo $about->sec2_title;}
elseif ($session == 'ar') {
  echo $about->sec2_title_ar;} ?></h2>
					<hr class="line">
					<!-- Tabs -->
					<div class="row">
						<div class="col-md-5"></div>
						<div class="col-md-6">
							<ul class="nav nav-pills mb-3">
								<li><a class="nav-link active" data-bs-toggle="pill" href="#tab1"><?php if($session == 'en') {
echo $about->sec2sub1_title;}
elseif ($session == 'ar') {
  echo $about->sec2sub1_title_ar;} ?></a></li>
								<li><a class="nav-link" data-bs-toggle="pill" href="#tab2"><?php if($session == 'en') {
echo $about->sec2sub2_title;}
elseif ($session == 'ar') {
  echo $about->sec2sub2_title_ar;} ?></a></li>
								<li><a class="nav-link" data-bs-toggle="pill" href="#tab3"><?php if($session == 'en') {
echo $about->sec2sub3_title;}
elseif ($session == 'ar') {
  echo $about->sec2sub3_title_ar;} ?></a></li>
							</ul><!-- End Tabs -->
						</div>
					</div>
					<!-- Tab Content -->
					<div class="tab-content">

						<div class="tab-pane fade show active" id="tab1">
							<div class="row">
								<div class="col-md-5">
									<img src="<?php echo base_url()?>uploads/images/<?php echo $about->sec2_img?>" width="400px"
										height="450px" class="img-po">
								</div>
								<div class="col-md-6">

									<p><?php if($session == 'en') {
echo $about->sec2sub1_content;}
elseif ($session == 'ar') {
  echo  $about->sec2sub1_content_ar;} ?></p>
								</div>
							</div>
						</div><!-- End Tab 1 Content -->
						<div class="tab-pane fade show" id="tab2">
							<div class="row">
								<div class="col-md-5">
									<img src="<?php echo base_url()?>uploads/images/<?php echo $about->sec2sub2_img?>" width="400px"
										height="450px" class="img-po">
								</div>
								<div class="col-md-6">
									<?php 
            if($session == 'en'){
                echo $about->sec2sub2_content  ;
            }else{
                echo $about->sec2sub2_content_ar ; 
            }
            ?>
								</div>
							</div>


						</div>
						<!-- tab end -->
						<div class="tab-pane fade show" id="tab3">
							<div class="row">
								<div class="col-md-5">
									<img src="<?php echo base_url()?>uploads/images/<?php echo $about->sec2sub3_img?>" width="400px"
										height="600px" class="img-po">
								</div>
								<div class="col-md-5">
									<?php 
            if($session == 'en'){
                echo $about->sec2sub3_content  ;
            }else{
                echo $about->sec2sub3_content_ar ; 
            }
            ?>
								</div>


							</div>
							<!-- tab end -->
						</div>

					</div>
	</section><!-- End About Section -->
	<section class="section" id="vision-mission" style="padding-top:90px;">
		<div class="container">
			<div class="row">

				<div class="col-md-1"></div>
				<div class="col-md-4 ">
					<div class="box-grey">
						<lottie-player src="<?php echo base_url()?>assets/home_assets/img/about/101857-vision-eye.json"
							background="transparent" speed="1" style="width:180px; height:180px;" autoplay></lottie-player>
						<h1 class="our"><?php if($session == 'en') {
echo "Our";}
elseif ($session == 'ar') {
  echo " ";} ?></h1>
						<h1 class="vis"><?php if($session == 'en') {
echo  $about->sec3_title;}
elseif ($session == 'ar') {
  echo $about->sec3_title_ar;} ?></h1>
						<p><?php if($session == 'en') {
echo $about->sec3_content;}
elseif ($session == 'ar') {
  echo $about->sec3_content_ar;} ?></p>
					</div>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-4">
					<div class="box-grey">
						<lottie-player src="<?php echo base_url()?>assets/home_assets/img/about/Target.json" class="ab-lot"
							style="width:380px; height:180px;" background="transparent" speed="1" loop autoplay></lottie-player>
						<h1 class="our"><?php if($session == 'en') {
echo "Our";}
elseif ($session == 'ar') {
  echo " ";} ?></h1>
						<h1 class="vis"><?php if($session == 'en') {
echo $about->sec4_title;}
elseif ($session == 'ar') {
  echo $about->sec4_title_ar;} ?></h1>
						<p><?php if($session == 'en') {
echo $about->sec4_content;}
elseif ($session == 'ar') {
  echo $about->sec4_content_ar;} ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="values-goals" style="padding-top:120px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4 class="text-center title"> <?php if($session == 'en') {
echo $about->sec5_title;}
elseif ($session == 'ar') {
  echo $about->sec5_title_ar;} ?></h4>
					<hr class="line2">
					<p class="text-center"> <?php if($session == 'en') {
echo $about->sec5_content;}
elseif ($session == 'ar') {
  echo $about->sec5_content_ar;} ?></p>
					<br><br>
				</div>
			</div>
			<div class="row value">

				<div class="col-md-6">
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="pills-values-tab" data-bs-toggle="pill" data-bs-target="#pills-values"
								type="button" role="tab" aria-controls="pills-values" aria-selected="true"><?php if($session == 'en') {
echo  $about->sec5sub1_title;}
elseif ($session == 'ar') {
  echo  $about->sec5sub1_title_ar;} ?></button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="pills-goals-tab" data-bs-toggle="pill" data-bs-target="#pills-goals"
								type="button" role="tab" aria-controls="pills-goals" aria-selected="false"><?php if($session == 'en') {
echo  $about->sec5sub2_title;}
elseif ($session == 'ar') {
  echo  $about->sec5sub2_title_ar;} ?></button>
						</li>

					</ul>
				</div>
				<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active" id="pills-values" role="tabpanel" aria-labelledby="pills-values-tab">
						<div class="row">
							<div class="col-md-5">
								<img src="<?php echo base_url()?>uploads/images/<?php echo $about->sec5_img?>" width="400px"
									height="450px" class="img-i">
							</div>
							<div class="col-md-6">
								<div class="box-red">
									<?php if($session == 'en') {
echo $about->sec5sub1_content;}
elseif ($session == 'ar') {
  echo $about->sec5sub1_content_ar;} ?>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="pills-goals" role="tabpanel" aria-labelledby="pills-goals-tab">
						<div class="row">
							<div class="col-md-5">
								<img src="<?php echo base_url()?>uploads/images/<?php echo $about->sec5sub2_img?>" width="400px"
									height="450px"  class="img-i">
							</div>
							<div class="col-md-6">
								<div class="box-red">
									<?php if($session == 'en') {
echo $about->sec5sub2_content;}
elseif ($session == 'ar') {
  echo $about->sec5sub2_content_ar;} ?>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
	</section>
	<!-- ======= Clients Section ======= -->
	<section id="clients" class="company" style="padding-top:120px;">
		<div class="container" data-aos="zoom-out">
			<h2><?php if($session == 'en') {
echo $about->sec6_title;}
elseif ($session == 'ar') {
  echo $about->sec6_title_ar;} ?></h2>
			<hr class="line">
			<div class="clients-slider swiper" style="padding-bottom:40px;padding-top:30px;">
				<div class="swiper-wrapper align-items-center">
					<?php $i=0; foreach ($purpose as $value) { $i++;?>
					<div class="swiper-slide">
						<div class="item-com">
							<div class="row">
								<div class="col-md-2">
									<img src="<?php echo base_url()?>assets/home_assets/img/about/tick.png" width="40px" height="40px">
								</div>
								<div class="col-md-9">
									<p><?php if($session == 'en') {
echo $value['min_content'];}
elseif ($session == 'ar') {
  echo $value['min_content_ar'];} if(strlen(($value['content']) ? $value['content'] : '') > 0) { ?><a class="btn" data-bs-toggle="collapse" href="#collapseExample<?php echo $i;?>"
											role="button" aria-expanded="false" aria-controls="collapseExample">
											<span class="collapsed">
												Read more
											</span>
											<span class="expanded">
												Read Less
											</span>
										</a><?php } ?></p>
									<p class="collapse" id="collapseExample<?php echo $i;?>">
										<?php if($session == 'en') {
echo $value['content'];}
elseif ($session == 'ar') {
  echo $value['content_ar'];} ?>
									</p>

								</div>
							</div>
						</div>

					</div>
					<!-- end swiper -->
					<?php } ?>

				</div>
			</div>

		</div>
	</section><!-- End Clients Section -->

	<section class="section ab-gov" id="governance-charter" style="padding-top:90px;">
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<h2><?php if($session == 'en') { echo $about->sec7_title; }elseif ($session == 'ar'){echo $about->sec7_title_ar;} ?></h2>
					<hr class="hr-line">
			<?php if($session == 'en') { echo $about->sec7_content1; }elseif ($session == 'ar'){echo $about->sec7_content1_ar;} ?>
					<a href="<?php echo base_url()?>uploads/images/about/<?php echo $about->sec7_link?>" target="_blank"
						class="text-center ab-link">	<?php if($session == 'en') { echo $about->sec7_link_con; }elseif ($session == 'ar'){echo $about->sec7_link_con_ar;} ?></a>
				</div>

			</div>
		</div>
	</section>

	<section class="investor" id="investor-relation" style="padding-top:120px">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="text-center"><?php if($session == 'en') { echo $about->sec8_title; }elseif ($session == 'ar'){echo $about->sec8_title_ar;} ?></h3>
					<hr class="line2">
					<p class="text-center"><?php if($session == 'en') { echo $about->sec8_content; }elseif ($session == 'ar'){echo $about->sec8_content_ar;} ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
								type="button" role="tab" aria-controls="pills-home" aria-selected="true"><?php if($session == 'en') { echo $about->sec8sub1_title; }elseif ($session == 'ar'){echo $about->sec8sub1_title_ar;} ?></button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
								type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><?php if($session == 'en') { echo $about->sec8sub2_title; }elseif ($session == 'ar'){echo $about->sec8sub2_title_ar;} ?></button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
								type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><?php if($session == 'en') { echo $about->sec8sub3_title; }elseif ($session == 'ar'){echo $about->sec8sub3_title_ar;} ?></button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="pills-other-tab" data-bs-toggle="pill" data-bs-target="#pills-other"
								type="button" role="tab" aria-controls="pills-other" aria-selected="false"><?php if($session == 'en') { echo $about->sec8sub4_title; }elseif ($session == 'ar'){echo $about->sec8sub4_title_ar;} ?></button>
						</li>

					</ul>
				</div>
			</div>
			<div class="tab-content" id="pills-tabContent">

				<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<div class="box2">
              <?php if($session == 'en') { echo $about->sec8sub1_content; }elseif ($session == 'ar'){echo $about->sec8sub1_content_ar;} ?>
							</div>
						</div>
					</div>
				</div>
				<!-- <tab end > -->
				<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					<div class="accordion accordion-flush box2" id="accordionFlushExample">
						<?php $i=0; foreach ($annual_year as $key) { $i++; ?>
            			<div class="accordion-item ">
							<h2 class="accordion-header" id="flush-heading<?php echo $i;?>">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#flush-collapse<?php echo $i;?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $i;?>">
									<?php if($session == 'en') { echo $key['name']; }elseif ($session == 'ar'){ echo $key['name_ar']; }?>
								</button>
							</h2>
							<div id="flush-collapse<?php echo $i;?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $i;?>"
								data-bs-parent="#accordionFlushExample">
								<div class="accordion-body">
									<ul>
                    <?php 
                  
                        $annual_report = $this->Admin_model->get_all_data('annual_report',array('year_id'=>$key['id'])) ;
                        foreach ($annual_report as  $value) {
							if($session == 'en') {
							 ?>          
								<li><a href="<?php echo base_url()?>uploads/images/about/<?php echo $value['file']?>"
												target="_blank"><?php  echo $value['name'] ?></a></li>
							<?php  } else if($session == 'ar') {?>

								<li><a href="<?php echo base_url()?>uploads/images/about/<?php echo $value['file_ar']?>"
												target="_blank"><?php  echo $value['name_ar'] ?></a></li>
							<?php }  } ?>
									</ul>
								</div>
							</div>
						</div>
            <?php } ?>
					</div>
				</div>    
				<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
					<div class="accordion accordion-flush box2" id="accordionFlushExample">
						
					<?php $i=0; foreach ($financial_year as $key ) { $i++; ?>
						<div class="accordion-item ">
							<h2 class="accordion-header" id="flush-heading<?php echo $i;?>">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
									data-bs-target="#flush-collapse<?php echo $i;?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $i;?>">
									<?php echo $key['year_id']?>
								</button>
							</h2>
							<div id="flush-collapse<?php echo $i;?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $i;?>"
								data-bs-parent="#accordionFlushExample">
								<div class="accordion-body">
									<ul>
									<?php 
										$financial_report = $this->Admin_model->get_all_data('financial_report',array('year_id'=>$key['year_id'])) ;
										foreach ($financial_report as  $value) {
											if($session == 'en') { ?>   
										<li><a href="<?php echo base_url()?>uploads/images/about/<?php echo $value['file']?>" target="_blank"><?php echo $value['name']; ?></a></li>
										<?php  } else if($session == 'ar') {?>
										<li><a href="<?php echo base_url()?>uploads/images/about/<?php echo $value['file_ar']?>" target="_blank"><?php echo $value['name_ar']; ?></a></li>							
										<?php  } } ?>
									</ul>
								</div>
							</div>
						</div>	
					<?php } ?>
					</div>
				</div>
				<div class="tab-pane fade" id="pills-other" role="tabpanel" aria-labelledby="pills-other-tab">
					<div class="row">
						<div class="col-md-12">
							<br><br>
							<?php if($session == 'en') { echo $about->sec8sub4_content; }elseif ($session == 'ar'){echo $about->sec8sub4_content_ar;} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ======= Footer ======= -->

	<script>
		$('.moreless-button').click(function () {
			$('.moretext').slideToggle();
			if ($('.moreless-button').text() == "Read more") {
				$(this).text("Read less")
			} else {
				$(this).text("Read more")
			}
		});

	</script>
	<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<?php $this->load->view('home/footer',$data);?>

	<!-- End Footer -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
	<!-- Vendor JS Files -->
	<script src="<?php echo base_url()?>assets/home_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url()?>assets/home_assets/vendor/aos/aos.js"></script>
	<script src="<?php echo base_url()?>assets/home_assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="<?php echo base_url()?>assets/home_assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="<?php echo base_url()?>assets/home_assets/vendor/swiper/swiper-bundle.min.js"></script>


	<!-- Template Main JS File -->
	<script src="<?php echo base_url()?>assets/home_assets/js/main.js"></script>
<script>
if(navigator.userAgent.indexOf('Mac') > 0)
$('body').addClass('mac-os');if(navigator.userAgent.indexOf('Safari') > 0)
$('body').addClass('safari');if(navigator.userAgent.indexOf('Chrome') > 0)
$('body').addClass('chrome');
</script>
</body>

</html>
