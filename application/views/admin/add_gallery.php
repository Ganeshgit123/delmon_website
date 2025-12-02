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
							<h4>Add Gallery Image</h4>
						</div>
						<div class='col-md-6'></div>
						<div class='col-md-2'>
							<a href="<?php echo base_url(); ?>admin/gallery"><button class="btn btn-warning">Gallery</button></a>
						</div>
					</div>
					<div class="card-content">
						<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
						<?php $hidden = array('_user' => $session['user_id']);?>
						<?php echo form_open('admin/gallery_add_image', $attributes, $hidden);?>
						<div class="form-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="first_name">Select Type</label>
										<select class="form-control" name="type" id="gallerytype">
											<?php foreach ($types as $city) { ?>
											<option value="<?php echo $city['id']?>"><?php echo ucwords($city['type']) ?></option>
											<?php } ?>
											<option value="newtype">Add new <b>+</b></option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Gallery Image</label>
										<input class="form-control" name="image" id="image1" type="file" value="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<img class="img-thumb" src="" id="img1">
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
						window.location.href = "<?php echo base_url();?>admin/gallery";
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

		document.getElementById("gallerytype").onchange = function () {
		if (this.value == "newtype") {
			window.location.href = '<?php echo base_url()?>admin/new_gallertype';
		}
	};

</script>
