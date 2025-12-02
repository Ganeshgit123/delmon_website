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
							<h4>Edit Latest news</h4>
						</div>
						<div class='col-md-6'></div>
						<div class='col-md-2'>
						</div>
					</div>
					<div class="card-content">
						<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
						<?php $hidden = array('_user' => $session['user_id']);?>
						<?php echo form_open('admin/update_news', $attributes, $hidden);?>
						<div class="form-body">
							<div class="row">
								<input type="hidden" name="id" value="<?php echo $news->id ?>">

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title</label>
										<input class="form-control" name="title" type="text"
											value="<?php echo $news->title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title Arabic</label>
										<input class="form-control" name="title_ar" type="text"
											value="<?php echo $news->title_ar ?>">
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title Content</label>
										<textarea class="form-control" type="text" id="news_content_en"
											name="min_content"><?php echo $news->min_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title Content Arabic</label>
										<textarea class="form-control" type="text" id="news_content_ar"
											name="min_content_ar"><?php echo $news->min_content_ar ?></textarea>
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Link</label>
										<input class="form-control" type="text" value="<?php echo $news->content ?>"
											name="content">
									</div>
								</div>

							<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Link - Arabic</label>
										<input class="form-control" type="text" value="<?php echo $news->content_ar ?>"
											name="content_ar">
									</div>
								</div> 
							</div>

                           <!-- <div class="row">								
                               <div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Existing Date </label>
                                        <input class="form-control" readonly name="dbdate" type="text"
											value="<?php echo $news->date ?>">
									</div>
								</div> 
							</div> -->

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Start Date </label>
										<input class="form-control" name="st_date" type="date" value="<?php echo $news->st_date ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">End Date </label>
										<input class="form-control" name="en_date" type="date" value="<?php echo $news->en_date ?>">
									</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Image</label>
										<input class="form-control" name="image" type="file" id="image1" value="">
										<input type="hidden" name="old_image" id="old_image" value="<?php echo $news->img ;?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<?php if($news->img !='' && $news->img !='no file') {?>
										<img class="img-thumb" src="<?php echo base_url().'uploads/images/blog/'.$news->img;?>"
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

