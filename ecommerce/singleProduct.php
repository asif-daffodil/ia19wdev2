<?php
include_once("./header.php");
include_once("./navbar.php");
$id = isset($_GET['id']) ? $_GET['id'] : header("location: ./index.php");
$getProduct = $conn->query("SELECT * FROM `products` WHERE `id` = $id");
$getProduct->num_rows == 0 && header("location: ./index.php");
$data = $getProduct->fetch_object();
?>

<div class="container">
    <div class="row">
        <div class="card my-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?= $data->img ?>" class="img-fluid rounded-start" alt="..." style="max-height: 600px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="display-4"><?= $data->name ?></div>
                        <div><small class="text-muted m-0 p-0">- <?= $data->created_at ?></small></div>
                        <div><?= $data->description ?></div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit dolorem in quae, nemo aspernatur fugiat unde earum, corporis, ex error fuga ad sed! Officiis, voluptatum repudiandae? Explicabo ducimus beatae autem doloremque voluptas optio a! Ex voluptates laudantium commodi esse consectetur labore facere. Ad maxime ratione illum quod, magnam nihil deserunt.</p>
                        <button class="btn btn-sm btn-primary" onclick="add2cart(<?= $data->id ?>)"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
include_once("./footer.php");
?>