<?php
    echo '<pre>';
    print_r($_SESSION);
    print_r($_POST);
    echo '</pre>';  
 
    $html_binhluan = '';
    foreach ($danhsachbinhluan as $binhluan) {
      extract($binhluan);
      $html_binhluan .='
      
        <div style="border-bottom: 1px solid black; margin-bottom: 20px; padding-bottom: 10px">
          <div style="display: flex; justify-content: space-between"> 
            <div style = "font-weight: bold ">
              '.$nickname.'
            </div>
            <div>
              '.$date.'
            </div>
          </div>

          <div>
            <div>
              ';
              if ($binhluan['sao']<2){
                $html_binhluan .='<i class="bi bi-star-fill"></i>';
              }else if ($binhluan['sao']<3){
                $html_binhluan .='<i class="bi bi-star-fill"></i>';
                $html_binhluan .='<i class="bi bi-star-fill"></i>';
              }else if ($binhluan['sao']<4){
                $html_binhluan .='<i class="bi bi-star-fill"></i>';
                $html_binhluan .='<i class="bi bi-star-fill"></i>';
              }else{
                $html_binhluan .='<i class="bi bi-star-fill"></i>';
                $html_binhluan .='<i class="bi bi-star-fill"></i>';
                $html_binhluan .='<i class="bi bi-star-fill"></i>';
                $html_binhluan .='<i class="bi bi-star-fill"></i>';
                $html_binhluan .='<i class="bi bi-star-fill"></i>';
              }
            $html_binhluan .='</div>

            <div>
            <span>Đã mua size: '.$size.'</span> 
          </div>
            <div>
              <span>Đã mua màu: '.$color.'</span>
            </div>
          </div>
          <div style ="margin: 10px 0px">
          '.$noidung.'
          </div>
          <div style="display: flex; justify-content: end; gap: 10px">
          <div>
            '.$ten.'
          </div>
          <div>
          '.$age.'
          </div>
          <div>
          '.$diachi.'
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

<div class="container" style="display: flex; justify-content: space-between; margin-bottom: 10px">
  <span>Số lượng bình luận: <?=$count_binhluan?></span>
  <div class="dropstart">
  <a class="btn dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-funnel"></i>
  </a>

  <ul class="dropdown-menu">
    <li>
      <a class="dropdown-item" href="index.php?page=danhgia&sort=sortByStar">
        <i class="bi bi-sort-numeric-down-alt"></i>
        Đánh giá theo sao
      </a>
    </li>
    <li>
      <a class="dropdown-item" href="index.php?page=danhgia&sort=sortByDate">
        <i class="bi bi-calendar2-date"></i>
        Gần đây
      </a>
    </li>
  </ul>
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
</style>

