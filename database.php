<?php
ob_start();

$host = "awseb-e-bfp7mmp9ps-stack-awsebrdsdatabase-znxl5l4fn0xa.c1skgku8mc72.us-east-1.rds.amazonaws.com";
$username = "uts";
$password = "11111111";
$dbname = "easyrent";

$conn = new mysqli($host, $username, $password, $dbname);

header('Content-Type: application/json');


if ($conn->connect_error) {
    ob_end_clean(); 
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// 获取POST请求中的数据
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reservationData = json_decode(file_get_contents('php://input'), true);

    if ($reservationData) {
     
        $order_id = bin2hex(random_bytes(16));
        $user_email = $reservationData['email'];
        $rent_start_date = $reservationData['startDate'];
        $rent_end_date = $reservationData['endDate'];
        $price = $reservationData['totalPrice'];
        $status = $reservationData['status'];

        $sql = "INSERT INTO orders (order_id, user_email, rent_start_date, rent_end_date, price, status)
                VALUES ('$order_id', '$user_email', '$rent_start_date', '$rent_end_date', '$price', '$status')";

        if ($conn->query($sql) === TRUE) {
            ob_end_clean(); 
            echo json_encode(["message" => "Order confirmed successfully", "order_id" => $order_id]);
        } else {
            ob_end_clean(); 
            echo json_encode(["error" => "Error: " . $sql . " - " . $conn->error]);
        }
    } else {
        ob_end_clean(); 
        echo json_encode(["error" => "Invalid input"]);
    }

    $conn->close();
} else {
    ob_end_clean(); 
    echo json_encode(["error" => "Invalid request method"]);
}
?>
