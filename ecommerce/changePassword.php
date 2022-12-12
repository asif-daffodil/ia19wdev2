<?php
include_once("./header.php");
include_once("./navbar.php");
!isset($_SESSION['name']) && header("location: ./");

if (isset($_POST['si420'])) {
    $opass = $_POST['opass'];
    $npass = $_POST['npass'];

    $email = $_SESSION['email'];
    $opass = md5($opass);
    $npass = md5($npass);
    $checkOpass = $conn->query("SELECT * FROM `users` WHERE `email` = '$email' AND `pass` = '$opass'");
    if ($checkOpass->num_rows === 0) {
        echo "<script>toastr.error('Wrong old password')</script>";
    } else {
        $conn->query("UPDATE users SET pass = '$npass' WHERE email = '$email'");
        echo "<script>toastr.success('Password changes successfully')</script>";
    }
}
?>
<div class="container">
    <div class="row min-vh-100 d-flex">
        <div class="col-md-5 p-4 m-auto border rounded shadow">
            <h2 class="mb-3">Change password</h2>
            <form action="" method="post">
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="password" placeholder="Old Password" name="opass" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" placeholder="New Password" name="npass" class="form-control" required minlength="6">
                    </div>
                    <div class="mb-3">
                        <button type="tubmit" class="btn btn-primary btn-sm" name="si420">Change Password</button>
                    </div>
                </form>
            </form>
        </div>
    </div>
</div>


<?php
include_once("./footer.php");
?>