

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="layout/css/navbar.css"> 
  <link rel="stylesheet" href="layout/css/style.css"> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

</head>

<body>

  <nav>
    <div class="ctn">
      <div style="display: flex; align-items: center; gap: 30px;">
        <button onclick="toggleSidebar()" style="border: 1px solid white; padding: 10px; border-radius: 100px; background: #ffffff;">
          <i class="bi bi-justify"></i>
        </button>
        <span>Xin chao buoi sang, <?=$_SESSION['session_user']['ten']?></span>
      </div>
      <div class="info">
        <div class="search">
          <i class="bi bi-search"></i>
          <input type="text" placeholder="Tìm kiếm...">
        </div>
        <div class="icon-bi">
          <a href="../index.php"><i class="bi bi-house"></i></a>
        </div>
        <div class="icon-bi">
          <i class="bi bi-lamp"></i>
        </div>
        <div class="icon-bi">
          <i class="bi bi-bell"></i>
        </div>
        <div class="icon-bi">
          <i class="bi bi-person"></i>
        </div>
      </div>
    </div>
  </nav>
  <aside id="sidebar" style="background: #f7f9fd">
    <ul>
      <li>
        <a href="index.php?page=dashboard" class="a-li" style="display: flex; text-align: center; text-decoration: none; justify-content: center; align-items: center; gap: 10px">
          <i class="bi bi-bounding-box"></i>
            <span class="li-text">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="index.php?page=sanpham" class="a-li" style="display: flex; text-align: center; text-decoration: none; justify-content: center; align-items: center; gap: 10px">
          <i class="bi bi-box"></i>
          <span class="li-text">Sản phẩm</span>
        </a>
      </li>
      <li>
        <a href="index.php?page=donhang" class="a-li" style="display: flex; text-align: center; text-decoration: none; justify-content: center; align-items: center; gap: 10px">
          <i class="bi bi-receipt"></i>
          <span class="li-text">Đơn hàng</span>
        </a>
      </li>
      <li>
        <a href="index.php?page=khachhang" class="a-li" style="display: flex; text-align: center; text-decoration: none; justify-content: center; align-items: center; gap: 10px">
          <i class="bi bi-people"></i>
          <span  class="li-text" style="font-size: 10px;">Khách hàng</span>
        </a>
      </li>
      <li>
        <a href="index.php?page=binhluan" class="a-li" style="display: flex; text-align: center; text-decoration: none; justify-content: center; align-items: center; gap: 10px">
          <i class="bi bi-chat-left-text"></i>
          <span class="li-text">Bình luận</span>
        </a>
      </li>
      <li>
        <a href="#" class="a-li" style="display: flex; text-align: center; text-decoration: none; justify-content: center; align-items: center; gap: 10px">
          <i class="bi bi-ticket-perforated"></i>
          <span  class="li-text">Thống kê</span>
        </a>
      </li>
      <li>
        <a href="index.php?page=tinnhan" class="a-li" style="display: flex; text-align: center; text-decoration: none; justify-content: center; align-items: center; gap: 10px">
          <i class="bi bi-chat"></i>
          <span  class="li-text">Nhắn tin</span>
        </a>
      </li>
    </ul>
  </aside>