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

                        <button class="btny btny__primary">Thêm vào giỏ hàng +</button>

                    </div>
                </div>
            <?php endforeach ?>
    </section>
    <!-- space -->
    <div class="container"><div class="space"></div></div>
    <!-- end space -->

    <div class="container items__title">
        <h3>Bình luận khách hàng</h3>
        <p>Bước Chân Theo Dấu Mặt Trời, rời xa ngôi nhà êm ấm để trở thành kẻ lữ hành cô độc đến những miền đất 
            lạ với tấm vé máy bay một chiều. Người phụ nữ ấy luôn mang trong mình câu hỏi: Tôi sinh ra bởi điều gì? 
            Tôi đang đi về đâu?... Để rồi vào một buổi chiều trên đỉnh núi Linh Thứu, lúc mặt trời rực rỡ xuống sau dãy 
            núi, người phụ nữ ấy đã bắt đầu tìm được điều mình đang khao khát, ráng chiều đỏ thắm dần lấp đầy khoảng 
            trống vô hình trong cô. Người phụ nữ ấy hành hương đến Ấn Độ, nơi có một vị Phật đã thành đạo, nơi đã một 
            thời mang trong mình nền văn minh huy hoàng của loài người nay trở thành nơi nghèo nàn, và nguy hiểm nhất 
            thế giới. Trong chuyến độc hành của mình, người phụ nữ yếu đuối đã trải qua nhiều cung bậc cảm xúc: vui - 
            buồn - hạnh phúc - sợ hãi. Những người lạ nơi xứ người đã khiến người lữ khách không còn đơn độc mà mang cô 
            cảm giác thân thuộc, ấm áp tình người. Những người chúng ta đã gặp trong đời, mỗi sự việc xảy đến đều ý 
            nghĩa và dạy cho chúng ta một bài học về cuộc sống. Những gì chúng ta trải qua đều là nhân - quả và chỉ 
            có cách bình tĩnh chiêm nghiệm mới giúp ta an yên giữa cuộc đời này. Bước Chân Theo Dấu Mặt Trời – Hành 
            Trình Trở Về Ấn Độ sẽ dẫn độc giả bước vào không gian văn hóa đậm chất Ấn Độ với những công trình kiến trúc 
            kỳ vĩ, tinh xảo, các loại hình nghệ thuật truyền thống đầy tinh tế, nền ẩm thực đa dạng thậm chí cả những 
            nhưng mọi vấn đề, rắc rối, đau khổ đều giống nhau bởi đều xuất phát từ tâm.”
        </p>
    </div>
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