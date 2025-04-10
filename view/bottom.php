<?php 
  $html_taikhoan='';
  if (isset($_SESSION['session_user']) && count($_SESSION['session_user'])>0){
    extract($_SESSION['session_user']);
    $html_taikhoan .='<a href = "index.php?page=member"><i class="bi bi-person-check fs-3"></i></a>';
  }else{
    $html_taikhoan .='<a href="index.php?page=dangnhap"><i class="bi bi-person fs-3"></i></a>';
  } 
?>


<div class="container-fluid">
    <div class="container fixed-bottom d-flex justify-content-evenly mb-3 ">
      <a href="index.php"><i class="bi bi-house fs-3" style="padding: 5px 7px;"></i></a>
      <a href="index.php?page=men"><i class="bi bi-search fs-2" style="padding: 7px 9px;"></i></a>
      <?=$html_taikhoan;?>
      <!-- <a href="index.php?page=dangnhap"><i class="bi bi-person fs-3" style="padding: 5px 7px;"></i></a> -->
    </div>
  </div>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="layout/javascript/home.js"></script>
</body>

</html>
