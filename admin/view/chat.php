<?php
  $html_danhsachbinhluan .= '';
  
?>
<main id="main">

<div class="container mt-5" style="background: #f7f9fd;">
    <h3 class="mb-4">Danh sách khách hàng</h3>
    <table class="table table-bordered table-hover">
      <thead class="table-light">
        <tr>
          <th>Id</th>
          <th>Tên khách hàng</th>
          <th>Tin nhắn cuối</th>
          <th>Thời gian</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($customers as $customer): ?>
          <tr>
            <td><?= $customer['id_user']; ?></td>
            <td><?= $customer['user_name']; ?></td>
            <td><?= $customer['content']; ?></td>
            <td><?= $customer['created_at']; ?></td>
            <td class="col-1 text-center">

                      <?=$html_danhsachbinhluan;?>
 

              <form action="index.php?page=danhsachtinnhan" method="post">
                <input type="hidden" value="<?=$customer['id_user']?>" name="id_customer">
                <button class="btn btn-primary">
                  Xem
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  </main>
