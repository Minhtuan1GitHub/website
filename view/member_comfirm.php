<?php
  if (isset($_SESSION['session_user']) && (count($_SESSION['session_user'])>0)){
    extract($_SESSION['session_user']);
    $user_info = get_user($id_user);
    $_SESSION['session_user'] = $user_info;
    extract($user_info);
  } 
  $html_breadcrumb = '';
  $html_breadcrumb .='<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                      <li class="breadcrumb-item"><a href="index.php?page=menber">Thông tin</a></li>
                      <li class="breadcrumb-item"<a href="index.php?page=member">Cập nhật thông tin</a></li>

                      ';
 
?>




<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 0px">
      
      <ol class="breadcrumb">
        <?=$html_breadcrumb;?>
      </ol>
</nav>
<div class="container" style="margin-top: 0px;">
<!-- <h4 style="border-bottom: 1px solid black; padding-bottom: 10px">Cập nhật thông tin</h4> -->

    <div class="row">
    <div class="col-2 thoat" style="gap: 30px">

        <a href="index.php?page=chuyenkhoan" class="forget">Đơn hàng của bạn</a>

        <a href="index.php?page=changePassword" class="forget">Thay đổi mật khẩu </a>

        <a href="index.php?page=logout" class="exit" onclick="return confirm('Bạn có chắc chắn muốn đăng xuất không?')">Đăng xuất</a>

    </div>

      <div class="col">
        <h4 style="border-bottom: 1px solid black; padding-bottom: 15px">Cập nhật thông tin</h4>

        <table class="table table-bordered">
          <tr>
          <th>Email</th>
          <td><?=$email?></td>
          </tr>
          <tr>
          <th>Tên</th>
          <td><?=$ten?></td>
          </tr>
          <tr>
          <th>Địa chỉ</th>
          <td><?=$diachi?></td>
          </tr>
          <tr>
          <th>Số điện thoại</th>
          <td><?=$dienthoai?></td>
          </tr>
          <tr>
          <th>Ngày sinh</th>
          <td><?=$sinhnhat?></td>
          </tr>
          <tr>
          <th>Giới tính</th>
          <td><?=$gioitinh?></td>
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

  a{
    color: black;
    text-decoration: none;
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