<?php
  // echo '<pre>';
  // print_r($_SESSION);
  // print_r($_POST);
  // echo '</pre>';


  $html_breadcrumb = '';
  $html_breadcrumb .= '<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href="index.php?page=member">Thông tin</a></li>
                      <li class="breadcrumb-item"><a href="index.php?page=chuyenkhoan">Đơn hàng của bạn</a></li>
  
                      <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>';


?>

<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 0px">
    <ol class="breadcrumb">
        <?php echo $html_breadcrumb; ?>
    </ol>
</nav>

<div class="container" style="margin-top: 0px; margin-bottom: 10px">
    <h4 style="padding-bottom: 10px; border-bottom: 1px solid black">Chi tiết đơn hàng</h4>
    <div class="row">
      <div class="col-12">
        <div class="row" style="font-weight: bold; border-bottom: 1px solid black; padding: 10px 0;">
          <div class="col">Hình ảnh</div>
          <div class="col">Tên</div>
          <div class="col">Giá</div>
          <div class="col">Số lượng</div>
          <div class="col">Màu sắc</div>
          <div class="col">Kích thước</div>
          <div class="col">Tổng</div>
      </div>

      <?php 
      foreach ($getchitiet as $ct): ?>
      <div class="row" style="padding: 8px 0; border-bottom: 1px solid #ccc;">
          <div class="col">
            <img src="layout/images/outerwear/<?=$ct['img']?>" alt="" style="width: 100px; height: 100p%; object-fit: cover;">
          </div>
          <div class="col"><?= $ct['name_item'] ?></div>
          <div class="col"><?=$ct['price']?></div>
          <div class="col"><?=$ct['soluong']?></div>
          <div class="col"><?=color($ct['color'])?></div>
          <div class="col"><?=size($ct['size'])?></div>
          <div class="col"><?=$ct['soluong'] * $ct['price']?></div>
      </div>
  <?php endforeach; ?>
        
        <div class="row">
          <div class="col"></div>
          <div class="col"></div>
          <div class="col"></div>
          <div class="col"></div>
          <div class="col"></div>
          <div class="col">Tổng tiền sản phẩm: </div>
          <div class="col"><?=$ct['tienbandau']?></div>
        </div> 
        <div class="row">
          <div class="col"></div>
          <div class="col"></div>
          <div class="col"></div>
          <div class="col"></div>
          <div class="col"></div>
          <div class="col">Giảm giá: <?php
                                        if ($ct['voucher']==6){
                                        ?>
                                        0
                                        <?php }else{
                                          ?>
                                          <?=$ct['voucher_giam']?>
                                        <?php }
                                    ?>
          %</div>
          <div class="col"><?=  $ct['tienbandau'] * $ct['voucher_giam']/100?></div>
        </div>
        <div class="row">
          <div class="col"></div>
          <div class="col"></div>
          <div class="col"></div>
          <div class="col"></div>
          <div class="col"></div>
          <div class="col">Thanh toán: </div>
          <div class="col"><?=$ct['tongtien']?></div>
        </div>
    </div>
      <div class="col-0">
        <div>
        </div>
      </div>
    </div>


</div>