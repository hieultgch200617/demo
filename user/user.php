<?php
require_once('../lib/database.php');
require_once('../lib/initialize.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Username</title>
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
    <a href="../admin/admin.php"> Back to Admin</a> <br><br>
    <table class="list">
        <tr> 
            <th>Username</th>
            <th>Gender</th>
            <th>Phone number</th>
            <th>Address</th>
        </tr>

        <?php  
        $all_User = find_all_User();
            $count = mysqli_fetch_assoc($all_User); 
            for ($i=0;$i < $count;$i++):
                $User = mysqli_fetch_assoc($all_User);
            //alternative: mysqli_fetch_row($book_set) returns indexed array
        ?>
            <tr>
                <td><?php echo $Product['Username']; ?></td>
                <td><?php echo $Product['Gender ']; ?></td>
                <td><?php echo $Product['Phone number']; ?></td>
                <td><?php echo $Product['Address']; ?></td>
            </tr>
        <?php 
        endfor; 
        mysqli_free_result($all_User);
        ?>
    </table>
</body>
</html>

<?php
db_disconnect($db);
?>