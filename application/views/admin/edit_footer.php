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
 							<h4>Footer Section</h4>
 						</div>
 						<div class='col-md-6'></div>
 						<div class='col-md-2'>
 						</div>
 					</div>
 					<div class="card-content">
 						<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
 						<?php $hidden = array('_user' => $session['user_id']);?>
 						<?php echo form_open('admin/update_footer', $attributes, $hidden);?>
 						<div class="form-body">
 							<div class="row">
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Logo</label>
 										<input type="file" id="image1" name="image" class="form-control ">
 										<small>Select files only: gif,png,jpg,jpeg</small>
 										<input type="hidden" name="old_image" id="sec1_old_image"
 											value="<?php echo $contact->footer_logo ;?>">
 									</div>
 								</div>
 								<div class="col-md-6">
 									<div class="form-group">
 										<?php if($contact->footer_logo!='' && $contact->footer_logo!='no file') {?>
 										<img class="img-thumb" src="<?php echo base_url().'uploads/images/'.$contact->footer_logo;?>"
 											style="height:100px !important;width:100px !important; " id="img1">
 										<?php } else {?>
 										<img class="img-thumb" src="" id="img1">
 										<?php } ?>
 									</div>
 								</div>

 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Footer Address</label>

 										<textarea class="form-control" type="text"
 											name="address"><?php echo $contact->address ?></textarea>
 									</div>
 								</div>

 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Footer Address - Arabic</label>
 										<textarea class="form-control" type="text"
 											name="address_ar"><?php echo $contact->address_ar ?></textarea>
 									</div>
 								</div>

 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Website</label>
 										<input class="form-control" type="text" name="website" value="<?php echo $contact->website ?>">
 									</div>
 								</div>

 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Mail</label>
 										<input class="form-control" type="text" name="email" value="<?php echo $contact->email ?>">
 									</div>
 								</div>

 							</div>

 							<div class="box-title row">
 								<div class='col-md-4'>
 									<h4><b>Social Media Links</b></h4>
 								</div>
 								<div class='col-md-6'></div>
 								<div class='col-md-2'>

 								</div>
 							</div>

 							<div class="row">
 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Facebook</label>
 										<input class="form-control" type="text" name="facebook" value="<?php echo $contact->fb ?>">
 									</div>
 								</div>

 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Twitter</label>
 										<input class="form-control" type="text" name="twitter" value="<?php echo $contact->twitter ?>">
 									</div>
 								</div>

 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Instagram</label>
 										<input class="form-control" type="text" name="instagram" value="<?php echo $contact->instagram ?>">
 									</div>
 								</div>

 								<div class="col-md-6">
 									<div class="form-group">
 										<label for="first_name">Linkdin</label>
 										<input class="form-control" type="text" name="linkdin" value="<?php echo $contact->linkdin ?>">
 									</div>
 								</div>
 							</div>

 							<br>
 							<h3 class="text-center"><b>Related Links</b></h3>
 							<br>
 							<div class="table-responsive">
 								<table id="example" class="table table-striped table-bordered" style="width:100%">
 									<thead>
 										<tr>
 											<th>No.</th>
 											<!-- <th>User Id</th> -->
 											<th> Title </th>
 											<th> Title - arabic</th>
 											<th> Link</th>
 											<th> Action </th>
 										</tr>

 									</thead>
 									<tbody>
 										<?php 

									foreach ($link as $value) {
										?>
 										<tr>
 											<td><?php echo $value['id'] ?></td>
 											<td><?php echo $value['name']  ?></td>
 											<td><?php echo $value['name_ar'] ;  ?></td>
 											<td><?php echo $value['link'] ;  ?></td>
 											<td>
 												<a href="<?php echo base_url()?>admin/edit_Rlink/<?php echo $value['id']?>">&nbsp;&nbsp;<button
 														type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i
 															class="ico fa fa-pencil"></i></button></a>
 											</td>
 										</tr>
 										<?php
                 					 } ?>


 									</tbody>

 								</table>
 							</div>


 							<div class="box-content">
 								<h3 class="text-center"><b>Contact Details</b></h3>
 								<div class="row">
 									<div class="box-title row">
 										<div class='col-md-4'>
 											<h4> </h4>
 										</div>
 										<div class='col-md-6'></div>
 										<div class='col-md-2'>
 											<a href="<?php echo base_url(); ?>admin/branch_new"><button class="btn btn-warning"
 													type="button"> Add New</button></a>
 										</div>
 									</div>
 									<div class="table-responsive">
 										<table id="example" class="table table-striped table-bordered" style="width:100%">
 											<thead>
 												<tr>
 													<th>No.</th>
 													<th>Branch</th>
 													<th>Branch-arabic</th>
 													<th>Phone 1</th>
 													<th>Phone 2</th>
 													<th> Action </th>
 												</tr>
 											</thead>
 											<tbody>
 												<?php foreach ($address as $value) {?>
 												<tr>
 													<td><?php echo $value['id'] ?></td>
 													<td><?php echo $value['address'] ?></td>
 													<td><?php echo $value['address_ar'] ?></td>
 													<td><?php echo $value['phone1'] ?></td>
 													<td><?php echo $value['phone2'] ?></td>
 													<td>
 														<a href="<?php echo base_url()?>admin/edit_branch/<?php echo $value['id']?>">&nbsp;&nbsp;<button
 																type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i
 																	class="ico fa fa-pencil"></i></button></a>
 														<a href="javascript:void(0)">&nbsp;&nbsp;<button type="button"
 																class="btn btn-danger btn-circle btn-xs waves-effect waves-light delete"
 																onclick="deleteentry(<?php echo $value['id'] ?>);  return false ;"><i
 																	class="ico fa fa-trash"></i></button></a>
 													</td>
 												</tr>
 												<?php
                      } ?>


 											</tbody>

 										</table>
 									</div>


 									<!-- /.box-content -->
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
 	$(document).ready(function () {
 		tinyMCE.triggerSave();
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
 						//window.location.href = "<?php echo base_url();?>admin/footer";
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


 	function deleteentry($id) {
 		var xin_table = $('#xin_table').dataTable();
 		$.ajax({
 			type: "POST",
 			url: "<?php echo base_url(); ?>" + 'admin/delete_entry/',
 			data: {
 				id: $id,
 				table: 'address'
 			},
 		}).done(function (response) {
 			location.reload();
 		});

 	}

 </script>
