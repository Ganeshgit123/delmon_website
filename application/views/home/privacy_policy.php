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
  $data['page'] = 'privacy_policy' ;
  $data['menu'] = $menu ;
  $data['link'] = $link ; 
  $data['privacy_policy'] = $privacy_policy ;
  	$data['address'] = $address ;
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

              <?php if($_SESSION["lang"]=='en') {
echo $privacy_policy->content ;}
 elseif ($_SESSION["lang"]=='ar') {
echo $privacy_policy->content_ar ;} ?>
       
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
