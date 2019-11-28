<?php 
if (!session_id()) {
	session_start();
} 
include 'db.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Ticket</title>
	<link rel="stylesheet" type="text/css" href="css/customerPanel.css">
	<link href="bootstrap/bootstrap.min.css" rel='stylesheet' type='text/css' />

	<style type="text/css">
		.boxStyle{width: 100%;
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
	</style>

</head>
<body>
	<?php include_once 'header.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12  toppad" >
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">
							<?php 
//for time slot
							//$timeSlot=$conn->query("select time from timeslot");	

//movie details
							$movieId=$_POST['movieId'];	
							$_SESSION['movieId']=$movieId;
							$res=$conn->query("select * from movielist where movieId=$movieId;");
							$row=$res->fetch_object();

							echo "".$row->Name;?>
						</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4 col-lg-4 " align="center">
								<img alt="User Pic" src=<?php echo '"uploadimages/'.$row->image.'"';?> class=" img-responsive"> 
							</div>
							<div class=" col-md-8 col-lg-8 "> 
								<table class="table table-user-information">
									<tbody>
										<tr>
											<td><strong>Movie Name </strong></td>
											<td><?php echo "".$row->Name;?> </td>
										</tr>
										<tr>
											<td><strong>Genre</strong></td>
											<td> <?php echo "".$row->Genre;?> </td>
										</tr>
										<tr>
											<td><strong>Director</strong></td>
											<td><?php echo "".$row->Director;?> </td>
										</tr>
										<tr>
											<tr>
												<td><strong>IMDB</strong></td>
												<td><?php echo "".$row->imdb;?> </td>
											</tr>
											<tr>
												<td><strong>Description</strong></td>
												<td><?php echo "".$row->Description;	?> </td>
											</tr>



											
													
																								



											</tbody>
										</table>

									</div>
								</div>

							</div>
						</div>
					</div>

				</div>

			</div>
		</body>

		</html>