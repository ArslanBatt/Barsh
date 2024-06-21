<?php
session_start();
require_once 'connect.php';
if (isset($_SESSION["message"])) {
    $mes = $_SESSION["message"];
    echo "<script>alert('$mes')</script>";
    unset($_SESSION["message"]);
}
$cart = [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>

<body>
    <?php require_once "header.php" ?>
    <main>
        <div class="container catalog">
            <h2>Каталог</h2>
            <div class="category">
                <button class="button-category">Соки</button>
                <button class="button-category">Кофе</button>
                <button class="button-category">Газированные напитки</button>
                <button class="button-category">Молочные напитки</button>
                <button class="button-category">Вода</button>
                <button class="button-category">Детские напитки</button>
            </div>
            <div class="row">
                <?php
                $res = mysqli_query($con, "SELECT *, Product.Name as product_name FROM product JOIN category ON product.Category_id = category.Category_id");
                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card h-100">
                            <img src="images/<?= $row["Image"] ?>" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row["product_name"] ?></h5>
                                <p class="card-text">категория: <?= $row["Name"] ?></p>
                                <p class="card-text"><?= $row["Price"] ?> ₽</p>
                                <?php if (isset($_SESSION["User_id"])) { ?>
                                    <a href="add_basket.php?id_product=<?= $row['Id_product'] ?>" class="btn btn-primary">Добавить в корзину</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a href="/catalog.php" class="btn btn-outline-primary mt-4">Подробнее</a>
        </div>

        <div class="container description mt-5 p-4 bg-dark text-light rounded">
            <div class="row">
                <div class="col-md-6 text-discription">
                    <h3>Закажите напитки к себе домой</h3>
                    <p>Наша компания предлагает широкий ассортимент напитков для тех, кто всегда в движении и ценит качество и удобство.</p>
                    <p>У нас вы найдете прохладные газированные напитки, натуральные соки, чай и кофе, а также молочные продукты и спортивные напитки.</p>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <img src="images/Group 8192.png" alt="" class="logo img-fluid">
                    <img src="images/Group 8195.png" alt="" class="img-description img-fluid">
                </div>
            </div>
        </div>

        <div class="container reviews mt-5">
            <h2 class="text-reviews">Отзывы</h2>
            <div class="slider">
                <div class="slides-wrapper">
                    <div class="slide">
                        <div class="otzv">
                            <img class="user-img" src="images/free-icon-boy-4537069.png" alt="">
                            <p>Отличный кофе! Очень ароматный и насыщенный вкус. Упаковка красивая и удобная. Я очень доволен покупкой и с удовольствием буду заказывать этот кофе снова. Рекомендую всем любителям кофе!</p>
                        </div>
                        <div class="otzv">
                            <img class="user-img" src="images/free-icon-boy-4537069.png" alt="">
                            <p>Заказываю через это приложение не первый раз. Товарами доволен и доставка быстрая. Рекомендую!</p>
                        </div>
                        <div class="otzv">
                            <img class="user-img" src="images/free-icon-boy-4537069.png" alt="">
                            <p>Отличный кофе! Очень ароматный и насыщенный вкус. Упаковка красивая и удобная. Я очень доволен покупкой и с удовольствием буду заказывать этот кофе снова. Рекомендую всем любителям кофе!</p>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="otzv">
                            <img class="user-img" src="images/free-icon-boy-4537069.png" alt="">
                            <p>Очень ароматный и насыщенный вкус. Упаковка красивая и удобная. Я очень доволен покупкой и с удовольствием буду заказывать этот кофе снова. Рекомендую всем любителям кофе!</p>
                        </div>
                        <div class="otzv">
                            <img class="user-img" src="images/free-icon-boy-4537069.png" alt="">
                            <p>Заказываю через это приложение не первый раз. Товарами доволен и доставка быстрая. Рекомендую!</p>
                        </div>
                        <div class="otzv">
                            <img class="user-img" src="images/free-icon-boy-4537069.png" alt="">
                            <p>Отличный кофе! Очень ароматный и насыщенный вкус. Упаковка красивая и удобная. Я очень доволен покупкой и с удовольствием буду заказывать этот кофе снова. Рекомендую всем любителям кофе!</p>
                        </div>
                    </div>
                </div>
                <div class="slider-nav">
                    <button class="prev">&lt;</button>
                    <button class="next">&gt;</button>
                </div>
            </div>
        </div>

    </main>

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

<script>
        const slider = document.querySelector('.slider');
        const slidesWrapper = document.querySelector('.slides-wrapper');
        const slides = document.querySelectorAll('.slide');
        const prevButton = document.querySelector('.prev');
        const nextButton = document.querySelector('.next');
        let currentSlide = 0;

        function updateSlidePosition() {
            slidesWrapper.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            updateSlidePosition();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            updateSlidePosition();
        }

        nextButton.addEventListener('click', nextSlide);
        prevButton.addEventListener('click', prevSlide);

        setInterval(nextSlide, 3000);
    </script>