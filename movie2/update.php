<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>	

	<link rel="stylesheet" type="text/css" href="css/registration.css">
	<link rel="stylesheet" type="text/css" href="js/bootstrap.min.css">
	<style type="text/css">
		
		.MovieGenre{width: 100%;
			border: 1px solid #ccc;
			background: #FFF;
			margin: 0 0 5px;
			padding: 10px;
			font-style: normal;
			font-variant-ligatures: normal;
			font-variant-caps: normal;
			font-variant-numeric: normal;
			font-weight: 400;
			font-stretch: normal;
			font-size: 12px;
			line-height: 16px;
			font-family: Roboto, Helvetica, Arial, sans-serif;
			
		}
		body, html {
			height: 100%;
			margin: 0;
		}
		.wrapper{
			text-align: center;
		}
		.bg { 
			/* The image used */
			background-image: url("images/spiderman.jpg");

			/* Full height */
			height: 100%; 

			/* Center and scale the image nicely */
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>

<body >
	<?php include_once "header.php"; ?>
	<div class="bg">

		<div class="container">  
			<form id="contact" action="update.php" method="post" enctype="multipart/form-data">
				<h2  style="text-align: center;    font-family: cursive"><b>UPDATE Movie</b></h2>



				<input  name="movieId" placeholder="Movie ID" type="text" tabindex="1" required autofocus>
                                 <input  name="Name" placeholder="Movie Name" type="text" tabindex="1" required autofocus>

				<select class="MovieGenre" name="Genre">
					<option value="Action">Action</option>
					<option value="Adventure">Adventure</option>
					<option value="Comedy">Comedy</option>
					<option value="Crime">Crime</option>
   					<option value="Drama">Drama</option>
				        <option value="Abc">Abc</option>

                              </select>

				<input name="imdb" placeholder="imdb rating" type="text" tabindex="1" required>


				<input name="DirectorName" placeholder="Director" type="text" tabindex="1" required>

				<TEXTAREA name="Description" placeholder="description" type="textArea" tabindex="1" required></TEXTAREA>


				<input style="padding: 10px;" type="file" name="image" required autofocus>


				<input style="font-size: larger;background-color: #c2fbb8;font-family: cursive;font-weight: bold;" 
				class="MovieGenre" type="submit" name="submit"> 
				<p class="copyright"></p>
				<p></p>


			</form>
			<div class="wrapper">
				<button class="btn btn-default" onclick="document.location.href='adminpage.php'" > <span class='glyphicon glyphicon-chevron-left'> </span>BACK TO THE ADMIN PAGE</button>
			</div>

		</div>

	</div>
</body>
</html> 

<?php 
if (isset($_POST['submit'] )&& !empty($_POST['submit']))

{
	$MovieName=$_POST['MovieName'];
	$Genre=$_POST['Genre'];
	$imdb=$_POST['imdb'];
	$Director=$_POST['directorName'];

	$Description=$_POST['description'];
	if (!(empty($movieId) ||empty($MovieName) || empty($Genre) || empty($Director) || empty($Description)|| empty($imdb=$_POST['imdb'])))
	{
		echo "<script>alert(Movie UPDATED);</script>";
		$var=new AddProduct();
		$var->productAdd($conn);

		

	}
	

}
else{
	
}
?>






<?php 

class AddProduct{




	public function productAdd($conn)
	{
		$sql="UPDATE  movielist SET movieId=$movieId,Name=$Name,Genre=&Genre,Director=&Director,Description=$Description,image=$image,imdb=$imdb) ;";

		if(($stmt=$conn->prepare($sql))) {
			$stmt->bind_param("ssssss",$Name,$Genre,$Director,$Description,$image,$imdb);

		}else
		{
			var_dump($conn->error);
		}


		$Name=$_POST['Name'];
		$Genre=$_POST['Genre'];
		$Director=$_POST['Director'];
		$Description=$_POST['Description'];
		$imdb=$_POST['imdb'];
		
		$target="uploadimages/".basename($_FILES['image']['name']);
		$image=$_FILES['image']['name'];
		$image_tmp=$_FILES['image']['tmp_name'];

		if ($stmt->execute()) {



			if(move_uploaded_file($image_tmp, $target))
			{

				//echo "<script>alert('Movie Successfully UPDATED');</script>";

			}
			else{

				//echo "<script>alert('Movie failed to update');</script>";



			}
		}


		$stmt->close();
		$_SESSION['msg']="Movie Successfully UPDATED";
		header ("Location: adminpage.php" );

	}
}


?>