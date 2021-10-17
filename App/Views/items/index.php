<div class="wrapper spade__black"></div>

<div class="wrapper">
    <section class="container items">
        <h3 class="title">Chi tiết sản phẩm</h3>
            <?php foreach($data['items'] as $index =>$items) : ?>
                <div class="items__item">
                    <div class="items__img" href="#/">
                        <img id="zoom" src="<?= IMAGES_ITEMS_URL ?>/<?= $items['image']?>" alt="">
                    </div>
                    <div class="items__info">
                        <h4 class="items__info__name"><?= $items['name']?></h4>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="items__price">
                            <div class="items__price__1"><?= number_format($items['price'], 0, '', ',') ?>đ</div>
                            <div class="items__price__2">300.000đ</div>
                        </div>
                        <p class="items__info__description">
                            <?= $items['description']?>
                        </p>

                        <button onClick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>, <?= $items['id'] ?>)" class="btny btny__primary">Thêm vào giỏ hàng +</button>

                    </div>
                </div>
            <?php endforeach ?>
    </section>
    <!-- space -->
    <div class="container"><div class="space"></div></div>
    <!-- end space -->

    <div class="container items__comment">
        <div class="items__comment__form">
            <span>Bình Luận</span>
            <div class="form-group">
                <form action="<?= DOCUMENT_ROOT . "/items/comment?id=" . $items['id']?>" method="POST">
                    <input class="form-control items__comment__form__text" name="comment" ></input>
                    <input type="submit" class="btn__comment btn btn-success" value= "Gửi">
                </form>
            </div>
            <div class="items__comment__user">
                <div class="items__comment__user__name">Đỗ Xuân Yên</div>
                <div class="items__comment__user__name">Sản phẩm rất tốt nên mua</div>
            </div>
            <div class="items__comment__user">
                <div class="items__comment__user__name">Đỗ Xuân Yên</div>
                <div class="items__comment__user__name">Sản phẩm rất tốt nên mua</div>
            </div>
            <div class="items__comment__user">
                <div class="items__comment__user__name">Đỗ Xuân Yên</div>
                <div class="items__comment__user__name">Sản phẩm rất tốt nên mua</div>
            </div>
        </div>
    </div>
    <!-- space -->
    <div class="container"><div class="space"></div></div>
    <!-- end space -->
</div>
<script src="<?= URL_JS ?>/jquery-1.8.3.min.js"></script>
<script src="<?= URL_JS ?>/jquery.elevatezoom.js"></script>
<script>
    $('#zoom').elevateZoom({
        zoomType: 'lens',
        lensShape: 'round',
        lensSize: 150
    });
</script>