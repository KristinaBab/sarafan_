<?php 
include('../path.php');
include('../admin/functions/controllers/topics.php');
   
    $about = selectALL('about');
   
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $letsAbout['title']?></title>
    
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,300;0,400;1,300;1,400&family=Montserrat:ital,wght@0,300;1,300&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Playfair+Display:wght@400;500&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

      
    <link href="../css/setka.css" rel="stylesheet"/>
    <link href="../css/styles.css" rel="stylesheet"/>
    
    
    <link href="../css/checkbox.css" rel="stylesheet"/>
    <link href="../css/cart.css" rel="stylesheet"/>
</head>
<?php include('../admin/include/header.php') ;?>
<body>
<?php foreach($about as $abouts):?>
        <div class="container">
            <p class="navigation">
                <a href="../index.html" class="text-wrapper-13">Главная  </a> /
                <a href="#" class="text-wrapper-14"> <?= $abouts['title']?></a>
              </p>
        </div>
        <div class="container">
            <h2 class="title_about"> <?= $abouts['title']?></h2>
            <div class="text_block">
                <p class="text_about">
                <?= $abouts['description']?>
                </p>
        </div>
            <div class="img_about">
                <img style="width:670px; height: 425px;" src="../img/about/<?= $abouts['falename_big']?>" alt="">
                <img style="width:470px; height: 425px;" src="../img/about/<?= $abouts['filename_s']?>" alt="">
            </div>
        </div>
     <?php endforeach; ?>   
        <?php include('../admin/include/footer.php') ;?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 <script src="../js/script.js"></script>
 <script src="../js/main.js"></script>
 <script src="../js/cart.js"></script>
 <script src="../js/simplebar.js"></script>
</body>
</html>
