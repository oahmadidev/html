<ul class="sidebar navbar-nav ">
  <li class="nav-item">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>داشبورد</span>
    </a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" 
    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-chalkboard"></i>
    <span>میز کار</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">دفتر:</h6>
        <a class="dropdown-item   <?php echo ($_SERVER['PHP_SELF'] == "invoice.php" ? "active" : "");?> " 
        href="/invoice.php">فاکتور
        </a>
        <a class="dropdown-item <?php echo ($_SERVER['PHP_SELF'] == "pre-invoice.php" ? "active" : "");?> " 
        href="pre-invoice.php">پیش فاکتور
        </a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">مالی:</h6>
        <a class="dropdown-item" href="debit.php">ثبت دریافت</a>
        <a class="dropdown-item" href="deposit.php">ثبت پرداخت</a>
        <div class="dropdown-divider"></div>
        <h6 class="dropdown-header">گزارشات:</h6>
        <a class="dropdown-item" href="login.php">گزارشات پیش </a>
        <a class="dropdown-item" href="login.php">گزارش فاکتور</a>
      </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="customers.php">
    <i class="fas fa-address-book"></i>
    <span>مشتریان</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="suppliers.php">
    <i class="fas fa-hand-holding-usd"></i>
    <span>تامین کنندگان</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="daily-report.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>گزارش عملکرد</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="inv-list.php">
    <i class="fas fa-fw fa-table"></i>
    <span>لیست فاکتورها</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="settings.php">
    <i class="fas fa-cogs"></i>
    <span>تنظیمات</span></a>
  </li>
  </ul>