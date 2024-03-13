<link rel="stylesheet" type="text/css" href="../category.css">

<?php
require_once('../database.php');
require_once('../initialize.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Category</title>
    <style>
    </style>
</head>
<body>
    <a href="new.php">Add new Category</a> <br><br>
    <a href="../admin.php"> Back to Admin</a> <br><br>
    <table class="list">
        <tr>
            <th>Category Name</th>
            <th>Description</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
  	    </tr>

        <?php  
        $all_Category = find_all_Category();
        $count = mysqli_num_rows($all_Category);
        for ($i = 0; $i < $count; $i++):
            $Category = mysqli_fetch_assoc($all_Category); 
            //alternative: mysqli_fetch_row($book_set) returns indexed array
        ?>
            <tr>
                <td><?php echo $Category['categoryName']; ?></td>
                <td><?php echo $Category['Descriptions']; ?></td>
                <td><a href="<?php echo 'edit.php?id='.$Category['categoryID']; ?>">Edit</a></td>
                <td><a href="<?php echo 'delete.php?id='.$Category['categoryID']; ?>">Delete</a></td>
            </tr>
        <?php 
        endfor; 
        mysqli_free_result($all_Category);
        ?>
    </table>
</body>
</html>

<?php
db_disconnect($db);
?>