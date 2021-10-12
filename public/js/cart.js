window.addEventListener("load", () => refreshCartNumber());

function addToCart(userId, itemId){
    if (userId == 0) {
        launch_toast("Vui lòng đăng nhập để thêm sản phẩm!");
        return;
    }
    var documentRoot = document.getElementById("documentRootId").innerText;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.response);
            if (response.isSuccess == true) {
                refreshCartNumber(response.numInCart);
                launch_toast("Thêm vào giỏ hành thành công!");
            } else {
                launch_toast("Thêm vào giỏ hành không thành công!");
                console.error(response.error);
            }
        }
    };
    xhttp.open("GET",`${documentRoot}/cart/addToCart?userId=${userId}&itemId=${itemId}`,true);
    xhttp.send();
}
function launch_toast(message) {
    var x = document.getElementById("toast");
    document.getElementById("desc").innerText = message;
    x.className = "show";
    setTimeout(function () {
      x.className = x.className.replace("show", "");
    }, 5000);
}

function refreshCartNumber(cartNumber = -1) {
    var cartNumberElement = document.getElementById("numInCartId");
    if (cartNumber !== -1) {
        cartNumberElement.innerText = cartNumber;
    } else {
        var documentRoot = document.getElementById("documentRootId").innerText;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            cartNumber = this.responseText;
            cartNumberElement.innerText = cartNumber;
        }
        };
        xhttp.open("GET", `${documentRoot}/cart/amountInCart`, true);
        xhttp.send();
    }
}
