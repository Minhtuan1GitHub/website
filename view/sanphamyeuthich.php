<?php
$html_cart = '';
$count = 0;

if (isset($_SESSION['session_user']) && count($_SESSION['session_user']) > 0) {
    $user = $_SESSION['session_user']['id_user'];

    if (isset($_SESSION['giohanglike'][$user]) && !empty($_SESSION['giohanglike'][$user])) {
        $count = count($_SESSION['giohanglike'][$user]);

        foreach ($_SESSION['giohanglike'][$user] as $index => $sp) {
            extract($sp);

            $html_cart .= '
                <div class="card mb-3 shadow-sm border-0 rounded-3">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-2">
                            <a href="index.php?page=sanphamchitiet&idpro=' . $sp['id'] . '">
                                <img src="layout/images/outerwear/' . $img . '" class="img-thumbnail rounded" alt="' . $name_item . '" style="width: 100%; height: auto;">
                            </a>
                        </div>
                        <div class="col-md-10">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title text-uppercase mb-0 text-truncate">' . $name_item . '</h5>
                                    <button class="btn btn-outline-danger btn-sm" name="addlike" title="Add to Wishlist">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                </div>
                                <p class="mb-1"><strong>Size:</strong> ' . size($size) . '</p>
                                <p class="mb-1"><strong>Color:</strong> ' . color($color) . '</p>';

            if ($price_sale == 0) {
                $html_cart .= '<p class="text-muted mb-1"><strong>Price:</strong> ' . $price . ' k</p>';
            } else {
                if ($limit_date_sale >= date("Y-m-d")) {
                    $html_cart .= '<p class="text-muted mb-1"><strong>Price:</strong> ' . $price . ' k</p>';
                    $html_cart .= '<p class="text-danger mb-1"><strong>Sale Price:</strong> ' . $price_sale . ' k</p>';
                } else {
                    $html_cart .= '<p class="text-muted mb-1"><strong>Price:</strong> ' . $price . ' k</p>';
                }
            }

            if ($description != '') {
                $html_cart .= '<p class="text-secondary"><small>' . $description . '</small></p>';
            }

            $html_cart .= '
                                <div class="d-flex align-items-center my-3">
                                    <a class="btn btn-danger btn-sm me-2" href="index.php?page=removelike&id=' . $index . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa sản phẩm này không?\')">Remove</a>
                                    <form action="index.php?page=addcart" method="post" class="d-inline">
                                        <input type="hidden" name="id" value="' . $sp['id'] . '">
                                        <input type="hidden" name="name_item" value="' . $name_item . '">
                                        <input type="hidden" name="img" value="' . $img . '">
                                        <input type="hidden" name="size" value="' . $size . '">
                                        <input type="hidden" name="color" value="' . $color . '">
                                        <input type="hidden" name="price" value="' . $price . '">
                                        <input type="hidden" name="price_sale" value="' . $price_sale . '">
                                        <input type="hidden" name="description" value="' . $description . '">
                                        <input type="hidden" name="limit_date_sale" value="' . $limit_date_sale . '">
                                        <input type="hidden" name="soluong" value="1">
                                        <button class="btn btn-outline-primary btn-sm" name="addcart">Add to Cart</button>
                                    </form>
                                </div>';

            if ($limit_date_sale >= date("Y-m-d")) {
                $date = date("d F", strtotime($limit_date_sale));
                $html_cart .= '<p class="text-danger"><strong>Limited-Time Offer:</strong> Until ' . $date . '</p>';
            }

            $html_cart .= '
                            </div>
                        </div>
                    </div>
                </div>';
        }
    }
}
?>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h6 class="text-muted">Result: <?= $count; ?> items</h6>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-funnel-fill"></i> Sort
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Price: Low to High</a></li>
                <li><a class="dropdown-item" href="#">Price: High to Low</a></li>
                <li><a class="dropdown-item" href="#">Newest</a></li>
            </ul>
        </div>
    </div>

    <div>
        <?= $html_cart; ?>
    </div>

    <div class="mt-4 text-end">
        <?php
        if (isset($_SESSION['giohanglike'][$_SESSION['session_user']['id_user']]) && ($_SESSION['giohanglike'][$_SESSION['session_user']['id_user']])) {
            echo '<a class="btn btn-danger" href="index.php?page=viewlike&del=1" onclick="return confirm(\'Bạn có chắc chắn muốn xóa hết tất cả sản phẩm trong giỏ hàng?\')">Clear All Items</a>';
        } else {
            echo '<div class="alert alert-warning text-center" style="border-radius: 0; font-weight: bold;">
                    You have no items in your cart.
                  </div>';
        }
        ?>
    </div>
</div>

<style>
    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: #fff;
    }

    .card-title {
        font-weight: bold;
        color: #333;
    }

    .text-muted {
        font-size: 0.9rem;
    }

    .text-danger {
        font-weight: bold;
    }

    .alert-warning {
        background-color: #f8d7da;
        color: #721c24;
    }

    img.img-thumbnail {
        max-width: 200px;
        max-height: 200px;
        object-fit: cover;
    }

    .dropdown-menu {
        min-width: auto;
    }
</style>