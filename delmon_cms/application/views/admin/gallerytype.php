<?php $this->load->view('admin/header');?>

<body>
	<?php $this->load->view('admin/top_header');?>
	<?php $this->load->view('admin/side_header');?>
	<div id="wrapper">
		<div class="main-content">
			<div class="row small-spacing">
				<div class="col-xs-12">
					<div class="box-content card white">
						<div class="box-title row">
							<div class='col-md-4'>
								<h4>Gallery type </h4>
							</div>
							<div class='col-md-6'></div>
							<div class='col-md-2'>
								<a href="<?php echo base_url(); ?>admin/new_gallertype"><button class="btn btn-warning"> Add
										New</button></a>
							</div>
						</div>
						<div class="box-content">
							<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>No.</th>
											<!-- <th>User Id</th> -->
											<th> Title</th>
                                            <th> Title-Arabic</th>
											<th> Action </th>
										</tr>
									</thead>
									<tbody>
										<?php 
                                        $i = 0 ;
                                        foreach ($data as $value) {
                                        $i++ ;
                                        ?>
										<tr>
											<td><?php echo $i ;?></td>
											<!-- <th>User Id</th> -->
											<td><?php echo $value['type'] ?></td>
                                            <td><?php echo $value['type_ar'] ?></td>
											<td>
												<a
													href="<?php echo base_url()?>admin/edit_gallery_type/<?php echo $value['id']?>">&nbsp;&nbsp;<button
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
							<!-- /.box-content -->
						</div>
						<!-- /.col-lg-6 col-xs-12 -->
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<?php $this->load->view('admin/footer');?>
<script type="text/javascript">
	function deleteentry($id) {
		var xin_table = $('#xin_table').dataTable();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>" + 'admin/delete_gallerytype/',
			data: {
				id: $id,
				table: 'gallery_type'
			},
		}).done(function (response) {
			location.reload();
			//xin_table.api().ajax.reload();
		});
	}

</script>
