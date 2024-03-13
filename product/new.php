<link rel="stylesheet" type="text/css" href="../css/CUDProduct.css">
<?php
require_once('../lib/database.php');
require_once('../lib/initialize.php');

$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    if (empty($_POST['ProductName'])){
        $errors[] = 'Product name is required';
    }
    if (empty($_POST['Sizes'])){
        $errors[] = 'Sizes is required';
    }
    if (empty($_POST['listPrice'])){
        $errors[] = 'Price is required';
    }
    if (empty($_POST['Descriptions'])){
        $errors[] = 'Price is required';
    }
    if (empty($_POST['categoryID'])){
        $errors[] = 'Category is required';
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <style>
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 360px;
            padding: 20px;
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
    <div class="wrapper">
        <h2>Create new product</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <label for="ProductName">Product Name</label> 
            <input type="text" id="ProductName" name="ProductName"  
            value="<?php echo isFormValidated()? '': $_POST['ProductName'] ?>">
            <br><br>

            <label for="Sizes">Sizes</label> 
            <input type="number" id="Sizes" name="Sizes"  
            value="<?php echo isFormValidated()? '': $_POST['Sizes'] ?>">
            <br><br>

            <label for="listPrice">Price</label> 
            <input type="float" id="listPrice" name="listPrice"
            value="<?php echo isFormValidated()? '': $_POST['listPrice'] ?>">
            <br><br>

            <label for="Descriptions">Descriptions</label> 
            <input type="text" id="Descriptions" name="Descriptions"  
            value="<?php echo isFormValidated()? '': $_POST['Descriptions'] ?>">
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

            <input type="submit" name="submit" value="Create">
        
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?> 
            <?php 
            $name = $_POST['categoryName'];
            $cat = find_category_by_name($name);
            $categoryID = $cat['categoryID'];

            $Product = [];
            $Product['ProductName'] = $_POST['ProductName'];
            $Product['Sizes'] = $_POST['Sizes'];
            $Product['listPrice'] = $_POST['listPrice'];
            $Product['Descriptions'] = $_POST['Descriptions'];
            $Product['categoryID'] = $categoryID;
            $result = insert_Product($Product);
            $newProductId = mysqli_insert_id($db);
            ?>
            <h2>A new Product (ID: <?php echo $newProductId ?>) has been created:</h2>
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
        <a href="product.php">Back to product management</a>
    </div>
</body>
</html>


<?php
db_disconnect($db);
?>