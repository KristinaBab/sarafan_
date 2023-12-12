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
            <div class="posts col-9">
                <div class="button row">
                        <a href="<?= BASE_URL . "admin/admin_panel/users/create.php" ?>"class="col-2 btn-prim">Создать</a>
                        <a href="<?= BASE_URL . "admin/admin_panel/users/index.php" ?>" class="col-2 btn-prim">Редактировать</a>
                </div>
                    <div class="row title-table">
                        <h2>Пользователями</h2>
                        <div class="col-1">ID</div>
                            <div class="col-2">Логин</div>
                            <div class="col-3">Email</div>
                            <div class="col-2">Роль</div>
                            <div class="col-4">Управление</div>
                    </div>
                    <?php foreach($users as $key => $user): ?>
                        <div class="row post">
                            <div class="col-1"><?=$user['id'];?></div>
                            <div class="col-2"><?=$user['user__name'];?></div>
                            <div class="col-3"><?=$user['email'];?></div>
                            <?php if ($user['admin'] == 1): ?>
                                <div class="col-2">Admin</div>
                            <?php else: ?>
                                <div class="col-2">User</div>
                            <?php endif; ?>
                            <div class="red col-2"><a href="edit.php?edit_id=<?=$user['id'];?>">edit</a></div>
                            <div class="del col-2"><a href="index.php?delete_id=<?=$user['id'];?>">delete</a></div>
                        </div>
                    <?php endforeach; ?>
                
            </div>
    </div>




        <?php include('../../include/footer.php') ?>
</body>
</html>