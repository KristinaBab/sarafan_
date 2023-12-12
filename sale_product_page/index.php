<?php include('../path.php');
include('../admin/functions/controllers/topics.php');
   
    $posts = selectALL('products');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интернет-магазин Sarafan</title>
    <meta name="description" content="Здесь мини текст об Интернет-магазине 150 знаков макс">

	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,300;0,400;1,300;1,400&family=Montserrat:ital,wght@0,300;1,300&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Playfair+Display:wght@400;500&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
   
   
    <link href="../css/setka.css" rel="stylesheet"/>
    <link href="../css/styles.css" rel="stylesheet"/>
    <link href="../css/slider.css" rel="stylesheet"/>
    <link href="../css/checkbox.css" rel="stylesheet"/>
    <link href="../css/cart.css" rel="stylesheet"/>

</head>
<body>

<?php include('../admin/include/header.php') ?>

        <div class="container">
            <p class="navigation">
                <a href="index.html" class="text-wrapper-13">Главная / </a>
                <a href="#" class="text-wrapper-14">Платья</a>
              </p>
        
        <div class="navigation__group">
          <div class="text-wrapper">Платья
          </div>
          <div class="sort">
            <select class="box" >
                <option  id="pricea"> Цена по возрастанию</option>
                <option id="priced"> Цена по убыванию</option>
                <option id="new"> Новинки</option>
              </select>
            
            <div id="main">
                <span style="cursor:pointer" onclick="openNav()"> Фильтр</span>
              </div>
            </div>
        
    </div>
        
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="accordion"> 
      <div class="tab">
       <input type="checkbox" id="tab1" name="tab-group">
       <label for="tab1" class="tab-title">Цвет</label> 
       <section class="tab-content"> 
          <svg xmlns="http://www.w3.org/2000/svg" width="86" height="22" viewBox="0 0 86 22" fill="none">
              <circle cx="11" cy="11" r="11" fill="#CEB9AD"/>
              <circle cx="43" cy="11" r="11" fill="#C21414"/>
              <circle cx="75" cy="11" r="11" fill="#2D2D2D"/>
            </svg>
       </section> 
      </div> 
      <div class="tab">
       <input type="checkbox" id="tab2" name="tab-group">
       <label for="tab2" class="tab-title">Тип изделия</label>
       <section class="tab-content">
         <ul>
          <li>Ручная стирка до 40 °C</li>
          <li>Не отбеливать</li>
          <li>Сушка на плоскости в тени</li>
          <li>Температура утюга до 110 °C</li>
          <li>Сухая чистка (химчистка)</li>
        </ul>

          <div class="wash">Деликатная ручная стирка нейтральным средством.
              Перед стиркой вывернуть наизнанку. 
              Стирать отдельно.Не замачивать.
              Не выкручивать.Деликатный материал требует бережного обращения.
              Аксессуары и другие предметы могут оставить затяжки и пилли.</div>
          
       </section>
      </div>
      <div class="tab">
          <input type="checkbox" id="tab3" name="tab-group">
          <label for="tab3" class="tab-title">Размер</label>
          <section class="tab-content">
              <button  class="size">XL</button>
              <button  class="size">L</button>
              <button  class="size">M</button>
              <button  class="size">S</button>
              <button  class="size">XS</button>
          </section>
         </div>
         <div class="tab">
          <input type="checkbox" id="tab4" name="tab-group">
          <label for="tab4" class="tab-title">Материалы</label>
          <section class="tab-content">
              <div class="compound"> Основной материал: полиэстер 80%, вискоза 17%, эластан 3%; подкладка: полиэстер 100%</div> 
          </section>
         </div>
     </div>
     <div class="tab__btn_product">
        <button class="btn-product-page">Показать результаты 326</button>
    </div>

  </div>
 
  <!-- Каталог -->

  <div class="container">
    <div class="products__wrapper__catalog">
        <!-- Слайдер Каталог -->
      
<!-- конец -->
<div class="container">
    <div class="products__wrapper__catalog">
        <!-- Слайдер Каталог -->
     
        <?php           
      foreach($posts as $post):
            $count = 0;
                if ($count < 2) { // Выводим только два товара
                    $count++;
                    
                    ?>
                    <div class="products__block__catalog">
                        <div class="products__item__catalog " href="../product_page/index.php?id=<?= $post['id']?>">
                            <div class="slider-container">
                            <div class="slider" id="slider-1">
                                <img class="slide products__img__catalog" src="<?= BASE_URL . 'img/catalog/' . $post['filename'] ?>" alt="">
                                <img class="slide products__img__catalog" src="<?= BASE_URL . 'img/catalog/' . $post['img_sec'] ?>" alt="">
                                <img class="slide products__img__catalog" src="<?= BASE_URL . 'img/catalog/' . $post['img_thr'] ?>" alt="">
                                <img class="slide products__img__catalog" src="<?= BASE_URL . 'img/catalog/' . $post['img_sec'] ?>" alt="">
                                    <button class="prev-button" aria-label="Посмотреть предыдущий слайд" > <img src="../img/arrow-right.png" alt=""></button>
                                    <button class="next-button" aria-label="Посмотреть следующий слайд" > <img src="../img/arrow-left.png" alt=""></button>
                            </div>
                        </div> 

                                 <a href=""><img class="fluent-heart" src="../img/heart_white.png" /></a>

                            <div class="text__price">  
                                <a href="../product_page/index.php?id=<?= $post['id']?>"> <h3 class="products__title"> <?= $post['title'] ?></h3></a>
                                <div class="products__footer__catalog">
                                    <div class="products__price">
                                        4 999 руб                  
                                    </div>
                                    <div class="products__old__price">
                                        6 999 руб                  
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <?php
                } elseif ($count == 2) { // Добавляем изображение после вывода двух товаров
                    $count++;
                    ?>
                    <div class="img__block__catalog">
                        <img class="img__center" src="../img/catalog/5.png" alt="">
                    </div>
                    <?php
                } else { // Выводим остальные товары
                    ?>
                    <div class="products__block__catalog">
                        <div class="products__item__catalog" href="#">
                        <div class="slider-container">
                            <div class="slider" id="slider-1">
                                <img class="slide products__img__catalog" src="<?= BASE_URL . 'img/catalog/' . $post['filename'] ?>" alt="">
                                <img class="slide products__img__catalog" src="<?= BASE_URL . 'img/catalog/' . $post['img_sec'] ?>" alt="">
                                <img class="slide products__img__catalog" src="<?= BASE_URL . 'img/catalog/' . $post['img_thr'] ?>" alt="">
                                <img class="slide products__img__catalog" src="<?= BASE_URL . 'img/catalog/' . $post['img_sec'] ?>" alt="">
                                    <button class="prev-button" aria-label="Посмотреть предыдущий слайд" > <img src="../img/arrow-right.png" alt=""></button>
                                    <button class="next-button" aria-label="Посмотреть следующий слайд" > <img src="../img/arrow-left.png" alt=""></button>
                            </div>
                        </div> 

                    <a href=""><img class="fluent-heart" src="../img/heart_white.png" /></a>

                <div class="text__price">  
                    <a href="../product_page/index.php?id=<?= $post['id']?>"> <h3 class="products__title"> <?= $post['title'] ?></h3></a>
                    <div class="products__footer__catalog">
                        <div class="products__price">
                        <?= $post['price']?> руб            
                        </div>
                        <div class="products__old__price">
                        <?= $post['price']?> руб                  
                        </div>
                    </div>  
                </div>
                        </div>
                    </div>
                    <?php
                }
        endforeach;
        ?>
    </div>
</div>
    <div class="btn__block">
        <button class="btn__catalog" type="button">Показать еще</button>
    </div>

</div>

 <!-- футер  -->
 <?php include('../admin/include/footer.php') ?>

 <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 <script src="../js/slick.min.js"></script>
 <script src="../js/slider.js"></script>
 <script src="../js/script.js"></script>
 <script src="../js/main.js"></script>
 <script src="../js/cart.js"></script>
 <script src="../js/simplebar.js"></script>
       
     
  </body>
</html>




<!-- 
<div class="products__footer__catalog">
    <div class="products__price">
        4 999 руб                  
    </div>
    <div class="products__old__price">
        6 999 руб                  
    </div>
</div>    -->
