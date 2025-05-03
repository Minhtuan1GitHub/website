<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php
  $html_breadcrumb = '';
  $html_breadcrumb .= '<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                       <li class="breadcrumb-item active" aria-current="page">Quên mật khẩu</li>';
?>

<link rel="stylesheet" href="layout/css/dangky.css">

<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 0;">
    <ol class="breadcrumb">
        <?=$html_breadcrumb;?>
    </ol>
</nav>

<div class="container my-5">
    <h4 class="pb-2 border-bottom">Quên mật khẩu</h4>
    <div class="row mt-4">
        <!-- Form Section -->
        <div class="col-md-6">
            <?php 
              if (isset($_SESSION['tb_dangnhap']) && ($_SESSION['tb_dangnhap'] != "")) {
                  echo "<div class='alert alert-danger' id='myAlert'>".$_SESSION['tb_dangnhap']."</div>";
                  unset($_SESSION['tb_dangnhap']);
              }
            ?>
            <form action="index.php?page=forgetpassword" method="post" class="card p-4">
                <div class="mb-3">
                    <label for="email" class="form-label">Nhập email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="xxx@tumishop.com" value="<?php echo $email;?>" required>
                </div>
                <div class="text-center mt-3">
                    <input type="submit" class="btn btn-primary w-50" name="nutguiyeucau" value="Gửi yêu cầu">
                </div>
            </form>
        </div>

        <!-- Create Account Section -->
        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
            <?php
              if (isset($_SESSION['tb']) && ($_SESSION['tb'])) {
                  echo $_SESSION['tb'];
                  unset($_SESSION['tb']);
              }
            ?>
            <h5>Tạo tài khoản</h5>
            <a href="index.php?page=dangky" class="btn btn-outline-dark my-3 w-50">Tạo tài khoản mới</a>
            <p class="text-center">Thanh toán đơn giản và đăng ký miễn phí ngay hôm nay.</p>
            <p class="text-center">Tạo một tài khoản và nhận mã giảm giá!</p>
        </div>
    </div>
</div>

<style>
    /* Form Card */
    .card {
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    /* Input Fields */
    .form-control {
        border-radius: 5px;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    /* Buttons */
    .btn-primary {
        background: linear-gradient(to right, #007bff, #0056b3);
        border: none;
        border-radius: 50px;
        transition: 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(to right, #0056b3, #003f7f);
    }

    .btn-outline-dark {
        border-radius: 50px;
        transition: 0.3s ease;
    }

    .btn-outline-dark:hover {
        background-color: #000;
        color: #fff;
    }

    /* Breadcrumb */
    .breadcrumb {
        background: #f8f9fa;
        padding: 10px 15px;
        border-radius: 5px;
    }

    .breadcrumb-item a {
        color: #007bff;
        text-decoration: none;
    }

    .breadcrumb-item a:hover {
        text-decoration: underline;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .btn-primary, .btn-outline-dark {
            width: 100%;
        }

        .col-md-6 {
            margin-bottom: 20px;
        }
    }
</style>

<script src="layout/javascript/dangky.js"></script>