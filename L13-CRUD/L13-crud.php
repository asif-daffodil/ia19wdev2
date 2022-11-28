<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="./style.min.css">
</head>

<?php

$conn = mysqli_connect("localhost", "root", "", "ia19fifa");
$pageNo = $_GET['pageNo'] ?? header("location: L13-crud.php?pageNo=1");

if (isset($_POST['voteBtn'])) {
    $name = safe($_POST['name']);
    $team = safe($_POST['team'] ?? null);

    if (empty($name)) {
        $err["name"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problem!</strong> Please write your name!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
    if (empty($team)) {
        $err["team"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problem!</strong> Please select your team!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }

    if (!empty($name) && !empty($team)) {
        $name = $conn->real_escape_string($name);
        $team = $conn->real_escape_string($team);
        $insertQuery = "INSERT INTO `votes` (`name`, `team`) VALUES ('$name', '$team')";
        $insert = $conn->query($insertQuery);
        if (!$insert) {
            $err["insert"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problem!</strong> Database problem!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        } else {
            echo "<script>location.href='L13-crud.php?pageNo=" . $pageNo . "&v=s'</script>";
            $name = $team = null;
        }
    }
}

function safe($data)
{
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}

$selectAllDataQuery = "SELECT * FROM `votes` ORDER BY `id` DESC";
$selectBrazilDataQuery = "SELECT * FROM `votes` WHERE `team` = 'Brazil'";
$selectArgentinaDataQuery = "SELECT * FROM `votes` WHERE `team` = 'Argentina'";
$selectAllData = $conn->query($selectAllDataQuery);
$selectBrazilData = $conn->query($selectBrazilDataQuery);
$selectArgentinaData = $conn->query($selectArgentinaDataQuery);
$totalBrazil = $selectBrazilData->num_rows;
$totalArgentina = $selectArgentinaData->num_rows;

$dataPerPage = 5;
$totalData = $selectAllData->num_rows;
$tatoalPage = ceil($totalData / $dataPerPage);
$startPoint = ($pageNo - 1) * $dataPerPage;

$PaginationQuery = "SELECT * FROM `votes` ORDER BY `id` DESC LIMIT $startPoint, $dataPerPage";
$Pagination = $conn->query($PaginationQuery);

?>


<body>
    <div class="container">
        <div class="row min-vh-100 d-flex">
            <?php
            if (isset($_GET["v"])) {
                echo "<script>toastr.success('Your Vote has been counted'); setTimeout(()=>{location.href='L13-crud.php'}, 2000)</script>";
            }
            ?>
            <div class="col-md-6 p-4 border-end border-secondary border-1 rounded">
                <h2 class="mb-4 fs-5">Vote for your Favourute football team!</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Your Name" name="name" value="<?= $name ?? null ?>">
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <label for="" class="from-form-check-label">
                                <input type="radio" class="form-form-check-input" value="Brazil" name="team" <?= isset($team) && $team === "Brazil" ? "checked" : null ?>>
                                Brazil
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="" class="from-form-check-label">
                                <input type="radio" class="form-form-check-input" value="Argentina" name="team" <?= isset($team) && $team === "Argentina" ? "checked" : null ?>>
                                Argentina
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" value="Vote" name="voteBtn">
                    </div>
                </form>
                <?php
                if (isset($err)) {
                    foreach ($err as $e) {
                        echo $e;
                    }
                }
                ?>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center align-items-start mb-5">
                        <div class="flag me-1" cname="Brazil" total="<?= $totalBrazil ?? null ?>">
                            <img src="./images/download.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="flag ms-1" cname="Argentina" total="<?= $totalArgentina ?? null ?>">
                            <img src="./images/images.png" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <?php if ($selectAllData->num_rows > 0) { ?>
                            <table class="table table-warning table-striped table-hover">
                                <tr>
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    <th>Team</th>
                                    <th>Action</th>
                                </tr>
                                <?php $sn = $startPoint + 1;
                                while ($data = $Pagination->fetch_object()) { ?>
                                    <tr>
                                        <td><?= $sn ?></td>
                                        <td><?= $data->name ?></td>
                                        <td><?= $data->team ?></td>
                                        <td></td>
                                    </tr>
                                <?php ++$sn;
                                } ?>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="./L13-crud.php?pageNo=<?= $pageNo > 1 ? --$pageNo : 1 ?>">Previous</a></li>
                                    <?php
                                    for ($i = 1; $i <= $tatoalPage; $i++) {
                                    ?>
                                        <li class="page-item <?= $_GET['pageNo'] == $i ? 'active' : null ?>"><a class="page-link" href="./L13-crud.php?pageNo=<?= $i ?>"><?= $i; ?></a></li>
                                    <?php } ?>
                                    <li class="page-item"><a class="page-link" href="./L13-crud.php?pageNo=<?= $tatoalPage >= $_GET['pageNo'] + 1 ? ($_GET['pageNo'] + 1) : $_GET['pageNo'] ?>">Next</a></li>
                                </ul>
                            </nav>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>