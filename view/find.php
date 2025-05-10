<?php 
  $html_taikhoan='';
  if (isset($_SESSION['session_user']) && count($_SESSION['session_user'])>0){
    extract($_SESSION['session_user']);
    $html_taikhoan .='<a href = "index.php?page=member"><i class="bi bi-person-check fs-3"></i></a>';
  }else{
    $html_taikhoan .='<a href="index.php?page=dangnhap"><i class="bi bi-person fs-3"></i></a>';
  } 
?>
 
<div class="container-fluid fixed-bottom d-flex flex-column" style="background: white; ">

    <form action="index.php?page=<?=$_GET['page']?>" method="post" class="container input-group mb-3 mt-2">
      <input type="text" class="form-control" name="keyword" placeholder="Search by keyword" aria-label="Recipient's username" aria-describedby="button-addon2" style="height: 50px; border-top-left-radius: 50px; border-bottom-left-radius: 50px; border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: none;" >
      <input type="submit" name = "find" style="background: transparent; border: none; border-top: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black; border-top-right-radius: 50px; border-bottom-right-radius: 50px" value="Search">  
    </form>

  <div class="container d-flex justify-content-evenly mb-3">
    <a href="index.php"><i class="bi bi-house fs-3"></i></a>
    <a href="index.php"><i class="bi bi-x-lg fs-1"></i></i></a>
    <?=$html_taikhoan;?>
  </div>
</div>

<style>

  .form-control:focus{
    box-shadow: none !important;
  }
  
</style>
