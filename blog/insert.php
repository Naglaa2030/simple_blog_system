<?php
require "check_user_session.php";

?>

<!DOCTYPE html>
<html lang="en">

	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Insert Post</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	</head>

	<body>
		
		<div class="container">

<?php


if (isset($_POST['insert'])) {
			$errors = [];
			$Title = '';
			if (isset($_POST['title']) && empty($_POST['title'])) {

				$errors['titleerror'] = "you should enter title";
			} else {
				$Title = $_POST['title'];
			}
             $Title=$_POST['title'];
			 $Content=$_POST['content'];
			if (count($errors) <= 0) {
				$pdo = new pdo("mysql:host=localhost;dbname=blogdb", "root", "");
			  $pdo->query("insert into posts(title,content)
		values('$Title','$Content')");
	
			}
			header("Location:index.php");
}

?>

			<form   method ="post"  action="<?php echo $_SERVER['PHP_SELF'];?>"  "class="m-auto" style="max-width:600px" >
				<h3 class="my-4">Insert Post</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Post Title</label>
					<div class="col-md-7"><input type="text"  class="form-control form-control-lg" id="title2" name="title" placeholder="Enter Post Title">
				
					<span style="color:red"> <?php if(isset ( $errors['titleerror'])) {echo " please enter the  title value " ;}     ?></span></div>
				</div>
                
				<hr class="bg-transparent border-0 py-1" />
				
                <hr class="my-4" />
				<div class="form-group mb-3 row"><label for="featured" class="col-md-5 col-form-label">Content</label>
					<div class="col-md-7"><textarea   class="form-control form-control-lg" id="content4" name="content" required placeholder="Enter Content"></textarea></div>
				</div>
              <div class="col-md-7">
			  <button class="btn btn-primary btn-lg" name="insert"  type="submit">Insert</button></div>
               </div>
			   
                
			</form>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

	</body>

</html>

