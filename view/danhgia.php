<?php
    // echo '<pre>';
    // print_r($_SESSION);
    // print_r($_POST);
    // echo '</pre>';  
 
    $html_binhluan = '';
    foreach ($danhsachbinhluan as $binhluan) {
      extract($binhluan);
      $html_binhluan .= '
        <div class="card mb-3 shadow-sm border-0 rounded">
          <div class="card-body">
            <!-- Header: Nickname and Date -->
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5 class="card-title fw-bold text-primary mb-0">' . htmlspecialchars($nickname) . '</h5>
              <small class="text-muted">' . htmlspecialchars($date) . '</small>
            </div>
    
            <!-- Rating -->
            <div class="mb-3 text-warning">';
              for ($i = 1; $i <= 5; $i++) {
                if ($i <= $sao) {
                  $html_binhluan .= '<i class="fas fa-star"></i>';
                } else {
                  $html_binhluan .= '<i class="far fa-star"></i>';
                }
              }
      $html_binhluan .= '
            </div>
    
            <!-- Content: Size, Color, and Comment -->
            <p class="mb-1"><strong>Đã mua size:</strong> ' . htmlspecialchars($size) . '</p>
            <p class="mb-1"><strong>Đã mua màu:</strong> ' . htmlspecialchars($color) . '</p>
            <p class="card-text mt-3">' . htmlspecialchars($noidung) . '</p>
    
            <!-- Footer: User Details -->
            <div class="d-flex justify-content-end text-muted small">
              <div class="me-3"><strong>Tên:</strong> ' . htmlspecialchars($ten) . '</div>
              <div class="me-3"><strong>Tuổi:</strong> ' . htmlspecialchars($age) . '</div>
              <div><strong>Địa chỉ:</strong> ' . htmlspecialchars($diachi) . '</div>
            </div>
          </div>
        </div>
      ';
    }

    $link='index.php?page=men&dm_id='.$binhluan['dm_id']; 
    $link2='index.php?page=sanphamchitiet&idpro='.$binhluan['id']; 


    $html_breadcrumb = '';
    $html_breadcrumb .='<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php?page=men">Men</a></li>
                        <li class="breadcrumb-item"><a href="'.$link.'">'.$name.'</a></li>
                        <li class="breadcrumb-item"><a href="'.$link2.'">'.$name_item.'</a></li>
                        ';
                        if ($name_item!=""){
                          $html_breadcrumb .='<li class="breadcrumb-item active" aria-current="page">Nhận xét sản phẩm</li>
                          ';
                        }

                  

?>


<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 10px">
      
      <ol class="breadcrumb">
        <?=$html_breadcrumb;?> 
      </ol>
</nav>

<div class="container" style="margin-top: 10px; margin-bottom: 10px">
  <h3>Đánh giá</h3>
</div>

<div class="container">
    <!-- Comments Header -->
    <div class="comments-header">
      <span>Số lượng bình luận: <?=$count_binhluan?></span>
      <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-funnel"></i> Lọc
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="filterDropdown">
          <li>
            <a class="dropdown-item" href="index.php?page=danhgia&sort=sortByStar">
              <i class="bi bi-sort-numeric-down-alt"></i> Đánh giá theo sao
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="index.php?page=danhgia&sort=sortByDate">
              <i class="bi bi-calendar2-date"></i> Gần đây
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <?=$html_binhluan;?>
</div>

<style>
  a{
    text-decoration: none;
    color: black;
    transition: 0.3s ease;
  }
  a:hover{
    color: red; 
  }
  .comments-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .comments-header span {
      font-size: 18px;
      font-weight: bold;
      color: #333;
    }

    .dropdown-toggle {
      border: none;
      background-color: #f8f9fa;
      transition: background-color 0.3s ease;
    }

    .dropdown-toggle:hover {
      background-color: #e9ecef;
    }

    .dropdown-menu {
      min-width: 220px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .dropdown-item {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    .dropdown-item:hover {
      background-color: #f1f1f1;
    }

    .dropdown-item i {
      font-size: 20px;
      color: #007bff;
    }
</style>

