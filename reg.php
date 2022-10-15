<?php
    session_start();
    ?>
<html>
    <head>
    <title>Регистрация</title>
    <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <?php
    include_once "header.php"
    ?>
    <div class="auth" >
    <h2>Регистрация</h2>

    <form method = "POST">
    <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "POST" ***** -->
<p>
    <label>Ваш логин:<br></label>
    <input required name="regLogin" type="text" size="15" maxlength="15">
</p>
<!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
<p>
    <label>Ваш пароль:<br></label>
    <input required name="regPassword" type="password" size="15" maxlength="15">
</p>

<!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** --> 
<p>
    <label>Ваш email:<br></label>
    <input required name="email" type="email" size="15" maxlength="32">
</p>
<!--**** В поле для почты пользователь вводит свою почту ***** --> 
<p>
    <input type="submit" name="submit" value="Зарегистрироваться">
<!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** --> 
</p></form>


<!-- PHP обработка запроса -->
<?php
//$login = $password = $email = '';
if ((isset($_POST['regLogin'])) && (isset($_POST['regPassword'])) && (isset($_POST['email'])) )
{
    $login = $_POST['regLogin']; 
    $password=$_POST['regPassword']; 
    $email=$_POST['email']; 
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
   //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
    $email = trim($email);
 // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 // проверка на существование пользователя с таким же логином
    $result = mysqli_query($db,"SELECT id FROM users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
    // если такого нет, то сохраняем данные
    $result2 = mysqli_query ($db,"INSERT INTO users (login,password,email) VALUES('$login','$password','$email')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
}
    ?>
</div>
    <?php
    include_once 'footer.php'
    ?>
    </body>
    </html>