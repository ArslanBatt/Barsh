<?php
    include"header.php";
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
    <div class="registr">
        <h2>Регистрация</h2>
        <form action="reg_db.php" method="post" class="form-reg">
            <input required type="email" name="email" placeholder="email">
            <input required type="password" name="password" placeholder=" пароль">
            <button class="button-reg">Зарегистрироваться</button>
            <p>есть аккаунт,<a href="auto.php">Авторизоваться</a></p>
        </form>
    </div>
    
    <footer id="footer" class="mt-5">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-md-6 text-light">
                    <h5>Связь с нами</h5>
                    <div class="d-flex align-items-center">
                        <img style="width: 35px;" src="images/logorutub.png" alt="" class="me-2">
                        <img style="width: 35px;" src="images/icons8-vk-com-48.png" alt="" class="me-2">
                        <img style="width: 35px;" src="images/iconfinder-social-media-applications-23whatsapp-4102606_113811.png" alt="" class="me-2">
                    </div>
                </div>
                <div class="col-md-6 text-light text-md-end">
                    <h5>Часы работы:</h5>
                    <p>10:00 - 23:00</p>
                </div>
            </div>
            <hr class="bg-light">
            <p class="text-center text-light m-0">© 2023 Копирование запрещено. Все права защищены.</p>
        </div>
    </footer>
</body>
</html>