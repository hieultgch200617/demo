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
        if (empty($_POST['adminName'])){
            $errors[] = 'admin name is required';
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    checkForm();
    if (isFormValidated()){
        //do update
        $Admins = [];
        $Admins['username'] = $_POST['id'];
        $Admins['adminName'] = $_POST['adminName'];
        $Admins['DoB'] = $_POST['DoB'];

        update_admin($Admins);
        redirect_to('Radmin.php');
    }
} else { // form loaded
    if(!isset($_GET['id'])) {
        redirect_to('Radmin.php');
    }
    $id = $_GET['id'];
    $Admins = find_admin_by_id($id);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Edit Admins</title>
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
        value="<?php echo isFormValidated()? $Admins['username']: $_POST['id'] ?>" >

        <label for="adminName">admin Name</label> <!--required-->
        <input type="text" id="adminName" name="adminName"  
        value="<?php echo isFormValidated()? $Admins['adminName']: $_POST['adminName'] ?>">
        <br><br>

        <label for="DoB">Date of Birth</label>
        <input type="text" id="DoB" name="DoB"
        value="<?php echo isFormValidated()? $Admins['DoB']: $_POST['DoB'] ?>">
        <br><br>
        
        <label for="PhoneNumber">Phone Number</label>
        <input type="text" id="PhoneNumber" name="PhoneNumber"
        value="<?php echo isFormValidated()? $Admins['PhoneNumber']: $_POST['PhoneNumber'] ?>">
        <br><br>

        <label for="hashedPassword">Hashed Password</label>
        <input type="text" id="hashedPassword" name="hashedPassword"
        value="<?php echo isFormValidated()? $Admins['hashedPassword']: $_POST['hashedPassword'] ?>">
        <br><br>

        <input type="submit" name="submit" value="Edit">
        <input type="reset" name="reset" value="Reset">
    
    </form>
    
    <br><br>
    <a href="Radmin.php">Back to Admins</a> 
</body>
</html>


<?php
db_disconnect($db);
?>