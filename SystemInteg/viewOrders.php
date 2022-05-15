<?php

include "db_conn.php";

	session_start();
	if(isset($_SESSION['User_ID']) && isset($_SESSION['fullname'])){

?>



<!DOCTYPE html>

<html>
   <head>
   	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
   	

	<style>
		.a {
			text-decoration: none;
			color: white;
		}
		.a:hover {	
			color: black;
		}

		
	</style>

   	
   		<link rel="icon" type = "image/png" href="images/logo.png">


    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<title>Dashboard</title>
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
		          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		            <b><i class="fas fa-user"></i></b>
		          </a>

		          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
		          	 <li><a class="dropdown-item" href="#"><b><?=$_SESSION['fullname']?></b></a></li>
		          	 <li><hr class="dropdown-divider"></li>
		            <li><a class="dropdown-item" href="#">Manage Users</a></li>
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
        	 	<h3>Number of Orders</h3>
        	 			
        	 		<hr>
        	 	<table class="table table-bordered table-xxl table-striped">
        	 		<tr align="center">
        	 			<th>Transaction_ID</th>
        	 			<th>User ID</th>
        	 			<th>Customer Name</th>
        	 			<th>Date</th>
        	 			<th>Status</th>
        	 			<th>Actions</th>
        	 		</tr>
        	 		<?php
        	 			$sql = "SELECT * FROM payment 
        	 						JOIN user_customer ON payment.User_ID = user_customer.User_ID
        	 						WHERE Status = 'Pending Order'";
					    $stmt = $conn->prepare($sql);
					    $stmt->execute();

					    $paymentOrder = $stmt->rowCount();
					    
					     foreach($stmt as $row){
					     

        	 		echo"
        	 			<form action=\"sendOFFdb.php\" method=\"post\">
			        	 		<tr align=\"center\">
			        	 		<input type=\"hidden\" value=\"".$row['Transaction_ID']."\" name=\"transID\">
			        	 			<td><h5>".$row['Transaction_ID']."</h5></td>
			        	 			<input type=\"hidden\" value=\"".$row['User_ID']."\" name=\"UserID\">
			        	 			<td><h5>".$row['User_ID']."</h5></td>
			        	 			<td><h5>".$row['fullname']."</h5></td>
			        	 			<td><h5>".$row['Date']."</h5></td>
			        	 			<input type=\"hidden\" value=\"".$row['Status']."\" name=\"Status\">
			        	 			<td><h5>".$row['Status']."</h5></td>
			        	 			<td><button type=\"submit\" class=\"btn btn-success btn-lg\" name=\"dispatch\">Send Off</button></td>
			        	 		</tr>
		        	 		</form>";

        	 			}

        	 			if(empty($paymentOrder)){
        	 				echo"
		        	 		<tr>
		        	 			<td colspan=\"6\" align=\"center\"><h5>No data available in table</h5></td>
		        	 		</tr>";
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