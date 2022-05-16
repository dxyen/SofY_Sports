<div class="spade__black"></div>
<!-- space -->
<div class="container"><div class="space"></div></div>
<!-- end space -->
<div class="container cart">
    <h3 class="title">Giỏ hàng của bạn</h3>
    <?php require_once(VIEW . DS . "/shared/notification.php") ?>
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
                                    <?php if (isset($data['avg'][$item['id']])) :?>
                                    <?php for($i = 1; $i<=floor($data['avg'][$item['id']]); $i++): ?>
                                        <i class=" fa fa-star text-warning"></i>
                                    <?php endfor; ?>
                                    <?php for($i = floor($data['avg'][$item['id']]); $i< $data['avg'][$item['id']]; $i++): ?>
                                        <i class="fas fa-star-half-alt text-warning"></i>
                                    <?php endfor; ?>
                                    <?php else : ?>
                                        <p style = "font-size: 20px">Chưa có đánh giá</p>
                                    <?php endif; ?>
                                </div>
                                <input type="number" hidden id="priceOfItem<?= $index ?>" value="<?= isset($item['discount'])&& $data['date_time'] >= $item['date_start']? $item['discount'] : $item['price'] ?>">
                                <div class="cart__detail__itemsmini__info__price"><?= isset($item['discount']) && $data['date_time'] >= $item['date_start']? number_format($item['discount'], 0, '', ',') : number_format($item['price'], 0, '', ',') ?>đ</div>
                                <label class="cart__detail__itemsmini__info__amount" for="">Số lượng: 
                                    <input onchange="onNumOfProductChange(), update(<?= $_SESSION['user']['id'] ?>, <?= $item['id'] ?>, numOfItem<?= $index ?>)" id="numOfItem<?= $index ?>" type="number" value="<?= $item['amount']?>" min="1" max="99" name="">
                                </label>
                                <button type="button" class=" cart__detail__itemsmini__btn btn btn-danger identifyingClass" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$index?>">Xóa</button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?=$index?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="exampleModalLabel<?= $index ?>">Xác nhận xóa</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Xóa <?= $item['name']?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
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
                            <div>Địa chỉ 1: <?= $data['user']['address'] ?></div>
                            <div>Địa chỉ 2: <?= $data['user']['address2'] ?></div>
                        </div>
                        <p><b>Tổng tiền:</b></p>
                        <p class="price__total" id="total">0đ</p>
                        <div class="cart__detail__user__info__btn btny btny__primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Đặt hàng </div>
                    </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLabel">Xác nhận đặt hàng</h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <?php if ($data['item'] == 0) : ?>
                                    <p>Bạn chưa chọn sản phẩm nào!</p>
                                    <div class="modal-footer fs-6">
                                        <button type="button" class="btn btny btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    </div>
                                <?php else : ?>
                                    <div class="modal-body">
                                        <p>Nếu thông tin chưa chính xác quý khách vui lòng vào trang thông tin khách hàng để thay đổi!</p>
                                    </div>
                                    <div class="modal-body cart__detail__user__info">
                                        <p><b>Tên người nhận: </b><?= $data['user']['fullname'] ?></p>
                                        <p></p>
                                        <p><b>Số điện thoại: </b><?= $data['user']['phone'] ?></p>
                                        <div class="cart__detail__user__info__address">
                                            <p><b>Chọn địa chỉ giao hàng: </b></p>
                                            <input type="radio" name="address" value="<?= $data['user']['address'] ?>" checked>  <?= $data['user']['address'] ?>
                                            <br>
                                            <input type="radio" name="address" value="<?= $data['user']['address2'] ?>" checked>  <?= $data['user']['address2'] ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer fs-6">
                                        <button type="button" class="btn btny btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button class="btn btny btny__primary">Đặt hàng </button>
                                    </div>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- end modal -->
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
