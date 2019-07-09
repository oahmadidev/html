<?php
session_start();
if($_SESSION['is_login'] != True){
    header("Location: login.php");
    //302/301 Redirection
}
$pageId = "Main"; 
require("includes/head.php"); /* Head */
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
        <?php
        require("includes/icon-card.php"); /* Icon Card */
        require("includes/area-chart.php"); /* Area Chart  */
        require("includes/data-table.php"); /* DataTables  */
        ?>
      </div>
      <!-- /.container-fluid -->
      <?php
        require("includes/footer.php"); /* Footer */
        require("includes/scroll-to-top.php"); /* Scroll to Top Button */
        require("includes/logout.php"); /* Logout Modal */
      ?>
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script s;rc="vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
