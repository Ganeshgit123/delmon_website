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
							<h4>Add Academic Report</h4>
						</div>
						<div class='col-md-6'></div>
						<div class='col-md-2'>
                        <a href="<?php echo base_url(); ?>admin/academic_report"><button
									class="btn btn-warning">List All</button></a>

						</div>
					</div>
					<div class="card-content">
						<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
						<?php $hidden = array('_user' => $session['user_id']);?>
						<?php echo form_open('admin/add_ac_report', $attributes, $hidden);?>
						<div class="form-body">
                        <div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="first_name">Select Year</label>
                                        <select class="form-control" name="year_id">
                                            <option value="">--Select--</option>
                                            <?php foreach ($data as $key ) { ?>
                                                <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                                            <?php }?>
                                        </select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title</label>
										<input class="form-control" name="name" placeholder="Title name" type="text"
											value="">
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title -  Arabic</label>
										<input class="form-control" name="name_ar" placeholder="Title name" type="text"
											value="">
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Upload Pdf</label>
										<input type="file" id="file" name="file" class="form-control ">
										<small>Select files only: pdf onlyg</small>
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
						window.location.href = "<?php echo base_url();?>admin/academic_report";
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
