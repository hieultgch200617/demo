<?php
require_once('../database.php');
require_once('../initialize.php');

$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

function checkForm(){
    global $errors;
    if ($_SERVER["REQUEST_METHOD"] == 'POST'){
        if (empty($_POST['categoryName'])){
            $errors[] = 'category name is required';
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    checkForm();
    if (isFormValidated()){
        //do update
        $category = [];
        $category['categoryID'] = $_POST['id'];
        $category['categoryName'] = $_POST['categoryName'];
        $category['Descriptions'] = $_POST['Descriptions'];

        update_category($category);
        redirect_to('category.php');
    }
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
    <title>Edit category</title>
    <style>
        label {
            font-weight: bold;
        }
        .error {
            color: #FF0000;
        }
        div.error{
            border: thin solid red; 
            display: inline-block;
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && !isFormValidated()): ?> 
        <div class="error">
            <span> Please fix the following errors </span>
            <ul>
                <?php
                foreach ($errors as $key => $value){
                    if (!empty($value)){
                        echo '<li>', $value, '</li>';
                    }
                }
                ?>
            </ul>
        </div><br><br>
    <?php endif; ?>
    
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="id" 
        value="<?php echo isFormValidated()? $category['categoryID']: $_POST['id'] ?>" >

        <label for="categoryName">category Name</label> <!--required-->
        <input type="text" id="categoryName" name="categoryName"  
        value="<?php echo isFormValidated()? $category['categoryName']: $_POST['categoryName'] ?>">
        <br><br>

        <label for="descriptions">Descriptions</label>
        <input type="text" id="Descriptions" name="Descriptions"
        value="<?php echo isFormValidated()? $category['Descriptions']: $_POST['Descriptions'] ?>">
        <br><br>
        
        <input type="submit" name="submit" value="Edit">
        <input type="reset" name="reset" value="Reset">
    
    </form>
    
    <br><br>
    <a href="category.php">Back to category</a> 
</body>
</html>


<?php
db_disconnect($db);
?>