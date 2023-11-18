<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shop-Mixi</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="icon" href="/assets/files/assets/images/logo-mixi-tét.png" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
    <link rel="stylesheet" href="/assets/files/assets/css/client.css">

    <?php require_once './src/views/admin/components/head.php' ?>
</head>

<body>

    <?php require_once 'components/ListProducts.php' ?>
    

    <div class="super_container">

        <div id="header">
            <?php require_once 'components/Header.php' ?>
        </div>

        <main id="mainPage">
            <?php require_once $view . '.php'; ?>
        </main>
        <div id="footer">
            <?php require_once 'components/Footer.php' ?>
        </div>
    </div>

    <?php require_once './src/views/admin/components/foot.php' ?>

</body>

<!-- Mirrored from demo.dashboardpack.com/admindek-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Nov 2023 03:46:02 GMT -->

</html>