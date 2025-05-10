<?php
// Breadcrumb Navigation
$html_breadcrumb = '';
$html_breadcrumb .= '<li class="breadcrumb-item"><a href="index.php">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Sản phẩm yêu thích</li>';
?>

<nav class="container" aria-label="breadcrumb" style="position: sticky; top: 0; z-index: 1000; background: #f8f9fa; padding: 20px 0;">
    <ol class="breadcrumb mb-0">
        <?= $html_breadcrumb; ?>
    </ol>
</nav>

<div class="container my-5">
    <div class="wishlist-header text-start mb-4">
        <h2 class="text-uppercase font-weight-bold">Wishlist</h2>
        <div class="wishlist-icon mt-2">
            <a href="#"><img src="layout/images/outerwear/wishlist.jpg" alt="Wishlist Icon" class="img-fluid" style="width: 100%; height: auto;"></a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item">
                    <a href="index.php?page=viewlike&pg=sanphamyeuthich" class="nav-link active">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=viewlike&pg=sanphamphongcach" class="nav-link">Phong cách</a>
                </li>
            </ul>
            <div class="tab-content mt-4">
                <div class="tab-pane fade show active">
                    <!-- Content for 'Sản phẩm' will go here -->
                    <p class="text-center text-muted">Your favorite products will be displayed here.</p>
                </div>
                <div class="tab-pane fade">
                    <!-- Content for 'Phong cách' will go here -->
                    <p class="text-center text-muted">Explore your favorite styles here.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Breadcrumb Styling */

    /* Wishlist Header */
    .wishlist-header h2 {
        font-size: 2rem;
        color: #333;
    }

    .wishlist-header img {
        filter: drop-shadow(0px 4px 6px rgba(0, 0, 0, 0.2));
    }

    /* Tab Styling */
    .nav-tabs .nav-link {
        font-weight: bold;
        color: #333;
        border: none;
        border-bottom: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .nav-tabs .nav-link.active {
        color: #007bff;
        border-bottom: 2px solid #007bff;
    }

    .nav-tabs .nav-link:hover {
        color: #0056b3;
    }

    .tab-content {
        padding: 20px 0;
    }

    /* Card Styling */
    .card {
        border: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .card-body {
        padding: 30px;
    }
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
</style>