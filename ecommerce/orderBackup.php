<?php
$conn = mysqli_connect("localhost", "root", "", "ia19ecommerce");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = json_decode(file_get_contents("php://input"), true);
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $user_id = $_POST['user_id'];
    $address = $_POST['address'];
    $pmethod = $_POST['pmethod'];
    $insert = $conn->query("INSERT INTO `orders` (`product_id`, `quantity`, `price`, `user_id`, `address`, `pmethod`) VALUES ('$product_id','$quantity','$price','$user_id','$address','$pmethod')");
    if ($insert) {
        echo "success";
    }
}
