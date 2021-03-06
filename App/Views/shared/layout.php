<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SofY Sports</title>

    <link rel="icon" href="<?= ICONS_URL ?>/logo.PNG"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
     crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/reset.css">

    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/base.css">

    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/header.css">

    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/footer.css">

    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/home.css">

    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/cart.css">

    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/items.css">

    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/information.css">

    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/introduction.css">

    <?php if (strpos($view, 'login') !== false || strpos($view, 'register') !== false) : ?>

        <?php require_once(VIEW .  $view . ".php") ?>

    <?php else : ?>
</head>
<body>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "114572147912164");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v13.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <?php if ($GLOBALS['currentPage'] == 'Home'|| $GLOBALS['currentPage']=='Products' || $GLOBALS['currentPage']=='Items' || $GLOBALS["currentPage"]=='Introduction' ): ?>
        <!-- Onload page -->
        <div class="loader">
            <div class="circle-loading"></div>
        </div>
    <?php endif; ?>
    <!-- mesage add to cart -->
    <p hidden id="documentRootId"><?= DOCUMENT_ROOT ?></p>
    <div id="toast">
        <div id="desc"></div>
    </div>
    <!--end mesage add to cart -->
    <?php require_once(VIEW . '/shared/header.php') ?>

    <?php require_once(VIEW .  $view . ".php") ?>

    <?php require_once(VIEW . '/shared/footer.php') ?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(window).scroll(function(){
                if($(this).scrollTop()) {
                    $('header').addClass('sticky');
                } else {
                    $('header').removeClass('sticky');
                }
            });

            // $(window).scroll(function(){
            //     if($(this).scrollTop()) {
            //         $("#backtop").fadeIn();
            //     } else {
            //         $("#backtop").fadeOut();
            //     }
            // });
            // $("#backtop").click(function(){
            //     $('html, body').animate({
            //         scrollTop: 0
            //     }, 500);
            // });
        });
    </script>
    <script type="text/javascript" src="<?= URL_JS ?>/showslide.js"></script>
    <script type="text/javascript" src="<?= URL_JS ?>/cart.js"></script>
    
    <!-- link js bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous">
    </script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
    <script>
        window.addEventListener("load", function() {
            const loader = document.querySelector(".loader");
            loader.className += " hidden";
        });
    </script>
</body>

  <?php endif; ?>

</html>