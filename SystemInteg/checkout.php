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
				height: auto;
			}

				.footer{
	   			position: absolute;
	   			bottom: auto;
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
			      
		    </div>
		  </div>
		</nav>
		
       <!-- CONTENTS -->
        <div class="px-5">
        	 <div class="row text-left py-3">

        	 	<h3>Checkout</h3>
        	 			
        	 	<hr>
        	 	<form action="sendOrder.php" method="post" enctype="multipart/form-data">
        	 	<table class="table table-bordered table-xxl table-striped">
        	 		<tr>

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
        	 		<td colspan="3">
        	 			<?php
        	 			echo "<h5> Delivery Address: <b>".$getAddress."</b></h5>";
        	 			?>
        	 		</td>
        	 	</tr>

        	 	</table>


        	 
        	 	<h3>Products Ordered</h3>
        	 			
        	 	<hr>

        	 	<table class="table table-bordered table-xxl table-striped">
        	 		<tr>
        	 			<th>
        	 				<h5>Product</h5>
        	 			</th>
        	 			

        	 			<th>
        	 				<h5>Unit Price</h5>
        	 			</th>

        	 			<th>
        	 				<h5>Quantity</h5>
        	 			</th>
        	 		</tr>

        	 		<tr>
        	 			<?php
        	 				$UserID = $_SESSION['User_ID'];
               

  
                   $sql = "SELECT * FROM products 
                   		   LEFT JOIN order_details 
                   		   ON products.product_ID = order_details.product_ID
                   		   WHERE User_ID = '$UserID'";
				       $stmt = $conn->prepare($sql);
				            	$stmt->execute();

				    
				        foreach($stmt as $row){

        	 			?>

        	 			<td width="30%" height="10%"><img src="uploaded_img/<?php echo $row['product_image']; ?>"height="50">
        	 				<b><?php echo $row['product_name']?></b>
        	 			</td>

        	 			<td><h5>&#8369; <?php echo number_format($row['product_price'],2)?></h5></td>

        	 			<td><h5><?php echo $row['quantity']?> Qty</h5></td>

        	 		</tr>

        	 		
        	 		<?php
        	 			}
        	 		?>

        	 		<tr>
        	 			<?php
        	 					 $sql = "SELECT * FROM products 
			                   		   LEFT JOIN order_details 
			                   		   ON products.product_ID = order_details.product_ID
			                   		   WHERE User_ID = '$UserID'";

						       $stmt = $conn->prepare($sql);
						            	$stmt->execute();
						       $total = 0;

						       foreach($stmt as $row){
							        	$total =  $total + $row['quantity'] * $row['product_price'];

							        echo "<input type=\"hidden\" class=\"form-control\" name=\"total\" value=\"$total\">";

							        }

        	 					?>
        	 			<td colspan="2" align="right">

        	 				<h2>
        	 					
        	 					Total Payment: &#8369;
        	 					<?php echo number_format($total, 2)?>
        	 					&nbsp &nbsp 
        	 					
        	 				</h2> 

        	 			</td>
        	 			
        	 			<td align="center">
        	 				<div class="d-grid gap-2">
        	 				<button type="submit" class="btn btn-success btn-lg" name="addOrder" v>Place Order</button>
        	 			</form>
        	 			</div>
        	 			</td>
        	 		</tr>

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