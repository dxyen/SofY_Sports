<div class="wrapper spade__black"></div>
<!-- all items list-->
<div class="wrapper">
    <section class="container all__products" id="products-space">
        <h3 class="title">Sản Phẩm </h3>
        <div class="all__items">
            <?php foreach($data['items'] as $index => $items) :?>
                <a class="all__item__link" href="#/">
                    <div class="all__item">
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
                        <button class="btny btny__primary">Thêm vào giỏ hàng +</button>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </section>
</div>
<!-- end all items list-->
<!-- space -->
<div class="container"><div class="space"></div></div>
<!-- end space -->