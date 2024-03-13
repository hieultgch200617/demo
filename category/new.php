<?php

require_once('../database.php');
require_once('../initialize.php');
$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    if (empty($_POST['categoryName'])){
        $errors[] = 'category name is required';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Add New category</title>
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
        <label for="categoryName">category Name</label> 
        <input type="text" id="categoryName" name="categoryName"  
        value="<?php echo isFormValidated()? '': $_POST['categoryName'] ?>">
        <br><br>

        <label for="dob">Descriptions</label> 
        <input type="text" id="descriptions" name="descriptions"  
        value="<?php echo isFormValidated()? '': $_POST['descriptions'] ?>" required>
        <br><br>
        
        <input type="submit" name="submit" value="Create">
        <input type="reset" name="reset" value="Reset">
    
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?> 
        <?php 
        $category = [];
        $category['categoryName'] = $_POST['categoryName'];
        $category['descriptions'] = $_POST['descriptions'];
        $result = insert_category($category);
        $newCategoryId = mysqli_insert_id($db);
        ?>
        <h2>A new category (ID: <?php echo $newCategoryId ?>) has been created:</h2>
        <ul>
        <?php 
            foreach ($_POST as $key => $value) {
                if ($key == 'submit') continue;
                if(!empty($value)) echo '<li>', $key.': '.$value, '</li>';
            }        
        ?>
        </ul>
    <?php endif; ?>
    
    <br><br>
    <a href="category.php">Back to index</a> 
</body>
</html>


<?php
db_disconnect($db);
?>