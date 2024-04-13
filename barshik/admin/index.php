<?php
include "../header.php";
include "../connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Админ Панель</title>
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="add-category">
    <h3>Добавить категорию</h3>
    <form action="add_category.php" method="post" enctype="multipart/form-data">
        <input type="text" name="Name" placeholder="Название категории" required>
        <button type="submit">Добавить</button>
    </form>
</div>
<div class="admin-panel">
    <h2>Управление Товарами</h2>
    <div class="add-product">
    <h3>Добавить Товар</h3> 
    <form action="add_product.php" method="post" enctype="multipart/form-data">
    <input type="text" name="Name" placeholder="Название товара" required>
    <textarea name="Description" placeholder="Описание товара" required></textarea>

    <!-- Выпадающий список категорий -->
    <select name="Category_id" required>
        <?php
        // Получаем список всех категорий из базы данных
        $sql_categories = "SELECT * FROM Category";
        $result_categories = mysqli_query($con, $sql_categories);

        // Перебираем все категории и создаем элементы списка
        while ($row_category = mysqli_fetch_assoc($result_categories)) {
            echo "<option value='" . $row_category['Category_id'] . "'>" . $row_category['Name'] . "</option>";
        }
        ?>
    </select>

    <input type="text" name="Price" placeholder="Цена" required>

    <input type="file" name="image" accept="image/jpeg,image/png,image/gif">


    <button type="submit">Добавить</button>
</form>

    </div>
    <div class="products-list"> 
    <h3>Список Товаров</h3> 
    <ul> 
        <?php
        // Получаем список всех товаров из базы данных
        $sql = "SELECT * FROM product";
        $result = mysqli_query($con, $sql);

        // Перебираем все товары
        while ($row = mysqli_fetch_assoc($result)) {

            // Извлекаем название категории для текущего товара
            $sql_category = "SELECT Name FROM Category WHERE Category_id = " . $row['Category_id'];
            $result_category = mysqli_query($con, $sql_category);
            $row_category = mysqli_fetch_assoc($result_category);

            echo "<li>";
            echo "<div>";
            echo "<img src='../images/" . $row['Image'] . "' alt='Товар'>";
            echo "</div>";
            echo "<div>";
            echo "<input type='text' readonly>Название: " . $row['Name'] . "</input>";
            echo "<input type='text' readonly>Описание: " . $row['Description'] . "</input>";
            echo "<input type='text' readonly>Цена: " . $row['Price'] . "</input>";
            echo "<input type='text' readonly>Категория: " . $row_category['Name'] . "</input>";
            echo "<form action='delete_product.php' method='post' enctype='multipart/form-data'>";
            echo "<input type='hidden' name='Id_product' value='" . $row['Id_product'] . "'>";
            echo "<button type='submit' name='update_product' class='update-button'>Редактировать</button>";
            echo "<button type='submit' name='delete_product' class='delete-button'>Удалить</button>";
            echo "</form>";
            echo "</div>";
            echo "</li>";
        }
        ?>
    </ul> 
</div>
</div>
</body>
</html>
<?php
include "../footer.php";
?>