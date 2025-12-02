<?php $this->load->view('admin/header');?>

<body>
	<?php $this->load->view('admin/top_header');?>
	<?php $this->load->view('admin/side_header');?>

	<!--  TinyMCE   -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugin/tinymce/skins/lightgray/skin.min.css">
	<!--    Must include this script FIRST  -->
	<script src="<?php echo base_url(); ?>assets/plugin/tinymce/tinymce.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />

	<?php $session = $this->session->userdata('userdet');?>



	<div id="wrapper">
		<div class="main-content">
			<div class="row small-spacing">

				<div class="box-content card white">
					<div class="box-title row">
						<div class='col-md-4'>
							<h4> Carrer</h4>
						</div>
						<div class='col-md-6'></div>
						<div class='col-md-2'>

						</div>
					</div>





					<div class="card-content">



						<?php $attributes = array('name' => 'edit_driver', 'id' => 'xin-form', 'autocomplete' => 'off');?>
						<?php $hidden = array('_user' => $session['user_id']);?>
						<?php echo form_open('admin/update_career', $attributes, $hidden);?>
						<div class="form-body">

							<div class="row">
                            <?php 
                            $array = (array) $data;
                            unset($array['id']);
                            unset($array['created_at']);
                            $i=0;
                            foreach($array as $key => $value) { 
                                $i++;
                                ?>
								<div class="col-md-6">
									<div class="form-group">
										<label for="first_name"> <?php echo $key ?></label>
										<input class="form-control" type="text" name="<?php echo $key ?>"
											value="<?php echo $value?>">
									</div>
								</div>

                            <?php } ?>															
							</div>

							<div class="form-actions">
								<?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => 'btn btn-primary btn-block', 'content' => '<i class="fa fa fa-check-square-o"></i>'.$this->Admin_model->translate("Save"))); ?>
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
	image1.onchange = evt => {
		const [file] = image1.files
		if (file) {
			img1.src = URL.createObjectURL(file);
			$("#img1").attr('style', "height:100px !important;width:100px !important; ");


		}
	}
</script>

<script type="text/javascript">
	/* Add data */ /*Form Submit*/



	$(document).ready(function () {


		tinyMCE.triggerSave();

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

<script>
	function deleteentry($id) {

		var xin_table = $('#xin_table').dataTable();

		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + 'admin/delete_entry/',
			data: {
				id: $id,
				table: 'contact_location'
			},
		}).done(function (response) {

			location.reload();
			//xin_table.api().ajax.reload();

		});

	}

</script>
