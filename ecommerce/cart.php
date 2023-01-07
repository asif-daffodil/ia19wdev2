<?php
include_once("./header.php");
include_once("./navbar.php");
?>

<div class="container">
    <div class="row" id="ordernow1"></div>
    <div class="row" id="view"></div>
    <div class="row" id="ordernow2"></div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js" integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const showData = () => {
        const view = document.getElementById("view");
        const ordernow1 = document.getElementById("ordernow1");
        const ordernow2 = document.getElementById("ordernow2");
        const cartIds = JSON.parse(sessionStorage.getItem("cartIds") ?? 0)
        const cartList = cartIds != 0 ? cartIds.cartList : 0
        const count = {};
        let response;
        cartList != 0 && cartList.forEach(x => count[x] = (count[x] || 0) + 1);
        if (cartList.length === 0) {
            view.innerHTML = `
        <div class="col-md-6 m-auto alert alert-danger my-5 text-center py-5">No Data Found</div>
        `;
        } else {
            ordernow1.innerHTML = `
        <a class="btn btn-primary d-block mt-3 ms-auto col-md-2" href="./checkout.php">Check Out</a>
        `;
        }
        axios.post("./cartBack.php", {
            count: count
        }).then(res => {
            response = res.data;
            for (info in response) {
                view.innerHTML += `
            <div class="col-md-12 my-3">
                <div class="row d-flex border p-2">
                    <div class="col d-flex justify-content-start align-items-center">
                        <img src="${response[info].img}" alt="" class="img-fluid" style="height:80px" />
                    </div>
                    <div class="col d-flex justify-content-start align-items-center">${response[info].name}</div>
                    <div class="col d-flex justify-content-start align-items-center">${response[info].price}</div>
                    <div class="col d-flex justify-content-start align-items-center">${response[info].count}</div>
                    <div class="col d-flex justify-content-start align-items-center">${parseInt(response[info].price)  * parseInt(response[info].count)}</div>
                    <div class="col d-flex justify-content-start align-items-center"><button class="btn btn-sm btn-close" onclick="delCart(${response[info].id})"></button></div>
                </div>
            </div>
            `;
            }
        });
        if (cartList.length !== 0) {
            ordernow2.innerHTML += `
        <a class="btn btn-primary d-block ms-auto col-md-2" href="./checkout.php">Check Out</a>
        `;
        }
    }

    showData();





    const delCart = id => {
        const view = document.getElementById("view");
        const cartIds = JSON.parse(sessionStorage.getItem("cartIds") ?? 0)
        const cartList = cartIds != 0 ? cartIds.cartList : 0
        const count = {};
        let response;
        cartList != 0 && cartList.forEach(x => count[x] = (count[x] || 0) + 1);
        const cartJson = {
            cartList: []
        }
        const totalItem = cartList.filter(item => item == id).length;
        for (let i = 0; i < totalItem; i++) {
            const getIndex = cartList.indexOf(id);
            cartList.splice(getIndex, 1);
        }
        cartJson.cartList = cartList;
        sessionStorage.setItem("cartIds", JSON.stringify(cartJson));
        toastr.warning("Product deleted successfully");
        view.innerHTML = "";
        showData();
        cartNavFunc();
    }
</script>
<?php
include_once("./footer.php");
?>