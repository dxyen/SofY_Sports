<div class="wrapper spade__black"></div>
<div class="container user ">
    <h3 class="title">Thông tin tài khoản</h3>
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
    <!-- space -->
    <div class="container"><div class="space"></div></div>
    <!-- end space -->
    <h3 class="title">Lịch sử mua hàng</h3>
    <div class="user__history">
        <div class="user__history__order">
            <h6>Đơn hàng #<span>03</span></h6>
        </div>
        <ul class="user__history__items">
            <li class="user__history__itemsmini">
                <a href="#/">
                    <img class="user__history__itemsmini__img" src="img/dmbongba.jpg" alt="ảnh sản phẩm">
                </a>
                <div class="user__history__itemsmini__info">
                    <a href="#/">
                        <h4 class="user__history__itemsmini__info__name">Áo đấu Barcalona</h4>
                    </a>
                    <div class="user__history__itemsmini__info__price">40.000đ</div>
                    <label class="user__history__itemsmini__info__amount" for="">Số lượng: 1</label>
                </div>
            </li>
            <li class="user__history__itemsmini">
                <a href="#/">
                    <img class="user__history__itemsmini__img" src="img/dmbongba.jpg" alt="ảnh sản phẩm">
                </a>
                <div class="user__history__itemsmini__info">
                    <a href="#/">
                        <h4 class="user__history__itemsmini__info__name">Áo đấu Barcalona</h4>
                    </a>
                    <div class="user__history__itemsmini__info__price">40.000đ</div>
                    <label class="user__history__itemsmini__info__amount" for="">Số lượng: 1</label>
                </div>
            </li>
        </ul>
        <div class="user__history__status">
            <b>Trạng thái: Đang xử lí</b>
            <div class="user__history__status__price">
                <b>Tổng tiền: </b><span>100.000đ</span>
            </div>
        </div>
    </div>
    <!-- space -->
    <div class="container"><div class="space"></div></div>
    <!-- end space -->
    <div class="user__history">
        <div class="user__history__order">
            <h6>Đơn hàng #<span>03</span></h6>
        </div>
        <ul class="user__history__items">
            <li class="user__history__itemsmini">
                <a href="#/">
                    <img class="user__history__itemsmini__img" src="img/dmbongba.jpg" alt="ảnh sản phẩm">
                </a>
                <div class="user__history__itemsmini__info">
                    <a href="#/">
                        <h4 class="user__history__itemsmini__info__name">Áo đấu Barcalona</h4>
                    </a>
                    <div class="user__history__itemsmini__info__price">40.000đ</div>
                    <label class="user__history__itemsmini__info__amount" for="">Số lượng: 1</label>
                </div>
            </li>
            <li class="user__history__itemsmini">
                <a href="#/">
                    <img class="user__history__itemsmini__img" src="img/dmbongba.jpg" alt="ảnh sản phẩm">
                </a>
                <div class="user__history__itemsmini__info">
                    <a href="#/">
                        <h4 class="user__history__itemsmini__info__name">Áo đấu Barcalona</h4>
                    </a>
                    <div class="user__history__itemsmini__info__price">40.000đ</div>
                    <label class="user__history__itemsmini__info__amount" for="">Số lượng: 1</label>
                </div>
            </li>
        </ul>
        <div class="user__history__status">
            <b>Trạng thái: Đang xử lí</b>
            <div class="user__history__status__price">
                <b>Tổng tiền: </b><span>100.000đ</span>
            </div>
        </div>
    </div>
</div>
<!-- space -->
<div class="container"><div class="space"></div></div>
<!-- end space -->
