<?php
session_start();    
require_once "connect.php";

$id_tovar = $_GET["id_tovar"];

$id_user = $_SESSION["User_id"];

$cart = (array) json_decode(
    mysqli_fetch_assoc(
        mysqli_query($con, "select content from basket where user_id = '$id_user'")
    )["compound"]
);


if (--$cart[$id_item] == 0) { //проверка на удаление товара
    unset($cart[$id_item]);
}

if(count($cart)) {
    $sql = "DELETE FROM `basket` WHERE user_id = '$id_user'";

    $result = mysqli_query($con, $sql);

    if($result) {
        unset($_SESSION["cart"]);
    $_SESSION["message"] = "Корзина очищена";
    echo "<script>alert('Корзина очищена'); window.location.href = 'cart.php';</script>";
    }


}

$compound = json_encode($cart);

$sql = "UPDATE `basket` SET `content` = '$compound' where user_id = '$id_user'";

$result = mysqli_query($con, $sql);

if ($result) {
    $_SESSION["cart"] = $compound;
    echo "<script>alert('Корзина очищена'); window.location.href = 'cart.php';</script>";

}