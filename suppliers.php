<?php
session_start();
if($_SESSION['is_login'] != True){
    header("Location: login.php");
    //302/301 Redirection
}
$pageId = "Customer Invoice"; 
require("includes/head.php"); /* Head */
$_SESSION['inv_row'] = "";
?>

<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="index.php"></a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

  <?php
  require("includes/navbar-search.php"); /* Nav Bar Search */
  require("includes/navbar.php"); /* Nav Bar  */
  ?>
  </nav>

<div id="wrapper">

  <?php
    require("includes/sidebar.php"); /* Sidebar */
  ?>

  <div id="content-wrapper">
    <div class="container-fluid">
      
      <div>     
        <h3>ایجاد تامین کننده</h3>
        <hr>
      </div> 
      
      <div id"customerCreator">
        <form>
          <div class="col-sm-2">
            <div class="form-label-group">
              <input type="text" class="form-control"  autofocus="autofocus" id="suppliers-name">
              <label for="suppliers-name">نام تامین کننده</label>               
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-label-group">
              <input type="text" class="form-control"  autofocus="autofocus" id="suppliers-contact-point">
              <label for="suppliers-contact-point">مسئول پیگیری</label>               
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-label-group">
              <input type="text" class="form-control"  autofocus="autofocus" id="suppliers-phone">
              <label for="suppliers-phone">تلفن</label>               
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-label-group">
              <input type="text" class="form-control"  autofocus="autofocus" id="suppliers-cell">
              <label for="suppliers-cell">موبایل</label>               
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-label-group">
              <select class="custom-select col-md-auto" id="cooperation-kind">
                <option value="null" selected >نوع همکاری</option>
                <option value="second-inv" >دو فاکتوری</option>
                <option value="10percent">۱۰٪</option>
                <option value="15percent">۱۵٪</option>
                <option value="20percent">۲۰٪</option>
                <option value="other">سایر</option>
              </select>     
            </div>
          </div>  
          <div class="col-sm-2">
            <div class="form-label-group">
              <input type="text" class="form-control"  autofocus="autofocus" id="suppliers-address">
              <label for="suppliers-address">آدرس</label>               
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-label-group">
              <input type="text" class="form-control"  autofocus="autofocus" id="suppliers-map-link">
              <label for="suppliers-map-link">لینک برروی نقشه گوگل</label>               
            </div>
          </div>

        </form>
      </div>  

   
  </div>
</div>        

<?php
  require("includes/footer.php"); /* Footer */
  require("includes/scroll-to-top.php"); /* Scroll to Top Button */
  require("includes/logout.php"); /* Logout Modal */
?>
      </div> <!-- /.content-wrapper -->
    </div> <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- scripts for this page-->


  </body>
</html>