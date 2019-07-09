<?php
session_start();
if($_SESSION['is_login'] != True){
    header("Location: login.php");
    //302/301 Redirection
}
$pageId = "فاکتور"; 
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

    <div id="customer-info"> 
      <div>     
      <h3>اطلاعات مشتری</h3>
      <hr>
      </div> 
      <div class="form-group">
      <div class="form-row">   
      <div class="col-sm-2">
        <div id="inv-date-issue" class="form-label-group">
          <input type="text" class="form-control"  autofocus="autofocus" id="customer-name">
          <label for="doctype">تاریخ صدور</label>               
        </div>
      </div>      
      <div class="col-sm-2">
        <div id="inv-date-deliverd" class="form-label-group">
          <input type="text" class="form-control"  autofocus="autofocus" id="customer-name">
          <label for="doctype">تاریخ تحویل</label>               
        </div>
      </div>      
      <div class="col-sm-2">
        <div id="translate-lang" class="form-label-group">
          <select class="custom-select col-md-auto" name="translation-language" id="translation-language">
                <option value="null"> زبان ترجمه </option>
                <option value="english" selected>انگلیسی</option>
                <option value="dutch">آلمانی</option>
                <option value="spanish">اسپانیایی</option>
                <option value="french">فرانسه</option>
                <option value="arabic">عربی</option>
                <option value="turkish">ترکی</option>
                <option value="chinese">چینی</option>
                <option value="korean">کره ای</option>
           </select>     
        </div>  
      </div>
      </div>  
      </div>  
      <div class="form-group">
      <div class="form-row">

      <div class="col-sm-2">
        <div id="customer-info-name" class="form-label-group">
          <input type="text" class="form-control"  autofocus="autofocus" id="customer-name">
          <label for="doctype">نام</label>               
        </div>
      </div>

      <div class="col-sm-2">
        <div id="customer-info-familyname" class="form-label-group">
          <input type="text" class="form-control"  autofocus="autofocus" id="customer-fname">
          <label for="doctype">نام خانوادگی</label>
        </div>
      </div>
      <div class="col-sm-2">
        <div id="customer-info-phone" class="form-label-group">
          <input type="text" class="form-control"  autofocus="autofocus" required="required" id="customer-phone">
          <label for="doctype">شماره همراه</label>               
        </div>
      </div>

      <div class="col-sm-2">
        <div id="customer-info-nid" class="form-label-group">
          <input type="text" class="form-control" id="customer-nid">
          <label for="doctype">کد ملی</label>
        </div>
      </div>

      <div class="col-sm-2">
        <div id="customer-info-supplier" class="form-label-group">
          <input type="text" class="form-control"  autofocus="autofocus" id="supplier">
          <label for="doctype">تامین کننده</label>
        </div>        
      </div>
      <div class="col-sm-2">
        <div id="customer-info-supplier" class="form-label-group">
          <input type="text" class="form-control"  autofocus="autofocus" id="supplier" readonly>
          <label for="doctype">شماره رسید</label>
        </div>        
      </div>
</div>
<div>
  <hr>
  <h3>اطلاعات اسناد</h3>
</div> 


<div> <!-- Main Invoice -->
  <div class="row clearfix">
    <div class="col-md-12">
      <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th class="w-1 text-center"> # </th>
            <th class="w-33 text-center"> شرح سند </th>
            <th class="w-5 text-center"> تعداد </th>
            <th class="w-5 text-center"> پلمپ </th>
            <th class="w-5 text-center"> برگ </th>
            <th class="w-6 text-center"> نسخه </th>
            <th class="w-10 text-center"> مهر </th>
            <th class="w-9 text-center"> تعرفه </th>
            <th class="w-9 text-center"> هزینه مازاد </th>
            <th class="w-10 text-center"> جمع </th>
          </tr>
        </thead>

        

        <tbody id="tbody">
          <tr id='addr0'>
            <td class="w-1">1</td>
            <td><input type="text" id="doctype" oninput="doctypesearch(this);" placeholder='شرح سند'  class="form-control doctype" />
            <span  class="display border rounded-bottom"></span>
            </td>

            <td><input id="docqty" type="text" class="form-control text-center docqty" placeholder="0"/></td>
            
            <td><input type="text" class="form-control text-center polompqty" placeholder="0"/></td>
            
            <td><input type="text" class="form-control text-center paperqty" placeholder="0"/></td>
            
            <td><select class="custom-select  eddition" name="document-type" id="document-type">
                <option value="primary" selected>اصلی</option>
                <option value="secondry">مجدد</option>
               </select></td>
            
            <td><select class="custom-select stamptype" name="stamp-type" id="stamp-type">
                  <option value="null" >مهر</option>
                  <option value="unofficial">غیررسمی</option>
                  <option value="M" selected>م</option>
                  <option value="MD">م-د</option>
                  <option value="MDKH">م-د-خ</option>
                  <option value="MDB">م-د-ب</option>
                  <option value="MDBKH">م-د-ب-خ</option>
              </select></td>
            
            <!--<td><select class="custom-select emergancystatus" name="emergancy-status" id="emergancy-status">
                  <option value="emergance">فوری</option>
                  <option value="not-emergance" selected>عادی</option>
                </select></td>
            
            <td><select class="custom-select service" name="service" id="service">
                <option value="null" selected>خدمات</option>
                <option value="mustscanned">اسکن</option>
                </select></td>            -->
            <td><input id="docprice" type="text" placeholder='0' class="form-control docprice" /></td>

            <td><input id="overplus" type="text" placeholder='0' class="form-control overplus"/></td>

            <td><input id="total"  placeholder='0' class="form-control total" /></td>

          </tr>
          <tr id='addr1'> </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row clearfix">
    <div class="col-md-12">
      <button id="add_row" class="btn btn-success pull-right">اضافه</button>
      <button id='delete_row' class="pull-right btn btn-danger"> حذف</button>
    </div>
  </div>
  <div class="row clearfix" style="margin-top:20px">
    <div class="pull-right col-md-4">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">جمع</th>
            <td class="text-center"><input  name='sub_total' placeholder='0' class="form-control" id="sub_total" readonly/></td>
          </tr>
          <!--<tr>
            <th class="text-center">نرخ ارزش افزوده</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" class="form-control" id="tax" placeholder="0">
                <div class="input-group-addon">%</div>
              </div></td>
          </tr>
          <tr>
            <th class="text-center">مالیات</th>
            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>-->
          <tr>
            <th class="text-center">تخفیف</th>
            <td class="text-center"><input  name='discount' id="discount_amount" placeholder='0' class="form-control" /></td>
          </tr>
          <tr>
            <th class="text-center">جمع کل</th>
            <td class="text-center"><input  name='total_amount' id="total_amount" placeholder='0' class="form-control" readonly/></td>
          </tr>
        </tbody>
      </table>
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

    <!-- scripts for Invoice-->
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/doctypelivesearch.js"></script>
    <script type="text/javascript" src="/js/docprice.js"></script>
    <script type="text/javascript" src="/js/invtable.js"></script>



  </body>
</html>