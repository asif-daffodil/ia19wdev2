<?php

$editId = $_GET['editId'];
$getPreData = $conn->query("SELECT * FROM `products` WHERE `id` = $editId");
$getPreData->num_rows == 0 && header("location: ./$pageName?pageno=$pageno");
$preData = $getPreData->fetch_object();

if (isset($_FILES['imgChange']['name'])) {
    $file_name = $_FILES['imgChange']['name'];
    $temp_name = $_FILES['imgChange']['tmp_name'];

    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $x = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $newFileName = substr(str_shuffle($x), 0, 6) . uniqid() . rand() . date("hisFdYl") . "." . $ext;
    $destination = "./images/products/$newFileName";
    if (getimagesize($temp_name)) {
        unlink("." . $preData->img);
        $move = move_uploaded_file($temp_name, ".$destination");
        if (!$move) {
            echo "<script>toastr.error('Image upload failed!')</script>";
        } else {
            $updateimg = $conn->query("UPDATE `products` SET `img` = '$destination' WHERE `id` = $editId");
            if ($updateimg) {
                echo "<script>toastr.success('Image uploaded successfully');setTimeout(()=> location.replace(location.href), 1000)</script>";
            } else {
                echo "<script>toastr.error('Database problem!')</script>";
            }
        }
    } else {
        echo "<script>toastr.error('Invalid Image!')</script>";
    }
}

if (isset($_POST['addPro123'])) {
    $proName = $_POST['proName'];
    $regPrice = $_POST['regPrice'];
    $disPrice = $_POST['disPrice'];
    $description = $_POST['description'];
    $update = $conn->query("UPDATE `products` SET `name` = '$proName', `regular_price` = '$regPrice', `discount_price` = '$disPrice', `description` = '$description' WHERE `id` = $editId");
    if (!$update) {
        echo "<script>toastr.error('Something went wrong!')</script>";
    } else {
        echo "<script>toastr.success('Product updated successfully');setTimeout(()=> location.replace(location.href), 500)</script>";
    }
}
?>
<h2 class="text-2xl md:text:4xl mb-3">Add Product</h2>
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="Producr Name" class="input input-bordered w-full max-w-xs mb-3" required name="proName" value="<?= $preData->name ?>" />
    <input type="number" placeholder="Regular Price" class="input input-bordered w-full max-w-xs mb-3" required name="regPrice" value="<?= $preData->regular_price ?>" />
    <input type="number" placeholder="Discount Price" class="input input-bordered w-full max-w-xs mb-3" required name="disPrice" value="<?= $preData->discount_price ?>" />
    <textarea class="textarea textarea-bordered h-24 max-w-xs" placeholder="Product Details" style="resize: none;" id="editor" name="description"><?= $preData->description ?></textarea>
    <div class="my-3">
        <button type="submit" class="btn btn-outline btn-primary" name="addPro123">Update</button>
        <a href="<?= "./$pageName?pageno=$pageno" ?>" class="btn btn-outline btn-warning">Back</a>
    </div>
</form>

<form action="" method="post" enctype="multipart/form-data" id="imgForm">
    <label for="upimg">
        <img src='<?= ".$preData->img" ?>' alt="" class="w-96" accept="image/png, image/gif, image/jpeg, image/jpg" id="output">
        Please click on image to change
    </label>
    <input type="file" id="upimg" class="hidden" name="imgChange">
</form>

<script>
    const upimg = document.getElementById("upimg");
    upimg.addEventListener("change", () => {
        document.getElementById('output').src = window.URL.createObjectURL(upimg.files[0]);
        document.getElementById("imgForm").submit();
    })
</script>