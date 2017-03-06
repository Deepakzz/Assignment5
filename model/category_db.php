<?php
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories_guitar1
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_category_name($category_id) {
    global $db;
    $query = 'SELECT * FROM categories_guitar1
              WHERE categoryID = :category_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();    
    $category = $statement->fetch();
    $statement->closeCursor();    
    $category_name = $category['categoryName'];
    return $category_name;
}
function add_category($categoryName){
 global $db;
 $query = 'INSERT INTO categories_guitar1 (categoryName) VALUES (:categoryName)';
 $statement = $db->prepare($query);
 $statement->bindValue(':categoryName', $categoryName);
 $statement->execute();
 $statement->closeCursor();
 }
?>
