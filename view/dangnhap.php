<?php
    $html_breadcrumb = '';
    $html_breadcrumb .='<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"aria-current="page">Đăng nhập</li>
  
                        ';
?>
<link rel="stylesheet" href="layout/css/dangky.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 0px">
      
      <ol class="breadcrumb">
        <?=$html_breadcrumb;?>
      </ol>
</nav>

<div class="container" style="margin-top: 0px;">
    <!-- <div class="row" style="display: flex; border-bottom: 1px solid black"> -->
      <h4 style=" padding-bottom: 10px; border-bottom: 1px solid black">Đăng nhập</h4>
      <?php 
        if (isset($_SESSION['tb_dangnhap']) &&  ($_SESSION['tb_dangnhap'] !="")){
          echo "<h2 class ='alert' style='font-size: 24px; padding: 0px; color: red' id = 'myAlert'>".$_SESSION['tb_dangnhap']."</h2>";
          unset($_SESSION['tb_dangnhap']);
        }
      ?>
    <!-- </div> -->

 

    <div class="row">
      <div class="col">
        <form action="index.php?page=login" style="display: flex; flex-direction: column;" method="post" class="form-dangky">
          <div>
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="xxx@tumishop.com" name="email">
          </div>
          <div class="form-password">
            <label for="password" class="form-label">Mật khẩu</label>
            <div class="input-group">
              <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password">
              <span class="input-group-text" >
                <i class="bi bi-eye-slash" class="eye-icon" id="hienpass" onclick="nhanvao1()"></i>
              </span>
            </div>
          </div>
          <div class="quenmatkhau" style="margin-top: 10px; display: flex; justify-content: end;">
            <a href="index.php?page=quenmatkhau" class="quenmatkhau">Quên mật khẩu</a>

          </div>
          <div class="container-btn-dangnhap">
            <input class="btn-dangnhap" type="submit" value="Đăng nhập" name="dangnhap" class="btn-dangky">
          </div>
        </form>
      </div>
      <div class="col" style="display: flex; flex-direction: column;">
        <h4>Tạo tài khoản</h4>
        <a href="index.php?page=dangky" class="btn-taotk">Tạo tài khoản</a>
        <span>Thanh toán đơn giản và đăng ký miễn phí ngay hôm nay</span>
        <span>Tạo một tài khoản và nhận mã giảm giá</span>
      </div>
    </div>

  </div> 
<style>
  .btn-taotk{
    text-decoration: none;
    border: 1px solid black; 
    padding: 10px; 
    width: 30%; 
    border-radius: 100px; 
    border: 1px solid black; 
    background: transparent; 
    color: black; 
    text-align: center;
    transition: 0.3s ease;
  }
  .btn-taotk:hover{
    background: black;
    color: white;
    border: 1px solid white;
  }
  .quenmatkhau{
    text-decoration: none;
    color: black;
  }
  .btn-dangnhap{
    width: 30%;
    padding: 10px;
    border-radius: 100px;
    border: 1px solid black;
    background: transparent;
    transition: 0.3s ease;
  }
  .btn-dangnhap:hover{
    background: black;
    color: white;
  }
  .container-btn-dangnhap{
    display: flex;
    justify-content: center;
  }
  a{
    text-decoration: none;
    color: black;
    transition: 0.3s ease;
  }
  a:hover{
    color: red;
  }

</style>

<script src="layout/javascript/dangky.js"></script>
