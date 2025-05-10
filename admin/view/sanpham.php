<?php
  $html_getProduct = '';
  $stt = 0;

  foreach ($getProduct as $pr) {
    $stt += 1;
    extract($pr);

    if (isset($_GET['lock'])) {
      $html_getProduct .= '
        <tr>
          <td>'.$stt.'</td>
          <input type="hidden" value="'.$id_item.'" name="id_item[]">
          <input type="hidden" value="'.$id_size.'" name="id_size[]">
          <input type="hidden" value="'.$id_color.'" name="id_color[]">

          <td><img class="product-image" src="../layout/images/outerwear/'.$img.'" alt="Product Image"></td>
          <td>
            <input type="text" value="'.$size.'" class="form-control text-center">
          </td>
          <td><input type="text" value="'.$color.'" class="form-control text-center"></td>
          <td>
            <input type="text" value="'.$stock.'" class="form-control text-center" name="stock[]">          
          </td>
          <td><input type="text" value="'.number_format($price, 0, ',', '.').'" class="form-control text-center" name="price[]"></td>
          <td><input type="text" value="'.number_format($price_sale, 0, ',', '.').'" class="form-control text-center" name="price_sale[]"></td>
          <td>
            <input type="date" value="'.$limit_date_sale.'" class="form-control text-center" name="limit_date_sale[]">
          </td>
          <td class="text-center">
          <button style="border: none" name="luusanpham">
            <div>
              <div class="btn btn-success btn-sm">
                <i class="bi bi-check-circle"></i>
              </div>
            </div>
          </button>
          </td>
        </tr>
      ';
    } else {
      $html_getProduct .= '
        <tr>
          <td>'.$stt.'</td>
          <td><img class="product-image" src="../layout/images/outerwear/'.$img.'" alt="Product Image"></td>
          <td>'.$size.'</td>
          <td>'.$color.'</td>
          <td>'.$stock.'</td>
          <td>'.number_format($price, 0, ',', '.').' ₫</td>
          <td>'.number_format($price_sale, 0, ',', '.').' ₫</td>
          <td>'.$limit_date_sale.'</td>
          <td>
            <a href="index.php?page=xoasanpham&id='.$id_item.'&id_color='.$id_color.'&id_size='.$id_size.'" onclick="return confirmDelete()" class="btn btn-danger btn-sm" title="Xóa">
              <i class="bi bi-trash"></i>
            </a>
          </td>
        </tr>
      ';
    }
  }

  $html_sapxep = '';
  foreach ($sapxepdanhmuc as $sx) {
    extract($sx);
    $html_sapxep .= '
      <li><a class="dropdown-item" href="index.php?page=sanpham&sort=sortBy'.$id_phanloai.'">'.ucfirst($name_phanloai).'</a></li>
    ';
  }
?>
<main id="main">
<?php
  
  echo "<pre>";
  print_r($_FILES['img-item']);
  echo "</pre>";
?>
  <div class="container py-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="fw-bold text-primary">Danh sách sản phẩm</h3>
      <div class="dropdown">
        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Sắp xếp
        </button>
        <ul class="dropdown-menu">
          <?=$html_sapxep;?>
        </ul>
      </div>
    </div>

    <!-- Add Product Button -->
    <div class="text-end mb-4">
      <div class="dropdown">
        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Thao tác
        </button>
        <ul class="dropdown-menu">
          <li class="mb-3">
            <a href="index.php?page=themsanpham" class="dropdown-item d-flex align-items-center">
              <i class="bi bi-plus-circle-dotted me-2"></i>
              <span>Thêm Sản Phẩm</span>
            </a>
          </li>
          <li>
            <a href="index.php?page=themitem" class="dropdown-item d-flex align-items-center">
              <i class="bi bi-plus me-2"></i>
              <span>Thêm item</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Table -->
    <form action="index.php?page=luusanpham" method="post">
      <div class="table-responsive shadow-sm rounded">
        <table class="table table-bordered table-hover align-middle">
          <thead class="table-primary">
            <tr>
              <th>STT</th>
              <th>HÌNH ẢNH</th>
              <th>KÍCH THƯỚC</th>
              <th>MÀU SẮC</th>
              <th>TỒN KHO</th>
              <th>GIÁ</th>
              <th>GIÁ GIẢM</th>
              <th>GIẢM ĐẾN</th>
              <th class="text-center">
                <?php
                  if (isset($_GET['lock'])) {
                    echo '<a href="index.php?page=sanpham" class="ms-2 text-decoration-none text-success"><i class="bi bi-unlock fs-5"></i></a>';
                  } else {
                    echo '<a href="index.php?page=sanpham&lock" class="ms-2 text-decoration-none text-danger"><i class="bi bi-lock fs-5"></i></a>';
                  }
                ?>
              </th>
            </tr>
          </thead>
          <tbody>
            <?=$html_getProduct;?>
          </tbody>
        </table>
      </div>
    </form>
  </div>
</main>

<style>
  /* General Styles */
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    color: #333;
  }

  h3 {
    color: #007bff;
  }

  /* Table Styling */
  table {
    text-align: center;
    border-color: #dee2e6;
  }

  table thead tr {
    background-color: #007bff;
    color: white;
  }

  table tbody tr:nth-child(odd) {
    background-color: #f8f9fa;
  }

  table tbody tr:hover {
    background-color: #e2e6ea;
    transition: 0.3s;
  }

  /* Product Image Styling */
  .product-image {
    width: 80px;
    height: 110px;
    object-fit: cover;
    border-radius: 5px;
  }

  /* Button Styling */
  .btn-primary, .btn-outline-primary {
    border-radius: 5px;
    font-weight: bold;
  }

  .btn-danger:hover, .btn-warning:hover, .btn-primary:hover {
    transform: scale(1.1);
    transition: transform 0.2s;
  }

  /* Dropdown Styling */
  .dropdown-menu {
    min-width: 200px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .dropdown-item:hover {
    background-color: #e9ecef;
    color: #007bff;
  }
  .dropdown-menu {
    min-width: 220px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .dropdown-item {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .dropdown-item:hover {
    background-color: #e9ecef;
    color: #007bff;
  }

  /* Table Responsive Styling */
  .table-responsive {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
</style>

<script>
  function confirmDelete() {
    return confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?");
  }
</script>