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
			    height: 50vh;
			    background: lightblue;
			    background: radial-gradient(white 30%, lightblue 70%);
			}

			.card{
				height: 90vh;


			}

			#fa-shopping-cart{
				color: #126EDE;
			}


		.footer{
   			position: absolute;
   			
   			width: 100%;

   			/*Set fixed height of the footer*/

   			height: 50px;
   			background: #87CCFF;
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
		<title>Home</title>
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
			            		echo"<li><a class='dropdown-item' href='view_products.php?category=".$row['category_ID']."'>".$row['category_name']."</a></li>";
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
			     <div class="mr-auto"></div>
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
       <br>
      <div class="px-5">
       
       	<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
			  <div class="carousel-indicators">
			    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
			    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
			  </div>
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="images/banner.jpg" class="d-block w-100" alt="SLIDE1" width = "1559" height="410">
			    </div>
			    <div class="carousel-item">
			      <img src="images/anotherbanner.jpg" class="d-block w-100" alt="SLIDE2" width = "1559" height="410">
			    </div>
			    <div class="carousel-item">
			      <img src="images/banner0.png" class="d-block w-100" alt="SLIDE3" width = "1559" height="410">
			    </div>
			  </div>
			  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Previous</span>
			  </button>
			  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Next</span>
			  </button>
       </div>
  
        <div class="row text-left py-5">
        	<?php
       			if(isset($_POST['addCart'])){

				      				$UserID = $_SESSION['User_ID'];
						       		$Product_ID = $_POST['productID'];
									$product_quantity = 1;


									$sql = "SELECT * FROM order_details WHERE product_ID = '$Product_ID' AND User_ID = '$UserID'";
					        		$stmt = $conn->prepare($sql);
					        		$stmt->execute();

					        		$OrderExist = $stmt->rowCount();

					        		if($OrderExist > 0 ){
					        			 echo "<br><div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
					        			 <strong>Product Already in Cart</strong>
											<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
										</div>";
					        		}else{

					        			

					        			$sql = "INSERT INTO order_details(User_ID, product_ID, quantity)
												VALUES(?, ?, ?)";
										$stmt = $conn->prepare($sql);
										$stmt->execute([$UserID, $Product_ID, $product_quantity]);

										echo "<br><div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
										<strong>Item added to cart</strong>
											<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
										</div>";

										 
					        		}

						       	}
       		?>

          <h3>Newly Arrived</h3>
			
			
        <div class="container">
        	
               <div class="row text-center py-5">

        		<?php
        		

        		
        			$sql = "SELECT * FROM products ORDER BY category_ID DESC LIMIT 4";
	        		$stmt = $conn->prepare($sql);
	        		$stmt->execute();


	        		foreach($stmt as $row){
	        			$image = $row['product_image'];
	        			$productName = $row['product_name'];
	        			$productPrice = $row['product_price'];
	        			$productDesc = $row['productDesc'];
	        			$productID = $row['product_ID'];

        		echo"
        			
	        		<div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"\" method=\"post\" enctype=\"multipart/form-data\">
                
                    <div class=\"card shadow\">
                        <div>

                        	<input type=\"hidden\" value=\"$productID\" name=\"productID\">

                            <img src=\"uploaded_img/".$row['product_image']."\" name=\"productimg\" value=\"$image\" class=\"img-fluid card-img-top\" id='productimg'>
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\" name=\"productName\" value = \" $productName\"><a class = \"a\"href=\"#\">".$row['product_name']."</a></h5>
                            <h6>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"far fa-star\"></i>
                            </h6>
                            <p class=\"card-text\" name=\"product_Desc\" value = \" $productDesc\">
                                ".$row['productDesc']."
                            </p>
                            <h5>
                                <small><s class=\"text-secondary\">₱5000</s></small>
                                <span name=\"price\" value=\"$productPrice\">₱".number_format($productPrice,2)."</span>
                            </h5>
                             
                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"addCart\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
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
	   		<nav aria-label="Page navigation example">
				  <ul class="pagination justify-content-center">
				    <li class="page-item disabled">
				      <a class="page-link">Previous</a>
				    </li>
				    <li class="page-item"><a class="page-link" href="#">1</a></li>
				    <li class="page-item"><a class="page-link" href="#">2</a></li>
				    <li class="page-item"><a class="page-link" href="#">3</a></li>
				    <li class="page-item"><a class="page-link" href="#">4</a></li>
				    <li class="page-item">
				      <a class="page-link" href="#">Next</a>
				    </li>
				  </ul>
				</nav>

	   	</div>




				
	   </div>

      
      </div>

       
      <footer class="footer mt-auto py-3">
		  <div class="container">
		    <span class="text-muted"><b>Copyright © 2022: Michael Jan Tangalin</b></span>
		  </div>
		</footer>

   </body>

</html>

<?php }else{
	header("Location: login.php");
	exit;
	}

	
?>