<?php
include "../connect.php";

$idCat = isset($_POST['idCat']) ? $_POST['idCat'] : false;
$Name = isset($_POST['Name']) ? $_POST['Name'] : false;
$Categ = isset($_POST['Tovar']) ? $_POST['Tovar'] : false;

$query = "SELECT Category_id, name FROM Category";
$result = mysqli_query($con, $query);
$result1 = mysqli_fetch_all($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление категориями напитков</title>
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
    <h2>Категории</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Товары с категорией</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result1 as $item): ?>
                <tr>
                    <form action="cat_update.php" method="post">
                        <td>
                            <input name="id" type="hidden" value="<?= $item[0] ?>">
                            <input name="Name" class="form-control" value="<?= $item[1] ?>">
                        </td>
                        <td>
                            <?php
                            $categoryTovar = "SELECT Product.* FROM Product INNER JOIN Category ON Category.Category_id = Product.Category_id WHERE Category.Category_id = $item[0]";
                            $categoryResult = mysqli_fetch_all(mysqli_query($con, $categoryTovar));

                            foreach ($categoryResult as $product) {
                                echo htmlspecialchars($product[0]) . " - " . htmlspecialchars($product[1]) . "<br>";
                            }
                            ?>
                        </td>
                        <td>
                            <input type="submit" class="btn btn-primary" value="Редактировать">
                        </td>
                    </form>
                    <form action="cat_delete.php" method="get" onsubmit="return confirm('Вы уверены, что хотите удалить эту категорию?');">
                        <input type="hidden" name="item" value="<?= $item[0] ?>">
                        <td>
                            <input type="submit" class="btn btn-danger" value="Удалить">
                        </td>
                    </form>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="mt-5">
        <h2 class="edit-tovar">Добавление Категории</h2>
        <form action="categoryTovar_db.php" class="adding" method="POST">
            <input type="text" name="Name" class="form-control mb-3" placeholder="Название">
            <input type="submit" name="add" class="btn btn-success" value="Создать">
        </form>
    </div>
</div>
<footer>
    <p>© 2024 Управление товарами</p>
</footer>
</body>
</html>
