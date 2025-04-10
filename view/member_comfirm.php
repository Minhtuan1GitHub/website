<?php
  if (isset($_SESSION['session_user']) && (count($_SESSION['session_user'])>0)){
    extract($_SESSION['session_user']);
    $user_info = get_user($id_user);
    $_SESSION['session_user'] = $user_info;
    extract($user_info);
  } 

?>

<div class="container" style="margin-top: 100px;">
<h4 style="border-bottom: 1px solid black; padding-bottom: 10px">Cập nhật thông tin</h4>

    <div class="row">
      <div class="col">
        
        <a href="index.php?page=logout">Exit</a>        

      </div>
      <div class="col">
          <table class="table ">
              <tr>
                <td><label for="email">Email</label></td>
                <td><?=$email?></td>
              </tr>
              <tr>
                <td><label for="name">Tên</label></td>
                <td><?=$ten?></td>
              </tr>
              <tr>
                <td><label for="district">Địa chỉ</label></td>
                <td><?=$diachi?></td>
              </tr>
              <tr>
                <td><label for="phone">Số điện thoại</label></td>
                <td><?=$dienthoai?></td>
              </tr>
              <tr>
                <td><label for="date">Ngày sinh</label></td>
                <td><?=$sinhnhat?></td>
              </tr>
              <tr>
                <td><label for="gender">Giới tính</label></td>
                <td><?=$gioitinh?>  </td>
              </tr>
          </table>

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

</style>