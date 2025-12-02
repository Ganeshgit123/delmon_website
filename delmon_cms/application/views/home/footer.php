<footer id="footer" class="footer">
	<?php 
   $session = $this->session->userdata('lang');
   if(empty($session)){ 
   $this->session->set_userdata('lang', 'en');
   $this->session->set_userdata('dir', 'ltr');
   } 
?>
	<div class="footer-content">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 col-md-6">
					<div class="footer-info">
						<img src="<?php echo base_url()?>uploads/images/<?php echo $contact->footer_logo?>">
					</div>
				</div>

				<div class="col-lg-2 col-md-6 footer-links">
					<h4>Useful Links</h4>
					<ul>
						<li class="<?php if($page=='home'){echo 'active';}?>"><a href="<?php echo base_url();?>home"><?php if($session == 'en') {
echo $menu->menu1;}
 elseif ($session == 'ar') {
echo $menu->menu1_ar;} ?></a></li>
						<li class="<?php if($page=='about'){echo 'active';}?>"><a href="<?php echo base_url();?>home/about">
								<?php if($session == 'en') {
echo $menu->menu2;}
 elseif ($session == 'ar') {
echo $menu->menu2_ar;} ?></a></li>
						<li class="<?php if($page=='management'){echo 'active';}?>"><a href="<?php echo base_url();?>home/management"><?php if($session == 'en') {
echo $menu->menu3;}
 elseif ($session == 'ar') {
echo $menu->menu3_ar;} ?></a></li>
						<li class="<?php if($page=='services'){echo 'active';}?>"><a href="<?php echo base_url();?>home/services"><?php if($session == 'en') {
echo $menu->menu5;}
 elseif ($session == 'ar') {
echo $menu->menu5_ar;} ?></a></li>
						<li class="<?php if($page=='gallery'){echo 'active';}?>"><a href="<?php echo base_url();?>home/gallery"><?php if($session == 'en') {
echo $menu->menu6;}
 elseif ($session == 'ar') {
echo $menu->menu6_ar;} ?></a></li>
						<li class="<?php if($page=='career'){echo 'active';}?>"><a href="<?php echo base_url();?>home/career"><?php if($session == 'en') {
echo $menu->menu7;}
 elseif ($session == 'ar') {
echo $menu->menu7_ar;} ?></a></li>

						<li class="<?php if($page=='contact'){echo 'active';}?>"><a href="<?php echo base_url();?>home/contact"><?php if($session == 'en') {
echo $menu->menu8;}
 elseif ($session == 'ar') {
echo $menu->menu8_ar;} ?></a></li>
					</ul>
				</div>

				<div class="col-lg-5 col-md-6 footer-links">
					<h4><?php if($session == 'en') {
echo "Related Links.";}
elseif ($session == 'ar') {
  echo "        مواقع ذات صل";} ?>
					</h4>
					<ul>
						<?php foreach ($link as  $value) { ?>
						<li> <a href="<?php echo $value['link']?>" target="_blank"><?php if($session == 'en') {
echo $value['name'];}
elseif ($session == 'ar') {
  echo $value['name_ar'];} ?></a></li>
						<?php  }?>
					</ul>
				</div>

				<div class="col-lg-2 col-md-6 footer-newsletter">
					<h4>Follow Us</h4>
					<div class="social-links order-first order-lg-last mb-3 mb-lg-0">

						<a href="<?php echo $contact->fb?>" class="facebook" target="_blank"><i
								class="fab fa-facebook"></i></a>
						<a href="<?php echo $contact->instagram?>" class="instagram" target="_blank"><i
								class="bi bi-instagram"></i></a>
						<a href="<?php echo $contact->twitter?>" class="twitter" target="_blank"><i class="bi bi-twitter"></i></a>
						<a href="<?php echo $contact->linkdin?>" class="twitter" target="_blank"><i
								class="bi bi-linkedin"></i></a>
					</div>


				</div>
				<br> <br>
				<div class="col-lg-3 col-md-6">
					<div class="footer-info">
						<h4><?php if($session == 'en') {
echo " Contact Us";}
elseif ($session == 'ar') {
  echo " اتصل بنا";} ?>

						</h4>
						<p>
							<?php if($session == 'en') {
echo $contact->address;}
elseif ($session == 'ar') {
  echo $contact->address_ar;} ?>
						</p>
						<p> <i class="fa-regular fa-envelope"></i>&nbsp;&nbsp;<?php echo $contact->email ?></p>
					</div>
				</div>
        <?php foreach ($address as $key ) { ?>
				<div class="col-lg-2 col-md-6 footer-links">
					<h4 style="direction:ltr"> <?php if($session == 'en') {
echo $key['address'];}
elseif ($session == 'ar') {
  echo $key['address_ar'];} ?></h4>
					<ul style="direction:ltr">
						<li><i class="fa fa-phone"></i>&nbsp;<?php echo $key['phone1']?></li>
						<li> <i class="fa fa-fax" aria-hidden="true"></i>&nbsp;<?php echo $key['phone2']?></li>

					</ul>
				</div>
<?php } ?>
			</div>
		</div>
	</div>

	<!-- <div class="footer-legal text-center">
  <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

    <div class="d-flex flex-column align-items-center align-items-lg-start">
      <div class="copyright">
        &copy; Copyright All Rights Reserved
      </div>
         </div>

    <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
      <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>

  </div>
</div> -->

</footer>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>


<script>
  function langAjax($lang){
   //   alert($lang);
    // $('#alerts').hide();
    var lang = $lang;
    
     $.ajax({ 
        type: "POST",
          url : " <?php echo base_url();?>admin/changelanguage",
            data : {lang:lang},
 
    }).done(function(response){
location.reload() ;
       
    });       
  };
  </script>
 

