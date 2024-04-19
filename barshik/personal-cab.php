<?php
    include "connect.php";
    session_start();
    if (isset($_POST['edit'])) {
      $user_email = $_POST['user_email'];
      $user_password = $_POST['user_password'];
  
      // Обновляем данные пользователя в БД
      $sql = "UPDATE Users SET email = '$user_email', password_hash = '$user_password' WHERE email = '{$_SESSION['user_email']}'";
  
      if ($con->query($sql)) {
          // Обновляем данные в сессии
          $_SESSION['user_email'] = $user_email;
          $_SESSION['user_password'] = $user_password;
  
          echo 'Данные успешно изменены';
      } else {
          echo 'Ошибка при изменении данных';
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-header.css">
    <link rel="stylesheet" href="style-personal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Личный кабинет</title>
</head>
<body>
  <header>
    <?php include "header-pers.php"; ?>
  </header>
    <main>
        <div class="container">
        <h2 class="text-personal-account">Личный кабинет</h2>
        <div class="blok-main"> 
    <div> 
        <img src="images\free-icon-boy-4537069.png" class="img-user" alt=""> 
    </div> 
    <form action="" method="post" class="form-user-info">
    <input type="email" name="user_email" placeholder="email" value="<?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : ''; ?>">
    <input type="password" name="user_password" id="password-field" placeholder="password" value="<?php echo isset($_SESSION['user_password']) ? $_SESSION['user_password'] : ''; ?>">
    <button type="button" class="entrance" onclick="togglePassword()">пароль</button>
    <p>Бонусы:0<value[]></p>
    <button name="edit" class="edit">Изменить </button>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password-field");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
</form>
</div>
                        <h3 class="order">Мои заказы</h3>
                        <table>
                            <thead>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </main>
        <!-- подвал -->
<footer id="footer">
    <div class="container">
        <div class="connection">
            <div class="connect">
            <p>Связь с нами</p> 
            <div class="images-connection">
                <img src="images/free-icon-odnoklassniki-2504930.png" alt=""class="icon-whatsapp">
                <img src="images\icons8-vk-com-48.png" alt="" srcset="">
                <img src="images\iconfinder-social-media-applications-23whatsapp-4102606_113811.png" class="icon-whatsapp">
            </div>
            </div>
            <div class="clock-work">
                    <p>Часы  работы:</p>
                    <p>10:00 - 23:00</p>
                </div>
            </div>
        <hr> 
        <p class="copirater">© 2023 Копирование запрещено. Все права защищены.</p> 
    </div>
</footer>
</body>
</html>