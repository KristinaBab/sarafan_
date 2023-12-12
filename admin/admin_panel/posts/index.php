<?php
include('../../../path.php');
include('../../functions/controllers/posts.php'); ?>

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
                        <a href="<?= BASE_URL . "admin/admin_panel/posts/create.php" ?>"class="col-2 btn-prim">Создать</a>
                        <a href="<?= BASE_URL . "admin/admin_panel/posts/index.php" ?>" class="col-2 btn-prim">Редактировать</a>
                    </div>
                    <div class="row title-table">
                        <h2>Управление записями</h2>
                        <div class="col-1">ID</div>
                        <div class="col-3">Название</div>
                        <div class="col-2">Артикул</div>
                        <div class="col-2">Цена</div>
                        <div class="col-1">Автор</div>
                        <div class="col-3">Управление</div>
                    </div>
                    <?php foreach ($posts as $key => $post): ?>
                    <div class="row post">
                        <div class="id col-1"><?$post['id']; ?></div>
                        <div class="title col-3"><?=$post['title']?></div>
                        <div class="author col-2"><?=$post['article']?></div>
                        <div class="author col-2"><?=$post['price']?> руб</div>
                        <div class="author col-1"><?=$post['id_admin']?></div>

                        <div class="red col-1"><a href="edit.php?id=<?=$post['id'];?>">edit</a></div>
                        <div class="del col-1"><a href="edit.php?delete_id=<?=$post['id'];?>">delete</a></div>
                        <?php if ($post['status']): ?>
                            <div class="stat col-1"><a href="">unpublish</a></div>
                        <?php else:?>
                            <div class="stat col-1"><a href="">publish</a></div>
                            <?php endif?>
                    </div>
                   <?php endforeach; ?>
                  
                </div>
            </div>
        </div>




        <?php include('../../include/footer.php') ?>
</body>
</html>