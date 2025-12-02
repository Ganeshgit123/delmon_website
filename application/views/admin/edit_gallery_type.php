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
							<h4>Edit Gallery</h4>
						</div>
						<div class='col-md-6'></div>
						<div class='col-md-2'>
                        <a href="<?php echo base_url(); ?>admin/gallery_type"><button
									class="btn btn-warning">List All</button></a>

						</div>
					</div>
					<div class="card-content">
						<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
						<?php $hidden = array('_user' => $session['user_id']);?>
						<?php echo form_open('admin/update_gallery_type', $attributes, $hidden);?>
						<div class="form-body">
							<div class="row">
                            <input type="hidden" name="id" id="old_image" value="<?php echo $data->id ;?>">
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title</label>
										<input class="form-control" name="name" placeholder="Title name" type="text"
											value="<?php echo $data->type ;?>">
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="first_name">Title -  Arabic</label>
										<input class="form-control" name="name_ar" placeholder="Title name" type="text"
											value="<?php echo $data->type_ar ;?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6" id='Uploadcontainer'>
									<label for="first_name">Image</label>
									<input type='file' name='image[]' class='uploadfile' multiple>
								</div>								
							</div>
<br><br><br>
							<div class="row">
							<div class="col-md-12">
								<?php 
								$imgarr = [];
									foreach ($imgdata as $value) {
										array_push($imgarr,$value['image']);
									}
									$image = implode(',', $imgarr); ?>
								<input type="hidden" class="form-control" value="<?php echo $image?>" id="ed_img" multiple="multiple"
									name="edit_img">
								<div>
									<?php 
										$i = 0 ;
										foreach ($imgdata as $value) {
											$i++ ;
										?>
									<?php 
										if($value['image'] != '' && $value['image'] !=null)
										{?>
									<img class="img-thumb" src="<?php echo base_url().'uploads/images/gallery/'.$value['image'];?>"
									style="height:100px !important;width:100px !important;" id="file_<?php echo $i ?>">
									<!-- <a onclick="myFunction('<?php //echo $value['image']?>','<?php //echo $i ?>');  return false ;" href="javascript:void(0)"  id="btn_<?php //echo $i ?>" class="btn btn-success btn-xs">Remove</a> -->
									<button type="button" class="btn btn-danger remove"
									onclick="myFunction('<?php echo $value['image']?>','<?php echo $i ?>','<?php echo $value['id'] ?>');  return false ;"
									href="javascript:void(0)" id="btn_<?php echo $i ?>"><i class="fa fa-trash"></i></button>
									<?php  }              
										}
										?>
								</div>
								</div>
							</div>
						</div>
						<br></br>
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
						window.location.href = "<?php echo base_url();?>admin/gallery_type";
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

<script type="text/javascript">
    function myFunction($r_img,$i,$id)
    {   
		var result = confirm("Are you sure to delete?");
		if(result){
			var r_img = $r_img;
			var all_img = document.getElementById("ed_img").value;  
			var c = "";          
			var values = all_img.split(',');
			for(var i = 0 ; i < values.length ; i++)
			{
			if(values[i] == r_img)
			{
				values.splice(i, 1);
				c = values.join(',');
			}
			}   
			document.getElementById("ed_img").value = c;    
			//$('#file_proj_16046395551.jpg').hide();
			$('#file_'+$i).hide();
			$('#btn_'+$i).hide();

			
				$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + 'admin/deleteImage/',
				data: {
					id: $id,
				},
				}).done(function (response) {
					if(response == 'ok')
					{
						location.reload();
					}
					else{
						alert("Something Went Wrong")
					}
				});
		}
    }
</script>
