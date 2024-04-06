<?php 
    include "header.php"; 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        a{
            text-decoration: none;  
        }
        .reg{
width: 50%;
padding: 10px;
background-color: #969696;
color: white;
border: none;
border-radius: 5px;
text-decoration: none; 
}
.reg:hover{
width: 50%;
padding: 10px;
background-color: #0DB295 ;
color: white;
border: none;
border-radius: 5px;
text-decoration: none; 
}
    </style>
</head>
<body>
    <div class="auto-main">
        <h2>Авторизация</h2>
        <form action="auto_db.php" method="post" class="form-auto">
    <input required type="email" id="email" name="email" placeholder="email">
    <input required type="password" name="password" placeholder="пароль">
    <button class="entrance">Войти</button>
    <a class="reg" href="reg.php">Регистрация</a>
</form>
    </div>
</body>
</html>