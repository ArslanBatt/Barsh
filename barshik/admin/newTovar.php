<?php
include "../connect.php";

// Получение всех продуктов
$query = "SELECT * FROM Product";
$result = mysqli_query($con, $query);

// Проверка успешности запроса и наличия данных
if ($result) {
    $result1 = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $result1 = [];
}

// Получение всех категорий
$category = "SELECT * FROM Category";
$categoryResult = mysqli_fetch_all(mysqli_query($con, $category), MYSQLI_ASSOC);

// Код для фильтра, сортировки и поиска
$filterSearch = "";
if (!empty($_GET["filter"]) || !empty($_GET["search"])) {
    $search = isset($_GET["search"]) ? $_GET["search"] : '';
    $filterSearch = " WHERE 1=1";
    if (!empty($_GET["filter"])) {
        $filterSearch .= " AND Product.category_id=" . intval($_GET["filter"]);
    }
    if (!empty($search)) {
        $filterSearch .= " AND Product.Name LIKE '%" . mysqli_real_escape_string($con, $search) . "%'";
    }
}
$sort = isset($_GET["sort"]) && in_array($_GET["sort"], ['ASC', 'DESC']) ? $_GET["sort"] : "ASC";

// Составление основного SQL-запроса с учетом сортировки
$query = "SELECT Product.*, Category.Name AS CategoryName 
          FROM Product 
          INNER JOIN Category ON Category.category_id = Product.category_id 
          $filterSearch
          ORDER BY Product.Price $sort";

$result = mysqli_query($con, $query);

// Проверка успешности выполнения запроса
if ($result) {
    $list_products = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $list_products = []; // Установка пустого массива в случае неудачи запроса
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление товарами</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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

    <div class="filter-products">
        <form method="get">
            <input type="text" placeholder="Поиск" name="search" value="<?= isset($_GET["search"]) ? htmlspecialchars($_GET["search"]) : '' ?>">
            <select name="filter">
                <option value="" <?= isset($_GET["filter"]) && empty($_GET["filter"]) ? 'selected' : '' ?>>Все категории</option>
                <?php foreach ($categoryResult as $item) : ?>
                    <option value="<?= htmlspecialchars($item['Category_id']) ?>" <?= isset($_GET["filter"]) && $_GET["filter"] == $item['Category_id'] ? 'selected' : '' ?>><?= htmlspecialchars($item['Name']) ?></option>
                <?php endforeach; ?>
            </select>
            <select name="sort">
                <option value="ASC" <?= isset($_GET["sort"]) && $_GET["sort"] == "ASC" ? 'selected' : '' ?>>По возрастанию</option>
                <option value="DESC" <?= isset($_GET["sort"]) && $_GET["sort"] == "DESC" ? 'selected' : '' ?>>По убыванию</option>
            </select>
            <button type="submit">Фильтр</button>
        </form>
    </div>

    <div class="container">
        <div class="products">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Категория</th>
                        <th>Цена</th>
                        <th>Описание</th>
                        <th>Миниатюра</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($list_products)): ?>
                        <?php foreach ($list_products as $item) : ?>
                            <form action="product_update.php" method="post">
                                <input type="hidden" name="Idp" value="<?= htmlspecialchars($item['Id_product']) ?>">
                                <tr>
                                    <td><input type="text" name="Name" value="<?= htmlspecialchars($item['Name']) ?>"></td>
                                    <td>
                                        <select name="Categ">
                                            <?php foreach ($categoryResult as $categoryItem) : ?>
                                                <option value="<?= htmlspecialchars($categoryItem['Category_id']) ?>" <?= $categoryItem['Category_id'] == $item['Category_id'] ? 'selected' : '' ?>><?= htmlspecialchars($categoryItem['Name']) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td><input type="text" name="Price" value="<?= htmlspecialchars($item['Price']) ?>"></td>
                                    <td><input type="text" name="Descr" value="<?= htmlspecialchars($item['Description']) ?>"></td>
                                    <td><img src="../images/<?= htmlspecialchars($item['Image']) ?>" alt="" class="img-product-admin"></td>
                                    <td><input type="submit" value="Редактировать" class="btn btn-primary"></td>
                            </form>
                            <td><a href='product-delete.php?item=<?= htmlspecialchars($item['Id_product']) ?>' class="btn btn-danger">Удалить</a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7">Нет данных для отображения</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div>
            <h2 class="edit-tovar">Добавление товара</h2>
            <form action="newTovar_db.php" class="adding" method="POST" enctype="multipart/form-data">
                <input type="text" name="Name" placeholder="Название" required>
                <select name="Category_id" id="category" required>
                    <?php foreach ($categoryResult as $item) : ?>
                        <option value="<?= htmlspecialchars($item['Category_id']) ?>"><?= htmlspecialchars($item['Name']) ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="text" name="Price" placeholder="Цена" required>
                <input type="text" name="Description" placeholder="Описание" required>
                <input type="file" name="Image" required>
                <button type="submit" class="btn btn-success" value="Создать">Создать</button>
            </form>
        </div>
    </div>

    <footer>
        <p>© 2024 Управление товарами</p>
    </footer>
</body>

</html>
