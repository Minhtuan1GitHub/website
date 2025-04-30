<?php
    // echo '<pre>';
    // print_r($_SESSION);
    // print_r($_POST);
    // print_r($getProduct);
    // echo '</pre>'; 
  $html_chonsanpham = '';
  foreach ($chonSanPham as $sanpham) {
    extract($sanpham);
    $html_chonsanpham .= '
      <option value='.$id.'>'.$name_item.'</option>
    ';
  }
  $html_chonsize = '';
  foreach ($chonSize as $size) {
    extract($size);
    $html_chonsize .= '
      <option value='.$id.'>'.$size.'</option>
    ';
  }
  $html_choncolor = '';
  foreach ($chonColor as $color) {
    extract($color);
    $html_choncolor .='
      <option value='.$id.'>'.$color.'</option>
    ';
  }
  // $html_chondanhmuc = '';
  // foreach ($chonPhanLoai as $pl) {
  //   extract($pl);
  //   $html_chondanhmuc .='
  //     <option value>'.$name_phanloai.'</option>
  //   ';
  // }
?>

<!-- Add Bootstrap CSS and Font Awesome in the head of your HTML -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<main id="main" class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card shadow">
          <div class="card-header bg-primary text-white">
            <h3 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Thêm sản phẩm</h3>
          </div>
          <div class="card-body">
            <form action="index.php?page=addproduct" method="post" id="productForm">
              <div class="row g-3">
                <div class="col-md-12 mb-3">
                  <label for="id_item" class="form-label fw-bold">Sản phẩm</label>
                  <select name="id_item" id="id_item" class="form-select">
                    <option value="Chọn sản phẩm">Chọn sản phẩm</option>
                    <?=$html_chonsanpham;?>
                  </select>
                </div>
                
                <div class="col-md-6 mb-3">
                  <label for="id_size" class="form-label fw-bold">Kích thước</label>
                  <select name="id_size" id="id_size" class="form-select">
                    <option value="Chọn size">Chọn size</option>
                    <?=$html_chonsize;?>
                  </select>
                </div>
                
                <div class="col-md-6 mb-3">
                  <label for="id_color" class="form-label fw-bold">Màu sắc</label>
                  <select name="id_color" id="id_color" class="form-select">
                    <option value="Chọn color">Chọn color</option>
                    <?=$html_choncolor;?>
                  </select>
                </div>
                
                <div class="col-md-6 mb-3">
                  <label for="price" class="form-label fw-bold">Giá</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-tags"></i></span>
                    <input type="number" name="price" id="price" class="form-control" placeholder="Nhập giá sản phẩm">
                  </div>
                </div>
                
                <div class="col-md-6 mb-3">
                  <label for="stock" class="form-label fw-bold">Số lượng tồn</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-boxes"></i></span>
                    <input type="number" name="stock" id="stock" class="form-control" placeholder="Nhập số lượng tồn kho">
                  </div>
                </div>
                
                <div class="col-md-6 mb-3">
                  <label for="price_sale" class="form-label fw-bold">Giá sale</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-percent"></i></span>
                    <input type="number" name="price_sale" id="price_sale" value="0" class="form-control" placeholder="Nhập giá khuyến mãi">
                  </div>
                </div>
                
                <div class="col-md-6 mb-3">
                  <label for="date_sale" class="form-label fw-bold">Ngày hết hạn sale</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    <input type="date" name="date_sale" value="<?= date('Y-m-d')?>" id="date_sale" class="form-control">
                  </div>
                </div>
              </div>
              
              <div class="d-grid mt-4">
                <button type="submit" name="themsanpham" id="themsanpham" class="btn btn-primary btn-lg">
                  <i class="fas fa-save me-2"></i>Thêm sản phẩm
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Add Bootstrap JS at the end of your body -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script> 
  function themsanpham(event){
    const id_item = document.getElementById("id_item").value;
    const id_size = document.getElementById("id_size").value;
    const id_color = document.getElementById("id_color").value;
    const price = document.getElementById("price").value;
    const stock = document.getElementById("stock").value;
    
    if (id_item === "Chọn sản phẩm"){
      alert("Bạn chưa chọn sản phẩm");
      event.preventDefault();
      return false;
    }else if (id_size === "Chọn size"){
      alert("Bạn chưa chọn kích thước sản phẩm");
      event.preventDefault();
      return false;
    }else if (id_color === "Chọn color"){
      alert("Bạn chưa chọn màu");
      event.preventDefault();
      return false;
    }else if (price === ""){
      alert("Bạn chưa set gía sản phẩm");
      event.preventDefault();
      return false;
    }else if (stock === ""){
      alert("Bạn chưa set số lượng sản phẩm");
      event.preventDefault();
      return false;
    }
  }
  
  window.onload = function(){
    const form = document.getElementById("productForm");
    form.addEventListener("submit", themsanpham);
  };
</script>