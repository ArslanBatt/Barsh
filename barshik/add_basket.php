<?php
session_start();
require_once 'connect.php';

$id_tovar = $_GET["id_product"];

$id_user = $_SESSION["User_id"];
$cart = mysqli_fetch_assoc(mysqli_query($con, "SELECT content FROM `Basket` WHERE User_id = $id_user"));

if (is_null($cart)) {
    $compount[$id_tovar] = 1;

    $compount = json_encode($compount);
    $sql = "INSERT INTO `Basket`( `User_id`, `Content`, `product_id`) VALUES ('$id_user','$compount', '$id_tovar')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $_SESSION["cart"] = mysqli_fetch_assoc(mysqli_query($con, "SELECT content FROM `Basket` WHERE User_id = $id_user"))["content"];
        $_SESSION["message"] = "Товар добавлен в корзину";
        header("location: /");
        exit();
    }
} else {
    $cart_content = $cart["content"];
    $cart_content = (array) json_decode($cart_content, true);

    if (array_key_exists($id_tovar, $cart_content)) {
        $cart_content[$id_tovar]++;
    } else {
        $cart_content[$id_tovar] = 1;
    }

    $compount = json_encode($cart_content);
    $sql = "UPDATE `Basket` SET `Content`='$compount', `product_id`='$id_tovar' WHERE User_id = $id_user";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $_SESSION["cart"] = $compount;
        $_SESSION["message"] = "Товар добавлен в корзину";
        header("location: /");
        exit();
    }
}

// Если не удалось выполнить операцию, например, из-за ошибки SQL, можно также установить сообщение об ошибке:
$_SESSION["message"] = "Ошибка при добавлении товара в корзину";
header("location: /");
exit();
?>
