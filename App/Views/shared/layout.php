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

    <?php if (strpos($view, 'login') !== false || strpos($view, 'register') !== false) : ?>

        <?php require_once(VIEW .  $view . ".php") ?>

    <?php else : ?>
</head>
<body>

<?php require_once(VIEW . '/shared/header.php') ?>

<?php require_once(VIEW .  $view . ".php") ?>

<?php require_once(VIEW . '/shared/footer.php') ?>

</body>
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
  <?php endif; ?>

</html>