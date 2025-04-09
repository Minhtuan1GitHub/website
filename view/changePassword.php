<?php
  if (isset($_SESSION['session_user']) && (count($_SESSION['session_user'])>0)){
    extract($_SESSION['session_user']);

  }

?>

<div class="container" style="margin-top: 100px;">
    <div class="row">
      <div class="col thoat ">

        
        <a href="index.php?page=logout" class="exit">Đăng xuất</a>

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

<!-- <script>
  document.querySelector('form').addEventListener('submit',function(e){
    const password = document.querySelector('input[name="password"]').value;
    const gender = document.querySelector('input[name="gender"]').value;
    const email = document.querySelector('input[name="email"]').value;
    const date = document.querySelector('input[name="date"]').value;


    var kituhoa = /[A-Z]/;
    var kitudacbiet = /[!@#$%^&*(),.?":{}|<>]|[_]/;

    if (password.length < 8){
      e.preventDefault();
      alert('Mật khẩu phải có ít nhất 8 kí tự');
    }else if (!kituhoa.test(password)){
      e.preventDefault();
      alert("Mật khẩu phải có ít nhất một chữ cái viết hoa")
    }else if (!kitudacbiet.test(password)){
      e.preventDefault();
      alert("Mật khẩu ít nhất phải có một kí tự đặc biệt");
    }

    if (gender != 'Nam' && gender != 'Nữ' && gender != 'Nu' && gender !=''){
      e.preventDefault();
      alert("Giới tính phải là nam hoặc nữ");
    }

    if (date === ""){
      e.preventDefault();
      alert("Vui lòng nhập ngày sinh");
    }
      
  });
</script> -->