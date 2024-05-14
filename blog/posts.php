<?php
require "check_admin_session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title> All Posts</title>
</head>
<body>
  
        <div id="wrapper" class="container-fluid">
         <h1> List Posts</h1>
         
         <table class="table table-striped">
           <thead>
             <tr>
               <th><span>Title</span></th>
               <th><span>Content</span></th>
               <th><span>publish_date</span></th>
               <th><span>display</span></th>
               <th><span>Update</span></th>
               <th><span>Delete</span></th>
             </tr>
           </thead>
           <tbody>
           <?php
              try {
                  $pdoman = new pdo("mysql:host=localhost;dbname=blogdb", "root", "");
                
                  $data =  $pdoman->query("select * from posts");
                  $posts = $data->fetchAll(PDO::FETCH_ASSOC);
              } catch (pdoexception $e) {
                  echo $e;
              }
              foreach ($posts as $post) {
              ?>
                  <tr>
                  
                      <td><?php echo  $post['title'] ?></td>
                      <td><?php echo  $post['content'] ?></td>
                      <td><?php echo  $post['created_at'] ?></td>
               
               <td><a href="displaypost.php?ID=<?php echo  $post['id']  ?>">display post</a></td>
               <td><a href="updatePosts.php?ID=<?php echo  $post['id']  ?>">Update</a></td>
               <td><a href="deleteposts.php?ID=<?php echo  $post['id']  ?>">Delete</a></td>
             </tr>
             <?php
              }
              //end connection
              $pdoman = null;
  
              ?>
  
           </tbody>
         </table>
        </div> 
        <div><a  class= "btn btn-primary" href="insertPosts.php">new post</a></div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
