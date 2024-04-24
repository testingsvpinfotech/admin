<?php include(dirname(__FILE__).'/../admin_shared/admin_header.php'); ?>
    <!-- END Head-->
<style>
  .buttons-copy{display: none;}
  .buttons-csv{display: none;}
  /*.buttons-excel{display: none;}*/
  .buttons-pdf{display: none;}
  .buttons-print{display: none;}
  /*#example_filter{display: none;}*/
  .input-group{
    width: 60%!important;
  }
</style>
    <!-- START: Body-->
    <body id="main-container" class="default">

        
        <!-- END: Main Menu-->
   
    <?php include(dirname(__FILE__).'/../admin_shared/admin_sidebar.php'); ?>
        <!-- END: Main Menu-->
    
        <!-- START: Main Content-->
        <main>
            <div class="container-fluid site-width">
                <!-- START: Listing-->
                <div class="row">                 
                  <div class="col-12  align-self-center">
                      <div class="col-12 col-sm-12">
                      <div class="card">
                          <div class="card-header justify-content-between align-items-center">                              
                              <h4 class="card-title">View Domestic Topay Shipment</h4>
                            <!--   <span style="float: right;"><a href="admin/view-add-international-shipment" class="fa fa-plus btn btn-primary">Add International Shipment</a></span> -->
                          </div>
						  <div class="card-header justify-content-between align-items-center">
								<span>
									<form role="form" action="<?= base_url('admin/view-domestic-topay-shipment');?>" method="get" enctype="multipart/form-data">
										<div class="form-row">
										<div class="col-md-2">
												<label for="">Franchise Name</label>
												<select class="form-control" name="user_id" id="user_id">
													<option value="">Selecte Customer</option>
													<?php if (!empty($customer)) {
														foreach ($customer as $key => $values) { ?>
															<option value="<?php echo $values['customer_id']; ?>" <?php echo (isset($user_id) && $user_id == $values['customer_id']) ? 'selected' : ''; ?>><?php echo $values['customer_name'].' -- '.$values['cid']; ?></option><?php }
																																																													} ?>
												</select>
											</div>
											<div class="col-md-2">
												<label for="">Filter</label>
												<select class="form-control" name="filter" id="filter">
													<option selected disabled>Select Filter</option>
													<option value="pod_no" <?php echo (isset($filter) && $filter == 'pod_no') ? 'selected' : ''; ?>>Pod No</option>
												</select>
											</div>
											<div class="col-md-2">
												<label for="">Filter Value</label>
												<input type="text" class="form-control" value="<?php echo (isset($filter_value)) ? $filter_value : ''; ?>" name="filter_value" />
											</div>
											<div class="col-sm-1">
												<label for="">From Date</label>
												<input type="date" name="from_date" value="<?php echo (isset($from_date)) ? $from_date : ''; ?>" id="from_date" autocomplete="off" class="form-control">
											</div>

											<div class="col-sm-1">
												<label for="">To Date</label>
												<input type="date" name="to_date" value="<?php echo (isset($to_date)) ? $to_date : ''; ?>" id="to_date" autocomplete="off" class="form-control">
											</div>
											<div class="col-sm-2">
												 <br>
												<input type="submit" class="btn btn-primary btn-sm mt-2" name="submit" value="Search">
												<a href="<?= base_url('admin/view-domestic-topay-shipment');?>" class="btn btn-info btn-sm mt-2">Reset</a>
											</div>
										</div>
									</form>
								</span>
							</div>
                          <div class="card-body">
                              <div class="table-responsive">
                                  <table  class="table table-bordered " data-sorting="true">
                                      <thead>
                                          <tr>
												
											    <th  scope="col">SR No.</th>
											    <th  scope="col">AWB No.</th>
											    <th  scope="col">Customer Name.</th>
												<th  scope="col">Booking Date</th>
												<th  scope="col">Delivery Date</th>
												<th  scope="col">Delivery Franchise</th>
											    <th  scope="col">Amount</th>
											    <th  scope="col">Invoice No</th>
											    <th  scope="col">Invoice Date</th>
											    <th  scope="col">Payment Status</th>
											    <th  scope="col">Payment Date</th>
											    <th  scope="col">Payment Description</th>
												<th  scope="col">Status</th>
												<th scope="col">Approved by</th>											
                                          </tr>
                                      </thead>
                                      <tbody>
                                 <?php 
                                    if (!empty($all_unbill_shippment))
									{
										$i = $serial_no;
										foreach ($all_unbill_shippment as $value) 
										{
                                    ?>
											<tr class="odd gradeX">
												 <td><?= $i;?></td>
												 <td>
														<?php echo $value['pod_no'];?>
												</td>
												<td>
													<?php
													if($value['bnf_customer_id']!=0){
														echo $this->basic_operation_m->get_table_row("tbl_customers",['customer_id'=>$value['bnf_customer_id']])->customer_name;
													}else{
													    echo $this->basic_operation_m->get_table_row("tbl_customers",['customer_id'=>$value['customer_id']])->customer_name;
													}?>
													
												</td>
												 <td style="width: 11%;"><?php echo date('d-m-Y',strtotime($value['booking_date']));?></td>
												 <td style="width: 11%;"><?php echo date('d-m-Y',strtotime($value['invoice_date']));?></td>
												 <td>
													<?php
													if($value['franchise_id']!=0){
														echo $this->basic_operation_m->get_table_row("tbl_customers",['customer_id'=>$value['franchise_id']])->customer_name;
													}?>													
												</td>
												<td style="width: 15%;"><?php echo $value['grand_total'];?></td>
												<td style="width: 15%;"><?php echo $value['invoice_no1'];?></td>
												<td style="width: 11%;"><?php echo date('d-m-Y',strtotime($value['invoice_date']));?></td>
												<td><?php if($value['billing_status']==0){echo 'Pending';}else{echo 'Received';}?></td>
												<td style="width: 15%;"><?php if($value['billing_status']==1){ echo date('d-m-Y',strtotime($value['payment_date']));}?></td>											
												<td style="width: 15%;"><?php if($value['billing_status']==1){ echo $value['description'];}?></td>																	
												<td><?php if($value['billing_status']==1 && $value['approve_by']!=0){ echo $this->db->query("SELECT * FROM tbl_users WHERE user_id='".$value['approve_by']."'")->row('username'); }?></td>										
											 </tr>
									<?php 
										$i++;
										}
									}
									else
									{
										?>
										<tr>
											<td colspan="10">Data Not Found</td>
										</tr>
										<?php
									}
										?>
                                </tbody>
                                  </table> 
                              </div>
							  <div class="row">
									<div class="col-md-6">
										<?php echo $this->pagination->create_links(); ?>
									</div>
								</div>
                          </div>
                        </div> 

                    </div>
                    </div>
                </div>
                <!-- END: Listing-->
            </div>
        </main>
        <!-- END: Content-->
        <!-- START: Footer-->
        
        <?php  include(dirname(__FILE__).'/../admin_shared/admin_footer.php'); ?>
        <!-- START: Footer-->
    </body>
    <!-- END: Body-->
</html>
<script >
			// this function is use for redirecting page on preseleted campaing on schedule page  
			
			function checkAll(ele) {
     var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }
 
    $('#user_id').select2();
    $('#filter').select2();

	$('.multiple_campings').click(function()
	{
		var new_sel_cam		 	= $(this).val();
		var pre_selected_cam 	= $('#selected_campaingss').val();
		if($(this).prop("checked") == true)
		{
			$('#selected_campaingss').val(new_sel_cam+'-'+pre_selected_cam);
		}
		else if($(this).prop("checked") == false)
		{
			pre_selected_cam = pre_selected_cam.replace(new_sel_cam+'-','');
			$('#selected_campaingss').val(pre_selected_cam);
		}
		
	});
	
	// this function is use for redirecting page on preseleted campaing on schedule page  
	$('#select_multiple_camp').click(function()
	{
		var pre_selected_cam 	= $('#selected_campaingss').val();
		
		if(pre_selected_cam !== null)
		{
			var nes = 		pre_selected_cam.slice(0,-1);
			var favorite = [];
            $.each($("input[name='multiple_delete[]']:checked"), function(){            
                favorite.push($(this).val());
            });
			favorite = favorite.join("-");
			
			if(favorite != '')
			{
				window.location = 'generatepod/all_printpod/'+favorite+'-'+nes;
			}
			else
			{
				alert('Pleaese choose at least one Shipment');
			}	
		}
		else
		{
			var favorite = [];
            $.each($("input[name='multiple_delete[]']:checked"), function(){            
                favorite.push($(this).val());
            });
			favorite = favorite.join("-");
			
			if(favorite != '')
			{
				window.location = 'generatepod/all_printpod/'+favorite;
			}
			else
			{
				alert('Pleaese choose at least one Shipment');
			}
		}
		
			
	});
	
  
/* $("#filterpod").validate({
   rules: {
		from_date: "required",
		to_date: "required"
	},
	errorPlacement: function(error, element) {
		error.insertAfter(element);
	},
	messages: {
		 //email: "Please provide email address"       
	},      
	submitHandler: function(form)
	{
		form.submit();
	}     
}); */
</script>
<div class="modal fade in" id="modal-default" style="padding-right: 17px;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Print Bulk Shipment</h4>
              </div>
                <form name="filterpod" id="filterpod" action="generatepod/all_printpod" method="POST">
              <div class="modal-body">
						<div class="col-md-4">
							<label>Customer</label>
							<select class="form-control" name="user_id">
							<?php if(!empty($customer))
							{
								foreach($customer as $key => $values)
								{ ?>
									<option value="<?php echo $values->customer_id; ?>" ><?php echo $values->customer_name; ?></option>
									<?php
								}
							} ?>
							</select>

						</div>
						<div class="col-md-4">
							<label>From Date</label>
							<input type="date" class="form-control" name="from_date" value="<?php echo $_GET['from_date'];?>" />
						</div>
						<div class="col-md-4">
							<label>To Date</label>
							<input type="date" class="form-control" name="to_date" value="<?php echo $_GET['to_date'];?>" />
						</div>
						<div class="col-md-4">
							
						</div>
              </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Print</button>
			  </div>
					</form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		