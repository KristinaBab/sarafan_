<?php 
include '../path.php'; 
include 'functions/controllers/users.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интернет-магазин Sarafan</title>
    <meta name="description" content="Здесь мини текст об Интернет-магазине 150 знаков макс">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,300;0,400;1,300;1,400&family=Montserrat:ital,wght@0,300;1,300&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Playfair+Display:wght@400;500&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
   

    
    <link href="../css/styles.css" rel="stylesheet"/>
    <link href="../css/checkbox.css" rel="stylesheet"/>
    <link href="../css/cart.css" rel="stylesheet"/>

</head>
<?php include 'include/header.php';?>
<div class="container">
<form class="row justify-content-center" method="post" action="reg.php">
    <h2 class="reg_title">Форма регистрации</h2>
    <div class="mb-3 col-12 col-md-4 err ">
        <p><?=$errorMsg?></p>
    </div>
    <div class="w-100"></div> 
<div class="mb-3  col-12 col-md-4">
      <label for="formGroupExampleInput" class="form-label">Ваш логин</label>
      <input name="login" value="<?=$login?>" type="text" id="formGroupExampleInput" class="form-control" placeholder="Disabled input">
</div>
<div class="w-100"></div>
  <div class="mb-3 col-12 col-md-4 ">
    <label for="exampleInputEmail1">Email</label>
    <input name="email" value="<?=$email?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">Ваш email адрес не будет использован для спама</small>
  </div>
  <div class="w-100"></div> 
  <div class="mb-3 col-12 col-md-4 ">
    <label for="exampleInputPassword1">Пароль</label>
    <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="w-100"></div>
  <div class="mb-3 col-12 col-md-4">
    <label for="exampleInputPassword2">Повторите пароль</label>
    <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
  </div>
  <div class="w-100"></div>
  <div class="mb-3 col-12 col-md-4 ">
  <button name="button-reg" type="submit" class="btn-product-page" >Регистрация</button>
  <a href="login.php" class="reg_form_aut">Войти</a>
  </div>
</form>
</div>








<?php include 'include/footer.php';
?>


