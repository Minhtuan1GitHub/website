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

      <h4 style=" padding-bottom: 10px; border-bottom: 1px solid black">Đăng nhập</h4>
      <?php 
        if (isset($_SESSION['tb_dangnhap']) &&  ($_SESSION['tb_dangnhap'] !="")){
          echo "<h2 class ='alert' style='font-size: 24px; padding: 0px; color: red' id = 'myAlert'>".$_SESSION['tb_dangnhap']."</h2>";
          unset($_SESSION['tb_dangnhap']);
        }
      ?>


 

    <div class="row mt-3">
      <!-- <div class="col card" > --> 
          <form action="index.php?page=login" style="display: flex; flex-direction: column;" method="post" class="form-dangky col card">
              <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="xxx@tumishop.com" name="email">
              </div>
              <div class="form-password">
                <label for="password" class="form-label">Mật khẩu</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password">
                  <span class="input-group-text" style="background-image: conic-gradient(white)">
                    <i class="bi bi-eye-slash" class="eye-icon" style="color: black; font-weight: bold" id="hienpass" onclick="nhanvao1()"></i>
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
      <!-- </div> -->
      <div class="col" style="display: flex; flex-direction: column;">
        <h4>Tạo tài khoản</h4>
        <a href="index.php?page=dangky" class="btn-taotk">Tạo tài khoản</a>
        <span>Thanh toán đơn giản và đăng ký miễn phí ngay hôm nay</span>
        <span>Tạo một tài khoản và nhận mã giảm giá</span>
      </div>
    </div>

  </div> 



<style>

  .card{
    /* padding: 2em; */
    position: relative;
    /* width: 40px; */
    padding: 60px;
    background: black;
    color: white;
  }
@property --angle{
  syntax: "<angle>";
  initial-value: 0deg;
  inherits: false;
}
  .card::after, .card::before{
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    top: 50%;
    left: 50%;
    translate: -50% -50%;
    z-index: -1;
    width: calc(100% + 10px);
    height: calc(100% + 10px);
    border-radius: 10px;
    background-image: conic-gradient(from var(--angle), red, blue,#00ff99, #006aff,#ff0095, red );
    animation: 3s spin linear infinite;
  }
  .card::before{
    filter: blur(1.5rem);
    opacity: 0.5;
  }
@keyframes spin{
  from{
    --angle: 0deg;
  }to{
    --angle: 360deg;
  }
}
.form-control{
  background: white;
  border: 1px solid white;
}
.form-control:focus{
  background: white;
  border: 1px solid white;
}

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
    color: white;
  }
  .btn-dangnhap{
    width: 30%;
    padding: 10px;
    border: 2px solid transparent;
    border-image: conic-gradient(red, blue,#00ff99, #006aff,#ff0095, red) 1;
    background: transparent;
    transition: 0.3s ease;
    color: white;
    font-weight: bold;
  }
  .btn-dangnhap:hover{
    border: 1px solid transparent;
    /* color: ; */
    background: white;
    color: black;
    border-radius: 100px;
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
  /* .card{
    position: relative;
    border-radius: 14px;
    z-index: 1111;
    overflow: hidden;
    box-shadow: 20px 20px 60px #bebebe, -20px -20px 60px #ffffff;

  }
  .bg{
    position: absolute;
    top: 5px;
    left: 5px;
    width: 1000px;
    z-index: 2;
    background: rgba(255, 255, 255, .95);
    width: 90%;
    height: 90%;
  }
  .form-dangky{
    position: absolute;
    z-index: 1;
  } */
  

</style>

<script src="layout/javascript/dangky.js"></script>
