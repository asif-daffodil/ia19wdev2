<?php
include_once("./header.php");
$pageno = !isset($_GET['pageno']) ? header("location: $pageName?pageno=1") : $_GET['pageno'];
?>
<div class="drawer drawer-mobile">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content w-full p-4">
        <!-- Page content here -->
        <?php include_once("./navbar.php") ?>
        <a href="<?= "./$pageName?pageno=$pageno&addproduct=1" ?>" class="btn btn-outline btn-primary mb-3">Add Product</a>
        <?php if (isset($_GET['addproduct'])) { ?>
            <div>
                <?php include_once("./components/addProducrForm.php") ?>
            </div>
        <?php } elseif (isset($_GET['editId'])) { ?>
            <div>
                <?php include_once("./components/editProduct.php") ?>
            </div>
        <?php    } else { ?>
            <div>
                <?php include_once("./components/productList.php") ?>
            </div>
        <?php } ?>

    </div>
    <div class="drawer-side bg-gray-900">
        <label for="my-drawer-2" class="drawer-overlay"></label>
        <?php include_once("./sidebar.php") ?>
    </div>
</div>
<?php
include_once("./footer.php");
?>