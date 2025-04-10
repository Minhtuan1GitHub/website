<?php
  if (isset($_SESSION['session_user']) && (count($_SESSION['session_user'])>0)){
    extract($_SESSION['session_user']);

  }

  $html_breadcrumb = '';
  $html_breadcrumb .='<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href="index.php?page=member">Thông tin</a></li>
                      <li class="breadcrumb-item"<a href="index.php?page=member">Cập nhật mật khẩu</a></li>

                      ';

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

        <a href="index.php?page=changePassword" class="forget">Thay đổi mật khẩu </a>

        <a href="index.php?page=logout" class="exit" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không?')">Đăng xuất</a>

    </div>  
        <div class="col">
          <div style="display: flex;border-bottom: 1px solid black; padding-bottom: 15px">
            <h4 class="col-5">Cập nhật mật khẩu</h4>
            <?php 
              if (isset($_SESSION['tb_xacthuc']) &&  ($_SESSION['tb_xacthuc'] !="")){
                echo "<h2 class ='col alert ' style='font-size: 24px; padding: 0px; color: red; justify-content: center; display: flex' id = 'myAlert'>".$_SESSION['tb_xacthuc']."</h2>";
                unset($_SESSION['tb_xacthuc']);
              }
            ?>
          </div>

          <form action="index.php?page=updatepassword" method="post">
            <table class="table ">
                <tr>
                  <td><label for="password">Mật khẩu hiện tại</label></td>
                  <td>
                    <div class="input-group" >
                      <input type ="password" name="password" placeholder="Nhập mật khẩu hiện tại"  style="width: 80% ;border: none;" id="pass">
                      <span class="input-group-text">
                        <i class="bi bi-eye-slash" id="hienthi0" onclick="nhapvao0()"></i>
                      </span>
                    </div>  
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="newPassword">Mật khẩu mới</label>
                  </td>
                  <td>
                    <div class="input-group">
                      <input type="password" name="newPassword" style="width: 80%; border: none" placeholder="Nhập mật khẩu mới" id="newPass">
                      <span class="input-group-text">
                        <i class="bi bi-eye-slash" id="hienthi1" onclick="nhapvao1()"></i>
                      </span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="confirmNewPassword">Xác nhận mật khẩu mới</label>
                  </td>
                  <td>
                    <div class="input-group">
                      <input type="password" name="confirmNewPassword" style="border: none; width: 80%" placeholder="Nhập lại mật khẩu mới" id="comfirmNewPass">
                      <span class="input-group-text">
                        <i class="bi bi-eye-slash" id="hienthi2" onclick="nhapvao2()"></i>
                      </span>
                      
                    </div>
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

  input:focus[type="password"]{
      box-shadow: none !important;
      outline: none !important;
  }
  .input-group{
    justify-content: space-between;
  }
  .input-group-text{
    border: none !important;
    background: none;


  }
  .thoat{
    margin-bottom: 10px;
    display: flex;
    align-items: start;
    justify-content: end;
    flex-direction: column;
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
    padding: 0px 5px;
    color: black;
    transition: 0.3s ease;
    border-radius: 100px;
  }
  .exit:hover{
    background: black;
    color: white;
    font-weight: bold;
  }
  a{
    text-decoration: none;
    color: black;
  }
  a:hover{
    color: red;
    font-weight: bold;
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

</style>

<script>
  var x = true;
  var hienthi0 = document.getElementById('hienthi0');
  var hienthi1 = document.getElementById('hienthi1');
  var hienthi2 = document.getElementById('hienthi2');

  function nhapvao0(){
    if (x){
      document.getElementById('pass').type = "text";
      hienthi0.classList.remove('bi-eye-slash');
      hienthi0.classList.add('bi-eye');
      x = false;
    }else{
      document.getElementById('pass').type = "password";
      hienthi0.classList.remove('bi-eye');
      hienthi0.classList.add('bi-eye-slash');
      x = true;
    }
  }
  
  function nhapvao1(){
    if (x){
      document.getElementById('newPass').type = "text";
      hienthi1.classList.remove('bi-eye-slash');
      hienthi1.classList.add('bi-eye');
      x = false;
    }else{
      document.getElementById('newPass').type = "password";
      hienthi1.classList.remove('bi-eye');
      hienthi1.classList.add('bi-eye-slash');
      x = true;
    }
  }
  function nhapvao2(){
    if (x){
      document.getElementById('comfirmNewPass').type = "text";
      hienthi2.classList.remove('bi-eye-slash');
      hienthi2.classList.add('bi-eye');
      x = false;
    }else{
      document.getElementById('comfirmNewPass').type = "password";
      hienthi2.classList.remove('bi-eye');
      hienthi2.classList.add('bi-eye-slash');
      x = true;
    }
  }

  setTimeout(function(){
    let alertEle = document.getElementById("myAlert");
    if (alertEle){
      alertEle.style.display="none";
    } 
  },3000);
</script>
