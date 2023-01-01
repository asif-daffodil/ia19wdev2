<?php
include_once("./header.php");
?>
<div class="drawer drawer-mobile">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content w-full">
        <!-- Page content here -->
        <?php include_once("./navbar.php") ?>

    </div>
    <div class="drawer-side bg-gray-900">
        <label for="my-drawer-2" class="drawer-overlay"></label>
        <?php include_once("./sidebar.php") ?>
    </div>
</div>
<?php
include_once("./footer.php");
?>