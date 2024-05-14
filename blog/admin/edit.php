<?php
require "check_admin_session.php";
try{
//start pdo connection 
$sqlman = new pdo ("mysql:host=localhost;dbname=blogdb","root","");
echo "connected";
              $ID=$_POST['id'];
             $Title=$_POST['title'];
			 $Content=$_POST['content'];
             $sqlman->query("UPDATE posts
                             SET Title='$Title',content='$Content' WHERE id='$ID'");
           
    header("Location:dashboard.php");
} catch (pdoExeption $e) {
echo $e;
}
// end connection
$sqlman=null;
?>