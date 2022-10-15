<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ПОЛЮС</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  </head>

  <body>

  <?php
    include_once 'header.php'
    ?>
    
    <div class="order-select">
      <h3 class="order-select-header">СКОЛЬКО ЧАСОВ НУЖНО:</h3>
      <select class="time-select">
        <option>1</option><option>2</option> <option>3</option><option>4</option><option>5</option><option>6</option> <option>7</option><option>8</option> 
      </select>
      <h3 class="order-select-header">ДАТА БРОНИРОВАНИЯ:</h3>
        <input type="date" class="date-select">
      <h3 class="order-select-header">ВРЕМЯ НАЧАЛА БРОНИРОВАНИЯ:</h3>
      <select class="time-start-select">
        <option>00:00</option><option>01:00</option><option>02:00</option><option>03:00</option> <option>04:00</option><option>05:00</option><option>06:00</option><option>07:00</option><option>08:00</option><option>09:00</option><option>10:00</option><option>11:00</option><option>12:00</option><option>13:00</option><option>14:00</option><option>15:00</option><option>16:00</option><option>17:00</option><option>18:00</option><option>19:00</option><option>20:00</option><option>21:00</option><option>22:00</option><option>23:00</option>
      </select>
      <div class="order-submit">
        <input type="submit" class="order-submit-btn">
      </div>
      
    </div>
  


  <?php
  include_once 'footer.php'
  ?>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="slider.js"></script>
  </body>
</html>