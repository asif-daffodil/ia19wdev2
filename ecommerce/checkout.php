<?php
include_once("./header.php");
include_once("./navbar.php");
$email = $_SESSION['email'];
$getDataByEmail = $conn->query("SELECT * FROM `users` WHERE `email` = '$email'");
$getData = $getDataByEmail->fetch_object();
?>

<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post" id="orderForm">
                <input type="hidden" value="<?= $getData->id ?>" id="userId">
                <div class="mb-3">
                    <input type="text" class="form-control disabled" value="<?= $_SESSION['name'] ?>" disabled>
                </div>
                <div class="mb-3">
                    <textarea name="address" class="form-control" placeholder="Delivery Address" style="resize: none;" required id="address"></textarea>
                </div>
                <div class="mb-3">
                    <select name="pmethod" id="pmethod" class="form-select" required>
                        <option value="">-Pament Method-</option>
                        <option value="Cash on Deliver">Cash on Deliver</option>
                    </select>
                </div>
                <div>
                    <input type="submit" value="Order Now" class="btn btn-primary">
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="row" id="view"></div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js" integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const showData = () => {
        const view = document.getElementById("view");
        const cartIds = JSON.parse(sessionStorage.getItem("cartIds") ?? 0)
        const cartList = cartIds != 0 ? cartIds.cartList : 0
        const count = {};
        let response;
        cartList != 0 && cartList.forEach(x => count[x] = (count[x] || 0) + 1);
        if (cartList.length === 0) {
            view.innerHTML = `
        <div class="col-md-6 m-auto alert alert-danger my-5 text-center py-5">No Data Found</div>
        `;
        }
        axios.post("./cartBack.php", {
            count: count
        }).then(res => {
            response = res.data;
            for (info in response) {
                view.innerHTML += `
            <div class="col-md-12">
                <div class="row d-flex border p-1">
                    <div class="col d-flex justify-content-start align-items-center">
                        <img src="${response[info].img}" alt="" class="img-fluid" style="height:60px" />
                    </div>
                    <div class="col d-flex justify-content-start align-items-center">${response[info].name}</div>
                    <div class="col d-flex justify-content-start align-items-center">${response[info].count}</div>
                    <div class="col d-flex justify-content-start align-items-center">${parseInt(response[info].price)  * parseInt(response[info].count)}</div>
                </div>
            </div>
            `;
            }
        });
    }
    showData();
</script>
<script>
    const orderForm = document.getElementById("orderForm");
    orderForm.addEventListener("submit", e => {
        e.preventDefault();
        const userId = document.getElementById("userId");
        const address = document.getElementById("address");
        const pmethod = document.getElementById("pmethod");
        const cartIds = JSON.parse(sessionStorage.getItem("cartIds") ?? 0)
        const cartList = cartIds != 0 ? cartIds.cartList : 0
        const count = {};
        let response;
        cartList != 0 && cartList.forEach(x => count[x] = (count[x] || 0) + 1);
        axios.post("./cartBack.php", {
            count: count
        }).then(res => {
            response = res.data;
            for (info in response) {
                axios.post("./orderBackup.php", {
                    product_id: response[info].id,
                    quantity: response[info].count,
                    price: response[info].price,
                    user_id: userId.value,
                    address: address.value,
                    pmethod: pmethod.value,
                }).then(res => {
                    if (res.data === "success") {
                        toastr.info("Order has ben submited!");
                        sessionStorage.removeItem("cartIds");
                        cartNavFunc();
                        setTimeout(() => location.href = "index.php", 2000);
                    }
                })
            }
        });
    })
</script>

<?php
include_once("./footer.php");
?>