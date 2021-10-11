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
<!-- space -->
<div class="container"><div class="space"></div></div>
<!-- end space -->

<!-- connect -->
<div class="container">
    <div class="connect">
        <div class="connect__item">
            <div class="connect__items">
                <div class="connect__logo">
                    <a href="#/"><img src="<?=ICONS_URL?>/truck.png" alt="truck"></a>
                </div>
                <div class="connect__text">
                    <h3 class="connect__text__h3">Miễn Phí giao hàng</h3>
                    <p class="connect__text__p">Dù bạn ở chân trời hay gốc bể thì vẫn được miễn ship</p>
                </div>
            </div>
        </div>
        <div class="connect__item">
            <div class="connect__items">
                <div class="connect__logo">
                    <a href="#/"><img src="<?=ICONS_URL?>/phone.png" alt="phone"></a>
                </div>
                <div class="connect__text">
                    <h3 class="connect__text__h3">Liên hệ với chúng tôi</h3>
                    <p class="connect__text__p">Liên hệ với chúng tôi qua đường dây nóng: 033 869 7256</p>
                </div>
            </div>
        </div>
        <div class="connect__item">
            <div class="connect__items">
                <div class="connect__logo">
                    <a href="#/"><img src="<?=ICONS_URL?>/undo.png" alt="undo"></a>
                </div>
                <div class="connect__text">
                    <h3 class="connect__text__h3">Chính sách đổi trả</h3>
                    <p class="connect__text__p">Đổi trả miễn phí, sài hư sản phẩm đem đổi vẫn cứ là ok</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end connect -->

<!-- space -->
<div class="container"><div class="space"></div></div>
<!-- end space -->

<!-- product list -->
<div class="wrapper">
    <section class="container product noselect">
        <h3 class="title">Danh mục sản phẩm</h3>
        <ul class="product__items">
            <?php foreach($data['categories'] as $index => $categories) :?>
                <a href="<?= DOCUMENT_ROOT?>/products/categories?id=<?=$categories['id']?>">
                    <li class="product__item">
                        <img src="<?=IMAGES_URL?>/<?=$categories['image']?>" alt=" Ảnh bóng đá">
                        <i class="eye fas fa-eye"></i>
                        <div class="product__item__name">Dụng cụ <?=$categories['name']?></div>
                        <div class="product__item__description"><?=$categories['description']?></div>
                    </li>
                </a>
            <?php endforeach ?> 
        </ul>
    </section>
</div>
<!-- end product list -->

<!-- space -->
<div class="container"><div class="space"></div></div>
<!-- end space -->
<!-- promotion list -->
<div class="wrapper">
    <div class="promotion__background">
        <section class="promotion">
            <h3 class="title">Khuyến mãi hot</h3>
                <div class="promotion__item">
                    <a class="promotion__item__img" href="#/">
                        <img src="<?=IMAGES_URL?>/dmbongda.jpg" alt="">
                        <i class="eye fas fa-eye"></i>
                    </a>
                    <div class="promotion__info">
                        <h4 class="promotion__info__name">Áo đấu Barcalona</h4>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="promotion__price">
                            <div class="promotion__price__1">150.000đ</div>
                            <div class="promotion__price__2">300.000đ</div>
                        </div>
                        <p class="promotion__info__description">
                            Award yourself with this rich chocolate cake wonderfully
                            crammed with Cadbury Fuse and white chocolate chunks and
                            draped lusciously with molten chocolate. This perfect work of
                            art hides in every bite of chocolate that is a little nutty
                            and a lot of tasty!
                        </p>

                        <button class="btny btny__primary">Thêm vào giỏ hàng +</button>
                        
                    </div>
                </div>
                <div class="promotion__btn__roll-left">
                    <i class="lefty fas fa-chevron-left"></i>
                </div>
                <div class="promotion__btn__roll-right">
                    <i class="righty fas fa-chevron-right"></i>
                </div>
                <ul class="paging">
                    <li class="paging__item paging__item__active"></li>
                    <li class="paging__item"></li>
                    <li class="paging__item"></li>
                    <li class="paging__item"></li>
                    <li class="paging__item"></li>
                </ul>
        </section>
    </div>
</div>
<!-- end promotion list -->

<!-- space -->
<div class="container"><div class="space"></div></div>
<!-- end space -->

<!-- all items list-->
<div class="wrapper">
    <section class="container all__products" id="products-space">
        <h3 class="title">Sản Phẩm</h3>
        <div class="all__items">
            <?php foreach($data['items'] as $index => $items) :?>
                <div class="all__item">
                    <a class="all__item__link" href="<?= DOCUMENT_ROOT?>/items/detail?id=<?=$items['id']?>">
                        <img src="<?= IMAGES_ITEMS_URL ?>/<?= $items['image']?>" alt="ảnh sản phẩm">
                        <i class="eye fas fa-eye"></i>
                        <div class="all__item__name"><?= $items['name']?></div>
                        <div class="rating__all">
                            <i class="rating__all__i fas fa-star"></i>
                            <i class="rating__all__i fas fa-star"></i>
                            <i class="rating__all__i fas fa-star"></i>
                            <i class="rating__all__i fas fa-star"></i>
                            <i class="rating__all__i far fa-star"></i>
                        </div>
                        <div class="all__item__prices">
                            <div class="all__item__price__1"><?= number_format($items['price'], 0, '', ',') ?>đ</div>
                            <div class="all__item__price__2">300.000đ</div>
                        </div>
                    </a>
                    <button onClick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>, <?= $items['id'] ?>)" class="btny btny__primary">Thêm vào giỏ hàng +</button>
                </div>
            <?php endforeach ?>
        </div>
        <div class="paging__numbers noselect">
            <div class="paging__numbers__left">
                <a href="<?= $data['page'] == 1 ? "#/" : DOCUMENT_ROOT . "/index?page=" . ($data['page'] - 1)?>#products-space"><i class="lefty fas fa-chevron-left"></i></a>
            </div>
            <?php for($i =1; $i<=$data["totalPage"]; $i++): ?>
                <a <?= $i == $data['page'] ? 'onclick="event.preventDefault()"' : "" ?> 
                    href="<?= DOCUMENT_ROOT . "/index?page=$i" ?>#products-space" 
                    class="paging__number <?=$i == $data["page"] ? "paging__number__active" : "" ?>"><?=$i?>
                </a>
            <?php endfor ?>

            <a href="<?= $data['page'] == $data['totalPage'] ? "#/" : DOCUMENT_ROOT . "/index?page=" . ($data['page'] + 1) ?>#products-space"><i class="righty fas fa-chevron-right"></i></a>
        </div>
    </section>
</div>
<!-- end all items list-->

<!-- <div class="backtop">
    <i class="fas fa-chevron-up"></i>
</div> -->

 <!-- Javascript -->

 <!-- <script src="<?= URL_JS ?>/showslide.js"></script> -->