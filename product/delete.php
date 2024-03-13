<link rel="stylesheet" type="text/css" href="../css/CUDProduct.css">

<?php
require_once('../lib/database.php');
require_once('../lib/initialize.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    //db delete
    delete_product($_POST['id']);
    redirect_to('product.php');
} else { // form loaded
    if(!isset($_GET['id'])) {
        redirect_to('product.php');
    }
    $id = $_GET['id'];
    $Product = find_product_by_id($id);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delete Product</title>
</head>
<body>
    <div class="wrapper">
        <h2>Are you sure you want to delete this product?</h2>
        <p><span class="label">Product Name: </span><?php echo $Product['ProductName']; ?></p>
        <p><span class="label">Size: </span><?php echo $Product['Sizes']; ?></p>
        <p><span class="label">Price: </span><?php echo $Product['listPrice']; ?></p>
        <p><span class="label">Descriptions: </span><?php echo $Product['Descriptions']; ?></p>
        <p><span class="label">Category: </span><?php echo $Product['categoryID']; ?></p>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <input type="hidden" name="id" value="<?php echo $Product['ProductID']; ?>" >
            <input type="submit" name="submit" value="Delete Product">
        </form>
        <br><br>
        <a href="product.php">Back to product management</a> 
    </div>
</body>
</html>


<?php
db_disconnect($db);
?>