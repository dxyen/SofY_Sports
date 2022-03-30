<div class="spade__black"></div>
<!-- all items list-->
<div class="wrapper">
    <section class="container all__products">
        <h3 class="title">Sản Phẩm </h3>
        <div class="all__products__lists">
            <a href="<?= DOCUMENT_ROOT?>/products/categories?id=1"><div class="all__products__list <?= $GLOBALS['currentType']=='categories' && $_GET['id'] == 1 ? 'all__products__list__active' : ""?>">Bóng Đá</div></a>
            <a href="<?= DOCUMENT_ROOT?>/products/categories?id=2"><div class="all__products__list <?= $GLOBALS['currentType']=='categories' && $_GET['id'] == 2 ? 'all__products__list__active' : ""?>">Cầu Lông</div></a>
            <a href="<?= DOCUMENT_ROOT?>/products/categories?id=3"><div class="all__products__list <?= $GLOBALS['currentType']=='categories' && $_GET['id'] == 3 ? 'all__products__list__active' : ""?>">Bóng Chuyền</div></a>
            <a href="<?= DOCUMENT_ROOT?>/products/categories?id=4"><div class="all__products__list <?= $GLOBALS['currentType']=='categories' && $_GET['id'] == 4 ? 'all__products__list__active' : ""?>">Tennis</div></a>
            <a href="<?= DOCUMENT_ROOT?>/products/categories?id=5"><div class="all__products__list <?= $GLOBALS['currentType']=='categories' && $_GET['id'] == 5 ? 'all__products__list__active' : ""?>">Gym</div></a>
            <a href="<?= DOCUMENT_ROOT?>/products/categories?id=6"><div class="all__products__list <?= $GLOBALS['currentType']=='categories' && $_GET['id'] == 6 ? 'all__products__list__active' : ""?>">Bơi Lội</div></a>
        </div>
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
                            <div class="all__item__price__2"><?= number_format(($items['price'])*1.1, 0, '', ',') ?>đ</div>
                        </div>
                    </a>
                    <button onClick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>, <?= $items['id'] ?>)" class="btny btny__primary">Thêm vào giỏ hàng +</button>
                </div>
            <?php endforeach ?>
        </div>
    </section>
</div>
<!-- end all items list-->
<!-- space -->
<div class="container"><div class="space"></div></div>
<!-- end space -->