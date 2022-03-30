<div class="spade__black"></div>

<div class="wrapper">
    <section class="container items">
        <h3 class="title">Chi tiết sản phẩm</h3>
            <div class="items__item">
                <div class="items__img">
                    <img id="zoom" src="<?= IMAGES_ITEMS_URL ?>/<?= $data['items']['image']?>" alt="">
                </div>
                <div class="items__info">
                    <h4 class="items__info__name"><?= $data['items']['name']?></h4>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="items__price">
                        <div class="items__price__1"><?= number_format($data['items']['price'], 0, '', ',') ?>đ</div>
                        <div class="items__price__2"><?= number_format(($data['items']['price'])*1.1, 0, '', ',') ?>đ</div>
                    </div>
                    <p class="items__info__description">
                        <?= $data['items']['description']?>
                    </p>

                    <button onClick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>, <?= $data['items']['id'] ?>)" class="btny btny__primary">Thêm vào giỏ hàng +</button>

                </div>
            </div>
    </section>
    <!-- space -->
    <div class="container"><div class="space"></div></div>
    <!-- end space -->
    <div class="container items__comment">
        <div class="items__comment__form">
            <span>Bình Luận</span>
            <div class="form-group">
                <form action="<?= DOCUMENT_ROOT . "/items/comment"?>" method="POST">
                    <input class="form-control items__comment__form__text" name="comment" ></input>
                    <input type="hidden" name="idItemComment" value="<?= $data['items']['id']?>">
                    <input type="submit" class="btn__comment btn btn-success" value= "Gửi">
                </form>
            </div>
            <?php if(!isset($_SESSION['user'])) : ?>
                <p>Vui lòng đăng nhập để bình luận!</p>
            <?php endif; ?>

            <?php if($data['comment']=="") : ?>
                <p>Chưa có bình luận</p>
            <?php else : ?>
                <?php foreach($data['comment'] as $index =>$comment) : ?>
                    
                    <div class="items__comment__user">
                        <div class="items__comment__user__img">
                            <img src="<?= USER_AVATAR_URL . (empty($comment['avatar']) ? "default-avatar.png" : $comment['avatar']) ?>" alt="Avatar">
                        </div>
                        <div class="items__comment__user__info">
                            <div class="items__comment__user__name"><b><?= $comment['fullname']?></b></div>
                            <div class="items__comment__user__name"><?= $comment['comment']?></div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif; ?>
        </div>
    </div>
    <!-- space -->
    <div class="container"><div class="space"></div></div>
    <!-- end space -->
    <!-- bình luận sản phẩm -->
    <div class= "container info__product_items row">
        <div class="info__product_item--button col ">
            <div class="info__button">
                <p>Bình luận sản phẩm</p>
            </div>
        </div>
        <div class="info__product_item--content">
            <div class="info__product_item--content__mini">
                <div class="comment--item">
                    <img class="comment--item-image" src="<?= USER_AVATAR_URL . (empty($comment['avatar']) ? "default-avatar.png" : $comment['avatar']) ?>">
                    <div class="comment--items-info">
                        <div class="comment--items-info_flex">
                            <div class="comment--item-name">
                                <p>do xuan yen</p>
                            </div>
                            <div class="comment--item-date">
                                <p>08/10/2022</p>
                            </div>
                            <div class="star-lists-items">
                                <i class=" fa fa-star text-warning"></i>
                                <i class=" fa fa-star text-warning"></i>
                                <i class=" fa fa-star text-warning"></i>
                                <i class=" fa fa-star text-warning"></i>
                                <i class=" fa fa-star text-warning"></i>
                            </div>
                        </div>

                        <div class="comment--item-content">
                            <P>HÀNG TOT LAM</P>
                        </div>
                    </div>
                </div>
                <div class="comment--item">
                    <img class="comment--item-image" src="<?= USER_AVATAR_URL . (empty($comment['avatar']) ? "default-avatar.png" : $comment['avatar']) ?>">
                    <div class="comment--items-info">
                        <div class="comment--items-info_flex">
                            <div class="comment--item-name">
                                <p>do xuan yen</p>
                            </div>
                            <div class="comment--item-date">
                                <p>08/10/2022</p>
                            </div>
                            <div class="star-lists-items">
                                <i class=" fa fa-star text-warning"></i>
                                <i class=" fa fa-star text-warning"></i>
                                <i class=" fa fa-star text-warning"></i>
                                <i class=" fa fa-star text-warning"></i>
                                <i class=" fa fa-star text-warning"></i>
                            </div>
                        </div>

                        <div class="comment--item-content">
                            <P>HÀNG TOT LAM</P>
                        </div>
                    </div>
                </div>
                <div class="comment--item">
                    <img class="comment--item-image" src="<?= USER_AVATAR_URL . (empty($comment['avatar']) ? "default-avatar.png" : $comment['avatar']) ?>">
                    <div class="comment--items-info">
                        <div class="comment--items-info_flex">
                            <div class="comment--item-name">
                                <p>do xuan yen</p>
                            </div>
                            <div class="comment--item-date">
                                <p>08/10/2022</p>
                            </div>
                            <div class="star-lists-items">
                                <i class=" fa fa-star text-warning"></i>
                                <i class=" fa fa-star text-warning"></i>
                                <i class=" fa fa-star text-warning"></i>
                                <i class=" fa fa-star text-warning"></i>
                                <i class=" fa fa-star text-warning"></i>
                            </div>
                        </div>
                        <div class="comment--item-content">
                            <P>HÀNG TOT LAM</P>
                        </div>
                    </div>
                </div>
                <form action="" method="POST">
                    <input type="hidden" name="idProduct" value="">
                        <div class="form__comments">
                            <div class="form__comments-comment">
                                <img class="form__comment-image" src="<?= USER_AVATAR_URL . (empty($comment['avatar']) ? "default-avatar.png" : $comment['avatar']) ?>" alt="">
                                <textarea name="comments" id="" cols="15" rows="2" placeholder="Viết bình luận..."></textarea>
                            </div>
                            <div class="form__comments-ranking">
                                <p>Bạn cảm thấy sản phẩm này như thế nào?</p>
                                <div class="star-lists">
                                        <div class="star-lists-items">
                                            <label><i class="far fa-star star-list__item text-warning"></i></label>
                                            <input hidden type="radio" name="rank" value="" />
                                        </div>
                                        <div class="star-lists-items">
                                            <label><i class=" far fa-star star-list__item text-warning"></i></label>
                                            <input hidden type="radio" name="rank" value="" />
                                        </div>
                                        <div class="star-lists-items">
                                            <label><i class=" far fa-star star-list__item text-warning"></i></label>
                                            <input hidden type="radio" name="rank" value="" />
                                        </div>
                                        <div class="star-lists-items">
                                            <label><i class=" far fa-star star-list__item text-warning"></i></label>
                                            <input hidden type="radio" name="rank" value="" />
                                        </div>
                                        <div class="star-lists-items">
                                            <label><i class=" far fa-star star-list__item text-warning"></i></label>
                                            <input hidden type="radio" name="rank" value="" />
                                        </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btny__primary">Gửi đánh giá</button>
                </form>
            </div>
            <!-- đánh giá sản phẩm -->
            <div class="product_evaluation">
                <div class="result-rate--left">
                
                    <i class=" fa fa-star text-warning"></i>
                    <i class=" fa fa-star text-warning"></i>
                    <i class=" fa fa-star text-warning"></i>
                    <i class=" fa fa-star text-warning"></i>
                    <i class=" fa fa-star text-warning"></i>
                    <p>Đánh giá trung bình</p>
                    <p class="result-rate--sum">(đánh giá)</p>
                    <p class="result-rate--star"></p>
                </div>
            </div>
        </div>  
    </div>
    <!-- all items list-->
    <div class="container">
    <h4 class="title__h4">Sản phẩm liên quan</h4>
    </div>
    
    <div class="wrapper">
        <section class="container all__products">
            <!-- <h4 class="all__items__samekind">Sản phẩm liên quan</h4> -->
            <div class="all__items">
                <?php foreach($data['samekind'] as $index => $samekind) :?>
                    <div class="all__item">
                        <a class="all__item__link" href="<?= DOCUMENT_ROOT?>/items/detail?id=<?=$samekind['id']?>">
                            <img src="<?= IMAGES_ITEMS_URL ?>/<?= $samekind['image']?>" alt="ảnh sản phẩm">
                            <i class="eye fas fa-eye"></i>
                            <div class="all__item__name"><?= $samekind['name']?></div>
                            <div class="all__item__prices">
                                <div class="all__item__price__1"><?= number_format($samekind['price'], 0, '', ',') ?>đ</div>
                                <div class="all__item__price__2"><?= number_format(($samekind['price'])*1.1, 0, '', ',') ?>đ</div>
                            </div>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </section>
    </div>
    <!-- end all items list-->
    
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