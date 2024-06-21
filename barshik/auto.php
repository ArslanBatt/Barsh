<?php
    include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="auto-main">
        <h2>Авторизация</h2>
        <form action="auto_db.php" method="post" class="form-auto">
            <input required  type="email" name="email" placeholder=" email">
            <input required   type="password" name="password" placeholder="пароль">
            <button class = "entrance">Войти</button>
            <p>нет аккаунта,<a href="reg.php">зарегистрироваться</a></p>
        </form>
    </div>
    <footer id="footer">
        <div class="container">
            <div class="connection">
                <div class="connect">
                    <p>Связь с нами</p>
                    <div class="images-connection">
                        <img src="images\logorutub.png" alt="" class="icon-rutube">
                        <img src="images\icons8-vk-com-48.png" alt="" srcset="">
                        <img src="images\iconfinder-social-media-applications-23whatsapp-4102606_113811.png"
                            class="icon-whatsapp">
                    </div>
                </div>
                <div class="clock-work">
                    <p>Часы работы:</p>
                    <p>10:00 - 23:00</p>
                </div>
            </div>
            <hr>
            <p class="copirater">© 2023 Копирование запрещено. Все права защищены.</p>
        </div>
    </footer>
</body>
</html>