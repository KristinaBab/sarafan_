<?php 
include('path.php');
include('admin/functions/controllers/topics.php');
    $posts =selectALL('products');
    $about = selectALL('about');
   
 ?> 

<?php include('admin/include/header.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интернет-магазин Sarafan</title>
    <meta name="description" content="Здесь мини текст об Интернет-магазине 150 знаков макс">
	<!-- Стили сайта -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,300;0,400;1,300;1,400&family=Montserrat:ital,wght@0,300;1,300&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Playfair+Display:wght@400;500&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
   
    <link href="css/setka.css" rel="stylesheet"/>
    <link href="css/styles.css" rel="stylesheet"/>
    <link href="css/checkbox.css" rel="stylesheet"/>
    <link href="css/cart.css" rel="stylesheet"/>
    <link href="css/sliderScript.css" rel="stylesheet"/>
    


    <style>
        header{
        background: url('img/fon.jpg') no-repeat center top;
        width:100%;
        height: 800px;
        background-size: cover;
}
    </style>
    
</head>
<body>     

 <!-- fon -->
 <div class="header-titles">
            <div class="container header__block">
                <div class="row header__col">
                    <div class="col-4 ">
                             <h2>Весна — лето 2022</h2>
                             <h1>with love,  <br>
                                to you</h1>
                             <button class="btn"  ><a href="catalog/index.php">Перейти в каталог</a></button>
            </div>
        </div>
    </div>
 </div>
 </header> 
 <!-- /fon -->  
<!-- block -->
   <div class="block">
     <div class="container">
                <h2 class="block__title">New collection </h2>
                    <div class="wrapper ">
                        <div class="slider__new">
                            <?php foreach($posts as $post):?>
                                <div class="slider__item">
                                    <div class="products__block " >
                                            <a class="products__item" href="product_page\index.php?id=<?= $post['id']?>">
                                                <img class="products__img" src="<?= BASE_URL . 'img/catalog/' . $post['filename'] ?>" alt="">
                                                <button type="button" class="products__favorite" >
                                                    <img src="img/heart_white.png" alt="">
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
                         <?php endforeach; ?> 
                        </div>
                    </div>
         <!-- нижние две фотки Просто для красоты -->
         <div class="products__two__wrapper">
            <div class="products__block__two">
                <a class="products__item__two" href="#">
                    <img class="products__img__two" src="img/catalog/5.png" alt="">
                    <button type="button" class="products__favorite__two" >
                        <img src="img/heart_white.png" alt="">
                    </button>
                    <h3 class="products__title">
                        Платье в полоску с запахом</h3>

                    <div class="products__footer__two">
                        <div class="products__price">
                            6 999 руб.                   
                        </div>
                    </div>
                </a>
            </div>
            <div class="products__block__two">
                    <a class="products__item__two" href="#">
                        <img class="products__img__two" src="img/catalog/6.png" alt="">
                        <button type="button" class="products__favorite__two" >
                            <img src="img/heart_white.png" alt="">
                        </button>
                        <h3 class="products__title">
                            Платье в полоску с запахом</h3>
                        <div class="products__footer__two">
                            <div class="products__price">
                                6 999 руб.                   
                            </div>
                        </div>
                    </a>
            </div>
        </div>
    </div>   

<!--/ block -->

<!-- о бренде -->
	<?php foreach($about as $abouts):?>
       <div class="block__brand-margin">
            <div class="container">
                    <div class="block__brand">
                                <h2 class="block__title__brand">
                                <?= $abouts['title__des'] ?>
                                </h2>
                                <div class="block__text">
                                <?= $abouts['description'] ?>
                                    </div>
                        </div>
                    <div><a class="btn__brand" href="about/index.php?id=<?= $abouts['id']?>">О бренде
                    </a></div>
                    <div class="container">
                        <div class="block__brand__img">
                            <a class="brand__item" href="#">
                                <img class="brand__img" src="img/<?= $abouts['img_top'] ?>" alt="">
                            </a> 
                            <a class="brand__item" href="#">
                                <img class="brand__img__two" src="img/<?= $abouts['img_top2'] ?>" alt="">
                            </a>    
                        </div>  
                </div>
                    <!-- контейнер -->
                    
            </div>
       </div>
       <?php endforeach; ?> 

       <!-- Успей купить -->

        <div class="block_block">
            <div class="container">
                     <a href="catalog/catalog.php"><h2 class="block__title">Успей купить</h2></a>
                    <div class="wrapper ">
                        <div class="slider__new">
                        <?php foreach($posts as $post):?>
                            <div class="slider__item">      
                                <div class="products__block">
                                    <a class="products__item" href="sale_product_page\index.php?id=<?= $post['id']?>">
                                        <img class="products__img" src="<?= BASE_URL . 'img/catalog/' . $post['filename'] ?>" alt="">
                                        <button type="button" class="products__favorite" >
                                            <img src="<?php echo BASE_URL . 'img/heart_white.png' ?>" alt="">
                                        </button>
                                        <h3 class="products__title">
                                        <?= $post['title'] ?></h3>
                                    <div class="products__footer">
                                        <div class="products__price"> <?= $post['price'] ?> руб</div>
                                        <div class="products__old__price"> <?= $post['price'] ?> руб </div>
                                    </div>    
                                    </a>
                                </div>
                            </div>   
                        <?php endforeach; ?>            
                </div>
        </div>

        <?php include('admin/include/footer.php') ?>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 <script src="js/slick.min.js"></script>
 <script src="js/slider.js"></script>
 <script src="js/script.js"></script>
 <script src="js/main.js"></script>
 <script src="js/cart.js"></script>
 <script src="js/simplebar.js"></script>
</body>
</html>