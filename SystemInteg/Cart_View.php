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


       <?php
       	
       	
       ?>

       <br>
       <div class="px-5">
       	
      <div class="container-fluid">

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
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>

                <?php
                $UserID = $_SESSION['User_ID'];
               

  
                   $sql = "SELECT * FROM products 
                   		   LEFT JOIN order_details 
                   		   ON products.product_ID = order_details.product_ID
                   		   WHERE User_ID = '$UserID'";
			       $stmt = $conn->prepare($sql);
			            	$stmt->execute();

			    
			        foreach($stmt as $row){


			        	
			            	$productID = $row['product_ID'];

                        echo "

                        <form action=\"removeCart.php\" method=\"post\" enctype=\"multipart/form-data\">
                        <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=\"uploaded_img/".$row['product_image']."\" id=\"productimg\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">

                            	<input type=\"hidden\" value=\"$productID\" name=\"productID\">

                                <h5 class=\"pt-2\"><a class = \"a\"href=\"#\">".$row['product_name']."</a></h5>
                                <small class=\"text-secondary\">".$row['productDesc']."</small>
                                <h5 class=\"pt-2\">₱ ".number_format($row['product_price']*$row['quantity'],2)."</h5>
                                <button type=\"submit\" class=\"btn btn-warning \" name=\"Save\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            </form>
                            <div class=\"col-md-3 py-5\">
                                <div>

                                   <form action=\"\" method=\"post\">
									<button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\" name=\"minus\"></i></button>
									
                                    <input type=\"text\" value=\"".$row['quantity']."\" class=\"form-control w-25 d-inline p-2\">
                                    
                                    <button type=\"submit\" class=\"btn bg-light border rounded-circle\" name=\"plus\" value = \"".$row['quantity']."\"><i class=\"fas fa-plus\" ></i></button>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <br>";

		              
                	
                }

            	if(empty($ItemInCart)){

            		echo "<h5>Cart is Empty</h5>";

            	}
              
                ?>


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

							        }

		           echo" </div>
		        </div>

		        
		        <div class=\"col-md-4 offset-md-1 border rounded mt-5 bg-white h-25\">
		        	<form action=\"Checkout.php\" method=\"post\" enctype=\"multipart/form-data\">
			            <div class=\"pt-4\">
			                <h6>PRICE DETAILS</h6>
			                <hr>
			                <div class=\"row price-details\">
			                    <div class=\"col-md-6\">
			                          
			                                <h6>Price ("."$ItemInCart"." items)</h6>
			                        <h6>Delivery Charges</h6>
			                        <hr>
			                        <h6>Amount Payable</h6>
			                    </div>
			                    <div class=\"col-md-6\">
			                        <h6>₱".number_format($total, 2)."</h6>
			                        <h6 class=\"text-success\">FREE</h6>
			                        <hr>
			                        <h6>₱ ".number_format($total, 2)."</h6>
				                    </div>";

				                    if(!empty($ItemInCart)){

				                   echo" <button type=\"submit\" name=\"checkout\" class=\"btn btn-success\">Checkout</button>
				                   
				                    </form>
				                </div>
				            </div>
				        </div>";
				    }


		        ?>



		    </div>
		</div>
	</div>


  
	      
   </body>
</html>

<?php }else{
	header("Location: login.php");
	exit;
	}

	
?>