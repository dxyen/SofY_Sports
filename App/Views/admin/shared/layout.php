<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin nè</title>

    <link rel="icon" href="<?= ICONS_URL ?>/logo.PNG"/>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= PUBLIC_URL. "/admin"?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= PUBLIC_URL. "/admin"?>/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->    
    <link rel="stylesheet" href="<?= PUBLIC_URL. "/admin"?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= PUBLIC_URL. "/admin"?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= PUBLIC_URL. "/admin"?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= PUBLIC_URL. "/admin"?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


</head>
<body>
    <?php require_once(VIEW . "/admin/shared/sidebar.php") ?>

    <?php require_once(VIEW . "/admin/shared/header.php") ?>

    <div class="content-wrapper">
        <?php require_once(VIEW .  $view . ".php") ?>
    </div>

    <?php require_once(VIEW . "/admin/shared/footer.php") ?>
    
</body>


</html>