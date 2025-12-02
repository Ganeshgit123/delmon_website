<div class="fixed-navbar">
<div class="pull-left">
<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
<!-- <h1 class="page-title">Home</h1> -->
<!-- /.page-title -->
</div>
<!-- /.pull-left -->
<div class="pull-right">
<div class="ico-item "><a href="javascript:void(0)"  >
 <?php  $session = $this->session->userdata('userdet');
if(!empty($session)){
	echo "Logged in as ".$session['username'];
}
 	  ?> </a>
 	 
 	
 </div>
  
 


<!-- /.ico-item -->
<!-- <div class="ico-item fa fa-arrows-alt js__full_screen"></div> -->
<!-- /.ico-item fa fa-fa-arrows-alt -->

<!-- /.ico-item -->

<div class="ico-item "><i class="ico mdi mdi-logout"></i>
<!-- <img src="assets/images/logout.png" alt="" class="ico-img"> -->
<ul class="sub-ico-item">

<li><a  href="<?php echo base_url()?>admin/logout"><?php echo $this->Admin_model->translate("Log Out") ?></a></li>
</ul>
<!-- /.sub-ico-item -->
</div>
<!-- /.ico-item -->
</div>
<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->

<div id="notification-popup" class="notice-popup js__toggle" data-space="50">
 
</div>
<!-- /#notification-popup -->

