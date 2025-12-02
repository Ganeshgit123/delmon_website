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
							<h4>Add Branch</h4>
						</div>
						<div class='col-md-6'></div>
						<div class='col-md-2'>
							<a href="<?php echo base_url(); ?>admin/footer"><button
									class="btn btn-warning">View List</button></a>
						</div>
					</div>
					<div class="card-content">
						<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
						<?php $hidden = array('_user' => $session['user_id']);?>
						<?php echo form_open('admin/add_branch', $attributes, $hidden);?>
						<div class="form-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Branch</label>
										<input class="form-control" name="address" placeholder="Branch" type="text"
											value="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Branch - arabic</label>
										<input class="form-control" name="address_ar" placeholder="Branch arabic" type="text"
											value="">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Phone - 1</label>
										<input class="form-control" name="phone1" placeholder="Phone 1" type="text"
											value="">
									</div>
								</div>
								<div class="col-md-6">
								<div class="form-group">
										<label for="first_name">Phone - 2</label>
										<input class="form-control" name="phone2" placeholder="Phone 2" type="text"
											value="">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Latitude</label>
										<input class="form-control" name="lat" placeholder="Latitude coordinate" type="text"
											value="">
									</div>
								</div>
								<div class="col-md-6">
								<div class="form-group">
										<label for="first_name">Longitute</label>
										<input class="form-control" name="phonlnge2" placeholder="Longitute coordinate" type="text"
											value="">
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
	$(document).ready(function () {
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
