<?php
include "../connect.php";

$orderId = $_POST['orderId'];
$newStatus = $_POST['newStatus'];

// Защита от SQL инъекций (предполагаем, что Id_order - числовой тип)
$orderId = intval($orderId);
$newStatus = mysqli_real_escape_string($con, $newStatus);

$query = "UPDATE Orders SET Status = '$newStatus' WHERE Id_order = $orderId";

if ($result = mysqli_query($con, $query)) {
    // Запись сообщения в лог-файл (необязательно)
    error_log("Статус заказа $orderId обновлен на $newStatus"); 

    header("Location: orderManagement.php");
    exit;
} else {
    // Обработка ошибок подключения и запроса
    if (mysqli_errno($con)) {
        error_log("Ошибка подключения: " . mysqli_error($con)); 
        echo "Ошибка подключения к базе данных.";
    } else {
        error_log("Ошибка запроса: " . mysqli_error($con) . " (Запрос: $query)"); 
        echo "Ошибка при обновлении статуса заказа.";
    }
}
?>
