<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SofY Sports</title>

    <link rel="icon" href="img/logo.PNG"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
     crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/reset.css">

    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/base.css">

    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/login.css">
    <style>
        body {
            background: url('<?=IMAGES_URL?>/anh1.jpg');
            background-size: cover;
        }
        p {
            color: #F9E404;
        }
    </style>
</head>
<body>
    <div class="wrapper login">
        <form action="<?= DOCUMENT_ROOT ?>/user/authenticate" method="POST" id="form__login">
            <h1 class="form__title">Đăng nhập</h1>
            <?php if (isset($data['error'])) : ?>
              <?php foreach ($data['error'] as $index => $error) : ?>
                <p style="color: red"><?= $error ?></p>
              <?php endforeach; ?>
            <?php endif; ?>
            <?php if (isset($data['message'])) : ?>
              <?php foreach ($data['message'] as $index => $message) : ?>
                <p><?= $message ?></p>
              <?php endforeach; ?>
            <?php endif; ?>
            <div class="form__group">
                <i class="icon__login fas fa-user"></i>
                <input type="text" name="name" class="form__input" placeholder="Tên đăng nhập">
            </div>
            <div class="form__group">
                <i class="icon__login fas fa-unlock-alt"></i>
                <input type="password" name="password" class="form__input" placeholder="Mật khẩu">
                <div class="form__eye" id="eye">
                    <i class="far fa-eye-slash"></i>
                </div>
            </div>
            <input type="submit" value="Đăng nhập" class="form__submit">
            <div class="form__link" >
                <a href="<?= DOCUMENT_ROOT ?>/user/register">Bạn chưa có tài khoản? Đăng ký</a>
            </div>
        </form>
    </div>
</body>
<script 
    src="https://code.jquery.com/jquery-3.6.0.js" 
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" 
    crossorigin="anonymous">
</script>
<script>
    $(document).ready(function(){
        $('#eye').click(function(){
            $(this).toggleClass('open');
            $(this).children('i').toggleClass('fa-eye-slash fa-eye');
            if($(this).hasClass('open')){
                $(this).prev().attr('type', 'text');
            }else {
                $(this).prev().attr('type', 'password');
            }
        });
    });
</script>
</html>