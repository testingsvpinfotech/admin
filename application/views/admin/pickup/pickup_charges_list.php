<?php include(dirname(__FILE__) . '/../admin_shared/admin_header.php'); ?>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default">


    <!-- END: Main Menu-->

    <?php include(dirname(__FILE__) . '/../admin_shared/admin_sidebar.php'); ?>
    <!-- END: Main Menu-->

    <!-- START: Main Content-->
    <main>
        <div class="container-fluid site-width">
            <!-- START: Listing-->
            <div class="row">
                <div class="col-12">
                    <div class="col-12 col-sm-12" style="margin-top: 4rem;">
                        <div class="card">

                            <div class="card-header">
                                <h4 class="card-title">Pickup Charges</h4><span style="float: right;"></span>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php if (!empty($this->session->flashdata('msg'))) { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert">X</button>
                                                    <?php echo $this->session->flashdata('msg'); ?>
                                                <?php } ?>
                                                </div>
                                        </div>
                                        <div class="col-12">
                                            <form role="form" action="<?= base_url(); ?>admin/pickup-charges-master" method="post">
                                                <div class="box-body">
                                                    <div class=" row">
                                                        <div class="col-sm-2">
                                                            <label>From Weight</label>
                                                            <input class="form-control" name="from_weight" required placeholder="Enter From Weight"/>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label>To Weight</label>
                                                            <input class="form-control" name="to_weight" required placeholder="Enter To Weight"/>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label>Rate</label>
                                                            <input class="form-control" name="pickup_rate" required placeholder="Enter Rate"/>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label>Type</label>
                                                            <select class="form-control" name="weight_type" required>
                                                                <option value="">Please Select</option>
                                                                <option value="0">Fixed</option>
                                                                <option value="3">Addition 1000GM</option>
                                                                <option value="4">Per KG</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-2 mt-3">
                                                            <button type="submit" name="submit" class="btn btn-primary m-2">Add</button>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </form>
                                        </div>
                                  
                                        <div class="col-md-8">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td>ID</td>
                                                        <td>WEIGHT FROM</td>
                                                        <td>WEIGHT TO</td>
                                                        <td>RATE</td>
                                                        <td>TYPE</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($rate)) { ?>
                                                    <?php $i = 1;
                                                        foreach ($rate as $v) : ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $v->weight_from; ?></td>
                                                            <td><?php echo $v->weight_to; ?></td>
                                                            <td><?php echo $v->rate; ?></td>
                                                            <td><?php 
                                                                if($v->weight_type == 0){ echo "FIXED"; }
                                                                elseif($v->weight_type == 4){ echo "PER KG"; }  
                                                                elseif($v->weight_type == 3){ echo "Addition 1000GM"; }  
                                                            ?>
                                                            </td>
                                                            <td>
                                                                <!-- <a href="#" class="btn btn-success">Edit</a> -->
                                                                <a href="<?php echo base_url('Pickup_Request_Charges/delete_pickup_charge/'.$v->id);?>" class="btn btn-danger">Delete</a>
                                                                <a href="<?php echo base_url('admin/update-pickup-charges-master/'.$v->id);?>" class="btn btn-primary">Update</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php } else { ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">No Data Found</td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- END: Listing-->
            </div>
        </div>
    </main>
    <!-- END: Content-->
    <!-- START: Footer-->

    <?php include(dirname(__FILE__) . '/../admin_shared/admin_footer.php'); ?>
    <!-- START: Footer-->
</body>
<!-- END: Body-->