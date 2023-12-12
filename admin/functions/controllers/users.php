<?php 
include SITE_ROOT . '/admin/functions/db.php';


$errorMsg = '';

function userAuth($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['user__name'];
    $_SESSION['admin'] = $user['admin'];
        if($_SESSION['admin']){
            header('location:' . BASE_URL . "admin/admin_panel/users/index.php");
        }else{
            header('location: ' . BASE_URL );
        }
}

$users=selectALL('user');


// код для формы регист
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){

    $login =trim($_POST['login']);
    $email =trim( $_POST['email']);
    $passF=trim($_POST['pass-first']);
    $passS=trim($_POST['pass-second']);
    $admin=0;

   

    if($login === '' ||$email === '' || $passF === '' ){

        $errorMsg = "Не все поля заполнены!";

    }else if(mb_strlen($login, 'UTF8') < 2){

        $errorMsg = "Логин должен быть более 2-х символов!";

    }elseif ($passF !== $passS){

        $errorMsg = "Пароли в обеих полях должны соответствовать!";

    }else{

        $existence = selectOne('user', ['email' => $email]);

            if((!empty($existence['email']) && $existence['email'] === $email) ){

                $errorMsg = "Пользователь с такой почтой уже существует";

            }else{

        $pass =password_hash( $passF, PASSWORD_DEFAULT);
        $post = [
            'user__name' =>$login,
            'email' =>$email,
            'password'=> $pass,
            'admin' => $admin
       ];
            $id= insert('user',$post);
            $user = selectOne('user' , ['id'=> $id]);

            //для проверки админ или нет можно сделать функцию

          userAuth($user);
           
        }

    }

    //   $last_row = selectOne('user', ['id' => $id]);
}else{
    //шоб 300 раз не писать    
    $login = '';
    $email = '';
  
}   //  $pass =password_hash($_POST['pass-second'], PASSWORD_DEFAULT);

// код для формы авторизации
if($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['button-log'])){
   
    $email =trim($_POST['email']);
    $pass=trim($_POST['password']);
    
    if($email === '' || $pass === '' ){

        $errorMsg = "Не все поля заполнены!";

    }else{
        $existence = selectOne('user', ['email' => $email]);
            if($existence && password_verify($pass ,$existence['password'])){
                //Авторизовать
             userAuth($existence);
            }else{
               $errorMsg = "Почта либо пароль введены неверно!";
            }
        }
    }else{
    
        $email = '';
      
    } 
    
 
// Код добавления пользователя в админке
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])){

    $login =trim($_POST['login']);
    $email =trim( $_POST['email']);
    $passF=trim($_POST['pass-first']);
    $passS=trim($_POST['pass-second']);
    $admin=0;

    if($login === '' || $email === '' || $passF === ''){
        $errorMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($login, 'UTF8') < 2){
        $errorMsg = "Логин должен быть более 2-х символов";
    }elseif ($passF !== $passS) {
        $errorMsg = "Пароли в обеих полях должны соответствовать!";
    }else{
        $existence = selectOne('user', ['email' => $email]);
        if($existence['email'] === $email){
            $errorMsg = "Пользователь с такой почтой уже зарегистрирован!";
        }else{
            $pass = password_hash($passF, PASSWORD_DEFAULT);

            if (isset($_POST['admin'])) $admin = 1;

            $user = [
                'admin' => $admin,
                'user__name' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('user', $user);
            $user = selectOne('user', ['id' => $id] );
            userAuth($user);
        }
    }
}else{
    $login = '';
    $email = '';
}

// Код удаления пользователя в админке
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('user', $id);
    header('location: ' . BASE_URL . 'admin/admin_panel/users/index.php');
}

// РЕДАКТИРОВАНИЕ ПОЛЬЗОВАТЕЛЯ ЧЕРЕЗ АДМИНКУ
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])){
    $user = selectOne('user', ['id' => $_GET['edit_id']]);

    $id =  $user['id'];
    $admin =  $user['admin'];
    $user__name = $user['user__name'];
    $email = $user['email'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])){

    $id = $_POST['id'];
    $mail = trim($_POST['email']);
    $login = trim($_POST['login']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    $admin = isset($_POST['admin']) ? 1 : 0;

    if($login === ''){
        $errorMsg = "Не все поля заполнены!";
    }elseif (mb_strlen($login, 'UTF8') < 2){
        $errorMsg = "Логин должен быть более 2-х символов";
    }elseif ($passF !== $passS) {
        $errorMsg = "Пароли в обеих полях должны соответствовать!";
    }else{
        $pass = password_hash($passF, PASSWORD_DEFAULT);
        if (isset($_POST['admin'])) $admin = 1;
        $user = [
            'admin' => $admin,
            'user__name' => $login,
//            'email' => $mail,
            'password' => $pass
        ];

        $user = update('user', $id, $user);
        header('location: ' . BASE_URL . 'admin/admin_panel/users/index.php');
    }
}
// else{
//     $id =  $user['id'];
//     $admin =  $user['admin'];
//     $user__name = $user['user__name'];
//     $email = $user['email'];
// }

?>