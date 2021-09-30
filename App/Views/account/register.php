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

    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/register.css">
    <style>
        body {
            background: url('<?=IMAGES_URL?>/anh1.jpg');
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="wrapper login">
        <form action="" id="form__register">
            <h1 class="form__title">Đăng ký</h1>
            <div class="form__constrain">
                <div class="form__group">
                    <i class="icon__login fas fa-user"></i>
                    <input type="text" id="name" name="name" class="form__input" placeholder="Tên đăng nhập">
                </div>
                <span class="form__message"></span>
            </div>
            <div class="form__constrain">
                <div class="form__group">
                    <i class="icon__login fas fa-envelope-open-text"></i>
                    <input type="text" id="email" name="email" class="form__input" placeholder="Email">
                </div>
                <span class="form__message"></span>
            </div>
            <div class="form__constrain">
                <div class="form__group">
                    <i class="icon__login fas fa-phone-alt"></i>
                    <input type="text" id="phone" name="phone" class="form__input" placeholder="Số điện thoại">
                </div>
            </div>
            <div class="form__constrain">
                <div class="form__group">
                    <i class="icon__login fas fa-map-marker-alt"></i>
                    <input type="text" id="address" name="address" class="form__input" placeholder="Địa chỉ giao hàng">
                </div>
            </div>
            <div class="form__constrain">
                <div class="form__group">
                    <i class="icon__login fas fa-unlock-alt"></i>
                    <input type="password" id="password" name="password" class="form__input" placeholder="Mật khẩu">
                </div>
                <span class="form__message"></span>
            </div>
            <div class="form__constrain">
                <div class="form__group">
                    <i class="icon__login fas fa-unlock-alt"></i>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form__input" placeholder="Nhập lại mật khẩu">
                </div>
                <span class="form__message"></span>
            </div>
            <input type="submit" value="Đăng ký" class="form__submit">
            <div class="form__link" >
                <a href="<?= DOCUMENT_ROOT ?>/account">Bạn đã có tài khoản? Đăng nhập</a>
            </div>
        </form>
    </div>
    <script src="<?= URL_JS ?>/validator.js"></script>
    <script>
        Validator({
            form: '#form__register',
            errorSelector: '.form__message',
            rules: [
                Validator.isRequired('#name'),
                Validator.isEmail('#email'),
                Validator.minLength('#password', 6),
                Validator.isConfirm('#password_confirmation', function(){
                    return document.querySelector("#form__register #password").value;
                })
            ]
        });
    </script>
</body>
</html>