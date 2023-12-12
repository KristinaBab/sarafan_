<?php
include('../../../path.php');
include('../../functions/controllers/posts.php'); 
 ?>

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
                    <div class="row title-table">
                        <h2>Редактирование записи</h2>
                    </div>
                    <div class="row add-posts">
                        <form action="edit.php" method="post" enctype="multipart/form-data" >
                        <input type="hidden" name="id" value="<?=$id;?>">
                        <div class="row g-3">
                            <div class="col-3">
                                <input value="<?=$post['title']; ?>" name="title" type="text" class="form-control" placeholder="Название товара" aria-label="First name">
                            </div>
                            <div class="col-3">
                                <input value="<?=$post['article']; ?>" name="article"  type="text" class="form-control" placeholder="Артикул товара" aria-label="Last name">
                            </div>
                            <div class="col-3">
                                <input  value="<?=$post['price']; ?>" name="price" type="text" class="form-control" placeholder="Цена товара" aria-label="First name">
                            </div>
                            <div class="col-3">
                                <input value="<?=$post['color']; ?>"  name="color"  type="text" class="form-control" placeholder="Цвет товара" aria-label="Last name">
                            </div>
                            <div class="col">
                                <label for="editor" class="form-label">Описание товара</label>
                                <textarea name="description" id="editor" class="form-control"  rows="6"><?=$post['description']; ?></textarea>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-3">
                                <label  for="editor" class="form-label">Материал товара</label>
                                <textarea name="product__description" class="form-control" id="editor" rows="3"><?=$post['product__description']; ?></textarea>
                            </div>
                            <div class="col-3">
                                <label for="editor" class="form-label">Состав и уход</label>
                                <textarea name="composition__care" class="form-control" id="editor" rows="3"><?=$post['composition__care']; ?></textarea>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-5">
                                <input name="filename" type="file" class="form-control" id="inputGroupFile01" enctype="multipart/form-data">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-5">
                                <input name="img_sec" type="file" class="form-control" id="inputGroupFile02" enctype="multipart/form-data">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-5">
                                <input name="img_thr" type="file" class="form-control" id="inputGroupFile03" enctype="multipart/form-data">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>

                            <select name="topic" class="form-select" aria-label="Default select example">
                                <?php foreach($topics as $key => $topic): ?>

                                <option value="<?=$topic['id'];?>"><?=$topic['name']?></option>
                               
                                <?php endforeach; ?>
                            </select>
                            <div class="form-check">
                                <?php if (empty($publish) && $publish == 0): ?>
                                <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">Опубликовать</label>
                                <?php else: ?>
                                    <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">В черновик</label>
                                <?php endif; ?>
                            </div>

                            <div class="col-12">
                                <button name="edit_product" class="btn btn-prim" type="submit">Сохранить</button>
                            </div>

                        </form>
                    </div>
                   
                </div>
            </div>
        </div>

        <?php include('../../include/footer.php') ?>

        <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
        <script src="../../../js/ckeditor.js"></script>
</body>
</html>