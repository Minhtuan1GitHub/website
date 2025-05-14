<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Payment Status</title>
    <style>
        body {
            background-color: #f7f9fd;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }
        .btn-submit {
            background-color: #dc3545;
            color: #fff;
            border: none;
        }
        .btn-submit:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<main>
    <div class="form-container shadow-sm">
        <h2 class="form-title">Thay đổi trạng thái</h2>
        <form action="index.php?page=capnhattrangthaimoi" method="POST">
            <div class="mb-3">
                <label for="id_bill" class="form-label">Bill ID:</label>
                <span class="form-control-plaintext" id="id_bill"><?=$id_bill?></span>
                <input type="hidden" value="<?=$id_bill?>" name="id_bill">
            </div>
            <div class="mb-3">
                <label for="trangthaithanhtoan" class="form-label">Current Payment Status:</label>
                <span class="form-control-plaintext" id="trangthaithanhtoan"><?=$trangthaithanhtoan?></span>
                <input type="hidden" value="<?=$trangthaithanhtoan?>" name="trangthaithanhtoan">
            </div>
            <div class="mb-3">
                <?php
                    if ($trangthaithanhtoan != 8){
                        ?>
                        <label for="trangthaimoi" class="form-label">Select New Status:</label>
                        <select class="form-select" id="trangthaimoi" name="trangthaimoi" aria-label="Select New Status">
                            <option selected>Open this select menu</option>
                            <?php foreach ($allTrangThai as $item) { ?>
                                <option value="<?=$item['id']?>"><?=$item['trangthai']?></option>
                            <?php } ?>
                        </select>
                    <?php }else{
                        ?>
                        <label for="" class="form-label">Hoàn tiền: </label>
                        <select id="" class="form-select" name="thanhtoanmoi" aria-label="Select New Status">
                            <option selected>Open this select menu</option>
                            <?php foreach ($allThanhToan as $chapnhan) { ?>
                                <option value="<?=$chapnhan['id']?>"><?=$chapnhan['name']?></option>
                            <?php }?>
                        </select>
                    <?php }
                ?>

            </div>
            <button type="submit" class="btn btn-submit w-100" name="gui">Submit</button>
        </form>
    </div>
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>