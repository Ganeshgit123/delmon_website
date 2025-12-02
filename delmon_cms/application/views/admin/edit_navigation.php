 <?php $this->load->view('admin/header');?>

 <body>
 	<?php $this->load->view('admin/top_header');?>
 	<?php $this->load->view('admin/side_header');?>
 	<!--  TinyMCE   -->
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/tinymce/skins/lightgray/skin.min.css">
 	<!--    Must include this script FIRST  -->
 	<script src="<?php echo base_url(); ?>assets/plugin/tinymce/tinymce.min.js"></script>
 	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
 	<?php $session = $this->session->userdata('userdet');?>
 	<div id="wrapper">
 		<div class="main-content">
 			<div class="row small-spacing">

 				<div class="box-content card white">
 					<div class="box-title row">
 						<div class='col-md-4'>
 							<h4>Main Navigation</h4>
 						</div>
 						<div class='col-md-6'></div>
 						<div class='col-md-2'>

 						</div>
 					</div>
 					<div class="card-content">
          	<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
 						<?php $hidden = array('_user' => $session['user_id']);?>
 						<?php echo form_open('admin/update_navigation', $attributes, $hidden);?>
 						<div class="form-body">
        			<div class="row">
 								<!-- <div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Logo</label>
 										<input type="file" id="image1" name="image" class="form-control ">
 										<small>Select files only: gif,png,jpg,jpeg</small>
 										<input type="hidden" name="old_image" id="sec1_old_image" value="<?php echo $data->logo ;?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">

 										<?php if($data->logo!='' && $data->logo!='no file') {?>
 										<img class="img-thumb" src="<?php echo base_url().'uploads/images/'.$data->logo;?>"
 											style="height:100px !important;width:100px !important; " id="img1">
 										<?php } else {?>
 										<img class="img-thumb" src="" id="img1">
 										<?php } ?>
 									</div>
 								</div> -->
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Logo</label>
 										<input type="file" id="image12" name="image-w" class="form-control ">
 										<small>Select files only: gif,png,jpg,jpeg</small>
 										<input type="hidden" name="old_image-w" id="sec1_old_image-w" value="<?php echo $data->logoe ;?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<?php if($data->logoe!='' && $data->logoe!='no file') {?>
 										<img class="img-thumb" src="<?php echo base_url().'uploads/images/'.$data->logoe;?>"
 											style="height:100px !important;width:100px !important; " id="img1w">
 										<?php } else {?>
 										<img class="img-thumb" src="" id="img1w">

 										<?php } ?>
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Menu 1</label>
 										<input class="form-control" type="text" name="menu1" value="<?php echo $data->menu1 ?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Menu 1 - Arabic</label>
 										<input class="form-control" type="text" name="menu1_ar" value="<?php echo $data->menu1_ar ?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Menu 2</label>
 										<input class="form-control" type="text" name="menu2" value="<?php echo $data->menu2 ?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Menu 2 - Arabic</label>
 										<input class="form-control" type="text" name="menu2_ar" value="<?php echo $data->menu2_ar ?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Menu 3</label>
 										<input class="form-control" type="text" name="menu3" value="<?php echo $data->menu3 ?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Menu 3 - Arabic</label>
 										<input class="form-control" type="text" name="menu3_ar" value="<?php echo $data->menu3_ar ?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Menu 4</label>
 										<input class="form-control" type="text" name="menu4" value="<?php echo $data->menu4 ?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Menu 4 - Arabic</label>
 										<input class="form-control" type="text" name="menu4_ar" value="<?php echo $data->menu4_ar ?>">
 									</div>
 								</div>

 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Menu 5</label>
 										<input class="form-control" type="text" name="menu5" value="<?php echo $data->menu5 ?>">
 									</div>
 								</div>

 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Menu 5 - Arabic</label>
 										<input class="form-control" type="text" name="menu5_ar" value="<?php echo $data->menu5_ar ?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Menu 6</label>
 										<input class="form-control" type="text" name="menu6" value="<?php echo $data->menu6 ?>">
 									</div>
 								</div>

 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Menu 6 - Arabic</label>
 										<input class="form-control" type="text" name="menu6_ar" value="<?php echo $data->menu6_ar ?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Menu 7</label>
 										<input class="form-control" type="text" name="menu7" value="<?php echo $data->menu7 ?>">
 									</div>
 								</div>

 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Menu 7 - Arabic</label>
 										<input class="form-control" type="text" name="menu7_ar" value="<?php echo $data->menu7_ar ?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Menu 8</label>
 										<input class="form-control" type="text" name="menu8" value="<?php echo $data->menu8 ?>">
 									</div>
 								</div>

 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Menu 8 - Arabic</label>
 										<input class="form-control" type="text" name="menu8_ar" value="<?php echo $data->menu8_ar ?>">
 									</div>
 								</div>                
 							</div>

							  <div class="row">
								<div class='col-md-12'>
									<h4 class="">About - Sub Menus</h3>
								</div>
							</div>

							<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Sub Menu 1</label>
 										<input class="form-control" type="text" name="submenu1" value="<?php echo $data->submenu1 ?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Sub Menu 1 - Arabic</label>
 										<input class="form-control" type="text" name="submenu1_ar" value="<?php echo $data->submenu1_ar ?>">
 									</div>
 								</div>

								 <div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Sub Menu 2</label>
 										<input class="form-control" type="text" name="submenu2" value="<?php echo $data->submenu2 ?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Sub Menu 2 - Arabic</label>
 										<input class="form-control" type="text" name="submenu2_ar" value="<?php echo $data->submenu2_ar ?>">
 									</div>
 								</div>

								 <div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Sub Menu 3</label>
 										<input class="form-control" type="text" name="submenu3" value="<?php echo $data->submenu3 ?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Sub Menu 3 - Arabic</label>
 										<input class="form-control" type="text" name="submenu3_ar" value="<?php echo $data->submenu3_ar ?>">
 									</div>
 								</div>

								 <div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Sub Menu 4</label>
 										<input class="form-control" type="text" name="submenu4" value="<?php echo $data->submenu4 ?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Sub Menu 4 - Arabic</label>
 										<input class="form-control" type="text" name="submenu4_ar" value="<?php echo $data->submenu4_ar ?>">
 									</div>
 								</div>

								 <div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Sub Menu 5</label>
 										<input class="form-control" type="text" name="submenu5" value="<?php echo $data->submenu5 ?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Sub Menu 5 - Arabic</label>
 										<input class="form-control" type="text" name="submenu5_ar" value="<?php echo $data->submenu5_ar ?>">
 									</div>
 								</div>

								 <div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Sub Menu 6</label>
 										<input class="form-control" type="text" name="submenu6" value="<?php echo $data->submenu6 ?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Sub Menu 6 - Arabic</label>
 										<input class="form-control" type="text" name="submenu6_ar" value="<?php echo $data->submenu6_ar ?>">
 									</div>
 								</div>

								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Sub Menu 7</label>
 										<input class="form-control" type="text" name="submenu7" value="<?php echo $data->submenu7 ?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Sub Menu 7 - Arabic</label>
 										<input class="form-control" type="text" name="submenu7_ar" value="<?php echo $data->submenu7_ar ?>">
 									</div>
 								</div>
 						</div>
 						<div class="form-actions">
 							<?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary btn-block', 'content' => '<i class="fa fa fa-check-square-o"></i>'.$this->Admin_model->translate("Save"))); ?>
 						</div>
 						<?php echo form_close(); ?>
 					</div>
 				</div>
 			</div>
 		</div>
 </body>

 <!-- ================================================== -->
 <?php $this->load->view('admin/footer');?>
 <script type="text/javascript">
 	image1.onchange = evt => {
 		const [file] = image1.files
 		if (file) {
 			img1.src = URL.createObjectURL(file);
 			$("#img1").attr('style', "height:100px !important;width:100px !important; ");


 		}
 	}
 </script>
 <script type="text/javascript">
 	image2.onchange = evt => {
 		const [file] = image2.files
 		if (file) {
 			img1w.src = URL.createObjectURL(file);
 			$("#img1w").attr('style', "height:100px !important;width:100px !important; ");
 		}
 	}
 </script>
 <script type="text/javascript">
 	/* Add data */ /*Form Submit*/
 	$(document).ready(function () {
 		tinyMCE.triggerSave();
 		/* Add data */
 		/*Form Submit*/
 		$("#xin-form").submit(function (e) {
 			var fd = new FormData(this);
 			var obj = $(this),
 				action = obj.attr('name');
 			fd.append("is_ajax", 1);
 			fd.append("form", action);
 			e.preventDefault();
 			$('.save').prop('disabled', true);
 			$.ajax({
 				url: e.target.action,
 				type: "POST",
 				data: fd,
 				contentType: false,
 				cache: false,
 				processData: false,
 				success: function (JSON) {
 					if (JSON.error != '') {
 						toastr.error(JSON.error);
 						$('.save').prop('disabled', false);
 						//window.location.href = "<?php echo base_url();?>admin/navigation";
 					} else {
 						toastr.success(JSON.result);
 						$('.save').prop('disabled', false);
 						location.reload();
 					}
 				},
 				error: function () {
 					toastr.error(JSON.error);

 					$('.save').prop('disabled', false);
 				}
 			});
 		});
 	});
 </script>
