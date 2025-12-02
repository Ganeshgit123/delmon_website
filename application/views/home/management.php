<?php
  $session = $this->session->userdata('lang');
    if(empty($session)){ 
    $this->session->set_userdata('lang', 'en');
    $this->session->set_userdata('dir', 'ltr');
    $session = $this->session->userdata('lang');
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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url()?>assets/home_assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/home_assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/home_assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/home_assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/home_assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="<?php echo base_url()?>assets/home_assets/css/variables.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="<?php echo base_url()?>assets/home_assets/css/main.css" rel="stylesheet">
  <style>
    section {
      padding: 20px 0 !important;
      overflow: visible !important;
    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <?php 
	$data['page'] = 'management' ;
	$data['menu'] = $menu ;
	$data['link'] = $link ;
	$data['address'] = $address ;
	$data['contact'] = $contact ;
	$this->load->view('home/header',$data);
 	?>
  <section id="management" style="background:url(<?php echo base_url()?>uploads/images/banners/<?php echo $banner->image ?>) !important; height: 450px;background-position: center;
    width: 100%;background-size: cover;background-repeat: no-repeat;" class="d-flex align-items-center">
    <div class="container">
      <div class="row">

        <div class="section-header">
          <h2 class="text-center"><?php if($session == 'en') {
echo $banner->banner_title;}
elseif ($session =='ar') {
  echo $banner->banner_title_ar;} ?> </h2>
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
 

  <!-- Tabs -->
  <section class="b-management">
    <div class="container-fluid">
      <div class="row">
        <?php $managedata = $this->Admin_model->get_all_data('commitee_master_type');  ?>
        <div class="col-md-12">

          <ul class="nav nav-pills  mb-3">
            <li><a class="nav-link active" data-bs-toggle="pill" href="#tab1">
                <?php if($session == 'en') {
echo $managedata[0]['type'];}
elseif ($session == 'ar') {
  echo $managedata[0]['type_ar'];} ?>


              </a></li>

            <li><a class="nav-link" data-bs-toggle="pill" href="#tab2">
                <?php if($session == 'en') {
echo $managedata[1]['type'];}
elseif ($session == 'ar') {
  echo $managedata[1]['type_ar'];} ?>

              </a></li>

          </ul><!-- End Tabs -->
        </div>
      </div>
  </section>
  <!-- Tab Content -->
  <section>

    <div class="container">
      <div class="tab-content">

      <div class="tab-pane fade  show active" id="tab1">
                    <div class="des">
                        <div class="row">
                            <div class="col-md-4" style="margin-left:50px"></div>
                            <div class="col-md-3">
                                <div class="item-manage" style="margin-top: 3rem">

                  <img src="<?php echo base_url()?>uploads/images/management/bd1.jpg"  >
                  <div class="content1">
                    <p><?php if($session == 'en') { ?> Esam Abdul Hameed Zainal <?php }
elseif ($session == 'ar') { ?>
  عصام عبدالحميد زينل  <?php } ?> </p>
                    <h6><?php if($session == 'en') { ?>
                      Chairman  <?php }
elseif ($session == 'ar') { ?> رئيس مجلس الإدارة  <?php } ?> </h6>
                  </div>
                </div>
              </div>
            </div>
            <!-- row item -->
            <div class="row top-p">
            <div class="col-md-2"></div>
            <div class="col-md-3 my-3">
                <div class="item-manage">
                  <img src="<?php echo base_url()?>uploads/images/management/bd2.jpg" style="border-radius: 5px;">
                  <div class="content2">
                  <p><?php if($session == 'en') { ?>  Abdulla Jasim Al Ahmed <?php }
elseif ($session == 'ar') { ?> عبدالله جاسم الأحمد   <?php } ?> </p>
                    <h6><?php if($session == 'en') { ?>
                      Vice Chairman  <?php }
elseif ($session == 'ar') { ?> نائب رئيس مجلس الإدارة   <?php } ?> </h6>
                  </div>
                </div>
              </div>

              <div class="col-md-3 my-3">
                <div class="item-manage">
                  <img src="<?php echo base_url()?>uploads/images/management/bd3.jpg" style="border-radius: 5px;">
                  <div class="content2">
                  <p><?php if($session == 'en') { ?>Abdulredha Mohamed Al Daylami <?php }
elseif ($session == 'ar') { ?> عبد الرضا محمد الديلمي   <?php } ?> </p>
                    <h6><?php if($session == 'en') { ?>
                     Board Member <?php }
elseif ($session == 'ar') { ?>عضو مجلس إدارة   <?php } ?> </h6>

                  </div>
                 
                </div>
              </div>
            
            
              <div class="col-md-3 my-3">
                <div class="item-manage">
                  <img src="<?php echo base_url()?>uploads/images/management/bd4.jpg" style="border-radius: 5px;">
                  <div class="content2">
                  <p><?php if($session == 'en') { ?> Talal Mohamed Al Mannai  <?php }
elseif ($session == 'ar') { ?> طلال محمد المناعي  <?php } ?> </p>
                    <h6><?php if($session == 'en') { ?>
                      Board Member <?php }
elseif ($session == 'ar') { ?> عضو مجلس إدارة   <?php } ?> </h6>

                  </div>
                </div>
              </div>
              </div>
            <div class="row top-p">
               <div class="col-md-2"></div>
                  <div class="col-md-3 my-3">
                <div class="item-manage">
                  <img src="<?php echo base_url()?>uploads/images/management/bd5.jpg" style="border-radius: 5px;">
                  <div class="content2">
                  <p><?php if($session == 'en') { ?> Basel Yusuf Al Saleh <?php }
elseif ($session == 'ar') { ?> باسل يوسف الصالح  <?php } ?> </p>
                    <h6><?php if($session == 'en') { ?>
                     Board Member <?php }
elseif ($session == 'ar') { ?> عضو مجلس إدارة  <?php } ?> </h6>


                  </div>
                </div>
              </div>
              <div class="col-md-3 my-3">
                <div class="item-manage">
                  <img src="<?php echo base_url()?>uploads/images/management/bd6.jpg" style="border-radius: 5px;">
                  <div class="content2">
                  <p><?php if($session == 'en') { ?> Mohamed Sharif Ahmadi  <?php }
elseif ($session == 'ar') { ?> محمد شريف أحمدي   <?php } ?> </p>
                    <h6><?php if($session == 'en') { ?>
                     Board Member <?php }
elseif ($session == 'ar') { ?> عضو مجلس إدارة   <?php } ?> </h6>
                  </div>
                </div>
              </div>
            
              <div class="col-md-3 my-3">
                <div class="item-manage">
                  <img src="<?php echo base_url()?>uploads/images/management/bd7.jpg" style="border-radius: 5px;">
                  <div class="content2">
                  <p><?php if($session == 'en') { ?> Sh. Rashid Khalifa Al Khalifa <?php }
elseif ($session == 'ar') { ?> الشيخ راشد خليفة آل خليفة   <?php } ?> </p>
                    <h6><?php if($session == 'en') { ?>
                      Board Member <?php }
elseif ($session == 'ar') { ?> عضو مجلس إدارة  <?php } ?> </h6>
                  </div>
                </div>
              </div>
            </div>

            <div class="row top-p">
              <div class="col-md-2"></div>
                <div class="col-md-3 my-3">
                <div class="item-manage">
                  <img src="<?php echo base_url()?>uploads/images/management/bd8.jpg" style="border-radius: 5px;">
                  <div class="content2">
                  <p><?php if($session == 'en') { ?>  Ali Shawqi Fakhro  <?php }
elseif ($session == 'ar') { ?> علي شوقي فخرو  <?php } ?> </p>
                    <h6><?php if($session == 'en') { ?>
                      Board Member <?php }
elseif ($session == 'ar') { ?> عضو مجلس إدارة  <?php } ?> </h6>
                  </div>
                </div>
              </div>
            
              <div class="col-md-3 my-3">
                <div class="item-manage">
                  <img src="<?php echo base_url()?>uploads/images/management/bd9.jpg" style="border-radius: 5px;">
                  <div class="content2">
                  <p><?php if($session == 'en') { ?> Rana Fouad Al Mutawa <?php }
elseif ($session == 'ar') { ?>رنا فؤاد المطوع  <?php } ?> </p>
                    <h6><?php if($session == 'en') { ?>
                     Board Member <?php }
elseif ($session == 'ar') { ?> عضو مجلس إدارة  <?php } ?> </h6>
                  </div>
                </div>
              </div>
              <div class="col-md-3 my-3">
                <div class="item-manage">
                  <img src="<?php echo base_url()?>uploads/images/management/bd10.jpg" style="border-radius: 5px;">
                  <div class="content2">
                  <p><?php if($session == 'en') { ?> Abdulhameed Mohamed Dawani <?php }
elseif ($session == 'ar') { ?> عبدالحميد محمد دواني   <?php } ?> </p>
                    <h6><?php if($session == 'en') { ?>
                      Board Member <?php }
elseif ($session == 'ar') { ?> عضو مجلس إدارة  <?php } ?> </h6>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- row item -->

        </div>

         
          <!-- row item -->

        <!-- </div>  -->
        <!-- ----------------------------------------------------------------------------------------------- End Tab 1 Content -->

        <div class="tab-pane fade show commi" id="tab2">
          <section>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">

                  <ul class="nav nav-pills  nav-fill nav-paginator" data-paginator-item-count="4"
                    data-paginator-buttons-class="nav-link" id="nav-pills">

                    <?php 
            $i=0;
            foreach ($type as $key ) { ?>
                    <li><a class="nav-link <?php if($i==0){echo "active";}  ?>" data-bs-toggle="pill"
                        href="#com<?php echo $key['id']?>">
                        <?php if($session == 'en') {
                  echo $key['type'];}
                  elseif ($session == 'ar') {
                    echo $key['type_ar'];}
                    $i++; ?>
                      </a></li>
                    <?php   } ?>
                  </ul>
                </div>

              </div>
            </div>
          </section>
          <div class="tab-content ">
            <div class="tab-pane fade show  active " id="com1" role="tabpanel">
              <div class="rec">
                <div class="row top-p">
                  <div class="col-md-5 ri-rec"></div>
                  <div class="col-md-3">
                    <div class="item-manage">
                      <?php $i =0 ;?>
                      <img src="<?php echo base_url()?>uploads/images/management/<?php echo $management[$i]['image'] ;   ?>">
                      <div class="content2">
                        <p> <?php if($session == 'en') {
echo $management[$i]['name'];}
elseif ($session == 'ar') {
  echo $management[$i]['name_ar'];} ?></p>
                        <h6><?php if($session == 'en') {
echo $management[$i]['designation'];}
elseif ($session == 'ar') {
  echo $management[$i]['designation_ar'];}  $i++ ; ?>
                        </h6>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- row item -->
                <div class="row top-p">
                  <div class="col-md-2"></div>
                  <div class="col-md-3">
                    <div class="item-manage">
                    <img src="<?php echo base_url()?>uploads/images/management/<?php echo $management[$i]['image'] ;   ?>">
                      <div class="content2">
                        <p> <?php if($session == 'en') {
echo $management[$i]['name'];}
elseif ($session == 'ar') {
  echo $management[$i]['name_ar'];} ?></p>
                        <h6><?php if($session == 'en') {
echo $management[$i]['designation'];}
elseif ($session == 'ar') {
  echo $management[$i]['designation_ar'];}  $i++ ; ?>

                        </h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="item-manage">
                    <img src="<?php echo base_url()?>uploads/images/management/<?php echo $management[$i]['image'] ;   ?>">
                      <div class="content2">
                        <p> <?php if($session == 'en') {
echo $management[$i]['name'];}
elseif ($session == 'ar') {
  echo $management[$i]['name_ar'];} ?></p>
                        <h6><?php if($session == 'en') {
echo $management[$i]['designation'];}
elseif ($session == 'ar') {
  echo $management[$i]['designation_ar'];}  $i++ ; ?>

                        </h6>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="item-manage">
                    <img src="<?php echo base_url()?>uploads/images/management/<?php echo $management[$i]['image'] ;   ?>">
                      <div class="content2">
                        <p> <?php if($session == 'en') {
echo $management[$i]['name'];}
elseif ($session == 'ar') {
  echo $management[$i]['name_ar'];} ?></p>
                        <h6><?php if($session == 'en') {
echo $management[$i]['designation'];}
elseif ($session == 'ar') {
  echo $management[$i]['designation_ar'];}  $i++ ; ?>

                        </h6>
                        <p></p>
                        <h6></h6>
                      </div>
                      <br>
                    </div>
                  </div>
                </div>
              </div>
              <!-- row item -->
            </div>
            <!-- end 1st tab -->
            <div class="tab-pane fade show" id="com2" role="tabpanel">
              <div class="rec">
                <div class="row top-p">
                  <div class="col-md-6 ri-rec"></div>
                  <div class="col-md-3">
                    <div class="item-manage">
                    <img src="<?php echo base_url()?>uploads/images/management/<?php echo $management[$i]['image'] ;   ?>">
                      <div class="content2">
                        <p> <?php if($session == 'en') {
echo $management[$i]['name'];}
elseif ($session == 'ar') {
  echo $management[$i]['name_ar'];} ?></p>
                        <h6><?php if($session == 'en') {
echo $management[$i]['designation'];}
elseif ($session == 'ar') {
  echo $management[$i]['designation_ar'];}  $i++ ; ?>
                        </h6>

                      </div>
                    </div>
                  </div>


                </div>
                <!-- row item -->
                <div class="row top-p">
                  <div class="col-md-4"></div>
                  <div class="col-md-3">
                    <div class="item-manage">
                    <img src="<?php echo base_url()?>uploads/images/management/<?php echo $management[$i]['image'] ;   ?>">
                      <div class="content2">
                        <p> <?php if($session == 'en') {
echo $management[$i]['name'];}
elseif ($session == 'ar') {
  echo $management[$i]['name_ar'];} ?></p>
                        <h6><?php if($session == 'en') {
echo $management[$i]['designation'];}
elseif ($session == 'ar') {
  echo $management[$i]['designation_ar'];}  $i++ ; ?>
                        </h6>


                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="item-manage">
                    <img src="<?php echo base_url()?>uploads/images/management/<?php echo $management[$i]['image'] ;   ?>">
                      <div class="content2">
                        <p> <?php if($session == 'en') {
echo $management[$i]['name'];}
elseif ($session == 'ar') {
  echo $management[$i]['name_ar'];} ?></p>
                        <h6><?php if($session == 'en') {
echo $management[$i]['designation'];}
elseif ($session == 'ar') {
  echo $management[$i]['designation_ar'];}  $i++ ; ?>
                        </h6>

                      </div>
                    </div>
                  </div>
                 <div class="col-md-2"></div>
                </div>
              </div>
              <!-- row item -->
            </div>
            <!-- End Tab2 -->
            <div class="tab-pane fade show" id="com3" role="tabpanel">
              <div class="rec">
                <div class="row top-p">
                  <div class="col-md-6 ri-rec"></div>
                  <div class="col-md-3">
                    <div class="item-manage">
                    <img src="<?php echo base_url()?>uploads/images/management/<?php echo $management[$i]['image'] ;   ?>">
                      <div class="content2">
                        <p> <?php if($session == 'en') {
echo $management[$i]['name'];}
elseif ($session == 'ar') {
  echo $management[$i]['name_ar'];} ?></p>
                        <h6><?php if($session == 'en') {
echo $management[$i]['designation'];}
elseif ($session == 'ar') {
  echo $management[$i]['designation_ar'];}  $i++ ; ?>
                        </h6>

                      </div>
                    </div>
                  </div>


                </div>
                <!-- row item -->
                <div class="row top-p">
                  <div class="col-md-4"></div>
                  <div class="col-md-3">
                    <div class="item-manage">
                    <img src="<?php echo base_url()?>uploads/images/management/<?php echo $management[$i]['image'] ;   ?>">
                      <div class="content2">
                        <p> <?php if($session == 'en') {
echo $management[$i]['name'];}
elseif ($session == 'ar') {
  echo $management[$i]['name_ar'];} ?></p>
                        <h6><?php if($session == 'en') {
echo $management[$i]['designation'];}
elseif ($session == 'ar') {
  echo $management[$i]['designation_ar'];}  $i++ ; ?>
                        </h6>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="item-manage">
                    <img src="<?php echo base_url()?>uploads/images/management/<?php echo $management[$i]['image'] ;   ?>">
                      <div class="content2">
                        <p> <?php if($session == 'en') {
echo $management[$i]['name'];}
elseif ($session == 'ar') {
  echo $management[$i]['name_ar'];} ?></p>
                        <h6><?php if($session == 'en') {
echo $management[$i]['designation'];}
elseif ($session == 'ar') {
  echo $management[$i]['designation_ar'];}  $i++ ; ?>
                        </h6>

                      </div>
                      <br>
                    </div>
                  </div>
                   <div class="col-md-2"></div>
                  
                </div>
              </div>
              <!-- row item -->
            </div>
            <!-- End Tab2 -->
      

            <!-- Start dynamic management data -->
            <?php foreach ($type as $value ) {
								if($value['id'] > 5){  ?>
            <div class="tab-pane fade show" id="<?php echo "com".$value['id']?>" role="tabpanel">
              <div class="row top-p">
                <?php 
											$datamanagement = $this->Admin_model->get_all_data('management',array('status'=>'Y','sub_type'=>$value['id'])); 
											foreach ($datamanagement as $key ) { ?>
                <div class="col-md-3">
                  <div class="item-manage">
                    <img src="<?php echo base_url()?>uploads/images/management/<?php echo $key['image']?>">
                    <div class="content2">
                      <p> <?php if($session == 'en') {
															echo $key['name'];}
															elseif ($session == 'ar') {
															echo $key['name_ar'];} ?></p>
                      <h6><?php if($session == 'en') {
															echo $key['designation'];}
															elseif ($session == 'ar') {
															echo $key['designation_ar'];} ?>
                      </h6>

                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
            <?php } } ?>
            <!--End dynamic management data -->

          </div>
        </div><!-- End Tab 2 Content -->

      </div>
    </div>
  </section>
  </div>
  </section><!-- End About Section -->




  <!-- ======= Footer ======= -->
  <?php $this->load->view('home/footer',$data);?>
  <!-- End Footer -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="<?php echo base_url()?>assets/home_assets/js/bootstrap-nav-paginator.min.js"></script>
  <script src="<?php echo base_url()?>assets/home_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets/home_assets/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url()?>assets/home_assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url()?>assets/home_assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url()?>assets/home_assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets/home_assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url()?>assets/home_assets/js/main.js"></script>
  <script>
    $(document).ready(function () {

      $(window).scroll(function () {

        console.log($(window).scrollTop());

        if ($(window).scrollTop() > 400) {
          $('#nav-pills').addClass('sticky');
        }

        if ($(window).scrollTop() < 400) {
          $('#nav-pills').removeClass('sticky');
        }
      });
    });
  </script>
  <script>
    if (navigator.userAgent.indexOf('Mac') > 0)
      $('body').addClass('mac-os');
    if (navigator.userAgent.indexOf('Safari') > 0)
      $('body').addClass('safari');
    if (navigator.userAgent.indexOf('Chrome') > 0)
      $('body').addClass('chrome');
  </script>
</body>

</html>
