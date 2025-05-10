<?php
  // echo '<pre>';
  // print_r($_SESSION);
  // print_r($_POST);
  // echo '</pre>';
  if (isset($_SESSION['session_user']) && (count($_SESSION['session_user'])>0)){
    extract($_SESSION['session_user']);
 
  }

  $html_breadcrumb = '';
  $html_breadcrumb .='<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item"<a href="index.php?page=member">Thông tin</a></li>

                      ';
  // extract($taikhoan);
?>

<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 0px">
      
      <ol class="breadcrumb">
        <?=$html_breadcrumb;?>
      </ol>
</nav>

<div class="container" style="margin-top: 0px;">
  <div class="row">
    <div class="col-2 thoat" style="gap: 30px">
      <a href="index.php?page=chuyenkhoan" class="forget">Đơn hàng của bạn</a>
      <a href="index.php?page=changePassword" class="forget">Thay đổi mật khẩu</a>
      <a href="index.php?page=logout" class="exit" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không?')">Đăng xuất</a>
    </div>
    <div class="col-10">
      <div class="row" style="display: flex; border-bottom: 1px solid black; padding-bottom: 15px;">
        <div class="d-flex justify-content-between">
          <h4 class="col-5">Thông tin của bạn</h4>
          <div style="border: 1px solid transparent; padding: 5px 15px; border-radius: 10px; background: <?php
            if ($_SESSION['session_user']['trangthai'] == 'Khóa') {
              echo 'red';
            } else {
              echo 'green';
            }
          ?>">
            <span style="color: white; font-weight: bold"><?=$_SESSION['session_user']['trangthai']?></span>
          </div>
        </div>
        <?php
        if (isset($_SESSION['tb_xacthuc']) && ($_SESSION['tb_xacthuc'])) {
          echo "<h2 class='col alert' style='font-size: 24px; padding: 0px; color: green; justify-content: center; display: flex' id='myAlert'>" . $_SESSION['tb_xacthuc'] . "</h2>";
          unset($_SESSION['tb_xacthuc']);
        }
        if (isset($_SESSION['tb_dangnhap']) && ($_SESSION['tb_dangnhap'])) {
          echo "<h2 class='col alert' style='font-size: 24px; padding: 0px; color: green; justify-content: center; display: flex' id='myAlert'>" . $_SESSION['tb_dangnhap'] . "</h2>";
          unset($_SESSION['tb_dangnhap']);
        }
        ?>
      </div>
      <form action="index.php?page=updateuser" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" placeholder="Nhập email" value="<?=$email?>">
            </div>
            <div class="form-group">
              <label for="password">Mật khẩu</label>
              <div class="input-group">
                <input type="password" name="password" class="form-control" style="border-right: transparent" placeholder="password" value="<?=$password?>" readonly>
                <span class="input-group-text" style="background: transparent; border-left: transparent">
                  <i class="bi bi-eye-slash" id="conmat" onclick="nhanvao()"></i>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label for="name">Tên</label>
              <input type="text" name="name" class="form-control" placeholder="Nhập tên" value="<?=$ten?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="district">Địa chỉ</label>
              <input type="text" name="district" class="form-control" placeholder="Nhập địa chỉ" value="<?=$diachi?>">
            </div>
            <div class="form-group">
              <label for="phone">Số điện thoại</label>
              <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="<?=$dienthoai?>">
            </div>
            <div class="form-group">
              <label for="date">Ngày sinh</label>
              <input type="date" name="date" class="form-control" placeholder="Nhập ngày sinh" value="<?=$sinhnhat?>">
            </div>
            <div class="form-group">
              <label for="gender">Giới tính</label>
              <input type="text" name="gender" class="form-control" placeholder="Nhập giới tính" value="<?=$gioitinh?>">
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-end my-2">
            <input type="hidden" name="id_user" value="<?=$id_user?>">
            <button type="submit" name="capnhat" class="btn btn-primary">Cập nhật</button>
        </div>
      </form>
    </div>
  </div>
</div>

<style>
  input:focus[type="email"],
  input:focus[type="text"],
  input:focus[type="date"],
  input:focus[type="password"] {
      box-shadow: none !important;
      outline: none !important;
  }
  .thoat{
    margin-bottom: 10px;
    display: flex;  
    align-items: center;
    justify-content: center;
    flex-direction: column;
  }
  .forget{
    text-decoration: none;
    border-radius: 100px;
    border: 1px solid black;
    padding: 0px 5px;
    color: black;

    margin-bottom: 5px;
    transition: 0.3s ease;

    width: 100%;
    text-align: center;
    
  }
  .forget, .exit, .capnhat{
    padding: 10px;
  }
  .forget:hover{
    background: black;
    color: white;
  }
  .capnhat{
    background: transparent;
    border: 1px solid black;
    border-radius: 100px;
    transition: 0.3s ease;
    width: 20%;
  }
  .capnhat:hover{
    background: black;
    color: white;
    font-weight: bold;
  }
  .exit{
    text-decoration: none;
    border: 1px solid black;
    /* padding: 0px 5px; */
    color: black;
    transition: 0.3s ease;
    border-radius: 100px;
    width: 100%;
    text-align: center;
  }
  .exit:hover{
    background: black;
    color: white;
  }
  a{
    text-decoration: none;
    color: black;
    transition: 0.3s ease;
  }
  a:hover{
    color: red;
    font-weight: bold;
  }
  .btn-primary {
      background-color: #007bff;
      border-color: #0056b3;
      color: white;
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
  }

  .btn-primary:hover {
      background-color: #0056b3;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }
</style>

<script>
  document.querySelector('form').addEventListener('submit',function(e){
    const password = document.querySelector('input[name="password"]').value;
    const gender = document.querySelector('input[name="gender"]').value;
    const email = document.querySelector('input[name="email"]').value;
    const date = document.querySelector('input[name="date"]').value;


    var kituhoa = /[A-Z]/;
    var kitudacbiet = /[!@#$%^&*(),.?":{}|<>]|[_]/;


    if (gender != 'Nam' && gender != 'Nữ' && gender != 'Nu' && gender !=''){
      e.preventDefault();
      alert("Giới tính phải là nam hoặc nữ");
    }

    if (date === ""){
      e.preventDefault();
      alert("Vui lòng nhập ngày sinh");
    }

  });

  function nhanvao(){
     alert("Không thể xem mật khẩu") ;
    }
  
  setTimeout(function(){
    let alertEle = document.getElementById("myAlert");
    if (alertEle){
      alertEle.style.display="none";
    } 
  },3000);



</script>