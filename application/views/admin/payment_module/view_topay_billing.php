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
                              <h4 class="card-title">View Franchise Topay Invoice Billing</h4>
                            <!--   <span style="float: right;"><a href="admin/view-add-international-shipment" class="fa fa-plus btn btn-primary">Add International Shipment</a></span> -->
                          </div>
						  <div class="card-header justify-content-between align-items-center">
								<span>
									<form role="form" action="<?= base_url('admin/view-topay-billing');?>" method="get" enctype="multipart/form-data">
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
												<a href="<?= base_url('admin/view-topay-billing');?>" class="btn btn-info btn-sm mt-2">Reset</a>
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
											    <th  scope="col">Invoice No.</th>
											    <th  scope="col">Invoice Name.</th>
												<th  scope="col">Customer Name</th>
												<th  scope="col">Customer conatct no</th>
												<th  scope="col">Customer GST No</th>
											    <th  scope="col">LR No</th>
											    <th  scope="col">Booking Date</th>
											    <th  scope="col">Delivery Date</th>
											    <th  scope="col">Delivey Franchise Name</th>
											    <th  scope="col">Delivery Franchise Contact No</th>
											    <th  scope="col">Sub Total</th>
											    <th  scope="col">CGST</th>
												<th  scope="col">SGST</th>
												<th scope="col">IGST</th>											
												<th scope="col">Total</th>											
												<th scope="col">Payment Date</th>											
												<th scope="col">Pay By</th>											
												<th scope="col">Recipt No</th>											
												<th scope="col">Approved By</th>											
												<th scope="col">Action</th>											
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
												 <td style="width: 15%;"><?php echo $value['invoice_no1'];?></td>
												 <td style="width: 11%;"><?php echo date('d-m-Y',strtotime($value['invoice_date']));?></td>
												 <td>
													<?php
													if($value['bnf_customer_id']!=0){
														echo $this->basic_operation_m->get_table_row("tbl_customers",['customer_id'=>$value['bnf_customer_id']])->customer_name;
													}else{
													    echo $this->basic_operation_m->get_table_row("tbl_customers",['customer_id'=>$value['customer_id']])->customer_name;
													}?>
													
												</td>
												<td>
													<?php
													if($value['bnf_customer_id']!=0){
														echo $this->basic_operation_m->get_table_row("tbl_customers",['customer_id'=>$value['bnf_customer_id']])->contact_person;
													}else{
													    echo $this->basic_operation_m->get_table_row("tbl_customers",['customer_id'=>$value['customer_id']])->contact_person;
													}?>													
												</td>
												<td>
													<?php
													if($value['bnf_customer_id']!=0){
														echo $this->basic_operation_m->get_table_row("tbl_customers",['customer_id'=>$value['bnf_customer_id']])->gstno;
													}else{
													    echo $this->basic_operation_m->get_table_row("tbl_customers",['customer_id'=>$value['customer_id']])->gstno;
													}?>													
												</td>
												 <td>
														<?php echo $value['pod_no'];?>
												</td>
												 <td style="width: 11%;"><?php echo date('d-m-Y',strtotime($value['booking_date']));?></td>
												 <td style="width: 11%;"><?php echo date('d-m-Y',strtotime($value['invoice_date']));?></td>
												 <td>
													<?php
													if($value['franchise_id']!=0){
														echo $this->basic_operation_m->get_table_row("tbl_customers",['customer_id'=>$value['franchise_id']])->customer_name;
													}?>													
												 </td>
												 <td>
													<?php
													if($value['franchise_id']!=0){
														echo $this->basic_operation_m->get_table_row("tbl_customers",['customer_id'=>$value['franchise_id']])->contact_person;
													}?>													
												 </td>


												<td style="width: 15%;"><?php echo $value['sub_total'];?></td>
												<td style="width: 15%;"><?php echo $value['cgst_amount'];?></td>
												<td style="width: 15%;"><?php echo $value['sgst_amount'];?></td>
												<td style="width: 15%;"><?php echo $value['igst_amount'];?></td>
												<td style="width: 15%;"><?php echo $value['grand_total'];?></td>
												<td style="width: 15%;"><?php if($value['billing_status']==1){ echo date('d-m-Y',strtotime($value['payment_date']));}?></td>
												<td><?php if($value['billing_status']==1 && $value['pay_by']!=0){ echo $this->db->query("SELECT * FROM tbl_users WHERE user_id='".$value['approve_by']."'")->row('username'); }?></td>																											
												<td><?php if($value['billing_status']==1){ echo $value['ResciptNO']; }?></td>														
												<td><?php if($value['billing_status']==1 && $value['approve_by']!=0){ echo $this->db->query("SELECT * FROM tbl_users WHERE user_id='".$value['approve_by']."'")->row('username'); }?></td>																		
												<td><?php if($value['billing_status']==0){ $lr = $value['pod_no']; ?> <button type="button" class="btn btn-primary btn-sm" onclick="GenareteInvoice('<?php echo $lr;?>')" >Pay Now</button> <?php } ?></td>											
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

		<!-- Modal -->
		<div class="modal fade bd-example-modal-lg" id="pay_amount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Payment</h5>
				<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button> -->
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Admin_domestic_shipment_manager/TopayInvoicepaid');?>" method="post">
                     <div class="row">
                        <div class="col-lg-6">
							<div class="row">
								<div class="col-lg-12">
								    <label for="">Invoice Amount</label>
									<input type="text" class="form-control" id="amount" name="amount" >
									<input type="hidden" class="form-control" id="ResciptNO" name="ResciptNO">
									<input type="hidden" class="form-control" id="pod_no" name="pod_no">
								</div>
								<div class="col-lg-12">
								    <label for="">Payment Date</label>
									<input type="date" class="form-control" name="payment_date" value="<?= date('Y-m-d'); ?>">
								</div>
								<div class="col-lg-12">
								    <label for="">Payment Mode</label>
								    <select class="form-control" name="pay_mode" required>
										<option value="">-- Select Mode --</option>
										<?php $payment= $this->db->query("SELECT * FROM payment_method")->result();
										 foreach($payment as $key => $val){
										?>
										<option value="<?=$val->method;?>"><?=$val->method;?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
                        <div class="col-lg-6">
						  <div class="col-lg-12">
								<label for="">Note</label>
								<textarea class="form-control" name="description" ></textarea>
							</div>
						</div>
					 </div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary btn-sm">Save changes</button>
				</form>
			</div>
			</div>
		</div>
		</div>

        <!-- END: Content-->
        <!-- START: Footer-->
        
        <?php  include(dirname(__FILE__).'/../admin_shared/admin_footer.php'); ?>
        <!-- START: Footer-->
    </body>
    <!-- END: Body-->
</html>
<script>
	
</script>
		