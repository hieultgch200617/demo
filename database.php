<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "Assignment");

function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    return $connection;
}

$db = db_connect();

function db_disconnect($connection) { 
    if(isset($connection)) {
        mysqli_close($connection);
    }
}

function confirm_query_result($result){
    global $db;
    if (!$result){
        echo mysqli_error($db);
        db_disconnect($db);
        exit; //terminate php
    } else {
        return $result;
    }
}

function find_all_product(){
    global $db;
    $sql = "SELECT * FROM product ";
    $result = mysqli_query($db, $sql); 
    return $result; 
}

function find_product_by_id($id) {
    global $db;

    $sql = "SELECT * FROM product WHERE productID='{$id}'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $product = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $product; // returns an assoc. array
}

function update_product($product) {
    global $db;

    $sql = "UPDATE Product SET productName='{$product['productName']}', Sizes ='{$product['sizes']}', listPrice ='{$product['listPrice']}, descriptions ='{$product['descriptions']}, CategoryID ='{$product['CategoryID']}' ";
    $sql .= "WHERE ProductID='{$product['ProductID']}' LIMIT 1";

    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function delete_product($id) {
    global $db;

    $sql = "DELETE FROM product WHERE productID='{$id}' LIMIT 1";
    $result = mysqli_query($db, $sql);
    
    return confirm_query_result($result);
}

function find_all_category(){
    global $db;
    $sql = "SELECT * FROM category ";
    $result = mysqli_query($db, $sql); 
    return $result; 
}

function find_category_by_id($id) {
    global $db;

    $sql = "SELECT * FROM category WHERE categoryID='{$id}'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $category = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $category; // returns an assoc. array
}

function update_category($category) {
    global $db;

    $sql = "UPDATE category SET categoryName='{$category['categoryName']}', Descriptions ='{$category['Descriptions']}'  ";
    $sql .= "WHERE categoryID='{$category['categoryID']}' LIMIT 1";

    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function delete_category($id) {
    global $db;

    $sql = "DELETE FROM category WHERE categoryID='{$id}' LIMIT 1";
    $result = mysqli_query($db, $sql);
    
    return confirm_query_result($result);
}

function insert_category($category) {
    global $db;

    $sql = "INSERT INTO category (categoryName, descriptions) ";
    $sql .= "VALUES ('{$category['categoryName']}', '{$category['descriptions']}')";

    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function find_all_Admins(){
    global $db;
    $sql = "SELECT * FROM admins ";
    $result = mysqli_query($db, $sql); 
    return $result; 
}

function find_admin_by_id($id) {
    global $db;

    $sql = "SELECT * FROM admins WHERE username='{$id}'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $admin = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
}

function update_admin($admin) {
    global $db;

    $sql = "UPDATE admins SET AdminName='{$admin['AdminName']}', Dob ='{$admin['DoB']}', PhoneNumber ='{$admin['PhoneNumber']}', hashedPassword ='{$admin['hashedPassword']}'";
    $sql .= "WHERE username='{$admin['username']}' LIMIT 1";

    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

?>
