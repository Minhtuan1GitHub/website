<?php
  $html_chonphanloai = '';
  foreach ($allPhanLoai as $pl) {
    extract($pl);
    $html_chonphanloai .= '<option value="'.$id_phanloai.'">'.$name_phanloai.'</option>';
  }

  $html_chondanhmuc = '';
  foreach ($allDanhMuc as $dm) {
    extract($dm);
    $html_chondanhmuc .= '<option value="'.$dm_id.'">'.$name.' - '.$name_phanloai.'</option>';
  }
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
  body {
    background-color: #f8f9fa;
    font-family: 'Arial', sans-serif;
  }
  .card {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  .card-header {
    background: linear-gradient(90deg, #007bff, #0056b3);
    color: #fff;
    text-align: center;
    padding: 20px 15px;
  }
  .card-header h3 {
    margin: 0;
  }
  .form-label {
    font-weight: 600;
    color: #495057;
  }
  .form-select, .form-control {
    border-radius: 8px;
    border: 1px solid #ced4da;
    transition: border-color 0.2s ease;
  }
  .form-select:focus, .form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
  }
  .btn-primary {
    background-color: #007bff;
    border: none;
    font-size: 18px;
    font-weight: 600;
  }
  .btn-primary:hover {
    background-color: #0056b3;
  }
  .image-preview-container {
    text-align: center;
    margin-top: 10px;
  }
  .image-preview-container img {
    max-width: 100%;
    max-height: 250px;
    border: 1px solid #ddd;
    border-radius: 8px;
  }
</style>

<main id="main" class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        <div class="card">
          <div class="card-header">
            <h3><i class="fas fa-plus-circle me-2"></i>Thêm Sản Phẩm</h3>
          </div>
          
          <div class="card-body">
            <form action="index.php?page=addproduct" method="post" id="productForm" enctype="multipart/form-data">
              <div class="form-group mb-4">
                <label for="fileToUpload" class="form-label">Hình Sản Phẩm</label>
                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" class="form-control" onchange="previewImage(event)">
                <div class="image-preview-container">
                  <img id="image-preview" src="#" alt="Image Preview" style="display: none;">
                </div>
              </div>

              <div class="form-group mb-4">
                <label for="phanloai" class="form-label">Phân Loại</label>
                <select name="id_phanloai" id="phanloai" class="form-select" required>
                  <option value="">Chọn phân loại</option>
                  <?=$html_chonphanloai;?>
                </select>
              </div>

              <div class="form-group mb-4">
                <label for="danhmuc" class="form-label">Danh Mục</label>
                <select name="id_danhmuc" id="danhmuc" class="form-select" required>
                  <option value="">Chọn danh mục</option>
                  <?=$html_chondanhmuc;?>
                </select>
              </div>

              <div class="form-group mb-4">
                <label for="ten-san-pham" class="form-label">Tên Sản Phẩm</label>
                <!-- <text type="text" name="ten-san-pham" id="editor1" class="form-control" placeholder="Nhập tên sản phẩm" required> -->
                <textarea name="ten-san-pham" id="editor1" ></textarea>
              </div>

              <div class="d-grid">
                <button type="submit" name="themitem" id="themsanpham" class="btn btn-primary btn-lg">
                  <i class="fas fa-save me-2"></i>Thêm Sản Phẩm
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function previewImage(event) {
  const file = event.target.files[0];
  const preview = document.getElementById('image-preview');

  if (file) {
    // Danh sách các kiểu file hợp lệ, bao gồm AVIF
    const validFileTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/avif'];
    if (!validFileTypes.includes(file.type)) {
      alert('Chỉ cho phép file JPG, PNG, GIF hoặc AVIF.');
      event.target.value = ''; // Xóa file đã chọn
      preview.style.display = 'none';
      return;
    }

    // Đọc file và hiển thị preview
    const reader = new FileReader();
    reader.onload = function(e) {
      preview.src = e.target.result;
      preview.style.display = 'block';
    };
    reader.readAsDataURL(file);
  } else {
    preview.style.display = 'none';
  }
}

document.getElementById('productForm').addEventListener('submit', function(event) {
  const phanloai = document.getElementById("phanloai").value;
  const danhmuc = document.getElementById("danhmuc").value;
  const tenSanPham = document.getElementById("ten-san-pham").value;

  if (!phanloai) {
    alert("Bạn chưa chọn phân loại");
    event.preventDefault();
  } else if (!danhmuc) {
    alert("Bạn chưa chọn danh mục");
    event.preventDefault();
  } else if (!tenSanPham) {
    alert("Bạn chưa nhập tên sản phẩm");
    event.preventDefault();
  }
});
</script>