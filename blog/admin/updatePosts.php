<?php
require "check_admin_session.php";
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<title>Update Post</title>
		
	</head>

	<body>
			<div class="container">

<?php
    //connection
    try {
        $pdoman = new pdo("mysql:host=localhost;dbname=blogdb", "root", "");
        //query
        $ID = $_GET['ID'];
        $data = $pdoman->query("select * from posts where id ='$ID'");
        $row = $data->fetch(pdo::FETCH_ASSOC);
        }catch(pdoexception $e){
           echo $e;
        }

   
       $pdo = null;

             ?>

	

			<form "class="m-auto" style="max-width:600px"  method="post" action="edit.php">
				<h3 class="my-4">Update Post</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Post Title</label>
					<div class="col-md-7"><input type="text"  value="<?php echo $row['title']?>"name="title"> </div>
				</div>
                <input type="hidden" value="<?php echo $row['id']?>" name="id">
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label">Content</label>
					<div class="col-md-7"><textarea   class="form-control form-control-lg" id="content4" name="content" required placeholder="Enter Content">"<?php echo $row['content']?>"</textarea></div>
				</div>
                
                <hr class="my-4" />
				<div class="form-group mb-3 row">
				<label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7">
					<button class="btn btn-primary btn-lg" name="update" type="submit">Update</button>
					</div>
               </div>
			</form>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


	</body>

</html>

