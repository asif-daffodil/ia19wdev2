<?php
$selectAll = $conn->query("SELECT * FROM `products`");
$total_result = $selectAll->num_rows;
$result_per_page = 5;
$total_page = ceil($total_result / $result_per_page);
$startPoint = ($pageno - 1) * $result_per_page;
$select = $conn->query("SELECT * FROM `products` LIMIT $startPoint, $result_per_page");

if (isset($_GET['delId'])) {
    $delId = $_GET['delId'];
    $checkdel = $conn->query("SELECT * FROM `products` WHERE `id` = $delId");
    $checkdel->num_rows == 0 && header("location: $pageName?pageno=$pageno");
    $del = $conn->query("DELETE FROM `products` WHERE `id` = $delId");
    if ($del) {
        echo "<script>toastr.error('Product has been deleted')</script>";
        echo "<script>setTimeout(()=> location.replace(location.href), 1000)</script>";
    }
}
?>
<div class="overflow-x-auto">
    <table class="table w-full">
        <!-- head -->
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Img</th>
                <th>Regular Price</th>
                <th>Discount Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $sn = $startPoint + 1;
            while ($data = $select->fetch_object()) { ?>
                <tr>
                    <th><?= $sn; ?></th>
                    <td><?= $data->name ?></td>
                    <td><img src=".<?= $data->img ?>" alt="" class="h-8"></td>
                    <td><?= $data->regular_price ?></td>
                    <td><?= $data->discount_price ?></td>
                    <td>
                        <a href='<?= "./$pageName?pageno=$pageno&editId=$data->id" ?>' class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <a href='<?= "./$pageName?pageno=$pageno&delId=$data->id" ?>' class="btn btn-error" onclick="return confirm('do you really want to delete the product?')"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            <?php $sn++;
            } ?>
        </tbody>
    </table>
    <div class="btn-group">
        <?php for ($i = 1; $i <= $total_page; $i++) { ?>
            <a class="btn <?= $pageno == $i ? "btn-active" : null ?>" href="<?= "./$pageName?pageno=$i" ?>"><?= $i; ?></a>
        <?php  } ?>
    </div>
</div>