<?php
include_once("./header.php");
include_once("./navbar.php");

$lateProducts = $conn->query("SELECT * FROM `products` ORDER BY `id` DESC LIMIT 6");
$preProducts = $conn->query("SELECT * FROM `products` LIMIT 6");
?>

<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 h-50" style="display: grid; grid-template-columns: repeat(2, 1fr);">
                            <img src="./images/sliders/img1.jpg" alt="" class="w-100 h-100">
                            <img src="./images/sliders/img2.jpg" alt="" class="w-100 h-100">
                        </div>
                        <div class="col-md-12 h-50" style="display: grid; grid-template-columns: repeat(2, 1fr);">
                            <img src="./images/sliders/img4.jpg" alt="" class="w-100 h-100">
                            <img src="./images/sliders/img3.jpg" alt="" class="w-100 h-100">
                        </div>
                    </div>
                </div>
                <div class="col-md-8 p-0">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="./images/sliders/slide1.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./images/sliders/slide2.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./images/sliders/slide3.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 display-6 py-3">Latest Products</div>
        <?php if ($lateProducts->num_rows > 0) { ?>
            <?php while ($data = $lateProducts->fetch_object()) { ?>
                <div class="col-md-2">
                    <div class="card py-3">
                        <img src="<?= $data->img ?>" alt="" class="card-img-top" style="height: 150px; object-fit: cover;">
                        <div class=" px-2">
                            <div class="fs-5">
                                <a href="./singleProduct.php?id=<?= $data->id ?>"><?= $data->name ?></a>
                            </div>
                            <div>
                                BDT <span class="text-muted text-decoration-line-through"><?= $data->regular_price ?></span>/<span><?= $data->discount_price ?></span>
                            </div>
                            <button class="btn btn-sm btn-primary" onclick="add2cart(<?= $data->id ?>)"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
    <div class="row">
        <div class="col-md-12 display-6 py-3">Regular Products</div>
        <?php if ($preProducts->num_rows > 0) { ?>
            <?php while ($data = $preProducts->fetch_object()) { ?>
                <div class="col-md-2">
                    <div class="card py-3">
                        <img src="<?= $data->img ?>" alt="" class="card-img-top" style="height: 150px; object-fit: cover;">
                        <div class=" px-2">
                            <div class="fs-5">
                                <a href="./singleProduct.php?id=<?= $data->id ?>"><?= $data->name ?></a>
                            </div>
                            <div>
                                BDT <span class="text-muted text-decoration-line-through"><?= $data->regular_price ?></span>/<span><?= $data->discount_price ?></span>
                            </div>
                            <button class="btn btn-sm btn-primary" onclick="add2cart(<?= $data->id ?>)"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</button>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</div>
<?php
include_once("./footer.php");
?>