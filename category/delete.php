<?php
require_once('../database.php');
require_once('../initialize.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    //db delete
    delete_category($_POST['id']);
    redirect_to('category.php');
} else { // form loaded
    if(!isset($_GET['id'])) {
        redirect_to('category.php');
    }
    $id = $_GET['id'];
    $category = find_category_by_id($id);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delete category</title>
    <style>
        .label {
            font-weight: bold;
            font-size: large;
        }
    </style>
</head>
<body>
    <h1>Delete category</h1>
    <h2>Are you sure you want to delete this category?</h2>
    <p><span class="label">category Name: </span><?php echo $category['categoryName']; ?></p>
    <p><span class="label">Descriptions: </span><?php echo $category['Descriptions']; ?></p>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="id" value="<?php echo $category['categoryID']; ?>" >
        <input type="submit" name="submit" value="Delete category">
    </form>
    
    <br><br>
    <a href="category.php">Back to index</a> 
</body>
</html>


<?php
db_disconnect($db);
?>