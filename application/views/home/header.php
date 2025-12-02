<header id="header" class="header fixed-top" data-scrollto-offset="0">
	<div class="container d-flex  ">

	<?php
		$session = $this->session->userdata('lang');
		if(empty($session)){ 
		$this->session->set_userdata('lang', 'en');
		$this->session->set_userdata('dir', 'ltr');
		} 
	?>

		<a href="index.php" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
			<!-- Uncomment the line below if you also wish to use an image logo -->
			<img src="<?php echo base_url()?>uploads/images/<?php echo $menu->logoe?>" alt="" class="shake">
			<!-- <h1>HeroBiz<span>.</span></h1> -->
		</a>

		<nav id="navbar" class="navbar">
			<ul class="mr-auto">


				<li class="<?php if($page=='home'){echo 'active';}?>"><a class="nav-link"
						href="<?php echo base_url();?>"><?php if($session == 'en') {
					echo $menu->menu1;}
					elseif ($session == 'ar') {
					echo $menu->menu1_ar;} ?></a></li>

				<li class="dropdown"><a href="<?php echo base_url();?>about"
						class="<?php if($page=='about'){echo 'active';}?>"><span> <?php if($session == 'en') {
				echo $menu->menu2;}
				elseif ($session == 'ar') {
				echo $menu->menu2_ar;} ?></span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
					<ul>
						<li><a href="<?php echo base_url()?>about#about"><?php if($session == 'en') {
					echo $menu->submenu1;}
					elseif ($session == 'ar') {
					echo $menu->submenu1_ar;} ?></a></li>
						<li><a href="<?php echo base_url()?>about#vision-mission"><?php if($session == 'en') {
					echo $menu->submenu2;}
					elseif ($session == 'ar') {
					echo $menu->submenu2_ar;} ?></a></li>
						<li><a href="<?php echo base_url()?>about#values-goals"> <?php if($session == 'en') {
					echo $menu->submenu3;}
					elseif ($session == 'ar') {
					echo $menu->submenu3_ar;} ?> </a></li>
						<li><a href="<?php echo base_url()?>about#clients"><?php if($session == 'en') {
					echo $menu->submenu4;}
					elseif ($session == 'ar') {
					echo $menu->submenu4_ar;} ?></a></li>
						<li><a href="<?php echo base_url()?>about#governance-charter"><?php if($session == 'en') {
					echo $menu->submenu5;}
					elseif ($session == 'ar') {
					echo $menu->submenu5_ar;} ?></a></li>
						<li><a href="<?php echo base_url()?>about#investor-relation"><?php if($session == 'en') {
					echo $menu->submenu6;}
					elseif ($session == 'ar') {
					echo $menu->submenu6_ar;} ?></a></li>
						<li><a href="https://dawajen.bh/news/"><?php if($session == 'en') {
					echo $menu->submenu7;}
					elseif ($session == 'ar') {
					echo $menu->submenu7_ar;} ?></a></li>

					</ul>
				</li>
				<li class="<?php if($page=='management'){echo 'active';}?>"><a class="nav-link  acboder"
						href="<?php echo base_url();?>management"><?php if($session == 'en') {
					echo $menu->menu3;}
					elseif ($session == 'ar') {
					echo $menu->menu3_ar;} ?></a></li>
				<li class="<?php if($page=='product'){echo 'active';}?>"><a class="nav-link  acboder"
						href="<?php echo base_url();?>product"><?php if($session == 'en') {
					echo $menu->menu4;}
					elseif ($session == 'ar') {
					echo $menu->menu4_ar;} ?></a></li>
				<li class="<?php if($page=='services'){echo 'active';}?>"><a class="nav-link acboder"
						href="<?php echo base_url();?>services"><?php if($session == 'en') {
					echo $menu->menu5;}
					elseif ($session == 'ar') {
					echo $menu->menu5_ar;} ?></a></li>
				<li class="<?php if($page=='gallery'){echo 'active';}?>"><a class="nav-link acboder"
						href="<?php echo base_url();?>gallery"><?php if($session == 'en') {
					echo $menu->menu6;}
					elseif ($session == 'ar') {
					echo $menu->menu6_ar;} ?></a></li>
				<li class="<?php if($page=='career'){echo 'active';}?>"><a class="nav-link acboder"
						href="<?php echo base_url();?>career"><?php if($session == 'en') {
					echo $menu->menu7;}
					elseif ($session == 'ar') {
					echo $menu->menu7_ar;} ?></a></li>
<li class="dropdown"><a class="nav-link scrollto"
						href="<?php echo base_url();?>contact"><?php if($session == 'en') {
					echo $menu->menu8;}
					elseif ($session == 'ar') {
					echo $menu->menu8_ar;} ?></span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
					<ul>
						<li><a href="<?php echo base_url()?>contact#complain"><?php if($_SESSION["lang"]=='en') {
echo "Complain";}
 elseif ($_SESSION["lang"]=='ar') {
echo " الشكاوي والمقترحات  ";} ?></a></li>
					</li>
								
					</ul>
				</li>
				
				<li>
					<div class=" switch_sec">
						<!-- <a href="">AR</a> -->
						<?php if($this->session->userdata('lang') !='en') {?>
						<a class="nav-link lang_switch" onclick="langAjax('en')">English</a>
						<?php } ?>
						<?php if($session == 'en') {?>
						<a class=" nav-link lang_switch" onclick="langAjax('ar')">العربية</a>
						<?php } ?>
					</div>
				</li>
			</ul>
			<i class="bi bi-list mobile-nav-toggle d-none"></i>
		</nav><!-- .navbar -->



	</div>
</header>

<script>
	$('#pills-contact-tab').click(function () {
		console.log('aaaaaaa');
		$('[href="#pills-contact-tab"]').tab('show');
	});

</script>
