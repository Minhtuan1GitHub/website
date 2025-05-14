<?php
    require_once 'vendor/autoload.php';
    require_once 'config/google_config.php';
    use Google\Client as Google_Client;

    // echo '<pre>';
    // print_r($_SESSION);
    // print_r($_POST);
    // echo '</pre>';

    $html_breadcrumb = '';
    $html_breadcrumb .= '<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>';

    // Initialize Google Client
    $client = new Google_Client();
    $client->setClientId(GOOGLE_CLIENT_ID);
    $client->setClientSecret(GOOGLE_CLIENT_SECRET);
    $client->setRedirectUri(GOOGLE_REDIRECT_URI);
    $client->addScope('email');
    $client->addScope('profile');
    
    // Get auth URL
    $registerUrl = $client->createAuthUrl();
?>
<link rel="stylesheet" href="layout/css/dangky.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; margin-top: 0px;">
    <ol class="breadcrumb">
        <?=$html_breadcrumb;?>
    </ol>
</nav>

<div class="container my-5">
    <h4 class="pb-2 border-bottom">Đăng ký</h4>

    <?php if (isset($_SESSION['tb_dangnhap']) && ($_SESSION['tb_dangnhap'] != "")) : ?>
        <div class="alert <?= strpos($_SESSION['tb_dangnhap'], 'thành công') !== false ? 'alert-success' : 'alert-danger' ?>" id="myAlert">
            <?= $_SESSION['tb_dangnhap']; ?>
        </div>
        <?php unset($_SESSION['tb_dangnhap']); ?>
    <?php endif; ?>

    <div class="row mt-4">
        <!-- Registration Form -->
        <div class="col-md-6">
            <form action="index.php?page=adduser" method="post" class="card p-4">
                <!-- Email Input -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="xxx@tumishop.com" name="email" 
                           value="<?= isset($_SESSION['google_data']['email']) ? $_SESSION['google_data']['email'] : '' ?>" required>
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
                <div class="text-center">
                    <input class="btn btn-primary w-50" type="submit" name="dangky" value="Đăng ký">
                    <div class="mt-3">
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center mx-3 mb-0 text-muted">
                                <?= isset($_SESSION['session_user']) ? 'Hoặc liên kết với' : 'Hoặc đăng ký với' ?>
                            </p>
                        </div>
                        <a href="<?=$registerUrl?>" class="btn btn-outline-danger btn-social">
                            <i class="bi bi-google me-2"></i>
                            <?= isset($_SESSION['session_user']) ? 'Liên kết với Google' : 'Đăng ký với Google' ?>
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Already Have Account Section -->
        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
            <?php if (!isset($_SESSION['session_user'])) : ?>
                <h5>Đã có tài khoản</h5>
                <a href="index.php?page=dangnhap" class="btn btn-outline-dark my-3 w-50">Đăng nhập</a>
                <p class="text-center">Đăng nhập ngay để khám phá thêm nhiều ưu đãi hấp dẫn!</p>
            <?php endif; ?>
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
        .btn-primary, .btn-outline-dark, .btn-social {
            width: 100%;
        }

        .col-md-6 {
            margin-bottom: 20px;
        }
    }
</style>

<script src="layout/javascript/dangky.js"></script>
