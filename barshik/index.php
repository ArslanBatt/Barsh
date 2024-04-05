<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body >
    <header  content="width=device-width, initial-scale=1">
        <div class="container">
            <div class="naw-header">
                <img src="images\Group 8192.png" alt="" class="logo">
                <h1>БарШик</h1>
                <div class="naw-menu">
                    <a href="/">Главная</a>
                    <a href="">Каталог</a>
                    <a href="#footer">Контакты</a>
                    <a href="auto.php">Войти</a>
                </div>
            </div>
        </div>
    </header>
<main>
    <div class="catalog">
            <div class="cat-text"><h2>Каталог</h2></div>
            <div class="category">
                <button class="button-category">Соки</button>
                <button class="button-category">Кофе</button>
                <button class="button-category">Газированные напитки</button>
                <button class="button-category">Молочные напитки</button>
                <button class="button-category">Вода</button>
                <button class="button-category">Детские напитки</button>
            </div>
            <div class="bloc-drinks">
                
                <div class="drink">
                            <div class="tovar">
                        <img src="images\coffee.jpg" alt="">
                        <h4>Латте</h3>
                        <p>230р</p>
                        <button class=" button-tovar">Добавить в корзину</button>
                            </div>
                            <div class="tovar">
                    <img src="images\water.jpg" alt="">
                    <h4>Вода</h3>
                    <p>99.99р</p>
                        <button class=" button-tovar">Добавить в корзину</button>
                            </div>
                            <div class="tovar">
                    <img src="images\Sok.png" alt="">
                    <h4>Сок</h3>
                    <p>110р</p>
                        <button class=" button-tovar">Добавить в корзину</button>
                            </div>
                    </div>
                
            </div>
            <button class="podrobnee">Подробнее</button>
    </div>
<!-- часть с текстом -->
<div class="description">
    <div class="text-discription">
        <h3>Закажите свежие напитки прямо к себе домой!</h3>
        <p >Наша компания рада предложить вам богатый выбор освежающих напитков для тех, кто ценит уникальный вкус и комфорт.</p>
        <p>У нас в ассортименте - свежевыжатые фруктовые соки, ароматный чай и кофе, натуральные молочные продукты, а также энергетические и спортивные напитки.</p>
    </div>
    <div class="bloc-img-description">
        <img src="images\Group 8192.png" alt="" class="logo">
        <img src="images\Group 8195.png" alt="" class="img-description">
    </div>
</div>



    <h2 class="text-reviews">Отзывы</h2>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="row">
        <div class="col-md-6">
          <img class="img-fluid rounded" src="images/faceless-man.jpg" alt="...">
        </div>
        <div class="col-md-6">
          <div class="review-text">
            <h4>Имя пользователя 1</h4>
            <p>Время отзыва 1</p>
            <p>Сам отзыв 1</p>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row">
        <div class="col-md-6">
          <img class="img-fluid rounded" src="images/faceless-man.jpg" alt="...">
        </div>
        <div class="col-md-6">
          <div class="review-text">
            <h4>Имя пользователя 2</h4>
            <p>Время отзыва 2</p>
            <p>Сам отзыв 2</p>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="row">
        <div class="col-md-6">
          <img class="img-fluid rounded" src="images/faceless-man.jpg" alt="...">
        </div>
        <div class="col-md-6">
          <div class="review-text">
            <h4>Имя пользователя 3</h4>
            <p>Время отзыва 3</p>
            <p>Сам отзыв 3</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>

</div>

</main>
    <!-- подвал -->

</body>
</html>
