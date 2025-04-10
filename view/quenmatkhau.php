

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php
  $html_breadcrumb = '';
  $html_breadcrumb .='<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item active"aria-current="page">Quên mật khẩu</li>

                      ';
?>


<link rel="stylesheet" href="layout/css/dangky.css">

<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 0px">
      
      <ol class="breadcrumb">
        <?=$html_breadcrumb;?>
      </ol>
</nav>
 


<div class="container" style="margin-top:0px;">
  <h4 style=" padding-bottom: 10px; border-bottom: 1px solid black">Quên mật khẩu</h4>
  <div class="row">
    <div class="col-6">
        <?php 
          if (isset($_SESSION['tb_dangnhap']) &&  ($_SESSION['tb_dangnhap'] !="")){
            echo "<h2 class ='alert' style='font-size: 24px; padding: 0px; color: red' id = 'myAlert'>".$_SESSION['tb_dangnhap']."</h2>";
            unset($_SESSION['tb_dangnhap']);
          }
        ?>

        <form action="index.php?page=forgetpassword" method = "post">
          <label for="" class="form-label">Nhập email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="xxx@tumishop.com" value="<?php echo $email;?>">
          <div style="display: flex; justify-content: center; margin-top: 10px;">
            <!-- <button class="yeucau" type="submit" value="nutgui" name="nutguiyeucau">Gửi yêu cầu</button> -->
            <input type="submit" class="yeucau" name="nutguiyeucau" value="Gui">
          
          </div>
        </form>

    </div> 
    <div class="col-6"  style="display: flex; flex-direction: column;">
      <?php
        if (isset($_SESSION['tb']) &&($_SESSION['tb'])){
          echo $_SESSION['tb'];
          unset($_SESSION['tb']);
        }
      ?>
        <h4>Tạo tài khoản</h4>
        <a href="index.php?page=dangky" class="btn-taotk">Tạo tài khoản mới</a>
        <span>Thanh toán đơn giản và đăng ký miễn phí ngay hôm nay</span>
        <span>Tạo một tài khoản và nhận mã giảm giá</span>
    </div>
  </div>
</div>

<style>
  .yeucau{
    background: none;
    border: 1px solid black;
    border-radius: 100px;
    transition: 0.3s ease;
    padding: 10px;
    width: 30%;
  }
  .yeucau:hover{
    background: black;
    color: white;
    font-weight: bold;
  }
  .alert{
    border-radius: 0px;
    margin-top: 11px;
  }
  a{
    text-decoration: none;
    color: black;
    transition: 0.3s ease;
  }
  a:hover{
    color: red;
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
</style>
<script src="layout/javascript/dangky.js"></script>
