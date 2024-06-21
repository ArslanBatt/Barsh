<?php
session_start();

include "header.php";
include "connect.php";
$id = $_SESSION['User_id'];
$queryUserInfo = mysqli_fetch_all(mysqli_query($con, "SELECT * from `Users` where User_id = $id"));
$userInfo = mysqli_fetch_all(mysqli_query($con, "select * from `Users` where User_id = $id"));
$orderInfo = mysqli_query($con, "select * from `Orders` where User_id = $id");

if (isset($_POST['review_submit'])) {
    $orderId = $_POST['order_id'];
    $reviewText = $_POST['review_text'];

    $query = "UPDATE `Orders` SET `comment` = '$reviewText' WHERE `Id_order` = '$orderId'";
    $result = mysqli_query($con, $query);

    // После добавления отзыва обновляем $orderInfo
    $orderInfo = mysqli_query($con, "SELECT * FROM Orders WHERE User_id = $id");
}

$status = ["Готовим", "Доставка", "Выполнено"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-header.css">
    <link rel="stylesheet" href="css/style-personal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>Личный кабинет</title>
</head>

<body>
    <main>
        <div class="container" style="display: block;">
            <h2 class="text-personal-account">Личный кабинет</h2>
            <div class="blok-main">
                <div>
                    <img src="images\free-icon-boy-4537069.png" class="img-user" alt="">
                </div>
                <form action="personal-cab_db.php" method="post" class="form-user-info">
                    <?php foreach ($queryUserInfo as $item): ?>
                        <h1>Привет, <?= $item[1] ?> </h1>
                        <input type="hidden" name="id" placeholder="имя" value="<?= $item[0] ?>">
                        <div>
                            <label for="">Почта</label>
                            <input type="text" name="email" placeholder="email" value="<?= $item[1] ?>">
                        </div>
                        <button name="edit" class="edit">Изменить </button>
                    <?php endforeach; ?>
                </form>
            </div>
            <div class="history-zacaz">
                <div class="order-history">
                    <h3 class="order">Мои заказы</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Заказ</th>
                                <th>Дата</th>
                                <th>Состав заказа</th>
                                <th>Сумма</th>
                                <th>Статус</th>
                                <th>Отзыв</th>
                                <th>Оставить отзыв</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($value = mysqli_fetch_assoc($orderInfo)): ?>
                                <tr>
                                    <td>№<?= $value['Id_order'] ?></td>
                                    <td><?= $value['Date_of_order'] ?></td>
                                    <td>
                                        
                                    </td>
                                    <td><?= $value['Total_price'] ?> р</td>
                                    <td><?= $status[$value['status']] ?></td>
                                    <td><?= $value['comment'] ?></td>
                                    <td>
                                        <?php if ($value['status'] == 0): ?>
                                            <a href="" data-bs-toggle="modal"
                                                data-bs-target="#feedback<?= $value['Id_order'] ?>"><img src="images\writing.png"
                                                    alt="" class="img-writing"></a>
                                            <!-- Модальное окно для отзыва -->
                                            <div class="modal fade" id="feedback<?= $value['Id_order'] ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form method="post" action="">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Оставьте отзыв
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" name="order_id"
                                                                    value="<?= $value['Id_order'] ?>">
                                                                <div class="mb-3">
                                                                    <label for="message-text"
                                                                        class="col-form-label">Сообщение:</label>
                                                                    <textarea class="form-control" id="message-text"
                                                                        name="review_text"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Закрыть</button>
                                                                <button type="submit" class="btn btn-primary"
                                                                    name="review_submit">Оставить отзыв</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            Заказ выполнен
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <!-- подвал -->
    <footer id="footer">
        <div class="container">
            <div class="connection">
                <div class="connect">
                    <p>Связь с нами</p>
                    <div class="images-connection">
                        <img src="images\logorutub.png" alt="" class="icon-whatsapp">
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