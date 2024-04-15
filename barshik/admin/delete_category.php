<?php
include "../connect.php";

if(isset($_POST['delete'])) {
    $category_id = $_POST['category_id'];

    // Проверяем, есть ли продукты в этой категории
    $check_products_sql = "SELECT * FROM Product WHERE Category_id = '$category_id'";
    $check_products_result = mysqli_query($con, $check_products_sql);

    if(mysqli_num_rows($check_products_result) == 0) {
        $sql = "DELETE FROM Category WHERE Category_id = '$category_id'";
        if (mysqli_query($con, $sql)) {
            echo "Категория успешно удалена.";
            header('Location: index.php');
        } else {
            echo "Ошибка при удалении категории: " . mysqli_error($con);
        }
    } else {
        echo "Нельзя удалить категорию, так как она содержит продукты.";
        header('Location: index.php');
    }
}
?>
