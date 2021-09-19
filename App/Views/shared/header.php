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
            <div class="header__cart">
                <i class="header__icons fas fa-cart-arrow-down"></i>
                <p class="header__cart__amount">03</p>
            </div>
            <div class="header__user">
                <div class="header__user__avt">
                    <i class="header__icons fas fa-user"></i>
                </div>
                <div class="header__user__dropdown">
                    <ul>
                    <li><a href="#">Thông tin</a></li>
                    <li><a href="#">Giỏ hàng</a></li>
                    <li><a href="<?= DOCUMENT_ROOT ?>/account">Đăng nhập</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="banner">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active banner__img">
                <img src="<?=IMAGES_URL?>/anh1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item banner__img">
                <img src="<?=IMAGES_URL?>/anh2.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon banner__btn" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon banner__btn" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <div class="container">
                <div class="banner__info">
                    <h1>Sports</h1>
                    <h1>change your life</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end wrapper -->