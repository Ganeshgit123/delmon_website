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
							<h4>Edit Related Link</h4>
						</div>
						<div class='col-md-6'></div>
						<div class='col-md-2'>
						</div>
					</div>
					<div class="card-content">
						<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
						<?php $hidden = array('_user' => $session['user_id']);?>
						<?php echo form_open('admin/update_Rlink', $attributes, $hidden);?>
						<div class="form-body">
							<div class="row">
								<input type="hidden" name="id" value="<?php echo $data->id ?>">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Name</label>
                                        <input class="form-control" name="name" placeholder="Name" type="text"
											value="<?php echo $data->name ;?>">    
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Name - Arabic</label>
                                        <input class="form-control" name="name_ar" placeholder="Name Arabic" type="text"
											value="<?php echo $data->name_ar ;?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Link</label>
										<input class="form-control" name="link" placeholder="namLinke_ar" type="text"
											value="<?php echo $data->link ;?>">
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
						window.location.href = "<?php echo base_url();?>admin/footer";
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
