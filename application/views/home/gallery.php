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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url()?>assets/home_assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/home_assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/home_assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/home_assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/home_assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

   <link href="<?php echo base_url()?>assets/home_assets/css/variables.css" rel="stylesheet">
   <?php if($this->session->userdata('lang') !='en') {?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
        <?php } ?>

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url()?>assets/home_assets/css/main.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
	<?php 
	$data['page'] = 'gallery' ;
	$data['menu'] = $menu ;
	$data['link'] = $link ;
	$data['address'] = $address ;
	$data['contact'] = $contact ;
	$this->load->view('home/header',$data);
 	?>
  
  
  <!-- End Header -->

  <section id="gallery" class="hero-animated d-flex align-items-center" style="background:url(<?php echo base_url()?>uploads/images/banners/<?php echo $banner->image ?>) !important;">
    <div class="container">
    <div class="row">
   
<div class="section-header">
  <h2><?php if($session == 'en') {
echo $banner->banner_title;}
elseif ($session =='ar') {
  echo $banner->banner_title_ar;} ?></h2>
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
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio" data-aos="fade-up">

     

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

          <ul class="portfolio-flters">
            <li data-filter="*" class="filter-active"><?php if($session =='en') {
              echo "All";}
              elseif ($session =='ar') {
                echo "عرض الكل";} ?></li>
                <?php foreach ($gallery_type as $value) {?>
                  <li data-filter=".<?php echo str_replace(' ','',$value['type'])?>"><?php if($session =='en') {
                echo $value['type'];}
                elseif ($session =='ar') {
                  echo $value['type_ar'];} ?></li>
                <?php }?>
                     </ul><!-- End Portfolio Filters -->

          <div class="row portfolio-container">
          <?php foreach ($gallery as $key ) { ?>

            <div class="col-xl-4 col-lg-4 col-md-6 portfolio-item <?php echo str_replace(' ','',$this->Admin_model->get_type_name_by_id('gallery_type','id',$key['type'],'type'))?>">
              <img src="<?php echo base_url()?>uploads/images/gallery/<?php echo $key['image']?>" class="img-fluid" alt="">
              <div class="portfolio-info">
           
                <a href="<?php echo base_url()?>uploads/images/gallery/<?php echo $key['image']?>"  data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                
              </div>
            </div>
            
          <?php }?>         
                       
          </div><!-- End Portfolio Container -->

        </div>

      </div>
    </section><!-- End Portfolio Section -->


    <!-- ======= Footer ======= -->
	<?php $this->load->view('home/footer',$data);?>
 <!-- End Footer -->
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
<script>
if(navigator.userAgent.indexOf('Mac') > 0)
$('body').addClass('mac-os');if(navigator.userAgent.indexOf('Safari') > 0)
$('body').addClass('safari');if(navigator.userAgent.indexOf('Chrome') > 0)
$('body').addClass('chrome');
</script>
</body>

</html>
