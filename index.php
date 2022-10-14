<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  </head>
  <body>

    <header class="topnav">
      <div class="topnav-left">
        <a class="logo-ref" href="#">
          <img class="logo" src="img/logo.png" alt="Логотип">
        </a>
        <div class="logo-text">ПОЛЮС</div>
      </div>
      <a class="login-button" href="#"><span class="login-text">Логин</span></a>
    </header>
    <section class="hero">
      <div class="hero-conteiner">
          <div class="hero-content">
              <h1 class="hero-title">
                  <span class="span-style">ПАО "Полюс"</span>
              </h1>
              <div class="swiper">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide" style="background-image: url(img/slide1.jpg);"></div>
                    <div class="swiper-slide" style="background-image: url(img/slide2.jpg);"></div>
                    <div class="swiper-slide" style="background-image: url(img/slide3.jpg);"></div>
                    <div class="swiper-slide" style="background-image: url(img/slide4.jpg);"></div>
                    <div class="swiper-slide" style="background-image: url(img/slide5.jpg);"></div>
                  </div>
                  <div class="swiper-pagination"></div>              
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
              </div>
          </div>
      </div>
    </section>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="slider.js"></script>

  </body>
</html>