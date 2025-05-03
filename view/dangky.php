<?php
    $html_breadcrumb = '';
    $html_breadcrumb .= '<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>';
?>
<link rel="stylesheet" href="layout/css/dangky.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 0px;">
    <ol class="breadcrumb">
        <?=$html_breadcrumb;?>
    </ol>
</nav>

<div class="container my-5">
    <h4 class="pb-2 border-bottom">Đăng ký</h4>

    <div class="row mt-4">
        <!-- Registration Form -->
        <div class="col-md-6">
            <form action="index.php?page=adduser" method="post" class="card p-4">
                <!-- Email Input -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="xxx@tumishop.com" name="email" required>
                    <?php echo $alert ?? ""; ?>
                </div>
                <!-- Password Input -->
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password" required>
                        <span class="input-group-text">
                            <i class="bi bi-eye-slash" id="hienpass" onclick="nhanvao1()" style="cursor: pointer;"></i>
                        </span>
                    </div>
                </div>
                <!-- Confirm Password Input -->
                <div class="mb-3">
                    <label for="confirmpassword" class="form-label">Xác nhận mật khẩu</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="confirmpassword" placeholder="Nhập lại mật khẩu" name="confirmpassword" required>
                        <span class="input-group-text">
                            <i class="bi bi-eye-slash" id="hienpass2" onclick="nhanvao2()" style="cursor: pointer;"></i>
                        </span>
                    </div>
                </div>
                <!-- Register Button -->
                <div class="text-center mt-4">
                    <input class="btn btn-primary w-50" type="submit" name="dangky" value="Đăng ký">
                </div>
            </form>
        </div>

        <!-- Already Have Account Section -->
        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
            <h5>Đã có tài khoản</h5>
            <a href="index.php?page=dangnhap" class="btn btn-outline-dark my-3 w-50">Đăng nhập</a>
            <p class="text-center">Đăng nhập ngay để khám phá thêm nhiều ưu đãi hấp dẫn!</p>
        </div>
    </div>
</div>

<style>
    /* Card Styling */
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

    /* Breadcrumb Styling */
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