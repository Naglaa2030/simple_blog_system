<?php
require "check_admin_session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title> display selected post</title>
</head>
<body>
  
        <div id="wrapper" class="container-fluid">
         <h1> display selected post</h1>
           <?php
              try {
                 $ID = $_GET['ID'];
                  $pdoman = new pdo("mysql:host=localhost;dbname=blogdb", "root", "");
                  $data =  $pdoman->query("select * from posts where id='$ID'");
                  $post = $data->fetch(PDO::FETCH_ASSOC);
              } catch (pdoexception $e) {
                  echo $e;
              }
              ?>

  <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo  $post['title'] ?></h5>
    <p class="card-text"><?php echo  $post['content'] ?></p>
    <a href="dashboard.php" class="btn btn-primary">go back</a>
  </div>
</div>
<?php

                           //end connection
              $pdoman = null;
  
              ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
