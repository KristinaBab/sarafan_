<?php 
include('path.php');
include('admin/functions/controllers/topics.php');
    
    $carts = selectALL('cart');

    if(isset($_GET["delete"]) && isset($_GET["id"])) {
        $productIdToDelete = $_GET["id"];
    
        // Подготовленный запрос с использованием PDO для удаления товара по ID
        $deleteStmt = $pdo->prepare("DELETE FROM cart WHERE id = ?");
        $deleteStmt->execute([$productIdToDelete]);
    
        // Перенаправление на страницу корзины после удаления товара
        header("Location: cart.php");
        exit();
    }
   
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Моя корзина</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,300;0,400;1,300;1,400&family=Montserrat:ital,wght@0,300;1,300&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Playfair+Display:wght@400;500&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
   
    <link href="css/setka.css" rel="stylesheet"/>
    <link href="css/styles.css" rel="stylesheet"/>
    <link href="css/checkbox.css" rel="stylesheet"/>
    <link href="css/cart.css" rel="stylesheet"/>
    <link href="css/sliderScript.css" rel="stylesheet"/>
</head>

    
</body>
<body>
<?php include('admin/include/header.php') ?>
  <div class="container">
      <?php $total = 0;
         foreach($carts as $cart): 
                                    
             ?>

                                     <li class="cart-content__item">
                                         <article class="cart-content__product cart-product">
                                        
                                             <img src="<?= BASE_URL . 'img/catalog/' . $cart['cart_img'] ?>" alt="dress" class="cart-product__img">
                                                
                                             <div class="cart-product__text">
                                                   
                                                    <h3 class=""><?= $cart['title']?></h3>
                                                    <span class="cart-product__price"><?= $cart['cart_price']?> руб</span>
                                                    <?php $total += (is_numeric($cart['cart_price']) ? $cart['cart_price'] : 0);?>
                                                     
                                                    <div class="cart__size">
                                                        <h4 class="cart-product__size">Размер</h4>
                                                        <select class="box__cart">
                                                            <option value="xs">XS</option>
                                                            <option value="S">S</option>
                                                            <option value="m">M</option>
                                                            <option value="l">L</option>
                                                            <option value="xl">XL</option>
                                                          </select>
                                                    </div>
                                                    <div class="cart-product__color">
                                                    <h4 class="cart-product__color__color">Цвет</h4>
                                                        <p class="cart-product__color__name"><?= $cart['cart_color']?></p>
                                                    </div>

                                                    <div class="cart-product__delete">
                                                       <div class="cart-product__delete__img"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                            <g clip-path="url(#clip0_1_1012)">
                                                            <path d="M12.0622 15.1112H3.93775C3.76673 15.1072 3.59817 15.0695 3.44172 15.0003C3.28527 14.9311 3.14398 14.8317 3.02594 14.7079C2.9079 14.5841 2.81541 14.4382 2.75376 14.2786C2.69211 14.1191 2.66251 13.9489 2.66664 13.7779V4.99121H3.55553V13.7779C3.55129 13.8322 3.55782 13.8868 3.57476 13.9386C3.5917 13.9904 3.6187 14.0383 3.65422 14.0796C3.68974 14.1209 3.73308 14.1548 3.78174 14.1793C3.8304 14.2037 3.88342 14.2184 3.93775 14.2223H12.0622C12.1165 14.2184 12.1695 14.2037 12.2182 14.1793C12.2669 14.1548 12.3102 14.1209 12.3457 14.0796C12.3812 14.0383 12.4082 13.9904 12.4252 13.9386C12.4421 13.8868 12.4487 13.8322 12.4444 13.7779V4.99121H13.3333V13.7779C13.3374 13.9489 13.3078 14.1191 13.2462 14.2786C13.1845 14.4382 13.092 14.5841 12.974 14.7079C12.856 14.8317 12.7147 14.9311 12.5582 15.0003C12.4018 15.0695 12.2332 15.1072 12.0622 15.1112Z" fill="#6F6F6F"/>
                                                            <path d="M13.68 3.99997H2.22222C2.10434 3.99997 1.9913 3.95315 1.90795 3.8698C1.8246 3.78645 1.77777 3.6734 1.77777 3.55553C1.77777 3.43765 1.8246 3.32461 1.90795 3.24126C1.9913 3.15791 2.10434 3.11108 2.22222 3.11108H13.68C13.7979 3.11108 13.9109 3.15791 13.9943 3.24126C14.0776 3.32461 14.1244 3.43765 14.1244 3.55553C14.1244 3.6734 14.0776 3.78645 13.9943 3.8698C13.9109 3.95315 13.7979 3.99997 13.68 3.99997Z" fill="#6F6F6F"/>
                                                            <path d="M9.33331 5.77783H10.2222V12.4445H9.33331V5.77783Z" fill="#6F6F6F"/>
                                                            <path d="M5.77777 5.77783H6.66666V12.4445H5.77777V5.77783Z" fill="#6F6F6F"/>
                                                            <path d="M10.2222 2.60447H9.37777V1.7778H6.62222V2.60447H5.77777V1.7778C5.77749 1.54956 5.86501 1.32995 6.02222 1.16447C6.17942 0.998993 6.39426 0.900328 6.62222 0.888916H9.37777C9.60573 0.900328 9.82057 0.998993 9.97777 1.16447C10.135 1.32995 10.2225 1.54956 10.2222 1.7778V2.60447Z" fill="#6F6F6F"/>
                                                            </g>
                                                            <defs>
                                                            <clipPath id="clip0_1_1012">
                                                                <rect width="16" height="16" fill="white"/>
                                                            </clipPath>
                                                            </defs>
                                                        </svg> 
                                                        <a href="cart.php?delete=true&id=<?php echo $cart["id"];?>">Удалить</a>


                                                       
                                                    </div>
                                              </div>
                                    </article>
                                </li>
                          <?php endforeach; 
                           ?>
                    
            
      
                        </ul>
    
                            <div class="cart-content__bottom">
                                <div class="cart-content__fullprice">
                                    <span>Стоимость товара(-ов): </span><span class="fullprice"><?php echo $total  ?> руб</span>
                                </div>
    
                                <button class="cart-content__btn ">Перейти к оформлению</button>
                            </div>

    </div>
                    

  <?php include('admin/include/footer.php') ?>
</body>

</html>