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
							<h4>Edit Contact</h4>
						</div>
						<div class='col-md-6'></div>
						<div class='col-md-2'>
						</div>
					</div>
					<div class="card-content">
						<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
						<?php $hidden = array('_user' => $session['user_id']);?>
						<?php echo form_open('admin/update_contact', $attributes, $hidden);?>
						<div class="form-body">
							<div class="row">
								<h5 style="padding-left: 59px;"><b>Note: For update Map coordinates and branch details
										refer footer section </b></h5>
								<br>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="first_name">Contact section Heading</label>
											<textarea class="form-control" type="text"
												name="section3"><?php echo $data->section3 ?></textarea>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="first_name">Contact section Heading (Arabic)</label>
											<textarea class="form-control" type="text"
												name="section3_ar"><?php echo $data->section3_ar ?></textarea>
										</div>
									</div>
								</div>

                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="first_name">Form Field 1</label>
                                            <input class="form-control" name="form_field1" placeholder="Form Field 1" type="text"
											value="<?php echo $data->form_field1 ?>">
										</div>
									</div>
                                    
									<div class="col-md-6">
									<div class="form-group">
											<label for="first_name">Form Field 1 - Arabic</label>
                                            <input class="form-control" name="form_field1_ar" placeholder="Form Field 1 arabic" type="text"
											value="<?php echo $data->form_field1_ar ?>">
										</div>
									</div>
								</div>

                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="first_name">Form Field 2</label>
                                            <input class="form-control" name="form_field2" placeholder="Form Field 2" type="text"
											value="<?php echo $data->form_field2 ?>">
										</div>
									</div>
                                    
									<div class="col-md-6">
									<div class="form-group">
											<label for="first_name">Form Field 2 - Arabic</label>
                                            <input class="form-control" name="form_field2_ar" placeholder="Form Field 2 arabic" type="text"
											value="<?php echo $data->form_field2_ar ?>">
										</div>
									</div>
								</div>

                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="first_name">Form Field 3</label>
                                            <input class="form-control" name="form_field3" placeholder="Form Field 3" type="text"
											value="<?php echo $data->form_field3 ?>">
										</div>
									</div>
                                    
									<div class="col-md-6">
									<div class="form-group">
											<label for="first_name">Form Field 3 - Arabic</label>
                                            <input class="form-control" name="form_field3_ar" placeholder="Form Field 3 arabic" type="text"
											value="<?php echo $data->form_field3_ar ?>">
										</div>
									</div>
								</div>

                                <div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="first_name">Form Field 4</label>
                                            <input class="form-control" name="form_field4" placeholder="Form Field 4" type="text"
											value="<?php echo $data->form_field4 ?>">
										</div>
									</div>
                                    
									<div class="col-md-6">
									<div class="form-group">
											<label for="first_name">Form Field 4 - Arabic</label>
                                            <input class="form-control" name="form_field4_ar" placeholder="Form Field 4 arabic" type="text"
											value="<?php echo $data->form_field4_ar ?>">
										</div>
									</div>
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
