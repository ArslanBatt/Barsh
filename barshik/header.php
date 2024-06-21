<?php
session_start();
if(isset($_SESSION["message"])){
    $mes = $_SESSION["message"];
    echo "<script>toastr.success('$mes')</script>";
    unset($_SESSION["message"]);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>БарШик</title>
    <link rel="stylesheet" href="css/style-header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>
<header>
    <div class="container">
        <div class="nav-header">
            <img src="images/Group 8192.png" alt="Логотип" class="logo">
            <h1>БарШик</h1>
            <nav class="nav-menu">
                <a href="/">Главная</a>
                <a href="/catalog.php">Каталог</a>
                <a href="#footer">Контакты</a>
                <?php if(isset($_SESSION["User_id"])) { ?>
                    <a href="/personal-cab.php">Личный кабинет</a>
                    <a href="/cart.php">Корзина</a>
                    <a href="/logout.php">Выйти</a>
                <?php } else { ?>
                    <a href="auto.php">Войти</a>
                <?php } ?>
            </nav>
        </div>
    </div>
</header>
</body>
</html>
