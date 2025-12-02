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
								<h4>Financial Report </h4>
							</div>
							<div class='col-md-6'></div>
							<div class='col-md-2'>
								<a href="<?php echo base_url(); ?>admin/new_fn_report"><button class="btn btn-warning"> Add
										New</button></a>
							</div>
						</div>
						<div class="box-content">
							<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>No.</th>
											<th>Year</th>
											<th> Title</th>
                                            <th> Title-Arabic</th>
                                            <th> Report</th>
											<th width="10%"> Action </th>
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
											<th><?php echo  $value['year_id'] ?></th>
											<td><?php echo $value['name'] ?></td>
                                            <td><?php echo $value['name_ar'] ?></td>
                                            <td><?php if(!empty($value['file'])){?><a href="<?php echo base_url().'uploads/images/about/'.$value['file'];?>" target="_blank"><img
												class="img-thumb" 
												src="<?php echo base_url().'assets/images/pdf-icon-4.png'?>"
												style="height:30px !important;width:30px !important;  "></a><?php } ?></td>
											<td>
												<a
													href="<?php echo base_url()?>admin/edit_fn_report/<?php echo $value['id']?>">&nbsp;&nbsp;<button
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
			url: "<?php echo base_url(); ?>" + 'admin/delete_entry/',
			data: {
				id: $id,
				table: 'financial_report'
			},
		}).done(function (response) {
			location.reload();
			//xin_table.api().ajax.reload();
		});
	}

</script>
