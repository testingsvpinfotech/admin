 <!-- START: Footer--> <div class="main"> <i style="float: right; margin-right:20px; margin-top:10px; font-size:17px;cursor:pointer;" id="close" class="fa fa-times" aria-hidden="true"></i>
 
 <style>
    .main{
      position: absolute;
      top: 45%;
      left: 20%;
      z-index: 9;
      background-color: #fff;
      width: 600px;
      height: 250px;
      display: none;
      box-shadow: 5px 5px 30px grey;
      border-radius: 5px;
      
    } 
    .calculate{
      padding: 10% 20px;
    }

  </style>
  
  <div class="calculate">
  <h1 class="text-center">Calculator</h1>
       <div class="row">
        <div class="col-md-5">
         <label for="Inch">Inch</label><br>
          <input type="text" id="input" class="form-control" placeholder="Inch"></div>
        <div class="col-md-1"><br><br> = </div>
        <div class="col-md-5">
        <label for="Inch">Centimeter</label><br>  
        <input type="text" id="result" class="form-control"></div>
       </div>
  </div>
 </div>
        <footer class="site-footer">
           <strong> <a  id="calculator" style="color: #007bff; cursor:pointer;">Centimeter Calculator</a> Copyright &copy; <?php echo date('Y'); ?> <a href="https://svpinfotech.com" target="_blank">Logistics Software SVP Infotech</a>.All rights
    reserved. For support Call <font color="red">+91-02249797365</font></strong> <br>
   <div><marquee>
       For Logistics Software, Mobile Apps, Website Designing, Custom Software, eCommerce Website, MLM Software, College Admission Software Call 9022062666 Email: info@svpinfotech.com , svpinfotech@gmail.com Website : www.svpinfotech.com
   </marquee> </div>
        </footer>
        <!-- END: Footer-->
       

        <!-- START: Back to top-->
        <a href="#" class="scrollup text-center"> 
            <i class="icon-arrow-up"></i>
        </a>
        
        <!--******************************** Sweet alert ***********************************************-->
          <script src="assets/js/sweetalert2.all.min.js"></script>
          <script src="assets/js/customsweetalert.js"></script>
        
        <!-- END: Back to top-->

        <!-- START: Template JS-->
        <script src="assets/admin_assets/dist/vendors/jquery/jquery-3.3.1.min.js"></script>
        <Script>
          $(document).ready(function(){
           // alert('hello');
           $('.main').hide();
            $('#calculator').click(function(){
              $('.main').show();
              

            });
            $('#close').click(function(){
              $('.main').hide();
              

            });
            $('#input').keyup(function(){
              var input = $('#input').val();
              
              var result = input * 2.54;
              // alert(result);
              $('#result').val(result);
            });
          });
        </Script>
        <script src="assets/admin_assets/dist/vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/admin_assets/dist/vendors/moment/moment.js"></script>
        <script src="assets/admin_assets/dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>    
        <script src="assets/admin_assets/dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/admin_assets/dist/js/jquery.validate.min.js"></script>
        <script src="assets/js/domestic_shipment_1.js"></script>
        <script src="assets/js/validation.js"></script>
        
        <!-- END: Template JS-->

        <!-- START: APP JS-->
        <script src="assets/admin_assets/dist/js/app.js"></script>
        <!-- END: APP JS-->

        <!-- START: Page Vendor JS-->
        <script src="assets/admin_assets/dist/vendors/raphael/raphael.min.js"></script>
        <script src="assets/admin_assets/dist/vendors/morris/morris.min.js"></script>
        <script src="assets/admin_assets/dist/vendors/chartjs/Chart.min.js"></script>
        <script src="assets/admin_assets/dist/vendors/starrr/starrr.js"></script>
        <script src="assets/admin_assets/dist/vendors/jquery-flot/jquery.canvaswrapper.js"></script>
        <script src="assets/admin_assets/dist/vendors/jquery-flot/jquery.colorhelpers.js"></script>
        <script src="assets/admin_assets/dist/vendors/jquery-flot/jquery.flot.js"></script>
        <script src="assets/admin_assets/dist/vendors/jquery-flot/jquery.flot.saturated.js"></script>
        <script src="assets/admin_assets/dist/vendors/jquery-flot/jquery.flot.browser.js"></script>
        <script src="assets/admin_assets/dist/vendors/jquery-flot/jquery.flot.drawSeries.js"></script>
        <script src="assets/admin_assets/dist/vendors/jquery-flot/jquery.flot.uiConstants.js"></script>
        <script src="assets/admin_assets/dist/vendors/jquery-flot/jquery.flot.legend.js"></script>
        <script src="assets/admin_assets/dist/vendors/jquery-flot/jquery.flot.pie.js"></script>        
        <script src="assets/admin_assets/dist/vendors/chartjs/Chart.min.js"></script>  
        <script src="assets/admin_assets/dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
        <script src="assets/admin_assets/dist/vendors/jquery-jvectormap/jquery-jvectormap-world-mill.js"></script>
        <script src="assets/admin_assets/dist/vendors/jquery-jvectormap/jquery-jvectormap-de-merc.js"></script>
        <script src="assets/admin_assets/dist/vendors/jquery-jvectormap/jquery-jvectormap-us-aea.js"></script>
        <script src="assets/admin_assets/dist/vendors/apexcharts/apexcharts.min.js"></script>
        <!-- END: Page Vendor JS-->

        <!-- START: Page JS-->
        <script src="assets/admin_assets/dist/js/home.script.js"></script>
        <!-- END: Page JS-->

         <!-- START: Page Vendor JS-->
        <script src="assets/admin_assets/dist/vendors/footable/js/footable.min.js"></script>
        <!-- END: Page Vendor JS-->

        <!-- START: Page Script JS-->
        <script src="assets/admin_assets/dist/js/footable.script.js"></script>
        <!-- END: Page Script JS-->

        <script src="assets/dist/vendors/datatable/js/jquery.dataTables.min.js"></script> 
        <script src="assets/dist/vendors/datatable/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/dist/vendors/datatable/jszip/jszip.min.js"></script>
        <script src="assets/dist/vendors/datatable/pdfmake/pdfmake.min.js"></script>

        <script src="assets/dist/vendors/datatable/pdfmake/vfs_fonts.js"></script>
        <script src="assets/dist/vendors/datatable/buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/dist/vendors/datatable/buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/dist/vendors/datatable/buttons/js/buttons.colVis.min.js"></script>
        <script src="assets/dist/vendors/datatable/buttons/js/buttons.flash.min.js"></script>
        <script src="assets/dist/vendors/datatable/buttons/js/buttons.html5.min.js"></script>
        <script src="assets/dist/vendors/datatable/buttons/js/buttons.print.min.js"></script>
        <!-- END: Page Vendor JS-->

        <!-- START: Page Script JS-->        
        <script src="assets/dist/js/datatable.script.js"></script>
        <!--  <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js"></script> -->
        <script type="text/javascript" src="assets/multiselect/bootstrap-multiselect.js"></script>
        <script src="<?php echo base_url();?>assets/dist/js/select2.min.js"></script>
        <script src="<?php echo base_url();?>assets/devhide.js"></script>
        <!-- END: Page Script JS-->