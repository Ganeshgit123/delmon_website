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
							<h4>Edit About</h4>
						</div>
						<div class='col-md-6'></div>
						<div class='col-md-2'>
						</div>
					</div>
					<div class="card-content">
						<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
						<?php $hidden = array('_user' => $session['user_id']);?>
						<?php echo form_open('admin/update_about', $attributes, $hidden);?>
						<div class="form-body">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 1 Content</label>
										<textarea class="form-control" type="text"
											name="sec1_content"><?php echo $about->sec1_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 1 Content - Arabic</label>
										<textarea class="form-control" type="text"
											name="sec1_content_ar"><?php echo $about->sec1_content_ar ?></textarea>
									</div>
								</div>
							</div>

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
											value="<?php echo $about->sec2_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Section 2 Title -Arabic </label>
										<input class="form-control" name="sec2_title_ar" type="text"
											value="<?php echo $about->sec2_title_ar ?>">
									</div>
								</div>
							</div>

							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Department 1 Image</label>
										<input type="file" id="sec2_img" name="sec2_img" class="form-control ">
										<small>Select files only: gif,png,jpg,jpeg</small>
										<input type="hidden" name="old_sec2_img"
											value="<?php echo $about->sec2_img ;?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<?php if($about->sec2_img!='' && $about->sec2_img!='no file') {?>
										<img class="img-thumb"
											src="<?php echo base_url().'uploads/images/'.$about->sec2_img;?>"
											style="height:100px !important;width:100px !important; " id="view_sec2_img">
										<?php } else {?>
										<img class="img-thumb" src="" id="view_sec2_img">
										<?php } ?>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Department 1 Title</label>
										<input class="form-control" name="sec2sub1_title" type="text"
											value="<?php echo $about->sec2sub1_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Department 1 Title -Arabic </label>
										<input class="form-control" name="sec2sub1_title_ar" type="text"
											value="<?php echo $about->sec2sub1_title_ar ?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Department 1 Content</label>
										<textarea class="form-control" type="text"
											name="sec2sub1_content"><?php echo $about->sec2sub1_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Department 1 Content - Arabic</label>
										<textarea class="form-control" type="text"
											name="sec2sub1_content_ar"><?php echo $about->sec2sub1_content_ar ?></textarea>
									</div>
								</div>
							</div>

							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Department 2 Image</label>
										<input type="file" id="sec2sub2_img" name="sec2sub2_img" class="form-control ">
										<small>Select files only: gif,png,jpg,jpeg</small>
										<input type="hidden" name="old_sec2sub2_img"
											value="<?php echo $about->sec2sub2_img ;?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<?php if($about->sec2sub2_img!='' && $about->sec2sub2_img!='no file') {?>
										<img class="img-thumb"
											src="<?php echo base_url().'uploads/images/'.$about->sec2sub2_img;?>"
											style="height:100px !important;width:100px !important; " id="view_sec2sub2_img">
										<?php } else {?>
										<img class="img-thumb" src="" id="view_sec2sub2_img">
										<?php } ?>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Department 2 Title</label>
										<input class="form-control" name="sec2sub2_title" type="text"
											value="<?php echo $about->sec2sub2_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Department 2 Title -Arabic </label>
										<input class="form-control" name="sec2sub2_title_ar" type="text"
											value="<?php echo $about->sec2sub2_title_ar ?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Department 2 Content</label>
										<textarea class="form-control" type="text" id="sec2sub2_content_en"
											name="sec2sub2_content"><?php echo $about->sec2sub2_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Department 2 Content - Arabic</label>
										<textarea class="form-control" type="text" id="sec2sub2_content_ar"
											name="sec2sub2_content_ar"><?php echo $about->sec2sub2_content_ar ?></textarea>
									</div>
								</div>
							</div>

							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Department 3 Image</label>
										<input type="file" id="sec2sub3_img" name="sec2sub3_img" class="form-control ">
										<small>Select files only: gif,png,jpg,jpeg</small>
										<input type="hidden" name="old_sec2sub3_img"
											value="<?php echo $about->sec2sub3_img ;?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<?php if($about->sec2sub3_img!='' && $about->sec2sub3_img!='no file') {?>
										<img class="img-thumb"
											src="<?php echo base_url().'uploads/images/'.$about->sec2sub3_img;?>"
											style="height:100px !important;width:100px !important; " id="view_sec2sub3_img">
										<?php } else {?>
										<img class="img-thumb" src="" id="view_sec2sub3_img">
										<?php } ?>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Department 3 Title</label>
										<input class="form-control" name="sec2sub3_title" type="text"
											value="<?php echo $about->sec2sub3_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Department 3 Title -Arabic </label>
										<input class="form-control" name="sec2sub3_title_ar" type="text"
											value="<?php echo $about->sec2sub3_title_ar ?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Department 3 Content</label>
										<textarea class="form-control" type="text"
											name="sec2sub3_content"><?php echo $about->sec2sub3_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Department 3 Content - Arabic</label>
										<textarea class="form-control" type="text"
											name="sec2sub3_content_ar"><?php echo $about->sec2sub3_content_ar ?></textarea>
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
										<label for="first_name">Title </label>
										<input class="form-control" name="sec3_title" type="text"
											value="<?php echo $about->sec3_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title -Arabic </label>
										<input class="form-control" name="sec3_title_ar" type="text"
											value="<?php echo $about->sec3_title_ar ?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Content</label>
										<textarea class="form-control" type="text"
											name="sec3_content"><?php echo $about->sec3_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Content - Arabic</label>
										<textarea class="form-control" type="text"
											name="sec3_content_ar"><?php echo $about->sec3_content_ar ?></textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title </label>
										<input class="form-control" name="sec4_title" type="text"
											value="<?php echo $about->sec4_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title -Arabic </label>
										<input class="form-control" name="sec4_title_ar" type="text"
											value="<?php echo $about->sec4_title_ar ?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Content</label>
										<textarea class="form-control" type="text"
											name="sec4_content"><?php echo $about->sec4_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Content - Arabic</label>
										<textarea class="form-control" type="text"
											name="sec4_content_ar"><?php echo $about->sec4_content_ar ?></textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class='col-md-12'>
									<h3 class="text-center">Section 4 </h3>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title </label>
										<input class="form-control" name="sec5_title" type="text"
											value="<?php echo $about->sec5_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title -Arabic </label>
										<input class="form-control" name="sec5_title_ar" type="text"
											value="<?php echo $about->sec5_title_ar ?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Content</label>
										<textarea class="form-control" type="text"
											name="sec5_content"><?php echo $about->sec5_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Content - Arabic</label>
										<textarea class="form-control" type="text"
											name="sec5_content_ar"><?php echo $about->sec5_content_ar ?></textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Values Image</label>
										<input type="file" id="sec5_img" name="sec5_img" class="form-control ">
										<small>Select files only: gif,png,jpg,jpeg</small>
										<input type="hidden" name="old_sec5_img"
											value="<?php echo $about->sec5_img ;?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<?php if($about->sec5_img!='' && $about->sec5_img!='no file') {?>
										<img class="img-thumb"
											src="<?php echo base_url().'uploads/images/'.$about->sec5_img;?>"
											style="height:100px !important;width:100px !important; " id="view_sec5_img">
										<?php } else {?>
										<img class="img-thumb" src="" id="view_sec5_img">
										<?php } ?>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Title 1</label>
										<input class="form-control" name="sec5sub1_title" type="text"
											value="<?php echo $about->sec5sub1_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Title 1 -Arabic </label>
										<input class="form-control" name="sec5sub1_title_ar" type="text"
											value="<?php echo $about->sec5sub1_title_ar ?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Content 1</label>
										<textarea class="form-control" type="text" id="sec5sub1_content_en"
											name="sec5sub1_content"><?php echo $about->sec5sub1_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Content 1- Arabic</label>
										<textarea class="form-control" type="text" id="sec5sub1_content"
											name="sec5sub1_content_ar"><?php echo $about->sec5sub1_content_ar ?></textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Goals Image</label>
										<input type="file" id="sec5sub2_img" name="sec5sub2_img" class="form-control ">
										<small>Select files only: gif,png,jpg,jpeg</small>
										<input type="hidden" name="old_sec5sub2_img"
											value="<?php echo $about->sec5sub2_img ;?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<?php if($about->sec5sub2_img!='' && $about->sec5sub2_img!='no file') {?>
										<img class="img-thumb"
											src="<?php echo base_url().'uploads/images/'.$about->sec5sub2_img;?>"
											style="height:100px !important;width:100px !important; " id="view_sec5sub2_img">
										<?php } else {?>
										<img class="img-thumb" src="" id="view_sec5sub2_img">
										<?php } ?>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Title 2</label>
										<input class="form-control" name="sec5sub2_title" type="text"
											value="<?php echo $about->sec5sub2_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Title 2 -Arabic </label>
										<input class="form-control" name="sec5sub2_title_ar" type="text"
											value="<?php echo $about->sec5sub2_title_ar ?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name"> Sub Content 2</label>
										<textarea class="form-control" type="text" id="sec5sub2_content_en"
											name="sec5sub2_content"><?php echo $about->sec5sub2_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Content 2 - Arabic</label>
										<textarea class="form-control" type="text" id="sec5sub2_content_ar"
											name="sec5sub2_content_ar"><?php echo $about->sec5sub2_content_ar ?></textarea>
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
										<label for="first_name">Title </label>
										<input class="form-control" name="sec6_title" type="text"
											value="<?php echo $about->sec6_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title -Arabic </label>
										<input class="form-control" name="sec6_title_ar" type="text"
											value="<?php echo $about->sec6_title_ar ?>">
									</div>
								</div>
							</div>

							<div class="box-title row">
								<div class='col-md-4'>
									<h4> </h4>
								</div>
								<div class='col-md-6'></div>
								<div class='col-md-2'>
									<a href="<?php echo base_url(); ?>admin/new_purposer"><button
											class="btn btn-warning" type="button"> Add New</button></a>

								</div>
							</div>

							<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>No.</th>
											<th>Brief Content </th>
											<th> Content - Arabic</th>
											<th style = "width: 99px;"> Action </th>
										</tr>

									</thead>
									<tbody>
										<?php 

									foreach ($purpose as $value) {
										?>
										<tr>
											<td><?php echo $value['id'] ?></td>
											<td><?php echo $value['min_content']  ?></td>
											<td><?php echo $value['min_content_ar'] ;  ?></td>
											<td>
												<a href="<?php echo base_url()?>admin/edit_purpose/<?php echo $value['id']?>">&nbsp;&nbsp;<button
														type="button"
														class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i
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

                            <div class="row">
								<div class='col-md-12'>
									<h3 class="text-center">Section 6 </h3>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title </label>
										<input class="form-control" name="sec7_title" type="text"
											value="<?php echo $about->sec7_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title -Arabic </label>
										<input class="form-control" name="sec7_title_ar" type="text"
											value="<?php echo $about->sec7_title_ar ?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Content 1</label>
										<textarea class="form-control" type="text" id="sec7_content1_en"
											name="sec7_content1"><?php echo $about->sec7_content1 ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Content 1 - Arabic</label>
										<textarea class="form-control" type="text" id="sec7_content1_ar"
											name="sec7_content1_ar"><?php echo $about->sec7_content1_ar ?></textarea>
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Link Title </label>
										<textarea class="form-control" type="text" 
											name="sec7_link_con"><?php echo $about->sec7_link_con ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Link Title Arabic</label>
										<textarea class="form-control" type="text" 
											name="sec7_link_con_ar"><?php echo $about->sec7_link_con_ar ?></textarea>
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Upload Pdf</label>
										<input type="file" id="sec7_link" name="sec7_link" class="form-control ">
										<small>Select files only: pdf onlyg</small>
										<input type="hidden" name="old_sec7_link"
											value="<?php echo $about->sec7_link;?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
									<label for="first_name">View Existing Pdf</label>
										<?php if($about->sec7_link !='' && $about->sec7_link !='no file') {?>
										<a href="<?php echo base_url().'uploads/images/about/'.$about->sec7_link;?>" target="_blank"><img
												class="img-thumb" 
												src="<?php echo base_url().'assets/images/pdf-icon-4.png'?>"
												style="height:90px !important;width:90px !important;  " id="img1"></a>
										<?php } else {?>
										<img class="img-thumb" src="" id="img1">
										<?php } ?>
									</div>
								</div>								
							</div>

                            <div class="row">
								<div class='col-md-12'>
									<h3 class="text-center">Section 7 </h3>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title </label>
										<input class="form-control" name="sec8_title" type="text"
											value="<?php echo $about->sec8_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title -Arabic </label>
										<input class="form-control" name="sec8_title_ar" type="text"
											value="<?php echo $about->sec8_title_ar ?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Content </label>
										<textarea class="form-control" type="text" id="sec8_content_en"
											name="sec8_content"><?php echo $about->sec8_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Content  - Arabic</label>
										<textarea class="form-control" type="text" id="sec8_content_ar"
											name="sec8_content_ar"><?php echo $about->sec8_content_ar ?></textarea>
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Title 1</label>
										<input class="form-control" name="sec8sub1_title" type="text"
											value="<?php echo $about->sec8sub1_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Title 1 -Arabic </label>
										<input class="form-control" name="sec8sub1_title_ar" type="text"
											value="<?php echo $about->sec8sub1_title_ar ?>">
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Content </label>
										<textarea class="form-control" type="text" id="sec8sub1_content_en"
											name="sec8sub1_content"><?php echo $about->sec8sub1_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Content - Arabic</label>
										<textarea class="form-control" type="text" id="sec8sub1_content_ar"
											name="sec8sub1_content_ar"><?php echo $about->sec8sub1_content_ar ?></textarea>
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Title 2</label>
										<input class="form-control" name="sec8sub2_title" type="text"
											value="<?php echo $about->sec8sub2_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Title 2 -Arabic </label>
										<input class="form-control" name="sec8sub2_title_ar" type="text"
											value="<?php echo $about->sec8sub2_title_ar ?>">
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Title 3</label>
										<input class="form-control" name="sec8sub3_title" type="text"
											value="<?php echo $about->sec8sub3_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Title 3 -Arabic </label>
										<input class="form-control" name="sec8sub3_title_ar" type="text"
											value="<?php echo $about->sec8sub3_title_ar ?>">
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Title 4</label>
										<input class="form-control" name="sec8sub4_title" type="text"
											value="<?php echo $about->sec8sub4_title ?>">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Title 4 -Arabic </label>
										<input class="form-control" name="sec8sub4_title_ar" type="text"
											value="<?php echo $about->sec8sub4_title_ar ?>">
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Content 4 </label>
										<textarea class="form-control" type="text" id="sec8sub4_content_en"
											name="sec8sub4_content"><?php echo $about->sec8sub4_content ?></textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Sub Content 4 - Arabic</label>
										<textarea class="form-control" type="text" id="sec8sub4_content_ar"
											name="sec8sub4_content_ar"><?php echo $about->sec8sub4_content_ar ?></textarea>
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

	sec2_img.onchange = evt => {
		const [file] = sec2_img.files
		if (file) {
			view_sec2_img.src = URL.createObjectURL(file);
			$("#view_sec2_img").attr('style', "height:100px !important;width:100px !important; ");
		}
	}

	sec2sub2_img.onchange = evt => {
		const [file] = sec2sub2_img.files
		if (file) {
			view_sec2sub2_img.src = URL.createObjectURL(file);
			$("#view_sec2sub2_img").attr('style', "height:100px !important;width:100px !important; ");
		}
	}

	sec2sub3_img.onchange = evt => {
		const [file] = sec2sub3_img.files
		if (file) {
			view_sec2sub3_img.src = URL.createObjectURL(file);
			$("#view_sec2sub3_img").attr('style', "height:100px !important;width:100px !important; ");
		}
	}

    sec5_img.onchange = evt => {
		const [file] = sec5_img.files
		if (file) {
			view_sec5_img.src = URL.createObjectURL(file);
			$("#view_sec5_img").attr('style', "height:100px !important;width:100px !important; ");
		}
	}

	sec5sub2_img.onchange = evt => {
		const [file] = sec5sub2_img.files
		if (file) {
			view_sec5sub2_img.src = URL.createObjectURL(file);
			$("#view_sec5sub2_img").attr('style', "height:100px !important;width:100px !important; ");
		}
	}

    function deleteentry($id) {
 		var xin_table = $('#xin_table').dataTable();
 		$.ajax({
 			type: "POST",
 			url: "<?php echo base_url(); ?>" + 'admin/delete_entry/',
 			data: {
 				id: $id,
 				table: 'purpose'
 			},
 		}).done(function (response) {
 			location.reload();
 			//xin_table.api().ajax.reload();
 		});
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
		initMCEexact("sec2sub2_content_ar");
		initMCEexact("sec2sub2_content_en");
		initMCEexact("sec5sub2_content_en");
		initMCEexact("sec5sub2_content_ar");
		initMCEexact("sec5sub1_content_en");
		initMCEexact("sec5sub1_content_ar");
        initMCEexact("sec7_content1_en");
		initMCEexact("sec7_content1_ar");
        initMCEexact("sec8_content_en");
		initMCEexact("sec8_content_ar");
        initMCEexact("sec8sub1_content_en");
		initMCEexact("sec8sub1_content_ar");
        initMCEexact("sec8sub4_content_en");
		initMCEexact("sec8sub4_content_ar");
        

		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	});

</script>
