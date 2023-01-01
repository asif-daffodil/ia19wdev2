<?php
if (isset($_POST['addPro123'])) {
    $proName = $_POST['proName'];
    $regPrice = $_POST['regPrice'];
    $disPrice = $_POST['disPrice'];
    $description = $_POST['description'];
    $file_name = $_FILES['pic']['name'];
    $temp_name = $_FILES['pic']['tmp_name'];

    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $x = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $newFileName = substr(str_shuffle($x), 0, 6) . uniqid() . rand() . date("hisFdYl") . "." . $ext;
    $destination = "./images/products/$newFileName";

    if (getimagesize($temp_name)) {
        $move = move_uploaded_file($temp_name, ".$destination");
        if ($move) {
            $insert = $conn->query("INSERT INTO `products` (`name`, `regular_price`, `discount_price`, `description`, `img`) VALUES ('$proName', '$regPrice', '$disPrice', '$description', '$destination')");
            if (!$insert) {
                echo "<script>toastr.error('Something went wrong!')</script>";
            } else {
                echo "<script>toastr.success('Product added successfully')</script>";
            }
        } else {
            echo "<script>toastr.error('File upload failed!')</script>";
        }
    }
}
?>
<h2 class="text-2xl md:text:4xl mb-3">Add Product</h2>
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="Producr Name" class="input input-bordered w-full max-w-xs mb-3" required name="proName" />
    <input type="number" placeholder="Regular Price" class="input input-bordered w-full max-w-xs mb-3" required name="regPrice" />
    <input type="number" placeholder="Discount Price" class="input input-bordered w-full max-w-xs mb-3" required name="disPrice" />
    <textarea class="textarea textarea-bordered h-24 max-w-xs" placeholder="Product Details" style="resize: none;" id="editor" name="description"></textarea>
    <input type="file" class="file-input w-full max-w-xs block my-3" required name="pic" accept="image/png, image/gif, image/jpeg, image/jpg" />
    <button type="submit" class="btn btn-outline btn-primary" name="addPro123">Add Product</button>
    <a href="<?= "./$pageName?pageno=$pageno" ?>" class="btn btn-outline btn-warning">Back</a>
</form>