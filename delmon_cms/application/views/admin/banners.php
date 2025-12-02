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
 								<h4>Banners </h4>
 							</div>
 							<div class='col-md-6'></div>
 							<div class='col-md-2'>
 								<a href="<?php echo base_url(); ?>admin/new_banner"><button class="btn btn-warning"> Add
 										New</button></a>
 							</div>
 						</div>
 						<div class="box-content">
 							<div class="table-responsive">
 								<table id="example" class="table table-striped table-bordered" style="width:100%">
 									<thead>
 										<tr>
 											<th>No.</th>
 											<th>Type</th>
 											<th>Image</th>
 											<th>Title</th>
 											<th>Title - Arabic</th>
 											<th>Status</th>
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
 											<td><?php echo $i ?></td>
 											<td>
 												<?php echo ucwords($this->Admin_model->get_type_name_by_id('menu_controller_relation','menu',$value['type'],'controller')) ?>
 											</td>
 											<td>
 												<img class="img-thumb"
 													src="<?php echo base_url()?>uploads/images/banners/<?php echo $value['image'] ?>"
 													style="height:50px !important;width:50px !important;" id="img1">
 											</td>
 											<td><?php echo $value['banner_title'] ?></td>
 											<td><?php echo $value['banner_title_ar'] ?></td>
 											<td>
 												<?php 
                        if($value['type'] == 'menu1'){
                        if($value['status']=='Y'){ ?>
 												<a onclick="statusupdate(<?php echo $value['id'] ?>,'N');  return false ;"
 													href="javascript:void(0)" class="btn btn-success btn-xs">Active</a>
 												<?php } else if($value['status']=='N'){ ?>
 												<a onclick="statusupdate(<?php echo $value['id'] ?>,'Y');  return false ;"
 													href="javascript:void(0)" class="btn btn-danger btn-xs">Inactive</a>
 												<?php }   } else{ ?>
 												<a href="javascript:void(0)" disabled class="btn btn-success btn-xs">Active</a>
 												<?php }  ?>
 											</td>
 											<td>
 												<a href="<?php echo base_url()?>admin/edit_banner/<?php echo $value['id']?>">&nbsp;&nbsp;<button
 														type="button" class="btn btn-info btn-circle btn-xs waves-effect waves-light"><i
 															class="ico fa fa-pencil"></i></button></a>
 												<?php if($value['type'] == 'menu1'){ ?>
 												
 												<?php } ?>
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
 	function statusupdate($id, $status) {
 		var xin_table = $('#xin_table').dataTable();
 		$.ajax({
 			type: "POST",
 			url: "<?php echo base_url(); ?>" + 'admin/change_status/',
 			data: {
 				id: $id,
 				status: $status,
 				table: 'banner_images'
 			},
 		}).done(function (response) {

 			location.reload();
 			//xin_table.api().ajax.reload();
 		});
 	}


 </script>
