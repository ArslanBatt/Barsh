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
    
<div class="admin-category">
    <h2>Управление категориями</h2>
    <div class="add-category">
        <h3>Добавить категорию</h3>
        <form action="add_category.php" method="post" enctype="multipart/form-data">
            <input type="text" name="Name" placeholder="Название категории" required>
            <button type="submit">Добавить</button>
        </form>
    </div>
    <div class="category">
        <?php
        // Подключение к базе данных и получение списка категорий
        $sql = "SELECT * FROM Category";
        $res = mysqli_query($con, $sql);
        
        // Перебор результатов и вывод названий категорий с возможностью редактирования и удаления
        if (mysqli_num_rows($res) > 0) {
            echo "<h3>Список категорий</h3>";
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<li>";
                echo "<form action='update_category.php' method='post'>";
                echo "<input type='hidden' name='Category_id' value='".$row['Category_id']."'>";
                echo "<input type='text' name='Name' value='".$row['Name']."'>";
                echo "<button type='submit' name='edit'>Редактировать</button>";
                echo "</form>";
                echo "<form action='delete_category.php' method='post'>";
                echo "<input type='hidden' name='category_id' value='".$row['Category_id']."'>";
                echo "<button type='submit' name='delete'>Удалить</button></form>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "Нет категорий для отображения.";
        }
        ?>
    </div>
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
            echo "<li>";
            echo "<div>";
            echo "<img src='../images/" . $row['Image'] . "' alt='Товар'>";
            echo "</div>";
            echo "<div>";
            echo "<form action='update_product.php' method='post'>";
            echo "<input type='hidden' name='Id_product' value='" . $row['Id_product'] . "'>";
            echo "<p class='list'>Название</p><input type='text' name='Name' value='" . $row['Name'] . "'>";
            echo "<p class='list'>Описание</p><input type='text' name='Description' value='" . $row['Description'] . "'>";
            echo "<p class='list'>Цена</p><input type='text' name='Price' value='" . $row['Price'] . "'>";
            echo "<p class='list'>Категория</p>";
            echo "<select name='Category_id'>";
            // Выбор категории для товара
            $categorySql = "SELECT * FROM Category";
            $categories = mysqli_query($con, $categorySql);
            while ($category = mysqli_fetch_assoc($categories)) {
                $selected = ($row['Category_id'] == $category['Category_id']) ? "selected" : "";
                echo "<option value='" . $category['Category_id'] . "' " . $selected . ">" . $category['Name'] . "</option>";
            }
            echo "</select>";
            echo "<button type='submit' name='update_product'>Редактировать</button>";
            echo "</form>";
            echo "<form action='delete_product.php' method='post'>";
            echo "<input type='hidden' name='Id_product' value='" . $row['Id_product'] . "'>";
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