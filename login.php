<?php
    session_start();
?>
<html>
    <head>
        <title>Главная страница</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <?php
    include_once 'header.php'
    ?>
    <div class="auth" >
    <h2>Вход в систему</h2>
    <form method="post">

    <!--****  testreg.php - это адрес обработчика. То есть, после нажатия на кнопку  "Войти", данные из полей отправятся на страничку testreg.php методом  "post" ***** -->
    <p>

    <label>Ваш логин:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p>


    <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->

    <p>

    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>

    <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** --> 

    <p>
    <input type="submit" name="submit" value="Войти">

    <!--**** Кнопочка (type="submit") отправляет данные на страничку testreg.php ***** --> 
    <br>
    <!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** --> 
    <a href="reg.php">Зарегистрироваться</a> 
    </p></form>
    <br>

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
            header('Location: order.php');
            }
        else {
            //если пароли не сошлись
            exit ("Извините, введённый вами login или пароль неверный.");
            }
        }
    }
    ?>
    <!-- Выход из аккаунта-->
    <form method="POST">
        <input name="outer" type="submit" value="Выйти" />
    </form>
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