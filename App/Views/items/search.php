<div class="spade__black"></div>
<!-- all items list-->
<div class="wrapper">
    <section class="container all__products">
        <h3 class="title">Sản phẩm tìm kiếm </h3>
        <?php if (!empty($data['items'])) : ?>
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
        <?php else : ?>
            <p style="display: flex; align-items: center;">Sản phẩm "<?= $data['keyword'] ?>" không tìm thấy</p>
            <div style="margin-top: 200px;"></div>
        <?php endif; ?>
    </section>
</div>
<!-- end all items list-->
<!-- space -->
<div class="container"><div class="space"></div></div>
<!-- end space -->