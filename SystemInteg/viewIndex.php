<!DOCTYPE html>

<html>
   <head>
   	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
   		<link rel="icon" type = "image/png" href="images/logo.png">

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
			    height: 50vh;
			    background: lightblue;
			    background: radial-gradient(white 30%, lightblue 70%);
			}

			.cart-items + .cart-items{
			    padding: 2% 0;
			}

			.price-details h6{
			    padding: 3% 2%;
			}

			.card{
				height: 90vh;
			}

			.footer{
   			position: absolute;
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
		          <a class="nav-link active" aria-current="page" href="index.php" >Home</a>
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
			            		echo"<li><a class='dropdown-item' href='viewIndex.php?category=".$row['category_ID']."''>".$row['category_name']."</a></li>";
			            	}
			            	
						   ?>
			            
			          </ul>
			        </li>  
		      </ul>
		    
		      	<ul class="navbar-nav nav nav-pills mb-2 mb-lg-0">
		        <li class="nav-item dropdown px-2">
		          <a class="nav-link " href="login.php" >
		            <b>Login</b>
		          </a>
 
		        </li>
		      </ul>
		      <form class="d-flex">
		        <input class="form-control mb-lg-0" type="search" placeholder="Search" aria-label="Search">
		        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
		      </form>
			      <a href="Cart_View.php" class="nav-item nav-link active">
			      	<h4 class="px-6 cart">
			      		<i class="fas fa-shopping-cart"></i>
			      		<?php
				      			$sql = "SELECT * FROM order_details WHERE User_ID = 0";
						        	$stmt = $conn->prepare($sql);
						        	$stmt->execute();

						        	$ItemInCart = $stmt->rowCount();
					        	

				      			echo "<span id=\"cart_count\" class=\"text-dark bg-light\">$ItemInCart</span>";

				      		?>
			      	</h4>
			  	 </a>
		    </div>
		  </div>
		</nav>
       <!-- CONTENTS -->

       <div class="px-5">

        <div class="row text-left py-5">

        		<?php
	        		$Catid=$_GET['category'];

	        		$sql = "SELECT * FROM categories WHERE category_ID = '$Catid'";
	        		$stmt = $conn->prepare($sql);
	        		$stmt->execute();


	        		foreach($stmt as $row){
	        			echo "<h3>".$row['category_name']."</h3>";	
	        			
	        		}
        		?>

        <div class="container h-100">

        <div class="row text-center py-5 h-100">

        		<?php
        		$sql = "SELECT * FROM products WHERE category_ID = '$Catid'";
	        		$stmt = $conn->prepare($sql);
	        		$stmt->execute();


	        		foreach($stmt as $row){
	        			$image = $row['product_image'];
	        			$productName = $row['product_name'];
	        			$productPrice = $row['product_price'];
	        			$productDesc = $row['productDesc'];

        			echo"
	        		<div class=\"col-md-3 col-sm-6 my-3 my-md-0 \">
	        		
                <form action=\"#\" method=\"post\">
                    <div class=\"card shadow \" >
                        <div>
                            <img src=\"uploaded_img/$image\" alt=\"card image\" class=\"card-img-fluid\" id=\"productimg\">
                        </div>
                        <div class=\"card-body \">
                            <h5 class=\"card-title\"><a class = \"a\"href=\"#\">".$row['product_name']."</a></h5>
                            <h6>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"far fa-star\"></i>
                            </h6>
                            <p class=\"card-text\">
                                $productDesc
                            </p>
                            <h5>
                                <small><s class=\"text-secondary\">&#8369;519</s></small>
                                <span class=\"price\">&#8369;".number_format($productPrice,2)."</span>
                            </h5>

                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='product_id' value='$productPrice'>
                        </div>
                    </div>
                </form>
                <br>
            </div>
            ";
            }


        		?>

	    			</div>
	   		</div>
	   	</div>
	   </div>
	      <hr>
			<footer class="footer mt-auto py-3">

					  <div class="container">

					    <span class="text-muted"><b>Copyright © 2022: Michael Jan Tangalin </b></span>
					  </div>
					  
					  
			</footer>
	  
   </body>
   </body>
</html>

