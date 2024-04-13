<?php
include "../connect.php";

$name = $_POST['Name'];
$description = $_POST['Description'];
$category_id = $_POST['Category_id'];
$price = $_POST['Price'];
$image = $_FILES['image']['name'];

// Загрузка изображения на сервер
$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

// Проверка существования значения Category_id в таблице Category
$category_check = "SELECT * FROM Category WHERE Category_id = $category_id";
$result = mysqli_query($con, $category_check);
if ($result && mysqli_num_rows($result) > 0) {
    // Если категория существует, вставляем запись в таблицу product
    $sql = "INSERT INTO product (Name, Description, Category_id, Price, Image) VALUES ('$name', '$description', '$category_id', '$price', '$image')";
    if (mysqli_query($con, $sql)) {
        echo "Товар успешно добавлен.";
    } else {
        echo "Ошибка: " . $sql . "<br>" . mysqli_error($con);
    }
} else {
    echo "Ошибка: Категория с ID $category_id не существует в таблице Category.";
}
header('Location: index.php');
?>