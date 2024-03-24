<?php $this->load->view('admin/admin_shared/admin_header'); ?>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default">
    <style>
        .buttons-copy {
            display: none;
        }

        .buttons-csv {
            display: none;
        }

        /*.buttons-excel{display: none;}*/
        .buttons-pdf {
            display: none;
        }

        .buttons-print {
            display: none;
        }

        /*#example_filter{display: none;}*/
        .input-group {
            width: 60% !important;
        }
    </style>

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
                                <h4 class="card-title">Delivery Branch Report</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <form role="form"
                                                action="<?php echo base_url(); ?>admin/list-delivery-branch-report"
                                                method="get" enctype="multipart/form-data">
                                                <div class="form-row">                                                  
                                                   
                                                    <div class="col-sm-2">
                                                        <label for="">From Date</label>
                                                        <input type="date" name="from_date"
                                                            value="<?php echo (isset($post_data['from_date'])) ? $post_data['from_date'] : ''; ?>"
                                                            id="from_date" autocomplete="off" class="form-control">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label for="">To Date</label>
                                                        <input type="date" name="to_date"
                                                            value="<?php echo (isset($post_data['to_date'])) ? $post_data['to_date'] : ''; ?>"
                                                            id="to_date" autocomplete="off" class="form-control">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label>Status</label>
                                                        <select name="status" class="form-control" id="">
                                                            <option value="0" <?php if(isset($_POST['status'])){ if($_POST['status']=='All'){echo 'selected';}}?>> All </option>
                                                            <option value="Undeliverd" <?php if(isset($_POST['status'])){ if($_POST['status']=='Undeliverd'){echo 'selected';}}?>> Undeliverd </option>
                                                            <option value="Deliverd" <?php if(isset($_POST['status'])){ if($_POST['status']=='Deliverd'){echo 'selected';}}?>> Deliverd </option>
                                                        </select>
                                                     
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="submit" class="btn btn-primary"
                                                            style="margin-top: 25px;" name="submit" value="Search">
                                                        <input type="submit" class="btn btn-primary"
                                                            style="margin-top: 25px;" name="submit"
                                                            value="Download Excel">
                                                        <a href="<?= base_url('admin/list-delivery-branch-report'); ?>"
                                                            class="btn btn-primary" style="margin-top: 25px;">Reset</a>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="" class="display table table-striped table-bordered layout-primary"
                                    data-sorting="true">
                                    <thead>
                                    <th scope='col'>Sr No.</th>
                                    <th scope='col'>AWB No</th>
                                    <th scope='col'>Origin</th>
                                    <th scope='col'>Destination</th>
                                    <th scope='col'>Master Manifest In Scan</th>
                                    <th scope='col'>Manifest In Scan</th>
                                    <th scope='col'>Bag In Scan</th>
                                    <th scope='col'>DRS </th>
                                    <th scope='col'>DRS No</th>
                                    <th scope='col'>Delivery Date</th>
                                    <th scope='col'>Uploaded Pod Date</th>
                                    <th scope='col'>Delivery Boy</th>
                                    <th scope='col'>POD Uploaded</th>
                                    <!-- <th scope='col'>Delivery Date</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php 
                                            
                                            if (!empty($domestic_allpoddata)) {
                                                $i = 0;
                                                // echo '<pre>';print_r($domestic_allpoddata);die;
                                                foreach ($domestic_allpoddata as $value_d) {
                                                      $pod_no = $value_d['pod_no'];
                                                      $bag_in_scan = $this->db->query("select tracking_date from tbl_domestic_tracking where status = 'Bag In-Scan' order by id desc")->row();
                                                      $manifest_in_scan = $this->db->query("select tracking_date from tbl_domestic_tracking where status = 'Menifiest In-Scan' order by id desc")->row();
                                                      $mastermanifest_in_scan = $this->db->query("select tracking_date from tbl_domestic_tracking where status = 'Master Manifest in-scan' order by id desc")->row();
                                                      $drs = $this->db->query("select tracking_date from tbl_domestic_tracking where status = 'Out For Delivery' order by id desc")->row();
			                                          $Delivered = $this->db->query("select tracking_date from tbl_domestic_tracking where status = 'Delivered' order by id desc")->row();

                                                  ?>
                                                <td style="width:20px;">
                                                    <?php echo ($i + 1); ?>
                                                </td>
                                                <td style="width:20px;">
                                                    <?php echo $value_d['pod_no']; ?>
                                                </td>        
                                                <td style="width:20px;">
                                                    <?php $branch = $value_d['branch_id'];
                                                    echo $this->db->query("select * from tbl_branch where branch_id = '$branch'")->row('branch_name');
                                                    ?>
                                                </td>        
                                                <td style="width:20px;">
                                                    <?php $branch = $value_d['delivery_branch']; 
                                                    echo $this->db->query("select * from tbl_branch where branch_id = '$branch'")->row('branch_name');
                                                    ?>
                                                </td>        
                                                <td style="width:40px;">
                                                    <?php echo $mastermanifest_in_scan->tracking_date; ?>
                                                </td>
                                                <td style="width:40px;">
                                                    <?php echo $manifest_in_scan->tracking_date; ?>
                                                </td>
                                                <td style="width:40px;">
                                                    <?php echo $bag_in_scan->tracking_date; ?>
                                                </td>
                                                <td style="width:40px;">
                                                    <?php echo $drs->tracking_date; ?>
                                                </td>
                                                                                       
                                                <td style="width:20px;">
                                                    <?php echo $value_d['deliverysheet_id']; ?>
                                                </td>                                                
                                                <td style="width:20px;">
                                                    <?php echo $value_d['date']; ?>
                                                </td>                                                
                                                <td style="width:20px;">
                                                    <?php echo $Delivered->tracking_date; ?>
                                                </td>                                                
                                                <td style="width:20px;">
                                                    <?php echo $value_d['deliveryboy_name']; ?>
                                                </td>                                                
                                                <td style="width:20px;">
                                                <?php $img = $value_d['img'];
                                                $ext = explode('.',$img);
                                                if(! empty($img)){
                                                if($ext[1] =='pdf'){
                                                ?>
                                                <a href='<?= base_url('assets/pod/'.$img);?>' target='_blank' style="color:#fff;">View Pod</a>
                                                <?php }else{ ?>
                                                <a href='assets/pod/<?= $img?>' src='assets/pod/<?= $img?>' onclick='show_image(this);return false;' style="color:#fff;">View Pod Image</a> 
                                                <?php } }?>   
                                            </td>                                                
                                                 
                                                                                     
                                                </tr>
                                                <?php
                                                $i++;
                                                }
                                            }

                                            ?>

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
    <?php $this->load->view('admin/admin_shared/admin_footer');
    //include('admin_shared/admin_footer.php'); ?>
    <!-- START: Footer-->
    <div id="myModal" class="modal">
         <span class="close-image-modal">&times;</span>
         <img class="modal-content" id="img01">
         <div id="caption"></div>
       </div>
       <style type="text/css">
         /* The Modal (background) */
         .modal {
           display: none;
           /* Hidden by default */
           position: fixed;
           /* Stay in place */
           z-index: 1;
           /* Sit on top */
           padding-top: 100px;
           /* Location of the box */
           left: 0;
           top: 0;
           width: 100%;
           /* Full width */
           height: 100%;
           /* Full height */
           overflow: auto;
           /* Enable scroll if needed */
           background-color: rgb(0, 0, 0);
           /* Fallback color */
           background-color: rgba(0, 0, 0, 0.9);
           /* Black w/ opacity */
         }

         /* Modal Content (image) */
         .modal-content {
           margin: auto;
           display: block;
           width: 50%;
           max-width: 700px;
         }

         /* Caption of Modal Image */
         #caption {
           margin: auto;
           display: block;
           width: 80%;
           max-width: 700px;
           text-align: center;
           color: #ccc;
           padding: 10px 0;
           height: 150px;
         }

         /* Add Animation */
         .modal-content,
         #caption {
           -webkit-animation-name: zoom;
           -webkit-animation-duration: 0.6s;
           animation-name: zoom;
           animation-duration: 0.6s;
         }

         @-webkit-keyframes zoom {
           from {
             -webkit-transform: scale(0)
           }

           to {
             -webkit-transform: scale(1)
           }
         }

         @keyframes zoom {
           from {
             transform: scale(0)
           }

           to {
             transform: scale(1)
           }
         }

         /* The Close Button */
         .close-image-modal {
           position: absolute;
           /*top: 15px;*/
           right: 35px;
           color: #f1f1f1;
           font-size: 40px;
           font-weight: bold;
           transition: 0.3s;
         }

         .close-image-modal:hover,
         .close-image-modal:focus {
           color: #bbb;
           text-decoration: none;
           cursor: pointer;
         }

         /* 100% Image Width on Smaller Screens */
         @media only screen and (max-width: 700px) {
           .modal-content {
             width: 100%;
           }
         }
       </style>
</body>
<script>
       // Get the modal
       var modal = document.getElementById("myModal");

       function show_image(obj) {
         var captionText = document.getElementById("caption");
         var modalImg = document.getElementById("img01");
         modal.style.display = "block";
         // alert(obj.tagName);
         if (obj.tagName == 'A') {
           modalImg.src = obj.href;
           captionText.innerHTML = obj.title;
         }
         if (obj.tagName == 'img') {
           modalImg.src = obj.src;
           captionText.innerHTML = obj.alt;
         }

         // modalImg.src = 'http://www.safedart.in/assets/pod/pod_1.jpg';

       }
       var span = document.getElementsByClassName("close-image-modal")[0];

       // When the user clicks on <span> (x), close the modal
       span.onclick = function() {
         modal.style.display = "none";
       }


       // Get the image and insert it inside the modal - use its "alt" text as a caption




       // Get the <span> element that closes the modal
     </script>
<!-- END: Body-->