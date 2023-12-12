<?php 
include('../path.php');
include('../admin/functions/controllers/topics.php');

if(isset($_POST["add"])){
    if(isset($_GET["id"])) {
        $productId = $_GET["id"];
        $productName = $_POST["title"];
        $productPrice = $_POST["price"];
        $productColor = $_POST["color"]; 
        $productImg = $_POST["filename"];

        // Подготовленный запрос с использованием PDO
        $stmt = $pdo->prepare("INSERT INTO cart (cart_img, cart_price, cart_color, title) VALUES (?, ?, ?, ?)");
        $stmt->execute([$productImg, $productPrice, $productColor, $productName]);

        // Проверка на успешное выполнение запроса
       
    }
}
$product = selectById('products', $_GET['id']);
if (isset($_GET['id'])) {
    // Получаем id из URL
    $productId = $_GET['id'];

    // Выбираем товар из базы данных по id
    $product = selectById('products', $productId);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['title']; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,300;0,400;1,300;1,400&family=Montserrat:ital,wght@0,300;1,300&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Playfair+Display:wght@400;500&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <link href="../css/setka.css" rel="stylesheet"/>
    <link href="../css/styles.css" rel="stylesheet"/>
    <link href="../css/slider.css" rel="stylesheet"/>
    <link href="../css/checkbox.css" rel="stylesheet"/>
    <link href="../css/cart.css" rel="stylesheet"/>
    <link href="../css/sliderScript.css" rel="stylesheet"/>
</head>
<body>


<?php include('../admin/include/header.php');?>



        <div class="container">
            <p class="navigation">
                <a href="index.php" class="text-wrapper-13">Главная  </a> /
                <a href="#" class="text-wrapper-13">Платья</a>/
                <!-- <a href="#" class="text-wrapper-13">Блузы и топы </a>/ -->
                <a href="#" class="text-wrapper-14"><?= $product['title']; ?></a>
              </p>
        </div>

<form method="post" action="index.php?id=<?=$product['id']?>">

        <div class="container">
            <div class="card">
                <div class="card-slider">
                    <div class="card-slider__nav slider-nav">
                        <div class="slider-nav__item"><img src="<?= BASE_URL . 'img/catalog/'   .  $product['filename']; ?>" alt=""></div>
                        <div class="slider-nav__item"><img src="<?= BASE_URL . 'img/catalog/'   .  $product['img_sec']; ?>" alt=""></div>
                        <div class="slider-nav__item"><img src="<?= BASE_URL . 'img/catalog/'   .  $product['img_thr']; ?>" alt=""></div>
                    </div>
                    <div class="slider-block ">
                       <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="<?= BASE_URL . 'img/catalog/'   .  $product['filename']; ?>" alt=""></div> 
                        <div class="swiper-slide"><img src="<?= BASE_URL . 'img/catalog/'   .  $product['img_sec']; ?>" alt=""></div>
                        <div class="swiper-slide"><img src="<?= BASE_URL . 'img/catalog/'   .  $product['img_thr']; ?>" alt=""></div>
                       </div>
                      
                    </div>
                   
                </div>
                <a><img class="fa-heart " src="../img/heart_white.png" /></a>


            <div class="card-info">
                    <h1 class="title"><?= $product['title']; ?></h1>
                   
                    <span class="vendor"><?= $product['article']; ?></span>   
                    <div class="price">
                        <div class="price__current"><?= $product['price']; ?> руб.</div>
                       
                    </div> 
                    <div class="description"><h3>
                    <?= $product['description']; ?>
                    </h3></div>
                    <div>
                        <span class="name-color">Цвет:  <?= $product['color']; ?></span><br>
                        <img class="color color-beige" src="../img/color/Ellipse 5.png" alt="">
                        <img class="color color-red" src="../img/color/Ellipse 6.png" alt="">
                        <img class="color color-black" src="../img/color/Ellipse 7.png" alt="">
                    </div>
                    
                    <div class="select-wrapper">
                        <select class="select" name="select-category">
                            <option class="default" value="default">Выберите размер</option>
                            <option value="1">XS</option>
                            <option value="2">S</option>
                            <option value="3">M</option>
                            <option value="4">L</option>
                            <option value="5">XL</option>
                          </select>
                    </div>
                     <input type="hidden" name="filename" value="<?= $product['filename']; ?>">
                        <input type="hidden" name="title" value="<?= $product['title']; ?>">
                        <input type="hidden" name="price" value="<?= $product['price']; ?>">
                        <input type="hidden" name="color" value="<?= $product['color']; ?>">
                        <button type="submit" name="add" class="btn-product-page" value="Добавить в корзину">Добавить в корзину</button>
                      
                   
</form>              
                    <div class="delivery__exchange__refund" >
                        <h4 style="cursor:pointer" onclick="openNav()" class="der">Доставка, обмен, возврат</h4>
                    </div>
                                            
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                        <div class="accordion"> 
                            <div class="subtitle__der__margin">
                            <h1>Доставка, обмен, возврат</h1>
                            <br>
                            <?= $product['composition__care']; ?>
                            <!-- <h4 class="subtitle__der">Отправка</h4>
                                        <p>Идейные соображения высшего порядка, а также укрепление и
                                            развитие структуры позволяет выполнять важные задания по 
                                            разработке системы обучения кадров, соответствует насущным 
                                            потребностям. Таким образом начало повседневной работы 
                                            по формированию позиции влечет за собой процесс внедрения и 
                                            модернизации позиций, занимаемых участниками в отношении поставленных задач. </p>
                                        <br>
                                        
                            <h4 class="subtitle__der">Доставка</h4>
                                        <p>Идейные соображения высшего порядка, а также укрепление и
                                            развитие структуры позволяет выполнять важные задания по 
                                            разработке системы обучения кадров, соответствует насущным 
                                            потребностям. Таким образом начало повседневной работы 
                                            по формированию позиции влечет за собой процесс внедрения и 
                                            модернизации позиций, занимаемых участниками в отношении поставленных задач. </p>
                                           <br> 
                      
                            <h4 class="subtitle__der">Возврат</h4>
                                        <p>Идейные соображения высшего порядка, а также укрепление и
                                            развитие структуры позволяет выполнять важные задания по 
                                            разработке системы обучения кадров, соответствует насущным 
                                            потребностям. Таким образом начало повседневной работы 
                                            по формированию позиции влечет за собой процесс внедрения и 
                                            модернизации позиций, занимаемых участниками в отношении поставленных задач. </p> -->
                            </div>
                        </div>
                    </div>
 

                    <div class="tab">
                        <input type="checkbox" id="tab5" name="tab-group">
                        <label for="tab5" class="tab-title">Описание товара</label>
                        <section class="tab-content">
                           <div class="wash-content"><?= $product['product__description']; ?></div>
                           
                        </section>
                       </div>

                       <div class="tab">
                        <input type="checkbox" id="tab6" name="tab-group">
                        <label for="tab6" class="tab-title">Состав и уход</label>
                        <section class="tab-content">
                           <div class="wash-content"><?= $product['product__description']; ?></div>
                           
                        </section>
                       </div>
                       <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
                       <script src="../js/slider.js"></script>
                </div>
            </div>
        </div>

        <div class="block">
                <div class="container">
                   <h2 class="block__title">Дополните образ</h2>
 <?php  } else {
        echo "Товар с указанным ID не найден";
    }?>                 
                   <div class="wrapper">
                   <div class="slider__new"> 
                        <?php foreach($posts as $post):?>
                                <div class="slider__item">
                                    <div class="products__block " >
                                            <a class="products__item" href="index.php?id=<?= $post['id'];?>">
                                                <img class="products__img" src="<?= BASE_URL . 'img/catalog/'   .  $post['filename']; ?>" alt="">
                                                <button type="button" class="products__favorite" >
                                                    <img src="<?= BASE_URL . 'img/heart_white.png'?>" alt="">
                                                </button>
                                                <h3 class="products__title">
                                                <?= $post['title'] ?></h3>
                                            <div class="products__footer">
                                                <div class="products__price">
                                                <?= $post['price'] ?> руб                
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>    
                            <?php	endforeach ?>  
                     
            </div>
        </div>

        
        <div class="block">
            <div class="container">
               <h2 class="block__title">Вам также может понравится</h2>
                 <div class="wrapper ">
                        <div class="slider__new">
                        <?php foreach($posts as $post):?>
                                <div class="slider__item">
                                    <div class="products__block " >
                                            <a class="products__item" href="index.php?id=<?= $post['id'];?>">
                                                <img class="products__img" src="../img/catalog/<?= $post['filename']; ?>" alt="">
                                                <button type="button" class="products__favorite" >
                                                    <img src="<?= BASE_URL . 'img/heart_white.png'?>" alt="">
                                                </button>
                                                <h3 class="products__title">
                                                <?= $post['title']; ?></h3>
                                            <div class="products__footer">
                                                <div class="products__price">
                                                <?= $post['price']; ?>   руб             
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>    
                            <?php endforeach; ?> 
            </div>
    </div>
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

