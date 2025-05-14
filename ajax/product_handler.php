<?php
include "../dao/pdo.php";
include "../dao/sanpham.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'] ?? '';
    $id_item = $_GET['id_item'] ?? '';
    
    switch ($action) {
        case 'get_sizes':
            $color_id = $_GET['color_id'] ?? '';
            if ($color_id && $id_item) {
                $sizes = getSizeWithStock($id_item, $color_id);
                echo json_encode(['success' => true, 'sizes' => $sizes]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Missing parameters']);
            }
            break;
            
        case 'get_price':
            $color_id = $_GET['color_id'] ?? '';
            $size_id = $_GET['size_id'] ?? '';
            if ($color_id && $size_id && $id_item) {
                $priceData = getPrice($id_item, $color_id, $size_id);
                $stock = getStock($id_item, $color_id, $size_id);
                echo json_encode([
                    'success' => true, 
                    'price' => $priceData['price'],
                    'price_sale' => $priceData['price_sale'],
                    'limit_date_sale' => $priceData['limit_date_sale'],
                    'stock' => $stock
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Missing parameters']);
            }
            break;
            
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
            break;
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
} 