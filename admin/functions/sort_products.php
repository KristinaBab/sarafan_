<?php
function getSortedProducts($sortOption, $mysqli) {
    // SQL запрос для выборки отсортированных товаров
    $sql = "SELECT * FROM products";
    
    // Добавляем сортировку в зависимости от параметра sortOption
    switch ($sortOption) {
        case 'pricea':
            $sql .= " ORDER BY price ASC";
            break;
        case 'priced':
            $sql .= " ORDER BY price DESC";
            break;
        case 'new':
            $sql .= " ORDER BY datetime DESC";
            break;
        default:
            // В случае неправильного значения sortOption просто выполним базовый запрос без сортировки
            break;
    }

    $res = $mysqli->query($sql);

    $sortedProducts = array();
    if ($res->num_rows > 0) {
        while($rresArticleow = $res->fetch_assoc()) {
            $sortedProducts[] = $rresArticleow;
        }
    }

    return json_encode($sortedProducts);
}
