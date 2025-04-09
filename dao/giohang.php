<?php
  function get_tongdonhang(){
    $tong = 0;
    foreach ($_SESSION['giohang'] as $sp) {
      extract($sp);
      $tt = (Int)(($price_sale==0)?$price:$price_sale) * (Int)$soluong; //tong tien
      $tong +=$tt;
    }
    return $tong;
  }

  
?>