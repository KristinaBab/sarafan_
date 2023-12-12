<?php 
    session_start();

    include SITE_ROOT . "/admin/functions/db_connect.php";

    function tt($value){
        echo '<pre>';
        print_r($value);
        echo '<pre>';
    };
// Проверка выполнения запроса к БД
function dbCheckError($query){
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}

// Запрос на получение данных c одной таблицы 
function selectALL($table, $params = []){
    global $pdo;
    $sql= "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'" .$value. "'";
            }
            if($i=== 0){
                $sql = $sql . " WHERE  $key=$value ";
            } else{
                $sql = $sql . " AND  $key=$value ";
            }
            $i++;
        } 
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


// Запрос на получение данных  одной строки с выбранной таблицы 
function selectOne($table, $params = []){
    global $pdo;
    $sql= "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'" . $value. "'";
            }
            if($i=== 0){
                $sql = $sql . " WHERE  $key=$value ";
            } else{
                $sql = $sql . " AND  $key=$value ";
            }
            $i++;
        } 
    }

    // $sql = $sql . "LIMIT 1";
    $query = $pdo->prepare($sql);
    $query -> execute();
    dbCheckError($query);
    return $query->fetch();
}

    //Запись в таблицу БД
    function insert($table, $params){
        global $pdo;
        //INSERT INTO `user` ( user__name, login, password, admin) VALUES (NULL, 'Some', 'sone@gmail.com', 'some', '0');
        $i= 0;
        $coll = '';
        $mask = '';
        foreach($params as $key => $value){
            if($i === 0){
                $coll = $coll .  "$key";
                $mask =$mask ."'" . $value . "'";
            }else{
            $coll = $coll . ", $key";
            $mask =$mask .", '" ."$value" . "'";
           
            }
            $i++;
        }

        $sql = "INSERT INTO $table ($coll) VALUES ($mask)";

    //    tt($sql);
    //     exit();       
        $query = $pdo->prepare($sql);
        $query->execute();
        dbCheckError($query);
        return $pdo->lastInsertId();
        
    }
  

    //Обновление данных в таблице

    // function update($table,$id, $params){
    //     global $pdo;
    //     $i= 0;
    //     $str = '';
    //     foreach($params as $key => $value){
    //         if($i === 0){
    //             $str =$str .$key ."= '" . $value . "'";
    //         }else{
           
    //         $str =$str . ", " . $key . " = '". $value . "'";
           
    //         }
    //         $i++;
    //     }
    //    // UPDATE `user` SET `id`='[value-1]',`user__name`='[value-2]',`login`='[value-3]',`password`='[value-4]',`admin`='[value-5]' WHERE 1
    //     $sql = "UPDATE $table SET $str WHERE id = $id";
    //     $query = $pdo->prepare($sql);
    //     $query->execute($params);
    //     dbCheckError($query);
        
    // }

    function update($table, $id, $params){
        global $pdo;
        $i = 0;
        $str = '';
        foreach ($params as $key => $value) {
            if ($i === 0){
                $str = $str . $key . " = :" . $key;
            }else {
                $str = $str .", " . $key . " = :" . $key;
            }
            $i++;
        }
    
        $sql = "UPDATE $table SET $str WHERE id = :id";
        $query = $pdo->prepare($sql);
    
        // Привязка значений
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        foreach ($params as $key => $value) {
            $query->bindValue(':' . $key, $value, PDO::PARAM_STR);
        }
    
        $query->execute();
        dbCheckError($query);
    }
    


    //Удаление данных ы таблице

    function delete($table,$id,){
        global $pdo;

       // DELETE FROM `user` WHERE id = 6

        $sql = "DELETE FROM $table  WHERE id = $id";
        $query = $pdo->prepare($sql);
        $query->execute();
        dbCheckError($query);
        
    }
    function selectById($table, $id) {
        global $pdo; // Подключение к базе данных
    
        // Подготовленный запрос
        $stmt = $pdo->prepare("SELECT * FROM $table WHERE id = :id");
        $stmt->execute(['id' => $id]);
    
        // Получение результата
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result;
    }

    // выборка записей с автором в админку 
  // 1 таблицa products (t1)  беру поле id_admin, чтобы понять, кто из админа выводил запись
        // 2 таблицa user (t2) 

    // function selectAllFromPostWithUsers($table1, $table2){
    //     global $pdo;
    //     $sql = "SELECT
    //     t1.id,
    //     t1.title,
    //     t1.price,
    //     t1.filename,
    //     t1.article,
    //     t1.description,
    //     t1.color,
    //     t1.product__description,
    //     t1.composition__care,
    //     t1.create_date,
    //     t1.id_topic,
    //     t1.img_sec,
    //     t1.img_thr,
    //     t1.status,
    //     t2.user__name
    //     FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_admin = t2.id";
    //     $query = $pdo->prepare($sql);
    //     $query->execute();
    //     dbCheckError($query);
    //     return $query->fetchAll();
    // }



?>