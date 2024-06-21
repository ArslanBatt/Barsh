<?php
include "header.php";
include "connect.php";
session_start();

if(isset($_SESSION["message"])){
    $mes = $_SESSION["message"];
    echo "<script>toastr.success('$mes')</script>";
    unset($_SESSION["message"]);
}
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
    <title>Корзина</title>
</head>

<body>
    <main>
        <div class="container">
            <h2 class="text-personal-account">Корзина</h2>
            <ul>
                <table>
                    <tr>
                        <th>Товар</th>
                        <th>Цена</th>
                        <th>Количество</th>
                    </tr>
                    <?php
                    $userId = $_SESSION['User_id'];

                    // Запрос для получения содержимого корзины пользователя
                    $query = "SELECT * FROM basket WHERE User_id = $userId";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $content = $row['Content'];

                            // Убираем экранирования и лишние символы
                            $content = str_replace(array('\n', '\\"'), array('', '"'), $content);

                            // Декодируем JSON
                            $content = json_decode($content, true);

                            foreach ($content as $product_id => $quantity) {
                                // Запрос для получения данных о товаре из таблицы Product
                                $query_product = "SELECT * FROM Product WHERE Id_product = $product_id";
                                $result_product = mysqli_query($con, $query_product);
                                $product = mysqli_fetch_assoc($result_product);

                                if ($product) {
                                    // Вывод информации о товаре в таблицу
                                    ?>
                                    <tr>
                                        <td><?= $product['Name'] ?></td>
                                        <td><?= $product['Price'] ?></td>
                                        <td><?= $quantity ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="3">Корзина пуста</td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </ul>
            <a href="delete_tovar_bascet.php?id_tovar=<?= $product_id ?>">Очистить корзину</a>
            <form action="making-an-order.php" method="post">
                <button type="submit">ОФОРМИТЬ ЗАКАЗ</button>
            </form>
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
