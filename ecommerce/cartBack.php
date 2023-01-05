<?php
$conn = mysqli_connect("localhost", "root", "", "ia19ecommerce");
$data = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = json_decode(file_get_contents("php://input"), true);
    $count = $_POST['count'];
    foreach ($count as $key => $val) {
        $key = (int) $key;
        $getProInfo = $conn->query("SELECT * FROM `products` WHERE `id` = $key");
        $proInfo = $getProInfo->fetch_object();
        $newProId = "proId" . $proInfo->id;
        $data[$newProId]["id"] = $proInfo->id;
        $data[$newProId]["name"] = $proInfo->name;
        $data[$newProId]["img"] = $proInfo->img;
        $data[$newProId]["price"] = $proInfo->discount_price;
        $data[$newProId]["count"] = $val;
    }
    echo json_encode($data);
}
