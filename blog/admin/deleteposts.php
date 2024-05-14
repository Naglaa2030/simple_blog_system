<?php
require "check_admin_session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete post</title>
</head>

<body>
    <?php
    //connection
    try {
        $pdoman = new pdo("mysql:host=localhost;dbname=blogdb", "root", "");
        //query
        $ID = $_GET['ID'];
        $data = $pdoman->query("delete from posts where id='$ID'");
        header("Location:dashboard.php");
    } catch (PDOException $e) {
        echo $e;
    }

    //close
    $pdoman = null;
    ?>
</body>

</html>