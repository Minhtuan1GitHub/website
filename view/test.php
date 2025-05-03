<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order DataTable</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
</head>
<body>
<nav class="container" aria-label="breadcrumb" style="margin-top: 0px">
    <ol class="breadcrumb">
        <?php echo $html_breadcrumb; ?>
    </ol>
</nav>

<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
    <div class="d-flex justify-content-between mb-3">
        <h4>Đơn hàng của bạn</h4>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown button
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
    </div>

    <!-- DataTable -->
    <table id="orderTable" class="display table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Thanh toán</th>
                <th>Thao tác</th>
                <th>Chi tiết đơn hàng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($get_bill as $bill): ?>
                <tr>
                    <td><?= $bill['id_bill'] ?></td>
                    <td>
                        <?php if ($bill['id'] == 0 || $bill['id'] == 2): ?>
                            <input type="text" value="<?= $bill['ten'] ?>" name="ten" style="width: 100%;">
                        <?php else: ?>
                            <input type="text" value="<?= $bill['ten'] ?>" style="width: 100%; background: none; border: none;" disabled>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($bill['id'] == 0 || $bill['id'] == 2): ?>
                            <input type="text" value="<?= $bill['sdt'] ?>" name="sdt" style="width: 100%;">
                        <?php else: ?>
                            <input type="text" value="<?= $bill['sdt'] ?>" style="width: 100%; background: none; border: none;" disabled>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($bill['id'] == 0 || $bill['id'] == 2): ?>
                            <input type="text" value="<?= $bill['dc'] ?>" name="dc" style="width: 100%;">
                        <?php else: ?>
                            <input type="text" value="<?= $bill['dc'] ?>" style="width: 100%; background: none; border: none;" disabled>
                        <?php endif; ?>
                    </td>
                    <td><?= $bill['tongtien'] ?>₫</td>
                    <td style="background: <?= $bill['background'] ?>; color: <?= $bill['color'] ?>; font-weight: bold; border-radius: 100px; text-align: center;">
                        <?= $bill['trangthai'] ?>
                    </td>
                    <td style="color: <?= $bill['mau'] ?>;"><?= $bill['name'] ?></td>
                    <td>
                        <div class="d-flex gap-2">
                            <?php if ($bill['id'] == 0 || $bill['id'] == 2): ?>
                                <button name="sua" class="btn btn-warning btn-sm">Sửa</button>
                            <?php else: ?>
                                <button disabled class="btn btn-warning btn-sm">Sửa</button>
                            <?php endif; ?>

                            <?php if ($bill['id'] == 0 || $bill['id'] == 2 || $bill['id'] == 1): ?>
                                <button name="huy" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắc muốn xóa?')">Hủy</button>
                            <?php else: ?>
                                <button disabled class="btn btn-danger btn-sm">Hủy</button>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td>
                        <form action="index.php?page=chitiet" method="post">
                            <input type="hidden" name="id_bill" value="<?= $bill['id_bill'] ?>">
                            <button class="btn btn-primary btn-sm">Chi tiết</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include DataTables JS -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<!-- Initialize DataTable -->
<script>
    $(document).ready(function () {
        $('#orderTable').DataTable({
            responsive: true,
            language: {
                search: "Tìm kiếm:",
                lengthMenu: "Hiển thị _MENU_ mục",
                info: "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                paginate: {
                    next: "Tiếp",
                    previous: "Trước"
                }
            }
        });
    });
</script>
</body>
</html>