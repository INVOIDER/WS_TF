<?php
    session_start();
?>
<html>
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Главная страница</title>
      <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <?php
    include_once 'header.php'
    ?>

    <section class="auth-container">
        <div class="login">
          <h2 class="auth-header">Вход в систему</h2>
          <form method="" class="auth-form">
            <!--****  testreg.php - это адрес обработчика. То есть, после нажатия на кнопку  "Войти", данные из полей отправятся на страничку testreg.php методом  "post" ***** -->
            <p><input type="text" name="login" value="" size="15" maxlength="15" class="auth-input" placeholder="Логин или Email"></p>
            <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
            <p><input type="password" name="password" value="" size="15" maxlength="15" class="auth-input" placeholder="Пароль"></p>
            <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** --> 
            <p class="submit"><input type="submit" name="commit" value="Войти" class="auth-submit">
            <!--**** Кнопочка (type="submit") отправляет данные на страничку testreg.php ***** --> 
            <!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** --> 


            <form action="reg.php">
              <input type="submit" value="Зарегистрироваться" class="auth-submit"/>
            </form> 
            <form method="">
              <input name="outer" type="submit" value="Выйти" class="auth-submit exit-btn"/>
            </form>
          </p></form>
        </div>
      </section>

      <?php
      if ((isset($_POST['login'])) && (isset($_POST['password'])))
      {
          $login = $_POST['login']; 
          $password=$_POST['password']; 
          //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
          $login = stripslashes($login);
          $login = htmlspecialchars($login);
          $password = stripslashes($password);
          $password = htmlspecialchars($password);
          //удаляем лишние пробелы
          $login = trim($login);
          $password = trim($password);
          // подключаемся к базе
          include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 

          $result = mysqli_query($db,"SELECT * FROM users WHERE login='$login'"); //извлекаем из базы все данные о пользователе с введенным логином
          $myrow = mysqli_fetch_array($result);
          if (empty($myrow['login']))
          {
          //если пользователя с введенным логином не существует
          exit ("Извините, введённый вами login или пароль неверный.");
          }
          else {
              //если существует, то сверяем пароли
              if ($myrow['password']==$password) {
              //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
              $_SESSION['login']=$myrow['login']; 
              $_SESSION['id']=$myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
              header('Location: index.php');
              }
          else {
              //если пароли не сошлись
              exit ("Извините, введённый вами login или пароль неверный.");
              }
          }
      }
      ?>
      <!-- Выход из аккаунта-->
      
      <?php 
      if( isset( $_POST['outer'] ) )
      unset($_SESSION['login']);
      ?>
    </div>
    <?php
    include_once 'footer.php'
    ?>
    </body>
</html>