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
							<h4>Home Page</h4>
						</div>
						<div class='col-md-6'></div>
						<div class='col-md-2'>
						</div>
					</div>
					<div class="card-content">
						<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
						<?php $hidden = array('_user' => $session['user_id']);?>
						<?php echo form_open('admin/update_home', $attributes, $hidden);?>
						<div class="form-body">

							<div class="row">
								<div class='col-md-12'>
									<h3 class="text-center">Section 1 </h3>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 1 Title</label>
										<input class="form-control" name="sec1_title" type="text"
											value="<?php echo $home->sec1_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 1 Title -Arabic </label>
										<input class="form-control" name="sec1_title_ar" type="text"
											value="<?php echo $home->sec1_title_ar ?>">
									</div>
								</div>
							</div>
							<!-- Point 1 starts -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 1 Title</label>
										<input class="form-control" name="secsub1_title" type="text"
											value="<?php echo $home->secsub1_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 1 Title - Arabic </label>
										<input class="form-control" name="secsub1_title_ar" type="text"
											value="<?php echo $home->secsub1_title_ar ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 1 Content</label>
										<textarea class="form-control" type="text"
											name="secsub1_content"><?php echo $home->secsub1_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 1 Content - Arabic</label>
										<textarea class="form-control" type="text"
											name="secsub1_content_ar"><?php echo $home->secsub1_content_ar ?></textarea>
									</div>
								</div>
							</div>
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 1 Image</label>
										<input type="file" id="secsub1_img" name="secsub1_img" class="form-control ">
										<small>Select files only: gif,png,jpg,jpeg</small>
										<input type="hidden" name="old_secsub1_img"
											value="<?php echo $home->secsub1_img ;?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<?php if($home->secsub1_img!='' && $home->secsub1_img!='no file') {?>
										<img class="img-thumb"
											src="<?php echo base_url().'uploads/images/home/'.$home->secsub1_img;?>"
											style="height:100px !important;width:100px !important; "
											id="view_secsub1_img">
										<?php } else {?>
										<img class="img-thumb" src="" id="view_secsub1_img">
										<?php } ?>
									</div>
								</div>
							</div>
							<!-- Point 1 Ends -->

							<!-- Point 2 starts -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 2 Title</label>
										<input class="form-control" name="secsub2_title" type="text"
											value="<?php echo $home->secsub2_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 2 Title - Arabic </label>
										<input class="form-control" name="secsub2_title_ar" type="text"
											value="<?php echo $home->secsub2_title_ar ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 2 Content</label>
										<textarea class="form-control" type="text"
											name="secsub2_content"><?php echo $home->secsub2_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 2 Content - Arabic</label>
										<textarea class="form-control" type="text"
											name="secsub2_content_ar"><?php echo $home->secsub2_content_ar ?></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 2 Image</label>
										<input type="file" id="secsub2_img" name="secsub2_img" class="form-control ">
										<small>Select files only: gif,png,jpg,jpeg</small>
										<input type="hidden" name="old_secsub2_img"
											value="<?php echo $home->secsub2_img ;?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<?php if($home->secsub2_img!='' && $home->secsub2_img!='no file') {?>
										<img class="img-thumb"
											src="<?php echo base_url().'uploads/images/home/'.$home->secsub2_img;?>"
											style="height:100px !important;width:100px !important; "
											id="view_secsub2_img">
										<?php } else {?>
										<img class="img-thumb" src="" id="view_secsub2_img">
										<?php } ?>
									</div>
								</div>
							</div>
							<!-- Point 2 Ends -->

							<!-- Point 3 starts -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 3 Title</label>
										<input class="form-control" name="secsub3_title" type="text"
											value="<?php echo $home->secsub3_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 3 Title - Arabic </label>
										<input class="form-control" name="secsub3_title_ar" type="text"
											value="<?php echo $home->secsub3_title_ar ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 3 Content</label>
										<textarea class="form-control" type="text"
											name="secsub3_content"><?php echo $home->secsub3_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 3 Content - Arabic</label>
										<textarea class="form-control" type="text"
											name="secsub3_content_ar"><?php echo $home->secsub3_content_ar ?></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 3 Image</label>
										<input type="file" id="secsub3_img" name="secsub3_img" class="form-control ">
										<small>Select files only: gif,png,jpg,jpeg</small>
										<input type="hidden" name="old_secsub3_img"
											value="<?php echo $home->secsub3_img ;?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<?php if($home->secsub3_img!='' && $home->secsub3_img!='no file') {?>
										<img class="img-thumb"
											src="<?php echo base_url().'uploads/images/home/'.$home->secsub3_img;?>"
											style="height:100px !important;width:100px !important;"
											id="view_secsub3_img">
										<?php } else {?>
										<img class="img-thumb" src="" alt="No Image Found" id="view_secsub3_img">
										<?php } ?>
									</div>
								</div>
							</div>
							<!-- Point 3 Ends -->

							<!-- Point 4 starts -->

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 4 Title</label>
										<input class="form-control" name="secsub4_title" type="text"
											value="<?php echo $home->secsub4_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 4 Title - Arabic </label>
										<input class="form-control" name="secsub4_title_ar" type="text"
											value="<?php echo $home->secsub4_title_ar ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 4 Content</label>
										<textarea class="form-control" type="text"
											name="secsub4_content"><?php echo $home->secsub4_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 4 Content - Arabic</label>
										<textarea class="form-control" type="text"
											name="secsub4_content_ar"><?php echo $home->secsub4_content_ar ?></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Point 4 Image</label>
										<input type="file" id="secsub4_img" name="secsub4_img" class="form-control ">
										<small>Select files only: gif,png,jpg,jpeg</small>
										<input type="hidden" name="old_secsub4_img"
											value="<?php echo $home->secsub4_img ;?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<?php if($home->secsub4_img!='' && $home->secsub4_img!='no file') {?>
										<img class="img-thumb"
											src="<?php echo base_url().'uploads/images/home/'.$home->secsub4_img;?>"
											style="height:100px !important;width:100px !important;"
											id="view_secsub4_img">
										<?php } else {?>
										<img class="img-thumb" src="" alt="No Image Found" id="view_secsub4_img">
										<?php } ?>
									</div>
								</div>
							</div>
							<!-- Point 4 Ends -->

							<div class="row">
								<div class='col-md-12'>
									<h3 class="text-center">Section 2 </h3>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 2 Title</label>
										<input class="form-control" name="sec2_title" type="text"
											value="<?php echo $home->sec2_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 2 Title -Arabic </label>
										<input class="form-control" name="sec2_title_ar" type="text"
											value="<?php echo $home->sec2_title_ar ?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 2 Content</label>
										<textarea class="form-control" type="text"
											name="sec2_content"><?php echo $home->sec2_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 2 Content - Arabic</label>
										<textarea class="form-control" type="text"
											name="sec2_content_ar"><?php echo $home->sec2_content_ar ?></textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 2 Button Text</label>
										<input class="form-control" name="sec2_btn" type="text"
											value="<?php echo $home->sec2_btn ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 2 Button Text - Arabic </label>
										<input class="form-control" name="sec2_btn_ar" type="text"
											value="<?php echo $home->sec2_btn_ar ?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class='col-md-12'>
									<h3 class="text-center">Section 3 </h3>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 3 Title</label>
										<input class="form-control" name="sec3_title" type="text"
											value="<?php echo $home->sec3_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 3 Title -Arabic </label>
										<input class="form-control" name="sec3_title_ar" type="text"
											value="<?php echo $home->sec3_title_ar ?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 3 Content</label>
										<textarea class="form-control" type="text"
											name="sec3_content"><?php echo $home->sec3_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 3 Content - Arabic</label>
										<textarea class="form-control" type="text"
											name="sec3_content_ar"><?php echo $home->sec3_content_ar ?></textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 3 Image</label>
										<input type="file" id="sec3_img" name="sec3_img" class="form-control ">
										<small>Select files only: gif,png,jpg,jpeg</small>
										<input type="hidden" name="old_sec3_img"
											value="<?php echo $home->sec3_img ;?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<?php if($home->sec3_img!='' && $home->sec3_img!='no file') {?>
										<img class="img-thumb"
											src="<?php echo base_url().'uploads/images/home/'.$home->sec3_img;?>"
											style="height:100px !important;width:100px !important; " id="view_sec3_img">
										<?php } else {?>
										<img class="img-thumb" src="" id="view_sec3_img">
										<?php } ?>
									</div>
								</div>
							</div>

                            <div class="box-title row">
 								<div class='col-md-4'>
 									<h4><b>Features</b></h4>
 								</div>
 								<div class='col-md-6'></div>
 								<div class='col-md-2'>
 								</div>
 							</div>

                             <div class="table-responsive">
 								<table id="example" class="table table-striped table-bordered" style="width:100%">
 									<thead>
 										<tr>
 											<th>No.</th>
 											<th> Name </th>
 											<th> Name - Arabic</th>
 											<th> Icon</th>
 											<th> Action </th>
 										</tr>

 									</thead>
 									<tbody>
 										<?php 

									foreach ($pf as $value) {
										?>
 										<tr>
 											<td><?php echo $value['id'] ?></td>
 											<td><?php echo $value['name']  ?></td>
 											<td><?php echo $value['name_ar'] ;  ?></td>
                                             <td><img   class="img-thumb" src="<?php echo base_url()?>uploads/images/home/<?php echo $value['img'] ?>" style="height:50px !important;width:50px !important;"  id="img1"></td>  
 											<td>
 												<a href="<?php echo base_url()?>admin/edit_feature/<?php echo $value['id']?>">&nbsp;&nbsp;<button
 														type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i
 															class="ico fa fa-pencil"></i></button></a>
 											</td>
 										</tr>
 										<?php
                 					 } ?>
 									</tbody>

 								</table>
 							</div>

                            <div class="row">
								<div class='col-md-12'>
									<h3 class="text-center">Section 4 </h3>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 4 Title</label>
										<input class="form-control" name="sec4_title" type="text"
											value="<?php echo $home->sec4_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 4 Title -Arabic </label>
										<input class="form-control" name="sec4_title_ar" type="text"
											value="<?php echo $home->sec4_title_ar ?>">
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Brand Image 1</label>
										<input type="file" id="sec4_img1" name="sec4_img1" class="form-control ">
										<small>Select files only: gif,png,jpg,jpeg</small>
										<input type="hidden" name="old_sec4_img1"
											value="<?php echo $home->sec4_img1 ;?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<?php if($home->sec4_img1!='' && $home->sec4_img1!='no file') {?>
										<img class="img-thumb"
											src="<?php echo base_url().'uploads/images/home/'.$home->sec4_img1;?>"
											style="height:100px !important;width:100px !important;"
											id="view_sec4_img1">
										<?php } else {?>
										<img class="img-thumb" src="" alt="No Image Found" id="view_sec4_img1">
										<?php } ?>
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Brand Image 2</label>
										<input type="file" id="sec4_img2" name="sec4_img2" class="form-control ">
										<small>Select files only: gif,png,jpg,jpeg</small>
										<input type="hidden" name="old_sec4_img2"
											value="<?php echo $home->sec4_img2 ;?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<?php if($home->sec4_img2!='' && $home->sec4_img2!='no file') {?>
										<img class="img-thumb"
											src="<?php echo base_url().'uploads/images/home/'.$home->sec4_img2;?>"
											style="height:100px !important;width:100px !important;"
											id="view_sec4_img2">
										<?php } else {?>
										<img class="img-thumb" src="" alt="No Image Found" id="view_sec4_img2">
										<?php } ?>
									</div>
								</div>
							</div>

                            <div class="row">
								<div class='col-md-12'>
									<h3 class="text-center">Section 5 </h3>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 5 Title</label>
										<input class="form-control" name="sec5_title" type="text"
											value="<?php echo $home->sec5_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 5 Title -Arabic </label>
										<input class="form-control" name="sec5_title_ar" type="text"
											value="<?php echo $home->sec5_title_ar ?>">
									</div>
								</div>
							</div>
                            <div class="row">
								<div class='col-md-12'>
									<h3 class="text-center">Section 6 </h3>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 6 Title</label>
										<input class="form-control" name="sec6_title" type="text"
											value="<?php echo $home->sec6_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 6 Title -Arabic </label>
										<input class="form-control" name="sec6_title_ar" type="text"
											value="<?php echo $home->sec6_title_ar ?>">
									</div>
								</div>
							</div>

                            <div class="box-title row">
 								<div class='col-md-4'>
 									<h4><b>Latest News</b></h4>
 								</div>
 								<div class='col-md-6'></div>
 								<div class='col-md-2'>
								  <a href="<?php echo base_url(); ?>admin/new_news"><button
									class="btn btn-warning" type="button">Add News</button></a>
 								</div>
 							</div>

                             <div class="table-responsive">
 								<table id="example" class="table table-striped table-bordered" style="width:100%">
 									<thead>
 										<tr>
 											<th>No.</th>
 											<th> Title </th>
 											<th> Title - Arabic</th>
 											<th> Image</th>
 											<th> Action </th>
 										</tr>

 									</thead>
 									<tbody>
 										<?php 

									foreach ($news as $value) {
										?>
 										<tr>
 											<td><?php echo $value['id'] ?></td>
 											<td><?php echo $value['title']  ?></td>
 											<td><?php echo $value['title_ar'] ;  ?></td>
                                             <td><img   class="img-thumb" src="<?php echo base_url()?>uploads/images/blog/<?php echo $value['img'] ?>" style="height:80px !important;width:80px !important;"  id="img1"></td>  
 											<td>
 												<a href="<?php echo base_url()?>admin/edit_news/<?php echo $value['id']?>">&nbsp;&nbsp;<button
 														type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i
 															class="ico fa fa-pencil"></i></button></a>
 											</td>
 										</tr>
 										<?php
                 					 } ?>
 									</tbody>

 								</table>
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

	secsub1_img.onchange = evt => {
		const [file] = secsub1_img.files;
		if (file) {
			view_secsub1_img.src = URL.createObjectURL(file);
			$("#view_secsub1_img").attr('style', "height:100px !important;width:100px !important; ");
		}
	}

	secsub2_img.onchange = evt => {
		const [file] = secsub2_img.files;
		if (file) {
			view_secsub2_img.src = URL.createObjectURL(file);
			$("#view_secsub2_img").attr('style', "height:100px !important;width:100px !important; ");
		}
	}

	secsub3_img.onchange = evt => {
		const [file] = secsub3_img.files;
		if (file) {
			view_secsub3_img.src = URL.createObjectURL(file);
			$("#view_secsub3_img").attr('style', "height:100px !important;width:100px !important; ");
		}
	}

	secsub4_img.onchange = evt => {
		const [file] = secsub4_img.files;
		if (file) {
			view_secsub4_img.src = URL.createObjectURL(file);
			$("#view_secsub4_img").attr('style', "height:100px !important;width:100px !important; ");
		}
	}

	sec3_img.onchange = evt => {
		const [file] = sec3_img.files;
		if (file) {
			view_sec3_img.src = URL.createObjectURL(file);
			$("#view_sec3_img").attr('style', "height:100px !important;width:100px !important; ");
		}
	}

    sec4_img1.onchange = evt => {
		const [file] = sec4_img1.files;
		if (file) {
			view_sec4_img1.src = URL.createObjectURL(file);
			$("#view_sec4_img1").attr('style', "height:100px !important;width:100px !important; ");
		}
	}

    sec4_img2.onchange = evt => {
		const [file] = sec4_img2.files;
		if (file) {
			view_sec4_img2.src = URL.createObjectURL(file);
			$("#view_sec4_img2").attr('style', "height:100px !important;width:100px !important; ");
		}
	}

</script>
