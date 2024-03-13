<link rel="stylesheet" type="text/css" href="../css/product.css">

<?php
require_once('../lib/database.php');
require_once('../lib/initialize.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Product</title>
    <style>
    </style>
</head>
<body>
    <a href="new.php">Add new Product</a> <br><br>
    <a href="../admin/admin.php"> Back to Admin</a> <br><br>
    <table class="list">
        <tr>
            <th>Product Name</th>
            <th>Sizes</th>
            <th>Prices</th>
            <th>Description</th>
            <th>Category</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
  	    </tr>

        <?php  
        $all_Product = find_all_Product();
        $count = mysqli_num_rows($all_Product);
        for ($i = 0; $i < $count; $i++):
            $Product = mysqli_fetch_assoc($all_Product); 
            $id = $Product['categoryID'];
            $category = find_category_by_id($id);

        ?>
            <tr>
                <td><?php echo $Product['ProductName']; ?></td>
                <td><?php echo $Product['Sizes']; ?></td>
                <td><?php echo $Product['listPrice']; ?></td>
                <td><?php echo $Product['Descriptions']; ?></td>
                <td><?php echo $category['categoryName']; ?></td>
                <td><a href="<?php echo 'edit.php?id='.$Product['ProductID']; ?>">Edit</a></td>
                <td><a href="<?php echo 'delete.php?id='.$Product['ProductID']; ?>">Delete</a></td>
            </tr>
        <?php 
        endfor; 
        mysqli_free_result($all_Product);
        ?>
    </table>
</body>
</html>

<?php
db_disconnect($db);
?>