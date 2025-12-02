<?php $this->load->view('admin/header');?>

<body>
	<?php $this->load->view('admin/top_header');?>
	<?php $this->load->view('admin/side_header');?>
	<?php $this->load->view('admin/tinymce_head_plugins');?>
	<?php $session = $this->session->userdata('userdet');?>
	<div id="wrapper">
		<div class="main-content">
			<div class="row small-spacing">

				<div class="box-content card white">
					<div class="box-title row">
						<div class='col-md-4'>
							<h4>Add Latest news</h4>
						</div>
						<div class='col-md-6'></div>
						<div class='col-md-2'>
						</div>
					</div>
					<div class="card-content">
						<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
						<?php $hidden = array('_user' => $session['user_id']);?>
						<?php echo form_open('admin/add_news', $attributes, $hidden);?>
						<div class="form-body">
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title</label>
										<input class="form-control" name="title" placeholder="News title" type="text"
											value="">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title Arabic</label>
										<input class="form-control" name="title_ar" placeholder="Arabic News title" type="text"
											value="">
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title Content</label>
										<textarea class="form-control" type="text" id="news_content_en"
											name="min_content"></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title Content Arabic</label>
										<textarea class="form-control" type="text" id="news_content_ar"
											name="min_content_ar"></textarea>
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Link</label>
										<input class="form-control" type="text" placeholder="News Link" value=""
											name="content">
									</div>
								</div>

								 <div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Link - Arabic</label>
										<input class="form-control" type="text" placeholder="News Link" value=""
											name="content_ar">
									</div>
								</div> 
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Start Date </label>
                                        <input class="form-control" name="st_date" type="date">
									</div>
								</div>

                                <div class="col-md-6">
									<div class="form-group">
										<label for="first_name">End Date </label>
                                        <input class="form-control" name="en_date" type="date">
									</div>
								</div>

                                <!-- <div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Existing Date </label>
                                        <input class="form-control" readonly name="dbdate" type="text"
											value="">
									</div>
								</div> -->
							</div>


                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Image</label>
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
						window.location.href = "<?php echo base_url();?>admin/home";
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

</script>

<?php $this->load->view('admin/tinymce_foot_plugins');?>

<script type="text/javascript">
	function initMCEexact(e) {
		tinyMCE.init({
			skin: false,
			mode: "exact",
			elements: e,
		})
	}
	$(document).ready(function () {
		initMCEexact("news_content_ar");
		initMCEexact("news_content_en");

    document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	});

</script>

