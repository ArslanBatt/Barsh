<?php
include "../connect.php";

if (isset($_POST['update_product'])) {
    $id = $_POST['Id_product'];
    $name = $_POST['Name'];
    $description = $_POST['Description'];
    $price = $_POST['Price'];
    $category_id = $_POST['Category_id'];

    // Обновляем данные товара в базе данных
    $sql = "UPDATE product SET Name = '$name', Description = '$description', Price = '$price', Category_id = '$category_id' WHERE Id_product = '$id'";

    if (mysqli_query($con, $sql)) {
        echo "Товар успешно обновлен.";
        header('Location: index.php'); // Перенаправляем на страницу с товарами после обновления
    } else {
        echo "Ошибка при обновлении товара: " . mysqli_error($con);
    }
} else {
    echo "Произошла ошибка. Проверьте, что все необходимые данные были переданы.";
}
?>
