<?php
  function showProductColumn($productList) {
    echo '<div class="col-2">';
    foreach ($productList as $sp) {
      extract($sp);
      echo '
        <a href="index.php?page=sanphamchitiet&idpro=' . $id . '">
          <div class="card">
            <div class="card-header">
              <img src="layout/images/outerwear/' . $img . '" alt="' . $name . '" class="card-img">
            </div>
            <div class="card-body">
              <h2 class="card-title">' . $dm_name . '</h2>
              <p class="card-price">Price: <span>' . $price . 'k</span></p>
            </div>
          </div>
        </a>';
    }
    echo '</div>';
  }
?>