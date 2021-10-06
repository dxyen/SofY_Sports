<!-- wrapper_header-->
<div class="wrapper">
    <header class="header">
        <a href="<?= DOCUMENT_ROOT ?>" class="header__logo"><img src="<?=IMAGES_URL?>/logomax.png" alt=""></a>
        <div class="header__menu">
            <ul class="header__menu__items noselect">

                <li><a href="<?= DOCUMENT_ROOT?>" class="header__menu__item <?= $GLOBALS["currentPage"]=='Home' ? 'header__menu__item__active' : ""?>">Trang Chủ</a></li>
                <li><a href="<?= DOCUMENT_ROOT?>/products/categories?id=1" class="header__menu__item <?= $GLOBALS['currentPage']=='Products' || $GLOBALS['currentPage']=='Items' ? 'header__menu__item__active' : ""?>">Sản Phẩm</a></li>
                <li><a href="<?= DOCUMENT_ROOT?>/introduction/index" class="header__menu__item <?= $GLOBALS["currentPage"]=='Introduction' ? 'header__menu__item__active' : ""?>">Giới Thiệu</a></li>
                <li><a href="<?= DOCUMENT_ROOT?>" class="header__menu__item ">Liên Hệ</a></li>
            </ul>
        </div>
        <div class="header__search noselect">
            <form action="<?= DOCUMENT_ROOT ?>/items/search" method="get">
                <input type="text" name="keyword" placeholder="Tìm kiếm ...">
            </form>
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
                    <!-- <i class="header__icons fas fa-user"></i> -->
                    <img src="<?= USER_AVATAR_URL ?>/dmbongda.jpg" alt="Avatar">
                </div>
                <div class="header__user__dropdown">
                    <ul>
                    <li><a href="#">Thông tin</a></li>
                    <li><a href="<?= DOCUMENT_ROOT ?>/user">Đăng nhập</a></li>
                    <li><a href="<?= DOCUMENT_ROOT ?>/user/register">Đăng ký</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</div>
<!-- end wrapper -->
