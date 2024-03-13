<?php
require_once('../lib/database.php');
require_once('../lib/initialize.php');

$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

function checkForm(){
    global $errors;
    if ($_SERVER["REQUEST_METHOD"] == 'POST'){
        if (empty($_POST['ProductName'])){
            $errors[] = 'Product name is required';
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    checkForm();
    if (isFormValidated()){
        //do update
        $name = $_POST['categoryName'];
        $cat = find_category_by_name($name);
        $categoryID = $cat['categoryID'];

        $Product = [];
        $Product['ProductID'] = $_POST['id'];
        $Product['ProductName'] = $_POST['ProductName'];
        $Product['Sizes'] = $_POST['Sizes'];
        $Product['listPrice'] = $_POST['listPrice'];
        $Product['Descriptions'] = $_POST['Descriptions'];
        $Product['categoryID'] = $categoryID;

        update_product($Product);
        redirect_to('product.php');
    }
} else { // form loaded
    if(!isset($_GET['id'])) {
        redirect_to('product.php');
    }
    $id = $_GET['id'];
    $Product = find_product_by_id($id);
}

?>

<?php
    $id = $Product['categoryID'];
    $category = find_category_by_id($id);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Edit Product</title>
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
        value="<?php echo isFormValidated()? $Product['ProductID']: $_POST['id'] ?>" >

        <label for="ProductName">Product Name</label> 
        <input type="text" id="ProductName" name="ProductName" 
        value="<?php echo isFormValidated()? $Product['ProductName']: $_POST['ProductName'] ?>" >
        <br><br>

        <label for="Sizes">Sizes</label> 
        <input type="number" id="Sizes" name="Sizes"  
        value="<?php echo isFormValidated()? $Product['Sizes']: $_POST['Sizes'] ?>" >
        <br><br>

        <label for="listPrice">Price</label> 
        <input type="float" id="listPrice" name="listPrice"  
        value="<?php echo isFormValidated()? $Product['listPrice']: $_POST['listPrice'] ?>" >
        <br><br>

        <label for="Descriptions">Descriptions</label> 
        <input type="text" id="Descriptions" name="Descriptions"  
        value="<?php echo isFormValidated()? $Product['Descriptions']: $_POST['Descriptions'] ?>" >
        <br><br>

        <label for="category">Category</label> 
        <select name="categoryName" id="categoryName" value="<?php echo isFormValidated()? $category['categoryName']: $_POST['Descriptions'] ?>">
            <?php  
            $all_Category = find_all_Category();
            $count = mysqli_num_rows($all_Category);
            for ($i = 0; $i < $count; $i++):
                $categories = mysqli_fetch_assoc($all_Category); 
            ?>
            <option value="<?php echo $categories['categoryName']?>"><?php echo $categories['categoryName']?></option>
            <?php 
            endfor; 
            mysqli_free_result($all_Category);
            ?>
        </select>
        <br><br>
        
        <input type="submit" name="submit" value="Edit">
        <input type="reset" name="reset" value="Reset">
    
    </form>
    
    <br><br>
    <a href="product.php">Back to product management</a> 
</body>
</html>


<?php
db_disconnect($db);
?>