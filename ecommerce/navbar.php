<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="./">eCommerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == "index.php" ? "active" : null ?>" aria-current="page" href="./">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == "shop.php" ? "active" : null ?>" href="./shop.php">Shop</a>
                </li>

                <?php if (!isset($_SESSION['name'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $pageName == "signinSignup.php" ? "active" : null ?>" href="./signinSignup.php">Sign in/Sign up</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-regular fa-user"></i>
                            <?= explode(" ", $_SESSION['name'])[0]  ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./profileSettings.php">Profile Settings</a></li>
                            <li><a class="dropdown-item" href="./changePassword.php">Change Password</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link position-relative me-5" href="./cart.php">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="position-absolute top-50 start-100 translate-middle-y badge rounded-pill bg-danger" id="cartnav">
                                0
                            </span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<script>
    let getCardArr = [];
    const cartNavFunc = () => {
        const cartnav = document.getElementById("cartnav");
        getCardJson = JSON.parse(sessionStorage.getItem("cartIds"));
        cartnav.innerHTML = getCardJson?.cartList?.length ?? 0;
    }
    cartNavFunc();
</script>