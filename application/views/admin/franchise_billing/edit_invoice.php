<?php $this->load->view('admin/admin_shared/admin_header'); ?>
    <!-- END Head-->

    <!-- START: Body-->
    <body id="main-container" class="default">
        
        <!-- END: Main Menu-->
    <?php $this->load->view('admin/admin_shared/admin_sidebar');
   // include('admin_shared/admin_sidebar.php'); ?>
        <!-- END: Main Menu-->
    
        <!-- START: Main Content-->
        <main>
            <div class="container-fluid site-width">
                <!-- START: Listing-->
                <div class="row">                 
                  <div class="col-12  align-self-center">
                      <div class="col-12 col-sm-12 mt-3">
                      <div class="card">
                          <div class="card-header justify-content-between align-items-center">                               
                              <h4 class="card-title">Edit Franchise Invoice</h4>
                          </div>
                          <div class="card-body">
                            <div class="row">                                           
                          <div class="col-12">
                               <form role="form" id="billing-form" name="billing-form" action="<?php echo base_url(); ?>admin/edit-franchise-invoice/<?php echo $id; ?>" method="post">                                          
                                  <div class="col-12">
                                   <div class="table-responsive">
                                  <table class="table">
                                    <tbody>
                                        <tr><td><input type="text" name="customer_name" value="<?php echo $customer->customer_name ?>" class="form-control"/>
                                           <textarea name="address" rows="5" class="form-control"/><?php echo $customer->address; ?></textarea>
                                                       <input type="text" name="city" value="<?php echo $customer->city ?>" class="form-control"/>                                                       

                                                       <input type="hidden" name="customer_id" value="<?php echo $customer->customer_id; ?>" class="form-control"/>
                                                     </td>
                                                     <td>
                                                       <label for="invoice_date" class="col-form-label">Invoice Date</label><br>
                                                       <label for="invoice_date" class="col-form-label">Invoice Number</label><br>
                                                       <label for="invoice_date" class="col-form-label">GST No</label><br>
                                                       <label for="invoice_date" class="col-form-label">CID No</label>
                                                     </td>
                                                     <td>
                                                    <div class="col-sm-6">
                                                        <?php
                                                          $invoiceDate = $customer->invoice_date;
                                                          if(!$invoiceDate)
                                                          {
                                                            $invoiceDate = date('Y-m-d');
                                                          }
                                                        ?>
                                                    <input type="date" class="form-control" name="invoice_date" value="<?php echo $invoiceDate; ?>" />
                                                    <input type="text" class="form-control" name="invoice_number" value="<?php echo $customer->invoice_number; ?>" />
                                                    <input type="text" name="gstno" value="<?php echo $customer->gstno; ?>" class="form-control"/>
                                                    <input type="text" name="cid" value="<?php echo $customer->cid; ?>" class="form-control"/>
                                                    </div>
                                                  </td>

                                        </tr>
                                    </tbody>
                                    </table>
                                  </div>
                                </div>
                                <div class="col-12">
                                   <div class="table-responsive">
                                   <table class="table table-bordered">                                  
                                      <thead>
                                          <tr>  
                                               <th scope="col">NO.</th>
                                              <th scope="col">Date</th>
                                              <th scope="col">AWB NO.</th>
                                              <th scope="col">Network</th>
                                              <th scope="col">CONSIGNEE</th>
                                              <th scope="col">BRANCH</th>
                                              <th scope="col">DEST</th>
                                              <th scope="col">MODE</th>
                                              <th scope="col">NO PCS</th>
                                              <th scope="col">WEIGHT</th> 
                                              <th scope="col">Freight</th>                                           
                                              <th scope="col">TranCh.</th>
                                              <th scope="col">PickCh.</th>
                                              <th scope="col">RemotCh.</th>
                                              <th scope="col">COD</th>
                                              <th scope="col">AWB</th>
                                              <th scope="col">OthCh.</th>
                                              <th scope="col">Total</th>
                                              <th scope="col">Fuel</th>   
                                              <th scope="col">SubTotal</th>   
                                              <th scope="col">Action</th>   
                                             <input type="hidden" name="total_booking" value="<?php echo count($allpoddata); ?>" class="total_booking" />
                                          </tr>
                                           </thead>
                                      <tbody>     
                                      <?php
                                          $amount1 = [];
                                          $fuelSubCharges = 0;
                                          if(!empty($allpoddata)) {
                                          $i = 1;                                     
                                          foreach ($allpoddata as $value) {
                                             $whr = array('transfer_mode_id'=>$value['mode_dispatch']);
                                             $tansfer_mode = $this->basic_operation_m->get_table_row('transfer_mode',$whr);
                                             $whr1 = array('booking_id'=>$value['booking_id']);
                                             $city = $this->basic_operation_m->get_table_row('tbl_domestic_booking',$whr1);
                                             $whr2 = array('id'=>$city->sender_city);
                                             $Sender = $this->basic_operation_m->get_table_row('city',$whr2);
                                             
                                           ?>
                                          <tr id="rowdata_<?php echo $i; ?>">
                                                <td ><?php echo $i; ?></td>
                                                <td ><input type="hidden" value="<?php echo $value['id']; ?>" class="form-control" id="invid_<?php echo $i; ?>" style="width:80px;"/>
                                                   <?php echo date('d-m-Y', strtotime($value['booking_date'])); ?></td>

                                                <td >
                                                    <a target="_blank" href="admin/view-edit-domestic-shipment/<?php echo $value['booking_id'];?>" title="Edit" style="color:blue">
                                                        <?php echo $value['pod_no']; ?></td>
                                                    </a>
                                                <td ><?php echo $value['forworder_name']; ?></td>
                                                <td ><?php echo $value['reciever_name']; ?></td>
                                                <td ><?php echo $Sender->city; ?></td>
                                                <td ><?php echo $value['reciever_city']; ?></td>
                                                <td ><?php echo $tansfer_mode->mode_name; ?></td>
                                                <td ><?php echo $value['no_of_pack']; ?></td>
                                                <td ><?php echo $value['chargable_weight']; ?></td>  
                                                <td ><?php echo $value['frieht']; ?></td>
                                                <td ><?php echo $value['transportation_charges']; ?></td>
                                                <td ><?php echo $value['pickup_charges']; ?></td>
                                                <td ><?php echo floatval($value['delivery_charges']); ?></td>
                                                <td ><?php echo $value['courier_charges']; ?></td>
                                                <td ><?php echo $value['awb_charges']; ?></td>
                                                <td ><?php echo floatval($value['other_charges']); ?></td>
                                                <td ><?php echo floatval($value['amount']); ?>
                                                   <input type="hidden" value="<?php echo floatval($value['amount']); ?>" class="form-control amount" id="amount_<?php echo $i; ?>" data-attr="<?php echo $i; ?>" ></td>
											  
                                                <td style="width:20px;">
                                                    <?php echo $value['fuel_subcharges']; ?>
                                                    <input type="hidden" value="<?php echo $value['fuel_subcharges']; ?>" class="form-control fuel" id="fuel_<?php echo $i; ?>" data-attr="<?php echo $i; ?>" ></td>

                                               <td style="text-align: right;width:20px!important"><?php echo floatval($value['sub_total']); ?>
                                                   <input type="hidden" value="<?php echo floatval($value['sub_total']); ?>" class="form-control sub_total" id="sub_total_<?php echo $i; ?>" data-attr="<?php echo $i; ?>" /></td>
                                                <td>
											   <a title="Delete" href="<?php base_url();?>admin/delete-domestic-invoice-detail/<?php echo $value['booking_id'];?>" class="" onclick="return confirm('Are you sure!\nyou want to remove this LR?');" ><i class="icon-trash" style="color:red;"></i></a>
											   </td>
                                            </tr>
                                         <?php 
                                                   $amount1[] =+ floatval($value['sub_total']);
                                                    $fuelSubCharges = $fuelSubCharges + floatval($value['fuel_subcharges']);
                                            $i++;
                                        }
                                    }
                                   $subtotal = array_sum($amount1);
                                   $igst_tot = '0.00';
                                   $cgst_tot = '0.00';
                                   $sgst_tot = '0.00';
                                    if($customer->cgst_amount=='0.00' &&$customer->sgst_amount =='0.00')
                                    {
                                      
                                       $igst_tot = ($subtotal * $gstCharges->igst/100);
                                       $grand_total = $subtotal + $igst_tot;
                                    }
                                    else
                                    {
                                      $cgst_tot = ($subtotal * $gstCharges->cgst/100);
                                      $sgst_tot = ($subtotal * $gstCharges->sgst/100);
                                      $grand_total = $subtotal + $cgst_tot + $sgst_tot;
                                    }
                                    
                                    ?>
									  <tr><?php echo str_repeat("<td></td>", 17);  ?>  
                                        <td colspan="2">Sub Total</td>                                        
                                        <td  colspan="2" style="text-align: right"><input type="text" readonly name="sub_total" value="<?php echo $subtotal; ?>" class="form-control sub_total"/></td>
                                    </tr>
									 
                                    <input type="hidden" value="<?php echo $fuelSubCharges; ?>" class="form-control fuel" name="fuel_subcharges" >
                                   <tr>
                                        <?php echo str_repeat("<td></td>", 17);  ?>  
                                        <td colspan="2">CGST% <input type="text" name="cgst_per" readonly value="<?php echo $gstCharges->cgst; ?>" class="form-control" /></td>
                                        <td style="text-align: right" colspan="2">
                                            <input type="text" name="cgst" readonly value="<?php echo $cgst_tot; ?>" class="form-control cgst"  />
                                        </td>
                                    </tr>
                                    <tr>
                                       <?php echo str_repeat("<td></td>", 17);  ?>  
                                        <td colspan="2">SGST% <input type="text" name="sgst_per" readonly value="<?php echo $gstCharges->sgst; ?>" class="form-control" /></td>
                                        <td style="text-align: right" colspan="2">
                                            <input type="text" name="sgst" readonly value="<?php echo $sgst_tot; ?>" class="form-control sgst" /></td>
                                    </tr>
                                    <tr>
                                        <?php echo str_repeat("<td></td>", 17);  ?>  
                                        <td colspan="2">IGST%   <input type="text" name="igst_per" readonly value="<?php echo $gstCharges->igst; ?>" class="form-control" /></td>
                                        <td colspan="2">
										
                                        <input type="text" name="igst" readonly value="<?php echo $igst_tot; ?>" class="form-control igst" /></td>
                                    </tr>
                                    <tr>
                                       <?php echo str_repeat("<td></td>", 17);  ?>  
                                        <td colspan="2">Total Amount</td>
                                        <td colspan="2">                                       
                                        <input type="text"  name="amount" readonly value="<?php echo round($grand_total); ?>" class="form-control roundtotal"/></td>
                                    </tr>
                                    <tr>
                                        <td colspan="20">
                                          <?php if($customer->final_invoice !='1'){ ?>
                                            <button type="submit" class="btn btn-sm btn-primary">Save Invoice</button>
                                          <?php } ?>
                                            <button type="submit" name="final_invoice" value="1" class="btn btn-sm btn-primary">Save Final Invoice</button>    
                                        </td>
                                    </tr> 
									
                                    </tbody>
                              </table> 
                          </div>
                        </div>
                    </div>
                </form>
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
        <?php $this->load->view('admin/admin_shared/admin_footer');
         //include('admin_shared/admin_footer.php'); ?>
        <!-- START: Footer-->
    </body>
    <!-- END: Body-->