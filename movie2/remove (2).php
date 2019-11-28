<?php
  $movieId;
  
if(isset($_POST["movieId"])){
$movieId=$_POST["movieId"];
$conn=mysqli_connect('localhost','root','','moviedb');
 if(!$conn ) {
      die('Could not connect');
   }
   $sql1=" DELETE FROM movielist WHERE movieId=$movieId ";
   $result = mysqli_query( $conn, $sql1 );
  if(!$result)
  {
    echo("Failed");
  }
   $retval1=mysqli_fetch_assoc($result);
   if( $retval1 < 1){
    echo "MOVIE REMOVED ";
   }
  else{
   
   
  }
mysqli_close($conn);

}

?>

<!DOCTYPE html>
<html>

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


<body>
<?php include_once "header.php"; ?>
<div>
<h2  style="text-align: center;    font-family: cursive"><b>REMOVE MOVIE</b></h2>
</div>
<div class="topnav" id="myTopnav">
  
</div>
<form method="post" action="remove.php">
 
<br>
    
  
</form>

<form method="post" action="remove.php">
<h2>ENTER THE MOVIE ID :- <input  name="movieId" placeholder="Movie Id" type="text" tabindex="1" required autofocus><input type="submit" value="submit"></h2>
</form>
<div class="wrapper">
				<button class="btn btn-default" onclick="document.location.href='adminpage.php'" > <span class='glyphicon glyphicon-chevron-left'> </span>BACK TO THE ADMIN PAGE</button>
			</div>
<table>
  <tr>
   
  </tr>
  <tr>
    
  </tr>

</table>

</body>
</html>