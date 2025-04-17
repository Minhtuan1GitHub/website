<?php
  $html_breadcrumb = '';
  $html_breadcrumb .='<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item active"aria-current="page">Đăng ký</li>

                      ';
?>


<link rel="stylesheet" href="layout/css/dangky.css">

<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 0px">
      
      <ol class="breadcrumb">
        <?=$html_breadcrumb;?>
      </ol>
</nav>

<div class="container" style="margin-top: 0px;">
    <h4 style="border-bottom: 1px solid black; padding-bottom: 10px">Đăng ký</h4>
    <div class="row">
      <div class="col">
        <!-- form dang ky -->
        <form action="index.php?page=adduser" method="post" class="form-dangky">

          <div class="form-email">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="xxx@tumishop.com" name="email">
            <?php echo $alert?>
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

          <div class="form-confirmpassword">
            <label for="password" class="form-label">Xác nhận mật khẩu</label>
            <div class="input-group">
              <input type="password" class="form-control" id="confirmpassword" placeholder="Nhập mật khẩu" name="confirmpassword">
              <span class="input-group-text" id="togglePassword">
                <i class="bi bi-eye-slash" class="eye-icon" id="hienpass2" onclick="nhanvao2()"></i>
              </span>
            </div>
          </div>

          <div class="container-btn-dangnhap">
            <input class="btn-dangnhap" type="submit" name="dangky" value="Đăng ký">
          </div>

        </form>
      </div>
      <div class="col" style="display: flex; flex-direction: column;">
        <h4>Đã có tài khoản</h4>
        <a href="index.php?page=dangnhap" class="btn-taotk">Đăng nhập</a>
      </div>
    </div>
</div>


<style>
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
    margin-top: 20px;
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
