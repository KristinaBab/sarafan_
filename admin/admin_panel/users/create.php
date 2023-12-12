<?php

include('../../../path.php');
include('../../functions/controllers/users.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интернет-магазин Sarafan</title>
    <meta name="description" content="Здесь мини текст об Интернет-магазине 150 знаков макс">
	<!-- Стили сайта -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,300;0,400;1,300;1,400&family=Montserrat:ital,wght@0,300;1,300&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Playfair+Display:wght@400;500&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
   
    <link href="../../../css/setka.css" rel="stylesheet"/>
    <link href="../../../css/styles.css" rel="stylesheet"/>
    <link href="../../../css/admin.css" rel="stylesheet"/>

    <?php include('../../include/admin_header.php') ?>  
    
</head>
<body>     

        <div class="container">
        <?php include '../../include/side-bar.php' ?>
                <div class="posts col-9" method="post">
                <div class="button row">
                        <a href="<?= BASE_URL . "admin/admin_panel/users/create.php" ?>"class="col-2 btn-prim">Создать</a>
                        <a href="<?= BASE_URL . "admin/admin_panel/users/index.php" ?>" class="col-2 btn-prim">Редактировать</a>
                    </div>
                    <div class="row title-table">
                        <h2>Создать пользователя</h2>
                    </div>
                    <div class="row add-posts">
                        <form action="create.php" method="post">
                        <div class="col">
                            <label for="formGroupExampleInput" class="form-label">Ваш логин</label>
                            <input name="login" value="<?=$login?>" type="text" id="formGroupExampleInput" class="form-control" placeholder="Disabled input">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" value="<?=$email?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword1">Пароль</label>
                            <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword2">Повторите пароль</label>
                            <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                        </div>
                        <div class="form-check">
                                <input name="admin" class="form-check-input" value="1" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">Admin</label>
                            </div>
                            <div class="col-12">
                                <button name="create-user" class="btn btn-prim" type="submit">Создать</button>
                            </div>

                        </form>
                    </div>
                   
                </div>
            </div>
        </div>




        <?php include('../../include/footer.php') ?>
</body>
</html>