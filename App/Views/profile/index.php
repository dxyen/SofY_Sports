<div class="wrapper spade__black"></div>
<div class="container user ">
    <h3 class="title">Thông tin tài khoản</h3>
    <div class="profile">
        <div class="profile__info">
            <form action="<?= DOCUMENT_ROOT . "/profile/update/" . $data['user']['id'] ?>" method="POST" class="profile__info__form" enctype="multipart/form-data">
                <label for="name">Họ tên: </label>
                <input type="text" name="fullname" id="fullname" value="<?= $data['user']['fullname'] ?>">
                <label for="avatar">Ảnh đại diện: </label>
                <input type="file" name="avatar" id="avatar">
                <label for="email">Email: </label>
                <input type="text" name="email" id="email" value="<?= $data['user']['email'] ?>">
                <label for="phone">Số điện thoại: </label>
                <input type="text" name="phone" id="phone" value="<?= $data['user']['phone'] ?>">
                <label for="address">Địa chỉ 1: </label>
                <input type="text" name="address" id="address" value="<?= $data['user']['address'] ?>">
                <label for="address">Địa chỉ 2: </label>
                <input type="text" name="address2" id="address2" value="<?= $data['user']['address2'] ?>">
                <button type="submit" class="user__info__btn btny btny__primary">Cập nhật thông tin</button>
                
            </form>
        </div>
        <div class="profile__avatar">
            <img class="profile__avatar__img" src="<?= USER_AVATAR_URL . (empty($_SESSION['user']['avatar']) ? "default-avatar.png" : $_SESSION['user']['avatar']) ?>" alt="Avatar">
            <p class="profile__avatar__info">Ảnh đại diện</p>
        </div>
    </div>
    <!-- space -->
    <div class="container"><div class="space"></div></div>
    <!-- end space -->
    <h3 class="title">Lịch sử mua hàng</h3>
    <?php if(empty($data['order'])) : ?>
        <p>Chưa có đặt mà đòi coi</p>
    <?php else : ?>
        <?php foreach($data['order'] as $index => $order) :?>
            <div class="user__history">
                <div class="user__history__order">
                    <h6>Đơn hàng #<span><?= $order['id']?></span></h6>
                </div>
                <div class="user__history__status">
                    <b>Trạng thái: <?= $order['name']?></b>
                    <br>
                    <div class="order__date"><b>Ngày đặt: </b><p> <?= $order['order_date']?></p></div>
                    <div class="order__date">
                        <b>Ngày giao: </b>
                        <?php if(($order['delivery_date'])=="") : ?>
                            <p>Qúy khách vui lòng chờ shop cập nhật ngày giao</p>
                        <?php else : ?>
                            <p> <?= $order['delivery_date']?></p>
                        <?php endif; ?>
                    </div>
                    <div class="user__history__status__price">
                        <b>Tổng tiền: </b> <span> <?= number_format($data[$order['id']]['total'], 0, '', ',') ?>đ</span>
                    </div>
                </div>
                <?php foreach($data[$order['id']]['orderDetails'] as $index => $orderDetail) :?>
                    <ul class="user__history__items">
                        <li class="user__history__itemsmini">
                            <a href="#/">
                                <img class="user__history__itemsmini__img" src="<?= IMAGES_ITEMS_URL ?>/<?= $orderDetail['image']?>" alt="ảnh sản phẩm">
                            </a>
                            <div class="user__history__itemsmini__info">
                                <a href="#/">
                                    <h4 class="user__history__itemsmini__info__name"><?= $orderDetail['item']?></h4>
                                </a>
                                <div class="user__history__itemsmini__info__price"><?= number_format($orderDetail['price'], 0, '', ',') ?>đ</div>
                                <label class="user__history__itemsmini__info__amount" for="">Số lượng: <?= $orderDetail['amount']?></label>
                            </div>
                        </li>
                    </ul>
                <?php endforeach ?>
            </div>
        <?php endforeach ?>
    <?php endif; ?>
    <!-- space -->
    <div class="container"><div class="space"></div></div>
    <!-- end space -->
</div>
<!-- space -->
<div class="container"><div class="space"></div></div>
<!-- end space -->
