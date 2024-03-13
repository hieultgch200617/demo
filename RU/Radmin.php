<?php
require_once('../database.php');
require_once('../initialize.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>All Admins</title>
    <style>
        table {
        border-collapse: collapse;
        vertical-align: top;
        }

        table.list {
        width: 100%;
        }

        table.list tr td {
        border: 1px solid #999999;
        }

        table.list tr th {
        border: 1px solid #0055DD;
        background: #0055DD;
        color: white;
        text-align: left;
        }
    </style>
</head>
<body>
    <a href="../admin.php"> Back to Admin</a> <br><br>
    <table class="list">
        <tr>
            <th>Admins Name</th>
            <th>Date of Birth</th>
            <th>Phone number</th>
            <th>Address</th>
            <th>Hash Password</th>
            <th>&nbsp;</th>
  	    </tr>

        <?php  
        $all_Admins = find_all_Admins();
        $count = mysqli_num_rows($all_Admins);
        for ($i = 0; $i < $count; $i++):
            $Admins = mysqli_fetch_assoc($all_Admins); 
            //alternative: mysqli_fetch_row($book_set) returns indexed array
        ?>
            <tr>
                <td><?php echo $Admins['adminName']; ?></td>
                <td><?php echo $Admins['DoB']; ?></td>
                <td><?php echo $Admins['PhoneNumber']; ?></td>
                <td><?php echo $Admins['Address']; ?></td>
                <td><?php echo $Admins['hashedPassword']; ?></td>
                <td><a href="<?php echo 'Uadmin.php?id='.$Admins['username']; ?>">Edit</a></td>
            </tr>
        <?php 
        endfor; 
        mysqli_free_result($all_Admins);
        ?>
    </table>
</body>
</html>

<?php
db_disconnect($db);
?>