<?php
function get_tongdonhang() {
  $tong = 0;
  if (isset($_SESSION['session_user']) && count($_SESSION['session_user']) > 0) {
      $user = $_SESSION['session_user']['id_user'];
      if (isset($_SESSION['giohang'][$user]) && !empty($_SESSION['giohang'][$user])) {
          foreach ($_SESSION['giohang'][$user] as $sp) {
              extract($sp);
              $tt = (int)(($price_sale == 0) ? $price : $price_sale) * (int)$soluong;
              $tong += $tt;
          }
      }
  }
  return $tong;
}
  
?>