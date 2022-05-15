

<!DOCTYPE html>

<html>
   <head>
   	
   <link rel="icon" type = "image/png" href="images/logo.png">
   	<script type="text/javascript">
   		function preventBack(){window.history.forward()};
   		setTimeout("preventBack()",0);
   		window.onunload=function(){null;}
   	</script>
   	
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style/mystyle.css">

	<style>
			footer{
   			position: absolute;

   			width: 100%;

   			/*Set fixed height of the footer*/

   			height: 50px;
   			background: #87CCFF;
   		}

	</style>

	
	<title>Login</title>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

		<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

   </head>
   <!NAV>
   <body class="LoginReg">
   	<nav class="navbar sticky-top navbar-expand-lg navbar-light px-5">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="index.php"><img class="navImg" src="images/logoMain.png"/>&nbsp&nbsp<b>Shop</b>Me</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>

		    </button>

		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		      	<li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
		        </li>

		         <li class="nav-item">
		         	 <a class="nav-link active" aria-current="page" href="#">About</a>
		         </li>

		         <li class="nav-item">
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
			      
		    </div>
		  </div>
		</nav>
		 <!NAV>
	<div class="d-flex justify-content-center align-items-center vh-100">
		<img src="images/logo.png"/>
		 <form class="shadow w-450 p-3"
			   action="db_log.php" 
    	       method="post">
			   
			
				<h4 class="display-4   fs-1"><b>Login</b></h4></br>
				<?php if(isset($_GET['error'])){ ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						<?php echo $_GET['error']; ?>
					</div>
				<?php } ?>
				
				
				<div class="mb-3">
				<label class="form-label">E-mail</label>
					<input type="text" 
						   class="form-control"
						   name="email"
						   value="<?php (isset($_GET['email']))? $_GET['email']:
								"" ?>">
				<label class="form-label">Password</label>
					<input type="password" 
						   class="form-control"
						   name="password">
						   
				
			</div>
			
			<button type="submit" class="btn btn-primary">Login</button>
		  <a href="register.php" class="link-secondary">Register</a>
		 </form>
	</div>

	 <footer class="footer mt-auto py-3">
		  <div class="container">
		    <span class="text-muted"><b>Copyright © 2022: Michael Jan Tangalin</b></span>
		  </div>
		</footer>
      
   </body>
</html>