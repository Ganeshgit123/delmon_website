<?php $this->load->view('admin/header');?>

<body>
	<?php $this->load->view('admin/top_header');?>
	<?php $this->load->view('admin/side_header');?>
	<?php $session = $this->session->userdata('userdet');?>
	<div id="wrapper">
		<div class="main-content">
			<div class="row small-spacing">

				<div class="box-content card white">
					<div class="box-title row">
						<div class='col-md-4'>
							<h4>Edit Management</h4>
						</div>
						<div class='col-md-6'></div>
						<div class='col-md-2'>
							<a href="<?php echo base_url(); ?>admin/management"><button class="btn btn-warning">Managements</button></a>
						</div>
					</div>
					<div class="card-content">
						<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
						<?php $hidden = array('_user' => $session['user_id']);?>
						<?php echo form_open('admin/management_update', $attributes, $hidden);?>
						<div class="form-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<label for="first_name">Name</label>
									<input class="form-control"  type="text" name="name" value="<?php echo $dataset->name ?>" >									
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									<label for="first_name">Name (Arabic)</label>
									<input class="form-control"  type="text" name="name_ar" value="<?php echo $dataset->name_ar ?>" >									
									</div>
								</div>                
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
                                    <label for="first_name">Designation</label>
                                    <input class="form-control"  type="text" name="designation" value="<?php echo $dataset->designation ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
                                    <label for="first_name">Designation (Arabic)</label>
                                    <input class="form-control"  type="text" name="designation_ar" value="<?php echo $dataset->designation_ar ?>">
									</div>
								</div>                               
							</div>	
							<!-- <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Select Type</label>
										<select class="form-control" name="type" id="maintype" onchange=enable_subtype(this.value)>
											<option value="Board of Directors" <?php if($dataset->type == "Board of Directors" ){ echo 'selected' ; } ?>>Board of Directors</option>
											<option value="Board of Committees" <?php if($dataset->type == "Board of Committees" ){ echo 'selected' ; } ?>>Board of Committees</option>	
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Select Sub Type</label>
										<select class="form-control" name="subtype" id="subtype">
											<option value="0">Select</option>
											<?php foreach ($types as $type) { ?>
											<option value="<?php echo $type['id']?>" <?php if($type['id'] == $dataset->sub_type ){ echo 'selected' ; } ?>><?php echo ucwords($type['type']) ?></option>
											<?php } ?>
										</select>
									</div>
								</div>								
							</div>							 -->

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Type</label>										
										<input class="form-control"  type="text" name="type" readonly value="<?php echo $dataset->type; ?>">

									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Type</label>
										<input class="form-control"  type="text" name="name_subtype" readonly value="<?php echo $this->Admin_model->get_type_name_by_id('committee_type','id',$dataset->sub_type,'type') ?>">
										<input class="form-control"  type="hidden" name="subtype" value="<?php echo $dataset->sub_type?>">		
									</div>
								</div>								
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Image</label>
										<input class="form-control" name="image" type="file" id="image1" value="">
										<input type="hidden" name="id" id="old_image" value="<?php echo $dataset->id ;?>">
										<input type="hidden" name="old_image" id="old_image" value="<?php echo $dataset->image ;?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<?php if($dataset->image !='' && $dataset->image !='no file') {?>
										<img class="img-thumb" src="<?php echo base_url().'uploads/images/management/'.$dataset->image;?>"
											style="height:100px !important;width:100px !important;  " id="img1">
										<?php } else {?>
										<img class="img-thumb" src="" id="img1">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="form-actions">
							<?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => '<i class="fa fa fa-check-square-o"></i>&nbsp;&nbsp;'.$this->Admin_model->translate("Save"))); ?>
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
	/* Add data */ /*Form Submit*/
	$(document).ready(function () {
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
					} else {
						toastr.success(JSON.result);
						$('.save').prop('disabled', false);
						window.location.href = "<?php echo base_url();?>admin/management";
					}
				},
				error: function () {
					toastr.error(JSON.error);

					$('.save').prop('disabled', false);
				}
			});
		});
	});

	image1.onchange = evt => {
		const [file] = image1.files
		if (file) {
			img1.src = URL.createObjectURL(file);
			$("#img1").attr('style', "height:100px !important;width:100px !important; ");
		}
	}

		$('#subtype').prop('disabled', true);
	$('#maintype').prop('disabled', true);


function enable_subtype(type)
{
	if(type == "Board of Committees")
	{
		$('#subtype').prop('disabled', false);
	}
	else{
		$('#subtype').prop('disabled', true);
		$('#subtype').val("0");
	}
}
</script>
