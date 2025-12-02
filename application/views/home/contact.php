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
  <style>
      #map {
        height: 400px;  
        width: 100%; 
       }
    </style>
</head>
<body>
  <!-- ======= Header ======= -->
	<?php 
	$data['page'] = 'contact' ;
	$data['menu'] = $menu ;
	$data['link'] = $link ;
	$data['address'] = $address ;
	$data['contact'] = $contact ;
	$this->load->view('home/header',$data);
 	?>    
  <!-- End Header -->

 <section id="Contact-ban" style="background:url(<?php echo base_url()?>uploads/images/banners/<?php echo $banner->image ?>) !important;" class="hero-animated d-flex align-items-center">
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
 <!-- ======= Contact Section ======= -->
 <section id="contact" class="contact">
      <div class="container">

        <div class="section-header">
        <div id="map">
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7159.516949581581!2d50.609086!3d26.204534!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e49a927a74635c7%3A0xd31a24844102530a!2sDelmon%20Poultry%20Company%20-%20Feed%20Mill%20Factory!5e0!3m2!1sen!2sus!4v1676571477167!5m2!1sen!2sus" frameborder="0" allowfullscreen></iframe> -->
                 </div><!-- End Google Maps -->
        </div>
      </div>
      <div class="container">

      <div class="row">
        <?php foreach ($address as  $value) { ?>
          <div class="col-lg-3 col-md-6 contact-no">
                  <h4><?php if($session =='en') {
                    echo $value['address'];}
                    elseif ($session =='ar') {  
                    echo $value['address_ar'];} ?></h4>
              <p><?php echo $value['phone1'].','. $value['phone2']?></p>       
          </div>
          <?php } ?>
        </div>
        </div>
        </section>
        <section class="address">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h4 class="text-center">
              <?php if($this->session->userdata('lang') =='en') {
echo $contact->address;}
elseif ($this->session->userdata('lang') =='ar') {
  echo $contact->address_ar;} ?>
              </h4>
              <p class="text-center"><?php echo $contact->website;?></p>
            </div>
        </div>
        </div>
        </section>
        <section id="contact" class="contact">
        <div class="container">
        <div class="row gy-5 gx-lg-5">

        

          <div class="col-lg-12">
            <h3 class="text-left love"> <?php if($this->session->userdata('lang') =='en') {
            echo $contact->section3;}
            elseif ($this->session->userdata('lang') =='ar') {
              echo $contact->section3_ar;} ?></h3>
            <form action="contact" method="post" id="contactForm" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label><?php if($this->session->userdata('lang') =='en') {
echo $contact->form_field1;}
elseif ($this->session->userdata('lang') =='ar') {
  echo $contact->form_field1_ar;}?></label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="" required>
                </div>
             
                <div class="col-md-6 form-group mt-3 mt-md-0"> 
                    <label><?php if($this->session->userdata('lang') =='en') {
echo $contact->form_field2;}
elseif ($this->session->userdata('lang') =='ar') {
  echo $contact->form_field2_ar;} ?></label>
                  <input type="email" class="form-control" name="email" id="email"  required>
                </div>
              </div>
              <div class="form-group mt-3">
              <label><?php if($this->session->userdata('lang') =='en') {
echo $contact->form_field3;}
elseif ($this->session->userdata('lang') =='ar') {
  echo $contact->form_field3_ar;} ?></label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="" required>
              </div>
              <div class="form-group mt-3">
              <label><?php if($this->session->userdata('lang') =='en') {
echo $contact->form_field4;}
elseif ($this->session->userdata('lang') =='ar') {
  echo $contact->form_field4_ar;} ?></label>
                <textarea class="form-control" name="message" placeholder="" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-left"><button type="submit">Submit</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->
   <section id="complain" style="padding-top:90px;">
   <div class="container">
   <div class="row">
   <div class="col-md-12">

<h1 class="text-center"><?php if($_SESSION["lang"]=='en') {
echo "Complaint Form";}
 elseif ($_SESSION["lang"]=='ar') {
echo " استمارة الشكاوي والمقترحات ";} ?></h1>

   <br>
      <script type="text/javascript" src="https://form.jotform.com/jsform/230931974888473"></script>
   </div>
   </div>
   </div>
   </section>
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
	<script src="<?php echo base_url() ?>assets/home_assets/js/jquery-3.5.1.min.js"></script>

	<!-- Template Main JS File -->
	<script src="<?php echo base_url()?>assets/home_assets/js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


	<script type="text/javascript">
		$(function () {

			$('#contactForm').on('submit', function (e) {
				e.preventDefault();
				var section = $(this).data('value');
				var controllerfun = '<?php echo base_url() ?>' + "home/add_contact";
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

	</script>

<script>
    function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };                   
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
    map.setTilt(100);
    // Multiple markers location, latitude, and longitude
    var markers = [
        <?php 
if(!empty($address)){
  foreach ($address as $value) {
echo '["'.$value['address'].'", '.$value['mapurl'].'],'; }
}
        ?>
    ];     
    // Info window content
    var infoWindowContent = [
        <?php 
if(!empty($address)){
  foreach ($address as $value) { 
$homeadd =  $value['address'];
    ?>
  ['<div class="info_content">' +
                ' <h5> <?php echo $homeadd ?></h5> '  + '</div>'],
<?php }
}
        ?>   
    ];     
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            icon: markers[i][3],
            title: markers[i][0]
        });     
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));
        map.fitBounds(bounds);
    }
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(11);
        google.maps.event.removeListener(boundsListener);
    });
}
google.maps.event.addDomListener(window, 'load', initMap);
    </script>


<script 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCglNATKhgzk-0FNfN86RUwBhPiqJHOClM &callback=initMap" async defer>
    </script>
	<script>
if(navigator.userAgent.indexOf('Mac') > 0)
$('body').addClass('mac-os');if(navigator.userAgent.indexOf('Safari') > 0)
$('body').addClass('safari');if(navigator.userAgent.indexOf('Chrome') > 0)
$('body').addClass('chrome');
</script>
</body> 

</html>
