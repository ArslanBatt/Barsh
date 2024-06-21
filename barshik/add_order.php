<?php
session_start();
require_once "connect.php";

$id_user = $_SESSION["User_id"];
$tovar = $_POST["tovar"];
$prise = $_POST["prise"];
$count = $_POST["count"];


$sql=mysqli_query($con,"INSERT INTO `Orders`( `User_id`, `Date_of_order`, `Status`, `Total_price`, `Used_bonuses`, `Accrued_bonuses`) 
VALUES ($id_user,'2024-04-14 19:39:35','новый',$prise, 1, 1)");
$_SESSION["message"]="заказ оформлен";
header("Location: /");

