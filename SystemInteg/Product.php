<?php

	session_start();
	if(isset($_SESSION['User_ID']) && isset($_SESSION['fullname'])){

?>



<!DOCTYPE html>

<html>
   <head>
   	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
   	<link rel="icon" type = "image/png" href="images/logo.png">

   	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<title>Dashboard Products</title>
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


       <!----------------------------------------------- CONTENTS ----------------------------------------------->
        <br>

        
			<!-- Button trigger modal -->
			<div class="px-5">
				<table class="table table-bordered table-xxl table-striped">
					<h5>PRODUCT LIST</h5>
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
        	<td>
			<button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
			 <i class="fa fa-plus"></i> New
			</button>

			


			<!-- ADD PRODUCT Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 >Add New Product</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>

			      <form
					  action="db_product.php" 
					  method="post" 
					  enctype="multipart/form-data">

			      <div class="modal-body">

			      	
			      <label class="form-label">Product Name</label>
				   	<input type="text" 
				   			 class="form-control" 
				   			 name="ProdName" 
				   			 value = "<?php (isset($_GET['ProdName']))? $_GET['ProdName']: "" ?>">

				   	<label class="form-label">Category</label>

				   	<select name = "category_ID"
				   			  class='form-select' 
				   			  value = "<?php (isset($_GET['category_ID']))? $_GET['category_ID']: "" ?>">

				   	<option>Choose Category</option>
				   	<?php
			            	include "db_conn.php";
			            	
			            	$sql = "SELECT * FROM categories";
			            	$stmt = $conn->prepare($sql);
			            	$stmt->execute();

			            	foreach($stmt as $row){
			            		echo"<option value=".$row['category_ID'].">".$row['category_name']."</option>";
			            	}
			            	
						   ?>
				      
				      </select>
				      

				    <label class="form-label">Price</label>
				   	<input type="text" 
				   			 class="form-control" 
				   			 name="prodPrice"
				   			 value = "<?php (isset($_GET['prodPrice']))? $_GET['prodPrice']: "" ?>">

				   
				   	<label class="form-label">Description</label>
					  <textarea class="form-control" 
					  				id="floatingTextarea2" 
					  				name="prodDesc" 
					  				value = "<?php (isset($_GET['prodDesc']))? $_GET['prodDesc']: "" ?>"></textarea>
					  
					  <br>
					<input type="file" 
							 class="form-control" 
							 name="upload_image" 
							 value = "<?php (isset($_GET['upload_image']))? $_GET['upload_image']: "" ?>">
			      </div>
			  	
			      <div class="modal-footer">

			        
			        
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" name = "addProduct" >Add Product</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div>
			<!-- EDIT Modal -->
					<div class="modal fade" id="editmodal" tabindex="-1" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 >Edit Product</h5>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>

					      <form
							  action="updateProd.php" 
							  method="post" 
							  enctype="multipart/form-data">



					      <div class="modal-body">


					      	<input type="hidden" name="updateID" id="updateID">
					      	 <input type="hidden" 
										  class="form-control" 
										  name="upload_image" 
										  id="updateProdPhoto"
										  value = "<?php (isset($_GET['upload_image']))? $_GET['upload_image']: "" ?>">
					      	 <label class="form-label">Product Name</label>
				   	<input type="text" 
				   			 class="form-control" 
				   			 name="ProdName" 
				   			 id="updateProdName"
				   			 value = "<?php (isset($_GET['ProdName']))? $_GET['ProdName']: "" ?>">

				   	<label class="form-label">Category</label>

				   	<select name = "category_ID" 
				   			  id="updatecategory_ID"  
				   			  class='form-select' 
				   			  value = "<?php (isset($_GET['category_ID']))? $_GET['category_ID']: "" ?>">

				   	<option>Choose Category</option>
				   	<?php
			            	include "db_conn.php";
			            	
			            	$sql = "SELECT * FROM categories";
			            	$stmt = $conn->prepare($sql);
			            	$stmt->execute();

			            	foreach($stmt as $row){
			            		echo"<option value=".$row['category_ID'].">".$row['category_name']."</option>";
			            	}
			            	
						   ?>
				      
				      </select>
				      

				    <label class="form-label">Price</label>
				   	<input type="text" 
				   			 class="form-control" 
				   			 name="prodPrice"
				   			 id="updateprodPrice"
				   			 value = "<?php (isset($_GET['prodPrice']))? $_GET['prodPrice']: "" ?>">

				   
				   	<label class="form-label">Description</label>
					  <textarea class="form-control" 
					  				type = "textarea"
					  				name="prodDesc" 
					  				id="updateprodDesc"
					  				value = "<?php (isset($_GET['prodDesc']))? $_GET['prodDesc']: "" ?>"></textarea>

					 
	
					      </div>
					  	
					      <div class="modal-footer">

					       
					        <button type="submit" name = "updateData" class="btn btn-success" >Update</button>
					      </div>
					      </form>
					    </div>
					  </div>
					</div>

					<!-- DELETE Modal -->
					<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Deleting...</h5>
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					      </div>

						       <form
										  action="deleteProd.php" 
										  method="post" >
							      <div class="modal-body">

							      	<input type="hidden" name="deleteID" id="deleteID">
							        <h4>Are you sure you want to delete this product?</h4>
							      </div>
							    
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

					        <button type="submit" 
					        				name = "deleteData" 
					        				class="btn btn-danger">
					        				<i class="fa fa-trash"></i> Delete</button>
					      </div>
					      </form>
					    </div>
					  </div>
					</div>

			<hr>

			<table class="table table-bordered table-xxl table-striped" >
				<tr class="table-primary" align="center">
                	
                		<th scope="col">P-ID</th>
                		<th scope="col">Photo</th>
	                  <th scope="col">Product Name</th>
	                  <th scope="col">Category ID</th>
	                  <th scope="col">Price</th>
	                  <th scope="col">Description</th>
	                  <th scope="col">Tools</th>
	                  
             </tr>


          <?php
			            	
			       $sql = "SELECT * FROM products ORDER BY product_ID DESC";
			       $stmt = $conn->prepare($sql);
			            	$stmt->execute();

			        foreach($stmt as $row){
	  			?>

             <tr align="center">
             	<td><?php echo $row['product_ID']?></td>
             	<td><img src="uploaded_img/<?php echo $row['product_image']; ?>" height="150">
             	</td>
             	<td><?php echo $row['product_name']?></td>


             	<td><?php echo $row['category_ID']?></td>
             	<td><?php echo number_format($row['product_price'],2)?></td>
             	<td ><?php echo $row['productDesc']?></td>

             	<!---BUTTONS--->
             	<td>
             		<button type="button" class="btn btn-success editbtn"><i class="fa fa-pen"></i> Edit</button>
		  				<button type="button" class="btn btn-danger deletebtn"><i class="fa fa-trash"></i> Delete</button>	
             	</td>
             </tr>

             <?php
	  			}

	  			?>

			</table>
			<hr>	
			</td>

   	</table>

   	<script>
			$(document).ready(function () {
				$('.editbtn').on('click', function(){

					$('#editmodal').modal('show');
					$tr = $(this).closest('tr');

			  		var data = $tr.children('td').map(function(){
			  				return $(this).text();

			  		}).get();

			  		console.log(data);

			  		$('#updateID').val(data[0]);
			  		$('#updateProdPhoto').val(data[1]);
			  		$('#updateProdName').val(data[2]);
			  		$('#updatecategory_ID').val(data[3]);
			  		$('#updateprodPrice').val(data[4]);
			  		$('#updateprodDesc').val(data[5]);



					});
				});

		 </script>

		 <script>
				$(document).ready(function () {
					$('.deletebtn').on('click', function(){

						$('#deleteModal').modal('show');		
						$tr = $(this).closest('tr');

			  			var data = $tr.children('td').map(function(){
			  				return $(this).text();

			  			}).get();

			  			console.log(data);

			  			$('#deleteID').val(data[0]);
			  			

					});
				});

  		 </script>
			
   </body>
</html>

<?php }else{
	header("Location: login.php");
	exit;
	}

	
?>