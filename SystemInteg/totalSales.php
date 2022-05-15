<?php

include "db_conn.php";

	session_start();
	if(isset($_SESSION['User_ID']) && isset($_SESSION['fullname'])){




?>



<!DOCTYPE html>

<html>
   <head>
   		<link rel="icon" type = "image/png" href="images/logo.png">
   	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
   	
   	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


		<title>Dashboard Total Sales</title>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

		<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

   </head>
   <body>
   	
		<nav class="navbar sticky-top navbar-expand-lg navbar-light px-5">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="adminHome.php"><img class="navImg" src="images/logoMain.png"/>&nbsp&nbsp<b>Shop</b>Me</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>

		    </button>

		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="adminHome.php" >Dashboard</a>
		        </li>


		         <li class="nav-item">
		          	<a class="nav-link active" aria-current="page" href="Product.php" >View Products</a>
		        </li>

		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="Categories.php" >View Categories</a>
		        </li>

		       
		      </ul>
		    
		      	<ul class="navbar-nav nav nav-pills mb-2 mb-lg-0">
		        <li class="nav-item dropdown">

		          <a class="nav-link dropdown-toggle " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		           	<b><i class="fas fa-user"></i></b>
		          </a>

		          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
		          	 <li><a class="dropdown-item" href="#"><b><?=$_SESSION['fullname']?></b></a></li>
		          	 <li><hr class="dropdown-divider"></li>
		            <li><a class="dropdown-item" href="viewUsers.php">Manage Users</a></li>
				        <li><hr class="dropdown-divider"></li>
				        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
		          </ul>
		        </li>
		      </ul>

		      <form class="d-flex">
		        <input class="form-control mb-lg-0" type="search" placeholder="Search" aria-label="Search">
		        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
		      </form>
		      
			     
		    </div>
		  </div>
		</nav>
       <!-- CONTENTS -->
       <div class="px-5">
        	 <div class="row text-left py-3">
        	 	<h3>Total Sales</h3>
        	 		<hr>
        	 		<table class="table table-bordered table-xxl table-striped">
				        	 			
        	 		<?php
        	 			$sql = "SELECT * FROM dispatch  
        	 						JOIN user_customer ON dispatch.User_ID = user_customer.User_ID
        	 						LEFT JOIN payment ON dispatch.Transaction_ID = payment.Transaction_ID
        	 						WHERE dispatch.Status = 'Delivered'";
					    $stmt = $conn->prepare($sql);
					    $stmt->execute();

					     
						    	echo"<tr align=\"center\">
				        	 				<th><h5>Delivery Code</h5></th>
				        	 				<th><h5>Transaction ID</h5></th>
				        	 				<th><h5>User ID</h5></th>
				        	 				<th><h5>Customer Name</h5></th>
				        	 				<th><h5>Delivery Address</h5></th>
				        	 				<th><h5>Status</h5></th>
				        	 				<th><h5>Delivery Date</h5></th>
				        	 				<th><h5>Total Payment</h5></th>
				        	 			</tr>
				        	 		";

				        	 	$overallTotal = 0;
	
							foreach($stmt as $row){
								$totalSales = $row['Total_Bills'];
					     		$overallTotal += $totalSales;
				        	 	echo"
				        	 		<tr align=\"center\">
				        	 			<td><h5>".$row['Delivery_Code']."</h5></td>
				        	 			
				        	 			<td><h5>".$row['Transaction_ID']."</h5></td>
				        	 			<td><h5>".$row['User_ID']."</h5></td>
				        	 			<td><h5>".$row['fullname']."</h5></td>
				        	 			<td><h5>".$row['address']."</h5></td>
				        	 			<td><h5>".$row['Status']."</h5></td>
				        	 			<td><h5>".$row['Delivery_Date']."</h5></td>
				        	 			<td><h5>".number_format($row['Total_Bills'],2)."</h5></td>
				        	 		</tr>

				        	 	";

				        	 	
				        	}
				        	echo"<tr>
				        				<td colspan=\"8\" align=\"center\"><h5>OVERALL TOTAL: &#8369; ".number_format($overallTotal,2)."</h5></td>
				        			</tr>";
			        	 
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