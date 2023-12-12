<?php 
include SITE_ROOT . '/admin/functions/db.php';

$errorMsg= '';

$id= '';
$title='';
$price='';
$filename='';
$article = '';
$description ='';
$color = '';
$product__description = '';
$composition__care= '';
$img_sec = '';
$img_thr = '';

$topic = '';

$topics = selectALL('topics');
$posts = selectALL('products');


// код для создании записи
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])){
    
    // if(!empty($_FILES['filename']['name'])){
    //     $imgName = time() . "_" . $_FILES['filename']['name'];
    //     $fileTmName = $_FILES['filename']['tmp_name'];
    //     $destination = ROOT_PATH . "img\posts\\" . $imgName;

    //     $result = move_uploaded_file($fileTmName, $destination);

    //     if($result){
    //         $_POST['filename'] = $imgName;
    //     }else{
    //         $errorMsg = "Ошибка загрузки изображения на сервер";
    //     }
    // }else{
    //     $errorMsg = "Ошибка получения картинки";
    // }
    $title = trim($_POST['title']);
    $price= trim($_POST['price']);
    $article= trim($_POST['article']);
    $description = trim( $_POST['description']);
    $color= trim($_POST['color']);
    $product__description= trim($_POST['product__description']);
    $composition__care= trim($_POST['composition__care']);
    $topic = trim( $_POST['topic']);

    $publish = isset( $_POST['publish']) !==null ? 1 : 0;


    if($title === '' || $description === '' || $topic === '' ){

        $errorMsg = "Не все поля заполнены!";

    }elseif(mb_strlen($title, 'UTF8') < 7){

        $errorMsg = "Длинна должна быть более 7-х символов!";

    }else{       
        $post = [
            'id_admin' =>$_SESSION['id'],
            'title' => $title,
            'price' => $price,
            'filename' => $_POST['filename'],
            'article' => $article,
            'description' => $description,
            'color' => $color,
            'product__description' => $product__description,
            'composition__care' => $composition__care,
            'id_topic' => $topic,
            'img_sec' =>$_POST['img_sec'],
            'img_thr' => $_POST['img_thr'],
            'status'=> $publish

           
       ];
            $post= insert('products', $post);
            $post = selectOne('products' , ['id'=> $id]);

            header('location: ' . BASE_URL . 'admin/admin_panel/posts/index.php');
          
           
        }
    //   $last_row = selectOne('user', ['id' => $id]);
}else{
    $id = '';
    $title = '';
    $description = '';
    $publish = '';
    $topic = '';
}  

//Редактирование записи товаров

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){

    $post = selectOne('products', ['id' => $_GET['id']]);

    $id= $post['id'];
    $title = $post['title'];
    $price= $post['price'];
    $filename= $post['filename'];
    $article= $post['article'];
    $description = $post['description'];
    $color= $post['color'];
    $product__description= $post['product__description'];
    $composition__care= $post['composition__care'];
    $topic = $post['id_topic'];
    $publish = $post['status'];

}



if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_product'])){
   
    $id= $_POST['id'];
    $title =trim($_POST['title']);
    $price= trim($_POST['price']);
    $filename= trim($_POST['filename']);
    $article= trim($_POST['article']);
    $description = trim($_POST['description']);
    $color= trim($_POST['color']);
    $product__description= trim($_POST['product__description']);
    $composition__care= trim($_POST['composition__care']);
    $topic = trim($_POST['topic']);
    $publish =isset($_POST['publish']) ? 1 : 0;

    // if (!empty($_FILES['filename']['name'])){
    //     $imgName = time() . "_" . $_FILES['filename']['name'];
    //     $fileTmpName = $_FILES['filename']['tmp_name'];
    //     $fileType = $_FILES['filename']['type'];
    //     $destination = ROOT_PATH . "\imag\posts\\" . $imgName;


    //     if (strpos($fileType, 'imag') === false) {
    //         array_push($errMsg, "Подгружаемый файл не является изображением!");
    //     }else{
    //         $result = move_uploaded_file($fileTmpName, $destination);

    //         if ($result){
    //             $_POST['filename'] = $imgName;
    //         }else{
    //             array_push($errMsg, "Ошибка загрузки изображения на сервер");
    //         }
    //     }
    // }else{
    //     array_push($errMsg, "Ошибка получения картинки");
    // }






    if($title === '' || $description === '' || $topic === ''){
        $errMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($title, 'UTF8') < 8){
        $errMsg = "Название записи должна быть более 8-х символов";
    }else{
        $post = [
            'id_admin' => $_SESSION['id'],
            'title' => $title,
            'price' => $price,
            'filename' => $_POST['filename'],
            'article' => $article,
            'description' => $description,
            'color' => $color,
            'product__description' => $product__description,
            'composition__care' => $composition__care,
            'id_topic' => $topic,
            'status' => $publish
            
        ];
       
        $topic_id = update('products', $id, $post);
        header('location: ' . BASE_URL . 'admin/admin_panel/posts/index.php');
    }
 }
 

//Удаление категории
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete( 'products' , $id);
    header('location: ' . BASE_URL . 'admin/admin_panel/posts/index.php');

}



// ?>


