<?php
include "header.php";
include "connect.php";
session_start();

if (isset($_POST['edit'])) {
    $userId = $_SESSION['User_id'];
    $email = $_SESSION['User_email'];
    $total_price = $_POST['total_price'];
    $content = isset($_POST['content']) ? $_POST['content'] : null;

    // Получаем текущую дату
    $date_of_order = date("Y-m-d H:i:s");

    // Вставляем заказ в таблицу Orders
    // Предположим, что статус 'Pending' соответствует '0' в вашем ENUM
    $query_insert_order = "INSERT INTO Orders (User_id, Date_of_order, status, Total_price, Used_bonuses, Accrued_bonuses) 
                           VALUES ('$userId', '$date_of_order', '0', '$total_price', 0, 0)";

    if (mysqli_query($con, $query_insert_order)) {
        // Получаем Id_order, который был только что вставлен
        $orderId = mysqli_insert_id($con);

        // Если $content не null и массив, вставляем записи в таблицу Order_Product для каждого товара в корзине
        if (!empty($content) && is_array($content)) {
            foreach ($content as $product_id => $quantity) {
                $query_product = "SELECT * FROM Product WHERE Id_product = $product_id";
                $result_product = mysqli_query($con, $query_product);
                $product = mysqli_fetch_assoc($result_product);

                if ($product) {
                    // Вставляем запись в Order_Product
                    $query_insert_order_product = "INSERT INTO Order_Product (Id_product, Id_order, count) 
                                                   VALUES ('$product_id', '$orderId', '$quantity')";
                    mysqli_query($con, $query_insert_order_product);
                }
            }
        }

        // Выводим сообщение об успешном оформлении заказа через JavaScript
        echo '<script>alert("Заказ успешно оформлен!");</script>';
    } else {
        echo "Ошибка при оформлении заказа: " . mysqli_error($con);
    }
}

$userId = $_SESSION['User_id'];

// Запрос для получения данных пользователя и содержимого корзины
$query_user = "SELECT Email FROM Users WHERE User_id = $userId";
$result_user = mysqli_query($con, $query_user);

if ($result_user) {
    $user = mysqli_fetch_assoc($result_user);
    $email = $user['Email'];
} else {
    echo "Ошибка при получении данных пользователя: " . mysqli_error($con);
}

$query_basket = "SELECT Content FROM Basket WHERE User_id = $userId";
$result_basket = mysqli_query($con, $query_basket);

if ($result_basket) {
    $basket = mysqli_fetch_assoc($result_basket);
    $content = json_decode($basket['Content'], true);
} else {
    echo "Ошибка при получении содержимого корзины: " . mysqli_error($con);
}

$total_price = 0;
$products = [];

if (!empty($content) && is_array($content)) {
    foreach ($content as $product_id => $quantity) {
        $query_product = "SELECT * FROM Product WHERE Id_product = $product_id";
        $result_product = mysqli_query($con, $query_product);
        $product = mysqli_fetch_assoc($result_product);
        
        if ($product) {
            $products[] = [
                'name' => $product['Name'],
                'price' => $product['Price'],
                'quantity' => $quantity
            ];
            $total_price += $product['Price'] * $quantity;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-header.css">
    <link rel="stylesheet" href="css/style-makingOrder.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Оформление заказа</title>
</head>
<body>
<main>
    <div class="order-verification">
        <h2>Оформление заказа</h2>
        <p>Проверьте данные перед оформлением</p>
        <form action="" method="post">
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" value="<?= $email ?>" readonly>
            </div>
            <div>
                <label for="content">Состав заказа</label>
                <textarea name="content" readonly><?php foreach ($products as $product) {
                    echo $product['name'] . " x " . $product['quantity'] . "\n";
                } ?></textarea>
            </div>
            <div>
                <label for="total_price">Цена</label>
                <input type="text" name="total_price" value="<?= $total_price ?>" readonly>
            </div>
            <button name="edit" class="edit">Оформить заказ</button>
        </form>
        <div class="toggle-switch">
            <p>Оплата баллами</p>
            <div class="toggle-button">
                <input type="checkbox" id="toggle" class="toggle-input">
                <label for="toggle" class="toggle-label"></label>
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
                    <img src="images/free-icon-odnoklassniki-2504930.png" alt="" class="icon-whatsapp">
                    <img src="images\icons8-vk-com-48.png" alt="" srcset="">
                    <img src="images\iconfinder-social-media-applications-23whatsapp-4102606_113811.png" class="icon-whatsapp">
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
