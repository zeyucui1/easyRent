<?php
// 加载数据
$jsonData = file_get_contents('../data/car.json');
$cars = json_decode($jsonData, true)['cars'];

$brand = $_GET['brand'] ?? ''; 
$type = $_GET['type'] ?? ''; 

$response = "";

// 生成品牌建议
if ($brand !== '') {
    foreach ($cars as $car) {
        if (stripos($car['brand'], $brand) !== false) {
            $response .= "<div>" . htmlspecialchars($car['brand']) . "</div>";
        }
    }
}

// 生成车型建议
if ($type !== '') {
    foreach ($cars as $car) {
        if (stripos($car['type'], $type) !== false) {
            $response .= "<div>" . htmlspecialchars($car['type']) . "</div>";
        }
    }
}

echo $response;
?>
