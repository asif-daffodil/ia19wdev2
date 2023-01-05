<?php
include_once("./header.php");
include_once("./navbar.php");
?>

<div class="container">
    <div class="row" id="view"></div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js" integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const view = document.getElementById("view");
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
            console.log(response[info]);
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
                    <div class="col d-flex justify-content-start align-items-center"><button class="btn btn-danger btn-sm btn-close" onclick="delCart(${response[info].id})"></button></div>
                </div>
            </div>
            `;
        }
    });
    if (cartList === 0) {
        view.innerHTML = `
        <div class="col-md-6 m-auto alert alert-danger my-5 text-center">No Data Found</div>
        `;
    }

    const delCart = id => {
        alert(id);
    }
</script>
<?php
include_once("./footer.php");
?>