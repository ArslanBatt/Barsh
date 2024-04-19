<?php
session_start();

// Уничтожаем сессию
session_destroy();

// Перенаправляем на страницу авторизации
header('Location: auto.php');
?>