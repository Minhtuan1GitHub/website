<?php
    $html_breadcrumb = '';
    $html_breadcrumb .= '<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>';
?>
<link rel="stylesheet" href="layout/css/dangky.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 0px;">
    <ol class="breadcrumb">
        <?=$html_breadcrumb;?>
    </ol>
</nav>

<div class="container my-5">
    <h4 class="pb-2 border-bottom">Đăng nhập</h4>
    <?php if (isset($_SESSION['tb_dangnhap']) &&  ($_SESSION['tb_dangnhap'] != "")) : ?>
        <div class="alert alert-danger" id="myAlert">
            <?= $_SESSION['tb_dangnhap']; ?>
        </div>
        <?php unset($_SESSION['tb_dangnhap']); ?>
    <?php endif; ?>

    <div class="row mt-4">
        <!-- Login Form -->
        <div class="col-md-6">
            <form action="index.php?page=login" method="post" class="card p-4">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="xxx@tumishop.com" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password" required>
                        <span class="input-group-text">
                            <i class="bi bi-eye-slash" id="hienpass" onclick="nhanvao1()" style="cursor: pointer;"></i>
                        </span>
                    </div>
                </div>
                <div class="text-end mb-3">
                    <a href="index.php?page=quenmatkhau" class="text-primary">Quên mật khẩu?</a>
                </div>
                <div class="text-center">
                    <input class="btn btn-primary w-50" type="submit" value="Đăng nhập" name="dangnhap">
                    <div class="mt-3">
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center mx-3 mb-0 text-muted">Hoặc đăng nhập với</p>
                        </div>
                        <a href="<?php echo isset($loginUrl) ? $loginUrl : '#'; ?>" class="btn btn-outline-danger btn-social">
                            <i class="bi bi-google me-2"></i>
                            Đăng nhập với Google
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Create Account Section -->
        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
            <h5>Tạo tài khoản</h5>
            <a href="index.php?page=dangky" class="btn btn-outline-dark my-3 w-50">Tạo tài khoản</a>
            <p class="text-center">Thanh toán đơn giản và đăng ký miễn phí ngay hôm nay.</p>
            <p class="text-center">Tạo một tài khoản và nhận mã giảm giá!</p>
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

    /* Input Field Styling */
    .form-control {
        border-radius: 5px;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    /* Button Styling */
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

    /* Google Button Styling */
    .btn-outline-danger {
        border-radius: 50px;
        transition: 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
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

    /* Responsive Design for Small Devices */
    @media (max-width: 768px) {
        .btn-primary, .btn-outline-dark, .btn-outline-danger {
            width: 100%;
        }

        .col-md-6 {
            margin-bottom: 20px;
        }
    }

    /* Social Login Button */
    .btn-social {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 24px;
        border-radius: 50px;
        transition: all 0.3s ease;
        font-weight: 500;
        width: auto;
        min-width: 200px;
    }

    .btn-social:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.2);
    }

    .btn-social i {
        font-size: 1.1em;
    }

    /* Divider Line */
    .divider {
        position: relative;
    }

    .divider::before,
    .divider::after {
        content: "";
        flex: 1;
        height: 1px;
        background: #e0e0e0;
    }

    .divider p {
        margin: 0;
        padding: 0 1rem;
    }

    @media (max-width: 768px) {
        .btn-social {
            width: 100%;
            margin-top: 10px;
        }
    }
</style>

<script src="layout/javascript/dangky.js"></script>