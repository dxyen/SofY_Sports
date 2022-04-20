<div class="banner">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active banner__img">
                <img src="<?=IMAGES_URL?>/pexels-pixabay-163403.jpg" class="d-block w-100" alt="...">
            </div>
            <!-- <div class="carousel-item banner__img">
                <img src="<?=IMAGES_URL?>/anh2.jpg" class="d-block w-100" alt="...">
            </div> -->
            <?php foreach($data['banner'] as $index => $banner) :?>
                <div class="carousel-item banner__img">
                    <img src="<?=IMAGES_URL?>/<?=$banner['image']?>" class="d-block w-100" alt="...">
                </div>
            <?php endforeach ?>
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
                <h1>Sofy Sports</h1>
                <h1>change your life.</h1>
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
<!-- promotion list -->
<div >
    <div class="promotion__background">
        <section class="promotion">
            <h3 class="title">Khuyến mãi hot</h3>
                <?php foreach($data['promotion'] as $index => $itemspromotion) :?>
                    <div class="promotion__item">
                        <a class="promotion__item__img" href="<?= DOCUMENT_ROOT?>/items/detail?id=<?=$itemspromotion['id']?>">
                            <img src="<?= IMAGES_ITEMS_URL ?>/<?= $itemspromotion['image']?>" alt="">
                            <i class="eye fas fa-eye"></i>
                        </a>
                        <div class="promotion__item__sale">
                            <img src="<?=IMAGES_URL?>/sale.png" class="" alt="...">
                        </div>
                        <div class="promotion__info">
                            <h4 class="promotion__info__name"><?= $itemspromotion['name']?></h4>
                            <div class="rating">
                                <?php if (isset($data['avg'][$itemspromotion['id']])) :?>
                                <?php for($i = 1; $i<=floor($data['avg'][$itemspromotion['id']]); $i++): ?>
                                    <i class=" fa fa-star text-warning"></i>
                                <?php endfor; ?>
                                <?php for($i = floor($data['avg'][$itemspromotion['id']]); $i< $data['avg'][$itemspromotion['id']]; $i++): ?>
                                    <i class="fas fa-star-half-alt text-warning"></i>
                                <?php endfor; ?>
                                    <?php if ($data['avg'][$itemspromotion['id']] != 5) :?>
                                        <?php for($i = ceil($data['avg'][$itemspromotion['id']]); $i< 5; $i++): ?>
                                            <i class="far fa-star text-warning"></i>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <p style = "font-size: 20px">Chưa có đánh giá</p>
                                <?php endif; ?>
                            </div>
                            <div class="promotion__price">
                                <div class="promotion__price__1"><?= number_format($itemspromotion['discount'], 0, '', ',') ?>đ</div>
                                <div class="promotion__price__2"><?= number_format(($itemspromotion['price'])*1.1, 0, '', ',') ?>đ</div>
                            </div>
                            <p class="promotion__info__description">
                                <?= $itemspromotion['description']?>
                            </p>

                            <button onClick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>, <?= $itemspromotion['id'] ?>)" class="btny btny__primary">Thêm vào giỏ hàng +</button>
                        </div>
                    </div>
                <?php endforeach ?>
                <div class="promotion__btn__roll-left" onclick="pushSlide(-1)">
                    <i class="lefty fas fa-chevron-left"></i>
                </div>
                <div class="promotion__btn__roll-right" onclick="pushSlide(1)">
                    <i class="righty fas fa-chevron-right"></i>
                </div>
                <ul class="paging">
                    <?php foreach($data['promotion'] as $index => $itemspromotion) :?>
                        <li class="paging__item" onclick="currentSlide(<?= $index+1 ?>)"></li>
                    <?php endforeach ?>
                </ul>
        </section>
    </div>
</div>
<!-- end promotion list -->

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
                            <?php if (isset($data['avg'][$items['id']])) :?>
                            <?php for($i = 1; $i<=floor($data['avg'][$items['id']]); $i++): ?>
                                <i class=" fa fa-star text-warning"></i>
                            <?php endfor; ?>
                            <?php for($i = floor($data['avg'][$items['id']]); $i< $data['avg'][$items['id']]; $i++): ?>
                                <i class="fas fa-star-half-alt text-warning"></i>
                            <?php endfor; ?>
                                <?php if ($data['avg'][$items['id']] !=5) :?>
                                    <?php for($i = ceil($data['avg'][$items['id']]); $i< 5; $i++): ?>
                                        <i class="far fa-star text-warning"></i>
                                    <?php endfor; ?>
                                <?php endif; ?>
                            <?php else : ?>
                                <p style = "font-size: 16px">Chưa có đánh giá</p>
                            <?php endif; ?>
                        </div>
                        <div class="all__item__prices">
                            <div class="all__item__price__1"><?= isset($items['discount'])? number_format($items['discount'], 0, '', ',') : number_format($items['price'], 0, '', ',') ?>đ</div>
                            <div class="all__item__price__2"><?= number_format(($items['price'])*1.1, 0, '', ',') ?>đ</div>
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