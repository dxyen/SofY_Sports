<div class="wrapper spade__black"></div>
<!-- space -->
<div class="container"><div class="space"></div></div>
<!-- end space -->
<div class="container cart">
    <h3 class="title">Giỏ hàng của bạn</h3>
    <form action="<?= DOCUMENT_ROOT ?>/cart/checkBuy" method="POST">
        <div class="cart__detail">
            <ul class="cart__detail__items">
                <?php if ($data['item'] == 0) : ?>
                    <p>Bạn chưa chọn sản phẩm nào!</p>
                <?php else : ?>
                    <?php foreach($data['item'] as $index => $item) :?>
                        <li class="cart__detail__itemsmini">
                            <a href="<?= DOCUMENT_ROOT?>/items/detail?id=<?=$item['id']?>">
                                <img class="cart__detail__itemsmini__img" src="<?= IMAGES_ITEMS_URL ?>/<?= $item['image']?>" alt="ảnh sản phẩm">
                            </a>
                            <div class="cart__detail__itemsmini__info">
                                <a href="<?= DOCUMENT_ROOT?>/items/detail?id=<?=$item['id']?>">
                                    <h4 class="cart__detail__itemsmini__info__name"><?= $item['name']?></h4>
                                </a>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <input type="number" hidden id="priceOfItem<?= $index ?>" value="<?= $item['price'] ?>">
                                <div class="cart__detail__itemsmini__info__price"><?= number_format($item['price'], 0, '', ',') ?>đ</div>
                                <label class="cart__detail__itemsmini__info__amount" for="">Số lượng: 
                                    <input onchange="onNumOfProductChange(), update(<?= $_SESSION['user']['id'] ?>, <?= $item['id'] ?>, numOfItem<?= $index ?>)" id="numOfItem<?= $index ?>" type="number" value="<?= $item['amount']?>" min="1" max="99" name="">
                                </label>
                                <button type="button" class=" cart__detail__itemsmini__btn btn btn-danger identifyingClass" data-toggle="modal" data-target="#modal-delete<?=$index?>">Xóa</button>
                            </div>
                            <!-- modal -->
                            <div class="modal fade" id="modal-delete<?=$index?>" aria-labelledby="my_modalLabel">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                            <h2 class="modal-title" id="exampleModalLongTitle<?= $index ?>">Xác nhận xóa</h2>
                                          </div>
                                          <div class="modal-body">
                                              <p>Xóa <?= $item['name']?></p>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn  btn-success" data-dismiss="modal">Hủy</button>
                                              <a href="<?=DOCUMENT_ROOT?>/cart/delete?userId=<?= $_SESSION['user']['id']?>&itemId=<?= $item['id']?>"><button type="button" class="btn btn-danger">Xóa</button></a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- end modal -->
                        </li>
                    <?php endforeach ?>
                <?php endif; ?>
            </ul>
            <div class="cart__detail__user">
                <div class="cart__detail__user__title">Thông tin nhận hàng</div>
                <?php if ($data['user'] == 0) : ?>
                    <p>Bạn chưa đăng nhập</p>
                <?php else : ?>
                    <div class="cart__detail__user__info">
                        <p><b>Tên người nhận: </b></p>
                        <input hidden type="text" name="name" value="<?= $data['user']['id'] ?>">
                        <p><?= $data['user']['fullname'] ?></p>
                        <p><b>Số điện thoại: </b></p>
                        <p><?= $data['user']['phone'] ?></p>
                        <div class="cart__detail__user__info__address">
                            <p><b>Địa chỉ giao hàng: </b></p>
                            <input type="radio" name="address" value="<?= $data['user']['address'] ?>" checked>  <?= $data['user']['address'] ?>
                            <br>
                            <input type="radio" name="address" value="<?= $data['user']['address2'] ?>" checked>  <?= $data['user']['address2'] ?>
                        </div>
                        <p><b>Tổng tiền:</b></p>
                        <p class="price__total" id="total">0đ</p>
                        <button class="cart__detail__user__info__btn btny btny__primary">Đặt hàng </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </form>
</div>
<!-- space -->
<div class="container"><div class="space"></div></div>
<!-- end space -->
<!-- space -->
<div class="container"><div class="space"></div></div>
<!-- end space -->
<script>
    function onNumOfProductChange() {
        var total = document.getElementById("total");
        var totalNumber = 0;
        if (total != undefined) {
            for (var i = 0; i < <?= count($data['item']) ?>; i++) {
            var numOfItem = document.getElementById("numOfItem" + i).value;
            var priceOfItem = document.getElementById("priceOfItem" + i).value;
            totalNumber += parseInt(numOfItem) * parseInt(priceOfItem);
            }
            total.innerText = new Intl.NumberFormat().format(totalNumber) + "đ";
        }
        return;
    }
    onNumOfProductChange();

    function update(idUser, idItem, amountChange) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            }
        };
        xhttp.open("GET", "<?= DOCUMENT_ROOT ?>/cart/changeAmount?idUser=" + idUser + "&idItem=" + idItem + "&amount=" + amountChange.value,true);
        xhttp.send();
    }
</script>
