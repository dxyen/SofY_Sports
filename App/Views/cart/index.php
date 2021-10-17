<div class="wrapper spade__black"></div>
<!-- space -->
<div class="container"><div class="space"></div></div>
<!-- end space -->
<div class="container cart">
    <h3 class="title">Giỏ hàng của bạn</h3>
    <form action="" method="POST">
        <div class="cart__detail">
            <ul class="cart__detail__items">
                <?php if ($data['item'] == 0) : ?>
                    <p>Bạn chưa chọn sản phẩm nào!</p>
                <?php else : ?>
                    <?php foreach($data['item'] as $index => $item) :?>
                        <li class="cart__detail__itemsmini">
                            <a href="#/">
                                <img class="cart__detail__itemsmini__img" src="<?= IMAGES_ITEMS_URL ?>/<?= $item['image']?>" alt="ảnh sản phẩm">
                            </a>
                            <div class="cart__detail__itemsmini__info">
                                <a href="#/">
                                    <h4 class="cart__detail__itemsmini__info__name"><?= $item['name']?></h4>
                                </a>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="cart__detail__itemsmini__info__price"><?= number_format($item['price'], 0, '', ',') ?>đ</div>
                                <label class="cart__detail__itemsmini__info__amount" for="">Số lượng: 
                                    <input  id="" type="number" value="<?= $item['amount']?>" min="1" max="99" name="">
                                </label>
                                <a href="<?=DOCUMENT_ROOT?>/cart/delete?userId=<?= $_SESSION['user']['id']?>&itemId=<?= $item['id']?>"><button type="button" class=" cart__detail__itemsmini__btn btn btn-danger">Xóa</button></a>
                            </div>
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
                        <p><?= $data['user']['fullname'] ?></p>
                        <p><b>Số điện thoại: </b></p>
                        <p><?= $data['user']['phone'] ?></p>
                        <div class="cart__detail__user__info__address">
                            <p><b>Địa chỉ giao hàng: </b></p>
                            <input type="radio" name="gerder" value="<?= $data['user']['address'] ?>" checked>  <?= $data['user']['address'] ?>
                            <br>
                            <input type="radio" name="gerder" value="<?= $data['user']['address2'] ?>" checked>  <?= $data['user']['address2'] ?>
                        </div>
                        <p><b>Tổng tiền:</b></p>
                        <p><b>100.000đ</b></p>
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

