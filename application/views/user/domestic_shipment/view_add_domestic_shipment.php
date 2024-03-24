<?php include(dirname(__FILE__) . '/../admin_shared/admin_header.php'); ?>
<!-- END Head-->
<script>
	document.addEventListener('contextmenu', function(e) {
  e.preventDefault();
});
</script>
<style>
	.form-control {
		color: black !important;
		border: 1px solid var(--sidebarcolor) !important;
		height: 27px;
		font-size: 10px;
	}

	.select2-container--default .select2-selection--single {
		background: lavender !important;
	}

	/*.frmSearch {border: 1px solid #A8D4B1;background-color: #C6F7D0;margin: 2px 0px;padding:40px;border-radius:4px;}*/
	/*#city-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;z-index: 7;}*/
	/*#city-list li{padding: 10px; background: #F0F0F0; border-bottom: #BBB9B9 1px solid;}*/
	/*#city-list li:hover{background:#ece3d2;cursor: pointer;}*/
	/*#reciever_city{padding: 10px;border: #A8D4B1 1px solid;border-radius:4px;}*/
	form .error {
		color: #ff0000;
	}

	.compulsory_fields {
		color: #ff0000;
		font-weight: bolder;
	}

	.select2-container *:focus {
		border: 1px solid #3c8dbc !important;
		border-radius: 8px 8px !important;
		background: #ffff8f !important;
	}

	input:focus {
		background-color: #ffff8f !important;
	}

	select:focus {
		background-color: #ffff8f !important;
	}

	textarea:focus {
		background-color: #ffff8f !important;
	}

	.btn:focus {
		color: red;
		background-color: #ffff8f !important;
	}


	input,
	textarea {
		text-transform: uppercase;
	}

	::-webkit-input-placeholder {
		/* WebKit browsers */
		text-transform: none;
	}

	:-moz-placeholder {
		/* Mozilla Firefox 4 to 18 */
		text-transform: none;
	}

	::-moz-placeholder {
		/* Mozilla Firefox 19+ */
		text-transform: none;
	}

	:-ms-input-placeholder {
		/* Internet Explorer 10+ */
		text-transform: none;
	}

	::placeholder {
		/* Recent browsers */
		text-transform: none;
	}
</style>
<!-- START: Body-->

<body id="main-container" class="default">

	<!-- END: Main Menu-->

	<?php include(dirname(__FILE__) . '/../admin_shared/admin_sidebar.php'); ?>
	<!-- END: Main Menu-->

	<!-- START: Main Content-->
	<main>
		<div class="container-fluid site-width">

			<!-- START: Card Data-->
			<!-- <form role="form" name="generatePOD" id="generatePOD" action="admin/add-domestic-shipment" method="post" > -->




			<div class="row">
				<div class="col-md-4 col-sm-12 mt-3">
					<!-- Shipment Info -->
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Shipment Info</h4>
							<span style="float: right;"><a href="user_panel/list_domestic_shipment"
									class="btn btn-primary">View Domestic Shipment</a></span>
						</div>
						<div class="card-content">
							<div class="card-body">
								<?php if ($this->session->flashdata('notify') != '') { ?>
									<div class="alert <?php echo $this->session->flashdata('class'); ?> alert-colored"><?php echo $this->session->flashdata('notify'); ?></div>
									<?php unset($_SESSION['class']);
									unset($_SESSION['notify']);
								} ?>
<!-- name="generatePOD" id="generatePOD" -->
								<form role="form"  action="<?php echo base_url(); ?>user_panel/insert_domestic_shipment"
									method="post">

									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Date<span
												class="compulsory_fields">*</span></label>
										<div class="col-sm-8">



											<?php
											$datec = date('Y-m-d H:i');

											// $tracking_data[0]['tracking_date'] = date('Y-m-d H:i',strtotime($tracking_data[0]['tracking_date']));
											$datec = str_replace(" ", "T", $datec);
											if ($this->session->userdata('booking_date') != '') { ?>

												<input type="datetime-local" name="booking_date"
													value="<?php echo $this->session->userdata('booking_date'); ?>"
													id="booking_date" class="form-control" min="<?= date('Y-m-d', strtotime("-1 days")).'T'.date('H:i'); ?>" max="<?= date('Y-m-d').'T'.date('H:i'); ?>">
											<?php
											} else { ?>
												<input type="datetime-local" name="booking_date"
													value="<?php echo $datec; ?>" id="booking_date" class="form-control" min="<?= date('Y-m-d', strtotime("-1 days")).'T'.date('H:i'); ?>" max="<?= date('Y-m-d').'T'.date('H:i'); ?>">
											<?php } ?>
										</div>
									</div>

									<input type="hidden" name="courier_company" id="courier_company" value='35'>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Airway No<span
												class="compulsory_fields">*</span></label>
										<div class="col-sm-8">
											<input type="text" name="awn" id="awn" readonly class="form-control"
												value="<?php //echo $bid; ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Mode<span
												class="compulsory_fields">*</span></label>
										<div class="col-sm-8">
											<select class="form-control mode_dispatch" name="mode_dispatch"
												id="mode_dispatch">
												<option value="">-Select Mode-</option>
												<?php
												if (!empty($transfer_mode)) {
													foreach ($transfer_mode as $row) {
														?>
														<option value='<?php echo $row->transfer_mode_id; ?>'><?php echo $row->mode_name; ?></option>
													<?php
													}
												}
												?>

											</select>
										</div>
									</div>
									<input type="hidden" name="forwording_no" id="forwording_no">
									<input type="hidden" name="forworder_name" id="forworder_name" value="SELF">

									<input type="hidden" id="delivery_date" name="delivery_date"
										value="<?php echo date('d-m-Y'); ?>" id="eod" class="form-control">

									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Desc.</label>
										<div class="col-sm-8">
											<textarea name="special_instruction"
												class="form-control my-colorpicker1"></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Bill Type<span
												class="compulsory_fields">*</span></label>
										<div class="col-sm-8">
											<select class="form-control" name="dispatch_details" id="dispatch_details">
												<option value="">-Select-</option>
												<option value="Credit">Credit</option>
												<option value="ToPay">ToPay</option>
												<option value="Cash" disabled>Cash</option>
												<option value="COD" disabled>COD</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Product<span
												class="compulsory_fields">*</span></label>
										<div class="col-sm-8">
											<select class="form-control" name="doc_type" id="doc_typee">
												<option value="">-Select-</option>
												<option value="1">Non-Doc</option>
												<option value="0">Doc</option>
											</select>
										</div>
									</div>
									<div id="div_inv_row" style="display: none;">
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">INV No.</label>
											<div class="col-sm-8">
												<input type="text" name="invoice_no" id="invoice_no"
													class="form-control my-colorpicker1">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Inv. Value<span
													class="compulsory_fields">*</span></label>
											<div class="col-sm-8">
												<input type="number" name="invoice_value" id="invoice_value"
													class="form-control my-colorpicker1">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Eway No</label>
											<div class="col-sm-8">
												<input type="text" name="eway_no" minlength="12" maxlength="12"
													size="12" id="eway_no" class="form-control">
											</div>
										</div>
										<div class="form-group row">
												<label class="col-sm-4 col-form-label">Type Of Parcel<span class="compulsory_fields">*</span></label>
												<div class="col-sm-8">
													<select class="form-control" name="type_shipment" id="doc_type">
														<option value="">-Select-</option>
														<option value="Wooden Box">Wooden Box</option>
														<option value="Carton">Carton</option>
														<option value="Drum">Drum</option>
														<option value="Plastic Wrap">Plastic Wrap</option>
														<option value="Gunny Bag">Gunny Bag</option>
													</select>
												</div>  													
											</div> 
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Eway Expiry date</label>
											<div class="col-sm-8">
												<input type="datetime-local" name="eway_expiry_date" id="eway_no" min="<?= date('Y-m-d').'T'.date('H:i'); ?>"
													class="form-control">
											</div>
										</div>
									</div>
									<!-- <div class="form-group row">
											
												<label class="col-sm-2 col-form-label">Bill Type<span class="compulsory_fields">*</span></label>
												<div class="col-sm-4">
													<select class="form-control" name="dispatch_details" id="dispatch_details">
															<option value="">-Select-</option>
															<option value="Credit">Credit</option>
															<option value="Cash">Cash</option>
													</select>											
												</div>													
											</div> -->
							</div>
						</div>
					</div>
					<!-- Shipment Info -->
				</div>
				<div class="col-md-4 col-sm-12 mt-3">
					<!-- Consigner Detail -->
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Consigner Detail</h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Customer</label>
									<div class="col-sm-8" id="credit_div">
										<select class="form-control" name="customer_account_id"
											id="customer_account_id">
											<option value="">Select Customer</option>
											<?php
											if (count($customers)) {
												foreach ($customers as $rows) {
													?>
													<option value="<?php echo $rows['customer_id']; ?>">
														<?php echo $rows['customer_name']; ?>--<?php echo $rows['cid']; ?>
													</option>
													<?php
												}
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" id="credit_div_label">Name<span
											class="compulsory_fields">*</span></label>
									<div class="col-sm-8">
										<input type="text" name="sender_name" id="sender_name"
											class="form-control my-colorpicker1">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Address</label>
									<div class="col-sm-8">
										<textarea name="sender_address" id="sender_address"
											class="form-control"></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Pincode<span
											class="compulsory_fields">*</span></label>
									<div class="col-sm-8">
										<input type="text" name="sender_pincode" id="sender_pincode"
											class="form-control">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">State<span
											class="compulsory_fields">*</span></label>
									<div class="col-sm-8">
										<select class="form-control" id="sender_state" required name="sender_state">
											<option value="">Select State</option>
											<?php
											if (count($states)) {
												foreach ($states as $st) {
													?>
													<option value="<?php echo $st['id']; ?>">
														<?php echo $st['state']; ?>
													</option>
												<?php }
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">City<span
											class="compulsory_fields">*</span></label>
									<div class="col-sm-8">
										<select class="form-control" required id="sender_city" name="sender_city">
											<option value="">Select City</option>
											<?php
											if (count($cities)) {
												foreach ($cities as $rows) {
													?>
													<option value="<?php echo $rows['id']; ?>">
														<?php echo $rows['city']; ?>
													</option>
												<?php }
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">ContactNo.</label>
									<div class="col-sm-8">
										<input type="text" name="sender_contactno" readonly id="sender_contactno"
											class="form-control my-colorpicker1">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">TypeOfDoc<span
											class="compulsory_fields">*</span></label>
									<div class="col-sm-4">
										<select name="type_of_doc" class="form-control">
											<option value="GSTIN">GSTIN</option>
											<option value="GSTIN(Govt.)">GSTIN(Govt.)</option>
											<option value="GSTIN(Diplomats)">GSTIN(Diplomats)</option>
											<option value="PAN">PAN</option>
											<option value="TAN">TAN</option>
											<option value="Passport">Passport</option>
											<option value="Aadhaar">Aadhaar</option>
											<option value="Voter Id">Voter Id</option>
											<option value="IEC">IEC</option>
										</select>
										</select>
									</div>
									<div class="col-sm-4">
										<input type="text" name="sender_gstno" readonly id="sender_gstno"
											class="form-control my-colorpicker1">
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Consigner Detail -->
				</div>
				<div class="col-md-4 col-sm-12 mt-3">
					<!-- Consignee Detail -->
					<div class="card">
						<div class="card-header">
							<h6 class="card-title">Consignee Detail</h6>
						</div>
						<div class="card-content">
							<div class="card-body">
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Name<span
											class="compulsory_fields">*</span></label>
									<div class="col-sm-8">
										<input type="text" name="reciever_name" id="reciever" class="form-control"
											required>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Company<span
											class="compulsory_fields">*</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="contactperson_name"
											id="contactperson_name" required />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Address</label>
									<div class="col-sm-8">
										<textarea name="reciever_address" id="reciever_address" class="form-control"
											autocomplete="off"></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Pincode<span
											class="compulsory_fields">*</span></label>
									<div class="col-sm-8">
										<input type="number" class="form-control" name="reciever_pincode"
											id="reciever_pincode" autocomplete="off">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">state<span
											class="compulsory_fields">*</span>&nbsp;&nbsp;&nbsp;<span class="compulsory_fields" id="isoda"></span><span class="compulsory_fields" id="noservice"></span></label>
									<div class="col-sm-8">
										<select class="form-control" id="reciever_state" name="reciever_state">
											<option value="">Select State</option>
											<?php
											if (count($states)) {
												foreach ($states as $s) { ?>
													<option value="<?php echo $s['id']; ?>">
														<?php echo $s['state']; ?>
													</option>
												<?php }
											} ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">City<span
											class="compulsory_fields">*</span></label>
									<div class="col-sm-8">
										<select class="form-control" id="reciever_city" name="reciever_city">
											<option value="">Select City</option>
											<?php
											if (count($cities)) {
												foreach ($cities as $c) { ?>
													<option value="<?php echo $c['id']; ?>">
														<?php echo $c['city']; ?>
													</option>
												<?php }
											} ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Zone</label>
									<div class="col-sm-8">
										<input type="text" name="receiver_zone" id="receiver_zone" class="form-control">
										<input type="hidden" name="receiver_zone_id" id="receiver_zone_id"
											class="form-control">
										<input type="hidden" id="gst_charges" class="form-control">
										<input type="hidden" id="cft" class="form-control">
										<input type="hidden" name="final_branch_id" id="final_branch_id" class="form-control" required>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">ContactNo.</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="reciever_contact" />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">GST NO.</label>
									<div class="col-sm-8">
										<input type="text" name="receiver_gstno" id="receiver_gstno"
											class="form-control">
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Consignee Detail -->
				</div>
			</div>
			<div class="row">


				<div class="col-md-6 col-sm-12 mt-3">
					<!-- Measurement Units -->
					<div class="card">
									<div class="card-header">                               
										<h4 class="card-title">Measurement Units</h4>                                
									</div>
									<div class="card-content">
										<div class="card-body">
											<div class="row">                                           
												<div class="col-12">   
													<div class="form-group row">
														<label class="col-sm-2 col-form-label">PKT</label>
														<div class="col-sm-4">
															<input type="text" name="no_of_pack" class="form-control my-colorpicker1 no_of_pack" readonly data-attr="1" id="no_of_pack1" required="required" onchange="check_customers_rate()">
														</div>
														<label class="col-sm-2 col-form-label">Actual Weight</label>
														<div class="col-sm-4">
															<input type="text" name="actual_weight" class="form-control my-colorpicker1 actual_weight" readonly data-attr="1" id="actual_weight" required="required">
														</div>
														<label class="col-sm-2 col-form-label">Chargeable Weight</label>
														<div class="col-sm-4">
															<input type="text" name="chargable_weight" class="form-control my-colorpicker1 chargable_weight" readonly data-attr="1" id="chargable_weight" required="required">
														</div>
														<label class="col-sm-2 col-form-label">Is Volumetric</label>
														<div class="col-sm-4">
			
															<input type="checkbox" id="is_volumetric" name="fav_language" required value="">

														</div>
													</div>							
													<div id="volumetric_table"> 
														<table class="weight-table" >
															<thead>
																<tr><input type="hidden" class="form-control" name="length_unit" id="length_unit" class="custom-control-input" value="cm">
																	<th>No.of box</th>
																	<th class="length_th">L (cm)</th>
																	<th class="breath_th">B (cm)</th>
																	<th class="height_th">H (cm)</th>
																	<th class="volumetric_weight_th">Valumetric Weight</th>
																	<th class="volumetric_weight_th">Actual Weight</th>
																	<th class="volumetric_weight_th">Chargeable Weight</th>
																
																</tr>
															<thead>
															<tbody id="volumetric_table_row">
																<tr>
																	<td><input type="number" name="per_box_weight_detail[]" class="form-control per_box_weight valid" data-attr="1" id="per_box_weight1"  aria-invalid="false" required></td>
																	<td class="length_td"><input type="number" name="length_detail[]" step="any"  class="form-control length" data-attr="1" id="length1" required></td>
																	<td class="breath_td"><input required type="number" name="breath_detail[]" step="any"  class="form-control breath" data-attr="1" id="breath1" ></td>
																	<td class="height_td"><input required type="number" name="height_detail[]" step="any"  class="form-control height" data-attr="1" id="height1" ></td>
																	<td class="volumetic_weight_td"><input required type="number" name="valumetric_weight_detail[]" step="any"  readonly class="form-control valumetric_weight" data-attr="1" id="valumetric_weight1"></td>

																	<td class="volumetic_weight_td"><input  required type="number" step="any"  name="valumetric_actual_detail[]" class="form-control valumetric_actual" data-attr="1" id="valumetric_actual1"></td>

																	<td class="volumetic_weight_td"><input required type="number" name="valumetric_chageable_detail[]" step="any"  readonly class="form-control valumetric_chageable" data-attr="1" id="valumetric_chageable1"></td>
																</tr>
															</tbody>
															<tfoot>
															
															</tfoot>
														</table>
														<table>
															<tr>
																
																<th><input type="text" name="per_box_weight" readonly="readonly" class="form-control  per_box_weight" id="per_box_weight" required="required"></th>
																<th class="length_td"><input type="text" name="length" step="any" readonly="readonly" class="form-control length"  id="length" ></th>
																<th class="breath_td"><input type="text" name="breath" readonly="readonly" class="form-control breath" step="any"  id="breath"></th>
																<th  class="height_td"><input type="text" name="height" readonly="readonly" class="form-control height" id="height" step="any"></th>
																<th class="volumetic_weight_td"><input type="text" name="valumetric_weight" step="any" readonly="readonly" class="form-control my-colorpicker1 valumetric_weight" id="valumetric_weight"></th>

																<th class="volumetic_weight_td"><input type="text" name="valumetric_actual" step="any" readonly="readonly" class="form-control my-colorpicker1 valumetric_weight" id="valumetric_actual"></th>

																<th class="volumetic_weight_td"><input type="text" name="valumetric_chageable" step="any" readonly="readonly" class="form-control my-colorpicker1 valumetric_weight" id="valumetric_chageable"></th>
																<!-- <td><input type="text" name="one_cft_kg" readonly="readonly" class="form-control my-colorpicker1 one_cft_kg" id="one_cft_kg"></td> -->
															</tr>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
					<!-- <div class="card">
						<div class="card-header">
							<h4 class="card-title">Measurement Units</h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">PKT</label>
											<div class="col-sm-4">
												<input type="text" name="no_of_pack" readonly
													class="form-control my-colorpicker1 no_of_pack" data-attr="1"
													id="no_of_pack1" required="required">
											</div>
											<label class="col-sm-2 col-form-label">Actual Weight</label>
											<div class="col-sm-4">
												<input type="text" name="actual_weight" readonly
													class="form-control my-colorpicker1 actual_weight" data-attr="1"
													id="actual_weight" required="required">
											</div>
											<label class="col-sm-2 col-form-label">Chargeable Weight</label>
											<div class="col-sm-4">
												<input type="text" name="chargable_weight" readonly
													class="form-control my-colorpicker1 chargable_weight" data-attr="1"
													id="chargable_weight" required="required">
											</div>
											<label class="col-sm-2 col-form-label">Is Volumetric</label>
											<div class="col-sm-4">

												<input type="checkbox" required id="is_volumetric" name="fav_language" value="">

											</div>
										</div>
										<div id="volumetric_table">
											<table class="weight-table">
												<thead>
													<tr><input type="hidden" class="form-control" name="length_unit"
															id="length_unit" class="custom-control-input" value="cm">
														<th>Per Box Pack</th>
														<th class="length_th">L</th>
														<th class="breath_th">B</th>
														<th class="height_th">H</th>
														<th class="volumetric_weight_th">Valumetric Weight</th>

													</tr>
													<thead>
													<tbody id="volumetric_table_row">
														<tr>
															<td><input type="text" name="per_box_weight_detail[]"
																	class="form-control per_box_weight valid"
																	data-attr="1" id="per_box_weight1"
																	aria-invalid="false" required></td>
															<td class="length_td"><input type="text"
																	name="length_detail[]" class="form-control length"
																	data-attr="1" id="length1" required></td>
															<td class="breath_td"><input type="text"
																	name="breath_detail[]" class="form-control breath"
																	data-attr="1" id="breath1" required></td>
															<td class="height_td"><input type="text"
																	name="height_detail[]" class="form-control height"
																	data-attr="1" id="height1" required></td>
															<td class="volumetic_weight_td"><input type="text"
																	name="valumetric_weight_detail[]" readonly
																	class="form-control valumetric_weight" data-attr="1"
																	id="valumetric_weight1" required></td>
														</tr>
													</tbody>
												<tfoot>

												</tfoot>
											</table>
											<table>
												<tr>

													<th><input type="text" name="per_box_weight" readonly="readonly"
															class="form-control  per_box_weight" id="per_box_weight"
															required="required"></th>
													<th class="length_td"><input type="text" name="length" 
															readonly="readonly" class="form-control length" id="length">
													</th>
													<th class="breath_td"><input type="text" name="breath"
															readonly="readonly" class="form-control breath" id="breath">
													</th>
													<th class="height_td"><input type="text" name="height"
															readonly="readonly" class="form-control height" id="height">
													</th>
													<th class="volumetic_weight_td"><input type="text"
															name="valumetric_weight" readonly="readonly"
															class="form-control my-colorpicker1 valumetric_weight"
															id="valumetric_weight"></th>
													 <td><input type="text" name="one_cft_kg" readonly="readonly" class="form-control my-colorpicker1 one_cft_kg" id="one_cft_kg"></td> 
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<!-- Measurement Units -->
					<!-- <div class="form-group row mt-3">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-primary">Submit</button> &nbsp;
							<button type="button" onclick="return open_new_page()" class="btn btn-primary">New</button>
						</div>
					</div> -->
				</div>
				<div class="col-md-6 col-sm-12 mt-3">
						<!-- Charges -->
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Charges</h4>
							</div>
							<div class="card-content">
								<div class="card-body">
									<div class="row">
										<div class="col-12">
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Freight</label>
												<div class="col-sm-3">
													<input type="number" name="frieht" class="form-control" value=""
														readonly required id="frieht" />
												</div>
												<label class="col-sm-3 col-form-label">Handling Charge</label>
												<div class="col-sm-3">
													<input type="number" name="transportation_charges"
														class="form-control" readonly value="0"
														id="transportation_charges">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Pickup</label>
												<div class="col-sm-3">
													<input type="number" name="pickup_charges" class="form-control"
														readonly value="0" id="pickup_charges">
												</div>
												<label class="col-sm-3 col-form-label">ODA Charge</label>
												<div class="col-sm-3">
													<input type="number" name="delivery_charges" class="form-control"
														readonly value="0" id="delivery_charges">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Insurance</label>
												<div class="col-sm-3">
													<input type="number" name="insurance_charges" class="form-control"
														readonly id="insurance_charges">
												</div>
												<label class="col-sm-3 col-form-label">COD</label>
												<div class="col-sm-3">
													<input type="number" name="courier_charges" class="form-control"
														readonly value="0" id="courier_charges">
												</div>
											</div>
											<div class="form-group row">



												<label class="col-sm-3 col-form-label">AWB Ch.</label>
												<div class="col-sm-3">
													<input type="number" name="awb_charges" class="form-control"
														readonly value="0" id="awb_charges">
												</div>
												<label class="col-sm-3 col-form-label">Other Ch.</label>
												<div class="col-sm-3">
													<input type="number" name="other_charges" class="form-control"
														readonly value="0" id="other_charges">
												</div>
											</div>

											<div class="form-group row">



												<label class="col-sm-3 col-form-label">Topay.</label>
												<div class="col-sm-3">
													<input type="number" name="green_tax" class="form-control" readonly
														value="0" id="green_tax">
												</div>
												<label class="col-sm-3 col-form-label">Appt Ch.</label>
												<div class="col-sm-3">
													<input type="number" name="appt_charges" class="form-control"
														readonly value="0" id="appt_charges">
												</div>
											</div>
											<div class="form-group row">

												<label class="col-sm-3 col-form-label">Fov Charges</label>
												<div class="col-sm-3">
													<input type="number" class="form-control" name="fov_charges"
														readonly id="fov_charges" value="0">
												</div>
												<label class="col-sm-3 col-form-label">Total</label>
												<div class="col-sm-3">
													<input type="number" readonly name="amount" class="form-control"
														value="0" id="amount" />
												</div>

											</div>
											<div class="form-group row">

												<label class="col-sm-3 col-form-label">Fuel Surcharge</label>
												<div class="col-sm-3">
													<input type="number" class="form-control" readonly
														name="fuel_subcharges" value="0" id="fuel_charges">
												</div>
												<label class="col-sm-3 col-form-label">Address Change</label>
												<div class="col-sm-3">
													<input type="number" class="form-control" readonly
														name="address_change" value="" id="address_change">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">DPH </label>
												<div class="col-sm-3">
													<input type="number" class="form-control" readonly name="dph"
														value="0" id="dph">
												</div>
												<label class="col-sm-3 col-form-label">Warehousing Change</label>
												<div class="col-sm-3">
													<input type="number" class="form-control unblock_charges" readonly
														name="warehousing" value="" id="warehousing">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Lable </label>
												<div class="col-sm-3">
													<input type="text" class="form-control unblock_charges txtOnly"
														readonly name="adhoc_lable[]" id="lable">
												</div>
												<label class="col-sm-3 col-form-label">Charges</label>
												<div class="col-sm-3">
													<input type="number" class="form-control unblock_charges" readonly
														name="adhoc_charges[]" value="" id="warehousing">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Lable </label>
												<div class="col-sm-3">
													<input type="text" class="form-control unblock_charges txtOnly"
														readonly name="adhoc_lable[]" id="lable">
												</div>
												<label class="col-sm-3 col-form-label">Charges</label>
												<div class="col-sm-3">
													<input type="number" class="form-control unblock_charges " readonly
														name="adhoc_charges[]" value="" id="warehousing">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-3 col-form-label">Lable </label>
												<div class="col-sm-3">
													<input type="text" class="form-control unblock_charges txtOnly"
														readonly name="adhoc_lable[]" id="lable">
												</div>
												<label class="col-sm-3 col-form-label">Charges</label>
												<div class="col-sm-3">
													<input type="number" class="form-control unblock_charges" readonly
														name="adhoc_charges[]" value="" id="warehousing">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="card-header">
								<h4 class="card-title">Final Charge <span style="color:red" id="isMinimumValue"></span>
								</h4>
							</div>
							<div class="card-content">
								<div class="card-body">
									<div class="row">
										<div class="col-12">
											<div class="row">
												<div class="col-6">
													<div class="form-group row" id="payby" style="display:none;">
														<label class="col-sm-2 col-form-label">Pay By<span
																class="compulsory_fields">*</span></label>
														<div class="col-sm-4">
															<select class="form-control" disabled name="payment_method"
																id="payment_method">
																<option>-Select-</option>
																<?php foreach ($payment_method as $pm) { ?>
																	<option value="<?php echo $pm['id']; ?>"><?php echo $pm['method']; ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group row" id="Refno" style="display:none;">
														<label class="col-sm-3 col-form-label">Ref No</label>
														<div class="col-sm-9">
															<input type="text" name="ref_no" readonly
																class="form-control" id="refer_no" />
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Sub Total</label>
														<div class="col-sm-9">
															<input type="number" readonly name="sub_total"
																class="form-control" value="0" id="sub_total" />
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">CGST Tax</label>
														<div class="col-sm-9">
															<input class="form-control" type="number" id="cgst"
																step="any" name="cgst" value="0" readonly>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">SGST Tax</label>
														<div class="col-sm-9">
															<input class="form-control" type="number" id="sgst"
																step="any" name="sgst" value="0" readonly>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">IGST Tax</label>
														<div class="col-sm-9">
															<input class="form-control" type="number" id="igst"
																step="any" name="igst" value="0" readonly>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Grand Total</label>
														<div class="col-sm-9">
															<input type="text" readonly class="form-control"
																name="grand_total" required value="0" id="grand_total" />
														</div>
													</div>
												</div>
											</div>
											<div class="form-group row mt-3">
												<div class="col-sm-12">
													<button type="submit" class="btn btn-primary" style="display:none"
														id="submit1">Submit</button> &nbsp;
													<button type="button" style="display:none" class="btn btn-primary"
														onclick="return checkForTheCondition();"
														id="desabledBTN">Submit</button> &nbsp;
													<button type="button" onclick="return open_new_page()"
														class="btn btn-primary">New</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Charges -->


					</div>


			</div>
			</form>
		</div>
		</div>
		</div>
		<!-- </form> -->
		<input type="hidden" id="usertype" value="<?php echo $this->session->userdata('userType'); ?>">
		<input type="hidden" id="length_detail" value="">
		</div>
	</main>
	<!-- END: Content-->
	<!-- START: Footer-->

	<?php include(dirname(__FILE__) . '/../admin_shared/admin_footer.php'); ?>
	<!-- START: Footer-->
</body>
<!-- END: Body-->

<!-- <script src="assets/js/domestic_shipment.js"></script> -->
<script src="assets/js/userPanel_domestic_shipment.js"></script>
<script>
	$(document).ready(function() {
		$(function() {
			$("form[name='generatePOD']").validate({
				rules: {
					booking_date: "required",
					courier_company: "required",
					payment_method: "required",
					forworder_name: "required",
					courier_company: "required",
					mode_dispatch: "required",
					doc_type: "required",
					dispatch_details: "required",
					sender_pincode: "required",
					reciever_name: "required",
					reciever_pincode: "required",
					sender_name: "required",
					contactperson_name: "required",
					frieht:  {
						required : true,
						min : 1
					},
					transportation_charges: "required",
					pickup_charges: "required",
					delivery_charges: "required",
					courier_charges: "required",
					awb_charges: "required",
					per_box_weight_detail: "required",
					length_detail: "required",
					breath_detail: "required",
					height_detail: "required",
					other_charges: "required",
					amount: {
						required : true,
						min : 1
					},
					sub_total:  {
						required : true,
						min : 1
					},
					grand_total:  {
						required : true,
						min : 1
					},
					sender_gstno: "required",
				},
				minimumField: {
					min: function(element){
						return $("#frieht").val()!="";
					}
				},
				// Specify validation error messages
				messages: {
					courier_company: "required",
					payment_method: "required",
					booking_date: "Required",
					forworder_name: "Required",
					courier_company: "Required",
					mode_dispatch: "Required",
					doc_type: "Required",
					dispatch_details: "Required",
					sender_pincode: "Required",
					reciever_name: "Required",
					sender_name: "Required",
					contactperson_name: "Required",
					reciever_pincode: "Required",
					frieht: "Required",
					per_box_weight_detail: "required",
					length_detail: "required",
					breath_detail: "required",
					height_detail: "required",
					transportation_charges: "Required",
					pickup_charges: "Required",
					delivery_charges: "Required",
					courier_charges: "Required",
					awb_charges: "Required",
					other_charges: "Required",
					amount: "Required",
					sub_total: "Required",
					igst: "Required",
					grand_total: "Required",
					sender_gstno: "Required",
				},
				errorPlacement: function(error, element) {
					if (element.attr("type") == "radio") {
						error.insertBefore(element);
					} else {
						error.insertAfter(element);
					}
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
		});

		$("form[name='generatePOD']").validate();
	});
</script>

</html>