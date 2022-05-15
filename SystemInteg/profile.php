<?php
	
	session_start();
	if(isset($_SESSION['User_ID']) && isset($_SESSION['fullname'])){

?>


<!DOCTYPE html>

<html>
   <head>
   		<link rel="icon" type = "image/png" href="images/logo.png">
   	<link rel="stylesheet" type="text/css" href="style/mystyle.css">

   	<style>
   		.fa-star,
			.fa-star-half{
			    color: #E1BE0F;
			    padding: 3% 0;
			}

			.price-details h6{
			    padding: 3% 2%;
			}

			#productimg{
			    max-width: 100%;
			    height: 25vh;
			    background: lightblue;
			    background: radial-gradient(white 30%, lightblue 70%);
			}

			.card{
				height: 90vh;
			}

				.footer{
	   			position: absolute;
	   			bottom: 0;
	   			width: 100%;

	   			/*Set fixed height of the footer*/

	   			height: 50px;
	   			background: #87CCFF;
   			}

   			#fa-shopping-cart{
				color: #126EDE;
			}

			#cart_count{
					    text-align: center;
					    padding: 0 0.9rem 0.1rem 0.9rem;
					    border-radius: 3rem;
			}

			.shopping-cart{
			    padding: 3% 0;
			}

			.price-details h6{
			    padding: 3% 2%;
			}

			.a:link {
				text-decoration: none;
				 

			}

			.a:hover {	
				color: black;
			}



   	</style>
   	
   	
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<title>ShopMe</title>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

		<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

   </head>
   <body>
   	
		<nav class="navbar sticky-top navbar-expand-lg navbar-light px-5">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="home.php"><img class="navImg" src="images/logoMain.png"/>&nbsp&nbsp<b>Shop</b>Me</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>

		    </button>

		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="home.php" >Home</a>
		        </li>

		         <li class="nav-item active">
		         	 <a class="nav-link active" aria-current="page" href="#">About</a>
		         </li>

		         <li class="nav-item active">
		         	 <a class="nav-link active" aria-current="page" href="#">Contact</a>
		         </li>

					 <li class="nav-item dropdown">
			          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			            All Categories
			          </a>
			          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
			            <?php
			            	include "db_conn.php";
			            	
			            	$sql = "SELECT * FROM categories";
			            	$stmt = $conn->prepare($sql);
			            	$stmt->execute();

			            	foreach($stmt as $row){
			            		echo"<li><a class='dropdown-item' href='view_products.php?category=".$row['category_ID']."''>".$row['category_name']."</a></li>";
			            	}
			            	
						   ?>
			            
			          </ul>
			        </li>  
		      </ul>
		    
		      	<ul class="navbar-nav nav nav-pills mb-2 mb-lg-0">
		        <li class="nav-item dropdown px-2">
		          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		          	<b><i class="fas fa-user"></i></b> 
		          </a>

		          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
		            <li><a class="dropdown-item" href="profile.php"><b><?=$_SESSION['fullname']?></b></a></li>
				        <li><hr class="dropdown-divider"></li>
				        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
		          </ul>
		        </li>
		      </ul>
		      <form class="d-flex">
		        <input class="form-control mb-lg-0" type="search" placeholder="Search" aria-label="Search">
		        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
		      </form>
			      <div class="navbar-nav">
				      <a href="Cart_View.php" class="nav-item nav-link active">
				      	<h4 class="px-6 cart">
				      		<i class="fas fa-shopping-cart" id="fa-shopping-cart"></i>

				      		<?php
				      		$UserID = $_SESSION['User_ID'];
						       	

				      			$sql = "SELECT * FROM order_details WHERE User_ID = '$UserID'";
					        	$stmt = $conn->prepare($sql);
					        	$stmt->execute();

					        	$ItemInCart = $stmt->rowCount();
					        	

				      			echo "<span id=\"cart_count\" class=\"text-dark bg-light\">$ItemInCart</span>";

				      		?>
				      	</h4>
				  	 </a>
				</div>
		    </div>
		  </div>
		</nav>
       <!-- CONTENTS -->

       <div class="px-5">
        	 <div class="row text-left py-3">
        	 	<table class="table table-bordered table-xxl table-striped">
        	 		<h3>Profile</h3>
        	 			
        	 		<hr>


        	 		<tr>
        	 		<td rowspan="2" align="center">
        	 			<b><i class="fas fa-user fa-10x"></i></b> 
        	 		</td>

        	 		<td>

        	 			<?php
        	 			$getCustomerUser = $_SESSION['fullname'];
        	 			  $sql = "SELECT * FROM user_customer WHERE fullname = '$getCustomerUser'";

						       $stmt = $conn->prepare($sql);
						            	$stmt->execute();
						       $getCustomerUser = $_SESSION['fullname'];

						       foreach($stmt as $row){
						       	
						       	$getEmail = $row['email'];
						       	$getContact = $row['contact'];
						       	$getAddress = $row['address'];

							    }


        	 				echo "<h5> Name: <b>".$getCustomerUser."</b></h5>";

        	 			?>
        	 			 
        	 		</td>
        	 		<td>
        	 			<?php

        	 			echo "<h5> Email: <b>".$getEmail."</b></h5>";


        	 			?>

        	 		</td>

        	 		<td>
        	 			<?php
        	 			echo "<h5> Contact: <b>".$getContact."</b></h5>";
        	 			?>
        	 		</td>
        	 	</tr>

        	 	<tr>
        	 		<td colspan="2">
        	 			<?php
        	 			echo "<h5> Delivery Address: <b>".$getAddress."</b></h5>";
        	 			?>
        	 		</td>
        	 		<td>
        	 			<div class="d-grid gap-2">
        	 				<button type="submit" class="btn btn-success btn-lg" name="addCart">Edit</button>
        	 			</div>
        	 		</td>
        	 	</tr>

        	 	</table>
        	 	<?php if(isset($_GET['error'])){ ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?php echo $_GET['error']; ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					<?php } ?>

					<?php if(isset($_GET['success'])){ ?>
								<div class="alert alert-success alert-dismissible fade show" role="alert">
								  <?php echo $_GET['success']; ?>
								  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
					<?php } ?>

        	 	<h3>My Purchases</h3>
        	 			
        	 	<hr>
        	 	<table class="table table-bordered table-xxl table-striped">
        	 		<tr>
        	 			<th><h5>Date</h5></th>
        	 			<th><h5>Transaction #</h5></th>
        	 			<th><h5>Total Amount</h5></th>
        	 			<th><h5>Status</h5></th>
        	 			<?php echo"<th><h5>Actions</h5></th>"?>
        	 		</tr>

        	 		<tr>
        	 			
        	 		</tr>

        	 		<?php 
        	 			$UserID = $_SESSION['User_ID'];
        	 			$sql = "SELECT * FROM payment WHERE User_ID = '$UserID'";
					    $stmt = $conn->prepare($sql);
					    $stmt->execute();

					    $totalSales = $stmt->rowCount();

					if(empty($totalSales)){
						echo"
		        	 		<tr>
		        	 			<td colspan=\"5\" align=\"center\"><h5>You haven't purchased anything yet.</h5></td>
		        	 		</tr>";
					}else{
						
        	 			$sql = "SELECT * FROM payment WHERE User_ID = '$UserID'";
					    $stmt = $conn->prepare($sql);
					    $stmt->execute();

					    $getTotalBills = 0;

					    foreach($stmt as $row){
								$getTransNum = $row['Transaction_ID'];
						      $getTotalBills = $row['Total_Bills'];
						      $getStatus = $row['Status'];
						      $getDate = $row['Date'];
						 

						echo "
						<form action=\"orderConfirmed.php\" method=\"post\">
							<tr>
							<input type=\"hidden\" value=\"".$row['User_ID']."\" name=\"UserID\">
								<td><h5>$getDate</h5></td>
								<input type=\"hidden\" value=\"".$row['Transaction_ID']."\" name=\"transID\">
								<td><h5>$getTransNum</h5></td>
								<td><h5>&#8369; ".number_format($getTotalBills,2)."</h5></td>
								<td>
								<input type=\"hidden\" value=\"".$row['Status']."\" name=\"Status\">
									<div class=\"d-grid gap-2\">
			        	 				<h5>$getStatus</h5>
			        	 			</div>
								</td>
								
							
							

						";
							if($getStatus=="Pending Order"){
								echo"

									<td>
										<div class=\"d-grid gap-2\">
						        	 		<button type=\"submit\" class=\"btn btn-danger btn-lg\" name=\"cancelOrder\">Cancel Order</button>
						        	 	</div>
					      		</td>
				      		</tr>
				      		</form>
				      		";
		      			}else if($getStatus=="Being Delivered"){
		      				echo "
		      					<td>
										<div class=\"d-grid gap-2\">
						        	 		<button type=\"submit\" class=\"btn btn-success disabled btn-lg\">Order Received</button>
						        	 	</div>
					      		</td>
				      		</tr>
		      				";
		      			}else{
		      				
		      				echo "

		      					<td>
		      					 
										<div class=\"d-grid gap-2\">
						        	 		<button type=\"submit\" class=\"btn btn-success btn-lg\" name=\"orderReceived\">Order Received</button>
						        	 	</div>
						        	 </form>
					      		</td>
				      		</tr>
		      				";

		      				

		      				
		      			}

						}
					}


        	 		

        	 		?>
        	 	
				
				


        	 	</table>


        	 </div>
       	</div>


       
  
	      
   </body>
</html>

<?php }else{
	header("Location: login.php");
	exit;
	}

	
?>