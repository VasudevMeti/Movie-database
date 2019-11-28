<?php

if(isset($_POST["movieId"]) && isset($_POST["Name"]) && isset($_POST["Description"]) && isset($_POST["imdb"])){

$movieId=$_POST["movieId"];
$Name=$_POST["Name"];
$Description=$_POST["Description"];
$imdb=$_POST["imdb"];

 
$conn=mysqli_connect('localhost','root','','moviedb');

 if(!$conn ) {
      die('Could not connect');
   }
   $sql1=" SELECT movieId FROM movielist WHERE movieId='$movieId' ";
   $result = mysqli_query( $conn, $sql1 );
   $retval1=mysqli_fetch_assoc($result);
   if( $retval1 > 0 ){
   	echo "Customer already exist";
   	header ("Location: update.php");
   }
   else
   {
	$sql= "UPDATE movielist SET Name='$Name' WHERE movieId= '$movieId'  ";
   $retval = mysqli_query( $conn, $sql );
   
   if(! $retval) {
      die('Could not enter data');
   }
   
   header("Location: update.php");
}
mysqli_close($conn);
}
?>