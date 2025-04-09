<?php
  if (isset($_SESSION['session_user']) && (count($_SESSION['session_user'])>0)){
    extract($_SESSION['session_user']);
 
  }

  $html_breadcrumb = '';
  $html_breadcrumb .='<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item active"aria-current="page">Thông tin</li>

                      ';
?>

<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 0px">
      
      <ol class="breadcrumb">
        <?=$html_breadcrumb;?>
      </ol>
</nav>

<div class="container" style="margin-top: 0px;">
    <div class="row">
      <div class="col-2 thoat ">

        <a href="index.php?page=changePassword" class="forget">Thay đổi mật khẩu </a>
        
        <a href="index.php?page=logout" class="exit">Đăng xuất</a>

      </div>
      <div class="col-10">
          <div class="row" style="display: flex;border-bottom: 1px solid black; padding-bottom: 15px;">
              <h4 class="col-5">Thông tin của bạn</h4>
              <?php
                if (isset($_SESSION['tb_xacthuc']) && ($_SESSION['tb_xacthuc'])){
                  echo "<h2 class ='col alert ' style='font-size: 24px; padding: 0px; color: green; justify-content: center; display: flex' id = 'myAlert'>".$_SESSION['tb_xacthuc']."</h2>";
                  unset($_SESSION['tb_xacthuc']);
                }
                if (isset($_SESSION['tb_dangnhap']) && ($_SESSION['tb_dangnhap'])){
                  echo "<h2 class ='col alert ' style='font-size: 24px; padding: 0px; color: green; justify-content: center; display: flex' id = 'myAlert'>".$_SESSION['tb_dangnhap']."</h2>";
                  unset($_SESSION['tb_dangnhap']);
                } 
              ?>
          </div>
          <form action="index.php?page=updateuser" method="post">
            <table class="table ">
                <tr>
                  <td><label for="email">Email</label></td>
                  <td><input type ="email" name="email" placeholder="Nhập email" value="<?=$email?>" style="width: 100%; border: none"></td>
                </tr>
                <tr>
                  <td><label for="password">Mật khẩu</label></td>
                  <td>
                    <div class="input-group">
                      <input type ="password" name="password" placeholder="password" value="<?=$password?>" style="width: 94.5%; border: none" readonly> <!-- redonly khoa mat khau, nhung van co the submit-->
                      <span class="input-group-text" style="background: transparent; border: transparent">
                        <i class="bi bi-eye-slash" id="conmat" onclick="nhanvao()"></i>
                      </span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><label for="name">Tên</label></td>
                  <td><input type ="text" name="name" placeholder="Nhập tên" value="<?=$ten?>" style="width: 100%; border: none"></td>
                </tr>
                <tr>
                  <td><label for="district">Địa chỉ</label></td>
                  <td><input type ="text" name="district" placeholder="Nhập địa chỉ" value="<?=$diachi?>" style="width: 100%; border: none"></td>
                </tr>
                <tr>
                  <td><label for="phone">Số điện thoại</label></td>
                  <td><input type ="text" name="phone" placeholder="Nhập số điện thoại" value="<?=$dienthoai?>" style="width: 100%; border: none"></td>
                </tr>
                <tr>
                  <td><label for="date">Ngày sinh</label></td>
                  <td><input type ="date" name="date" placeholder="Nhập ngày sinh" value="<?=$sinhnhat?>" style="width: 100%; border: none"></td>
                </tr>
                <tr>
                  <td><label for="gender">Giới tính</label></td>
                  <td>
                    <input type ="text" name="gender" placeholder="Nhập giới tính" value="<?=$gioitinh?>" style="width: 100%; border: none">
                  </td>
                </tr>
            </table>
            <div style="display: flex; justify-content: end; margin-bottom: 10px">
              <input type="hidden" name = "id_user" value="<?=$id_user?>">
              <input type="submit" name="capnhat" value="Cập nhật" class="capnhat">
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
  .forget:hover{
    background: black;
    color: white;
  }
  .capnhat{
    background: transparent;
    border: 1px solid black;
    border-radius: 100px;
    transition: 0.3s ease;
  }
  .capnhat:hover{
    background: black;
    color: white;
  }
  .exit{
    text-decoration: none;
    border: 1px solid black;
    padding: 0px 5px;
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

    // if (password.length < 8){
    //   e.preventDefault();
    //   alert('Mật khẩu phải có ít nhất 8 kí tự');
    // }else if (!kituhoa.test(password)){
    //   e.preventDefault();
    //   alert("Mật khẩu phải có ít nhất một chữ cái viết hoa")
    // }else if (!kitudacbiet.test(password)){
    //   e.preventDefault();
    //   alert("Mật khẩu ít nhất phải có một kí tự đặc biệt");
    // }

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