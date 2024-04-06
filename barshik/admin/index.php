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
<div class="admin-panel">
    <h2>Управление Товарами</h2>
    <div class="add-product">
    <h3>Добавить Товар</h3> 
<form action="add_product.php" method="post" enctype="multipart/form-data">
    <input type="text" name="Name" placeholder="Название товара" required> 
    <textarea name="Description" placeholder="Описание товара" required></textarea> 
    <input type="text" name="Category_id" placeholder="Id категории" required> 
    <input type="text" name="Price" placeholder="Цена" required> 
    <input type="file" name="image" accept="image/*"> 
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
        while($row = mysqli_fetch_assoc($result)){
            echo "<li>";
            echo "<div>";
            echo "<img src='../images/".$row['Image']."' alt='Товар'>";
            echo "</div>";
            echo "<div>";
            echo "<p>Название: ".$row['Name']."</p>";
            echo "<p>Описание: ".$row['Description']."</p>";
            echo "<p>Цена: ".$row['Price']."$</p>";
            echo "<form action='delete_product.php' method='post' enctype='multipart/form-data'>";
            echo "<input type='hidden' name='Id_product' value='".$row['Id_product']."'>";
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