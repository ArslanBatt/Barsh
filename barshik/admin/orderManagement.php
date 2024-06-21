<?php
include "../connect.php";

// Выборка данных из базы
$query = "SELECT * FROM Order_Product 
          INNER JOIN Product ON Product.Id_product = Order_Product.Id_product 
          INNER JOIN Orders ON Order_Product.Id_order = Orders.Id_order";
$queryOrder = mysqli_query($con, $query);

// Проверка на успешность запроса
if ($queryOrder) {
    $queryOrder = mysqli_fetch_all($queryOrder);
} else {
    echo "Ошибка при получении данных заказов: " . mysqli_error($con);
}

$infoProduct = mysqli_fetch_all(mysqli_query($con, "SELECT *, Product.Price FROM Order_Product 
                                                    INNER JOIN Orders ON Order_Product.Id_order = Orders.Id_order
                                                    INNER JOIN Product ON Product.Id_product = Order_Product.Id_product
"));


$status = ['Готовим', 'Доставка', 'Выполнено'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление заказами</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="header">
        <nav class="nav">
            <div class="index">
                <h1 class="index_">Админ</h1>
            </div>
            <div class="cart_account">
                <a href="newTovar.php">Управление товарами</a>
                <a href="categoryTovar.php">Управление категориями напитков</a>
                <a href="orderManagement.php">Управление заказами</a>
                <a href="Panel-admin.php">Статистика и отчеты</a>
                <a href="/logout.php">Выйти</a>
            </div>
        </nav>
    </header>
    <div class="container mt-5">
        <h1 style="color: black;">Управление заказами</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Номер заказа</th>
                        <th>Статус</th>
                        <th>Дата</th>
                        <th>Цена</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($queryOrder as $value) : ?>
                        <tr>
                            <td>заказ: <?= htmlspecialchars($value[1]) ?></td>
                            <td>
                                <form action="updateOrderStatus.php" method="post">
                                    <input type="hidden" name="orderId" value="<?= htmlspecialchars($value[0]) ?>">
                                    <select name="newStatus" class="form-select">
                                        <option value="0" <?= ($value[13] === "0") ? 'selected' : ''; ?>>Готовим</option>
                                        <option value="1" <?= ($value[13] === "1") ? 'selected' : ''; ?>>Доставка</option>
                                        <option value="2" <?= ($value[13] === "2") ? 'selected' : ''; ?>>Выполнено</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-2">Обновить статус</button>
                                </form>
                            </td>
                            <td><?= htmlspecialchars($value[12]) ?></td>
                            <td><?= htmlspecialchars($value[14]) ?></td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#feedback" class="btn btn-info">Подробности</a>
                                <a href='deleteOrder.php?item=<?= htmlspecialchars($value[0]) ?>&itenOr=<?= htmlspecialchars($value[1]) ?>' class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Модальное окно -->
    <div class="modal fade" id="feedback" tabindex="-1" aria-labelledby="feedbackLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feedbackLabel">Подробности заказа</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Количество</th>
                                <th>Цена</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($infoProduct as $product) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($product[9]) ?></td>
                                    <td><?= htmlspecialchars($product[2]) ?></td>
                                    <td><?= htmlspecialchars($product[3]) ?> ₽</td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>© 2024 Управление товарами</p>
    </footer>
</body>

</html>
