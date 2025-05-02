<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h4 {
            color: #343a40;
            margin-bottom: 20px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        .row-header {
            font-weight: bold;
            background-color: #f1f1f1;
            padding: 10px 0;
            border-bottom: 2px solid #007bff;
        }

        .row-item {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
            align-items: center;
        }

        .status-badge {
            border-radius: 20px;
            padding: 5px 10px;
            font-weight: bold;
            text-align: center;
        }

        .btn-action {
            display: flex;
            gap: 10px;
        }

        .btn-action button {
            display: flex;
            align-items: center;
            gap: 5px;
            border: none;
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-action button:hover {
            background-color: #0056b3;
        }

        .btn-action button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .btn-cancel {
            background-color: #dc3545;
        }

        .btn-cancel:hover {
            background-color: #a71d2a;
        }

        .chitietdon {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            border: none;
        }

        .chitietdon:hover {
            background-color: #1c7430;
        }

        .form-control-plaintext {
            border: none;
            background-color: transparent;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h4>Đơn hàng của bạn</h4>
        <div class="row row-header">
            <div class="col">Mã đơn hàng</div>
            <div class="col-2">Tên</div>
            <div class="col">Số điện thoại</div>
            <div class="col">Địa chỉ</div>
            <div class="col-1">Tổng tiền</div>
            <div class="col">Trạng thái</div>
            <div class="col">Thanh toán</div>
            <div class="col">Thao tác</div>
            <div class="col">Chi tiết đơn hàng</div>
        </div>

        <div class="row row-item align-items-center">
            <div class="col"><?= $bill['id_bill'] ?></div>
            <div class="col-2">
                <?php if ($bill['id'] == 0 || $bill['id'] == 2): ?>
                    <input type="text" class="form-control" value="<?= $bill['ten'] ?>" name="ten">
                <?php else: ?>
                    <input type="text" class="form-control-plaintext" value="<?= $bill['ten'] ?>" readonly>
                <?php endif; ?>
            </div>
            <div class="col">
                <?php if ($bill['id'] == 0 || $bill['id'] == 2): ?>
                    <input type="text" class="form-control" value="<?= $bill['sdt'] ?>" name="sdt">
                <?php else: ?>
                    <input type="text" class="form-control-plaintext" value="<?= $bill['sdt'] ?>" readonly>
                <?php endif; ?>
            </div>
            <div class="col">
                <?php if ($bill['id'] == 0 || $bill['id'] == 2): ?>
                    <input type="text" class="form-control" value="<?= $bill['dc'] ?>" name="dc">
                <?php else: ?>
                    <input type="text" class="form-control-plaintext" value="<?= $bill['dc'] ?>" readonly>
                <?php endif; ?>
            </div>
            <div class="col"><?= number_format($bill['tongtien']) ?>₫</div>
            <div class="col">
                <div class="status-badge" style="background: <?= $bill['background'] ?>; color: <?= $bill['color'] ?>;">
                    <?= $bill['trangthai'] ?>
                </div>
                <input type="hidden" name="trangthai" value="<?= $bill['id'] ?>">
            </div>
            <div class="col" style="color: <?= $bill['mau'] ?>;">
                <?= $bill['name'] ?>
            </div>
            <div class="col">
                <div class="btn-action">
                    <?php if ($bill['id'] == 0 || $bill['id'] == 2): ?>
                        <button class="btn" name="sua">
                            <i class="bi bi-tools"></i>
                            <span>Sửa</span>
                        </button>
                    <?php else: ?>
                        <button class="btn" disabled>
                            <i class="bi bi-tools"></i>
                            <span>Sửa</span>
                        </button>
                    <?php endif; ?>
                    <?php if ($bill['id'] == 0 || $bill['id'] == 2 || $bill['id'] == 1): ?>
                        <button class="btn btn-cancel" name="huy" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                            <i class="bi bi-x"></i>
                            <span>Hủy</span>
                        </button>
                    <?php else: ?>
                        <button class="btn" disabled>
                            <i class="bi bi-x"></i>
                            <span>Hủy</span>
                        </button>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col">
                <input type="hidden" name="id_bill" value="<?= $bill['id_bill'] ?>">
                <button class="chitietdon" name="chitiet">Chi tiết đơn hàng</button>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>