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
								<h4>Career Details </h4>
							</div>
							<div class='col-md-6'></div>
							<div class='col-md-2'>

							</div>
						</div>
						<div class="box-content">
							<div class="box-content">
								<div class="box-title row">
									<div class='col-md-4'>
										<h4> </h4>
									</div>
									<div class='col-md-6'>                                   
                                   <!-- <img src="<?php echo $data->profile_link?>" class="img-fluid" alt="" width="120px" height="120px"> -->
                                    <img src="<?php echo base_url()?>uploads/images/files/<?php echo $data->profile?>" class="img-fluid" alt="" width="120px" height="120px">
								    </div>
									<div class='col-md-2'>
										<a href="<?php echo base_url(); ?>admin/career_request"><button
												class="btn btn-warning"> Career List
											</button></a>
									</div>
								</div>
								<div class="table-responsive">
                                <table class="footable-details table table-striped table-hover toggle-circle">
										<tbody>
											<tr>
												<th> Date </th>
												<td style="display: table-cell;"> <?php  if(!empty($data->created_at )){
                                                echo date("d-m-Y", strtotime($data->created_at)); } ?> </td>
											</tr>
                                            <tr>	
                                                <th> Name </th>
												<td style="display: table-cell;"> <?php echo $data->name  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th>Father Name </th>
												<td style="display: table-cell;"> <?php echo $data->father_name  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th>Grand Father Name </th>
												<td style="display: table-cell;"> <?php echo $data->grandfather_name  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th>Family Name </th>
												<td style="display: table-cell;"> <?php echo $data->family_name  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th> Flat </th>
												<td style="display: table-cell;"> <?php echo $data->flat  ?>
												</td>
											</tr>
                                             <tr>	
                                                <th> Road </th>
												<td style="display: table-cell;"> <?php echo $data->road  ?>
												</td>
											</tr>
                                             <tr>	
                                                <th> Block </th>
												<td style="display: table-cell;"> <?php echo $data->block  ?>
												</td>
											</tr> <tr>	
                                                <th> Area </th>
												<td style="display: table-cell;"> <?php echo $data->area  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th> Nationality </th>
												<td style="display: table-cell;"> <?php echo $data->nationality  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th> CPR No </th>
												<td style="display: table-cell;"> <?php echo $data->cpr_no  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th> Sex </th>
												<td style="display: table-cell;"> <?php echo $data->sex  ?>
												</td>
											</tr>
                                             <tr>	
                                                <th> Marital status </th>
												<td style="display: table-cell;"> <?php echo $data->marital_status  ?>
												</td>
											</tr> <tr>	
                                                <th> Date of Birth</th>
												<td style="display: table-cell;"> <?php echo $data->dob  ?>
												</td>
											</tr>
                                            <tr> <tr>	
                                                <th> Education Qualification </th>
												<td style="display: table-cell;"> <?php echo $data->last_education_qualification  ?>
												</td>
											</tr>	
                                            <tr>	
                                                <th> Speciality </th>
												<td style="display: table-cell;"> <?php echo $data->speciality  ?>
												</td>
											</tr>

                                             <tr>	
                                                <th> Email </th>
												<td style="display: table-cell;"> <?php echo $data->email  ?>
												</td>
											</tr> <tr>	
                                                <th> Telephone No </th>
												<td style="display: table-cell;"> <?php echo $data->telephone_no1  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th> Alternate Telephone No  </th>
												<td style="display: table-cell;"> <?php echo $data->telephone_no2  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th> Alternate Telephone No 2 </th>
												<td style="display: table-cell;"> <?php echo $data->telephone_no3  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th colspan="2"  class="text-center">Relatives Details </th>
												
											</tr>
                                            <tr>	
                                                <th> Relative - Person 1 name </th>
												<td style="display: table-cell;"> <?php echo $data->relative_fp_name  ?>
												</td>
											</tr>
                                             <tr>	
                                                <th> Relative - Person 1 Job </th>
												<td style="display: table-cell;"> <?php echo $data->relative_fp_job  ?>
												</td>
											</tr> <tr>	
                                                <th> Relative - Person 1 relationship  </th>
												<td style="display: table-cell;"> <?php echo $data->relative_fp_relationship  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th>  Relative - Person 1 phone  </th>
												<td style="display: table-cell;"> <?php echo $data->relative_fp_telephone_no  ?>
												</td>
											</tr>

                                            <tr>	
                                                <th> Relative - Person 2 name </th>
												<td style="display: table-cell;"> <?php echo $data->relative_sp_name  ?>
												</td>
											</tr>
                                             <tr>	
                                                <th> Relative - Person 2 Job </th>
												<td style="display: table-cell;"> <?php echo $data->relative_sp_job  ?>
												</td>
											</tr> <tr>	
                                                <th> Relative - Person 2 relationship  </th>
												<td style="display: table-cell;"> <?php echo $data->rlelative_sp_relationship  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th>  Relative - Person 2 phone  </th>
												<td style="display: table-cell;"> <?php echo $data->relative_sp_telephone_no  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th colspan="2"  class="text-center">Questions </th>
												
											</tr>
                                            <tr>	
                                                <th> Do you have relative person in the company </th>
												<td style="display: table-cell;"> <?php echo ($data->do_you_have_relative_person_in_the_company == 1)?"Yes":"No"  ?>
												</td>
											</tr>

                                            <tr>	
                                                <th> Do you have driving licence </th>
												<td style="display: table-cell;"> <?php echo ($data->do_you_have_driving_licence == 1)?"Yes":"No"  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th> Do you suffer from chronic disease </th>
												<td style="display: table-cell;"> <?php echo ($data->do_you_suffer_from_chronic_diseace == 1)?"Yes":"No"  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th> Do you suffer from any disability </th>
												<td style="display: table-cell;"> <?php echo ($data->do_you_suffer_from_any_disability == 1)?"Yes":"No"  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th>Do you work in current time </th>
												<td style="display: table-cell;"> <?php echo ($data->do_you_work_in_current_time == 1)?"Yes":"No"  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th> Do accept to work additional time and shift time </th>
												<td style="display: table-cell;"> <?php echo ($data->do_accept_to_work_additional_time_shift_time == 1)?"Yes":"No"  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th>Job Requirement </th>
												<td style="display: table-cell;"> <?php echo $data->requirement_job  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th> Expected expected_salary </th>
												<td style="display: table-cell;"> <?php echo $data->expected_salary  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th colspan="2"  class="text-center">Company 1 </th>
												
											</tr>
                                            <tr>	
                                                <th> Work Experience </th>
												<td style="display: table-cell;"> <?php echo $data->work_exp_c1_name  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th> Job </th>
												<td style="display: table-cell;"> <?php echo $data->work_exp_c1_job  ?>
												</td>
											</tr>
                                             <tr>	
                                                <th> From </th>
												<td style="display: table-cell;"> <?php echo $data->work_exp_c1_from  ?>
												</td>
											</tr> <tr>	
                                                <th> To </th>
												<td style="display: table-cell;"> <?php echo $data->work_exp_c1_to  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th> Reason of Leaving </th>
												<td style="display: table-cell;"> <?php echo $data->work_exp_c1_reason_of_leaving  ?>
												</td>
											</tr>

                                            <tr>	
                                                <th colspan="2"  class="text-center">Company 2 </th>
												
											</tr>
                                            <tr>	
                                                <th> Work Experience </th>
												<td style="display: table-cell;"> <?php echo $data->work_exp_c2_name  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th> Job </th>
												<td style="display: table-cell;"> <?php echo $data->work_exp_c2_job  ?>
												</td>
											</tr>
                                             <tr>	
                                                <th> From </th>
												<td style="display: table-cell;"> <?php echo $data->work_exp_c2_from  ?>
												</td>
											</tr> <tr>	
                                                <th> To </th>
												<td style="display: table-cell;"> <?php echo $data->work_exp_c2_to  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th> Reason of Leaving </th>
												<td style="display: table-cell;"> <?php echo $data->work_exp_c2_reason_of_leaving  ?>
												</td>
											</tr>

                                            <tr>	
                                                <th colspan="2"  class="text-center">Company 3 </th>
												
											</tr>
                                            <tr>	
                                                <th> Work Experience </th>
												<td style="display: table-cell;"> <?php echo $data->work_exp_c3_name  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th> Job </th>
												<td style="display: table-cell;"> <?php echo $data->work_exp_c3_job  ?>
												</td>
											</tr>
                                             <tr>	
                                                <th> From </th>
												<td style="display: table-cell;"> <?php echo $data->work_exp_c3_from  ?>
												</td>
											</tr> <tr>	
                                                <th> To </th>
												<td style="display: table-cell;"> <?php echo $data->work_exp_c3_to  ?>
												</td>
											</tr>
                                            <tr>	
                                                <th> Reason of Leaving </th>
												<td style="display: table-cell;"> <?php echo $data->work_exp_c3_reason_of_leaving  ?>
												</td>
											</tr>
                                         

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
