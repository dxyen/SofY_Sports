<!-- wrapper_header-->
<div class="wrapper">
    <header class="header">
        <a href="<?= DOCUMENT_ROOT ?>" class="header__logo"><img src="<?=IMAGES_URL?>/logomax.png" alt=""></a>
        <div class="header__menu">
            <ul class="header__menu__items noselect">
                <li><a href="#" class="header__menu__item header__menu__item__active">Bóng Đá</a></li>
                <li><a href="#" class="header__menu__item">Cầu Long</a></li>
                <li><a href="#" class="header__menu__item">Bóng Chuyền</a></li>
                <li><a href="#" class="header__menu__item">Tennis</a></li>
                <li><a href="#" class="header__menu__item">Gym</a></li>
                <li><a href="#" class="header__menu__item">Bơi Lội</a></li>
            </ul>
        </div>
        <div class="header__search noselect">
            <button class="header__search__button"><i class="header__icons fas fa-search"></i></button>
            <input type="text" placeholder="Tìm kiếm ...">
        </div>
        <div class="header__info noselect">
            <a href="<?= DOCUMENT_ROOT ?>/cart">
                <div class="header__cart">
                    <i class="header__icons fas fa-cart-arrow-down"></i>
                    <p class="header__cart__amount">03</p>
                </div>
            </a>
            <div class="header__user">
                <div class="header__user__avt">
                    <i class="header__icons fas fa-user"></i>
                </div>
                <div class="header__user__dropdown">
                    <ul>
                    <li><a href="#">Thông tin</a></li>
                    <li><a href="<?= DOCUMENT_ROOT ?>/account">Đăng nhập</a></li>
                    <li><a href="<?= DOCUMENT_ROOT ?>/account/register">Đăng ký</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</div>
<!-- end wrapper -->