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
 								<h4>Career Requests </h4>
 							</div>
 							<div class='col-md-6'></div>
 							<div class='col-md-2'>

 							</div>
 						</div>

 						<div class="box-content">
 							<div class="table-responsive">
 								<table id="example" class="table table-striped table-bordered" style="width:100%">
 									<thead>
 										<tr>
 											<th>Sl.No</th>
 											<th>Date</th>
 											<th>Name</th>
 											<th>DoB</th>
 											<th>Nationality</th>
 											<th>View More</th>
 										</tr>
 									</thead>
 									<tbody>
 										<?php  
                      $i= 1 ;
                      foreach ($data as $value) { ?>
 										<tr>
 											<td><?php echo $i ?></td>
 											<td><?php echo $value['created_at']?></td>
 											<td><?php echo $value['name']?></td>
 											<td><?php echo $value['dob']?></td>
 											<td><?php echo $value['nationality']?></td>
 											<td><a href="<?php echo base_url()?>admin/view_career/<?php echo $value['id']?>">&nbsp;&nbsp;<button
														type="button"
														class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i
															class="ico fa fa-eye"></i></button></a>
											<a href="javascript:void(0)">&nbsp;&nbsp;<button type="button"
 															class="btn btn-danger btn-circle btn-xs waves-effect waves-light delete"
 															onclick="deleteentry(<?php echo $value['id'] ?>);  return false ;"><i
 																class="ico fa fa-trash"></i></button></a>
															</td>
 												
										 </tr>
 										<?php
                       $i++ ;  } ?>
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
  <script>
	 	function deleteentry($id) {
 		var xin_table = $('#xin_table').dataTable();
 		$.ajax({
 			type: "POST",
 			url: "<?php echo base_url(); ?>" + 'admin/delete_entry/',
 			data: {
 				id: $id,
 				table: 'career_requests'
 			},
 		}).done(function (response) {
 			location.reload();
 			//xin_table.api().ajax.reload();
 		});
 	}
 </script>
