<?php
include "db_conn.php";



if(isset($_POST['plus'])){


                	$productQTY = $_POST['quantity'];
                	

                	$getProductID = $_POST['productID'];

                	$sql = "UPDATE order_details SET quantity='$productQTY'
                			WHERE product_ID = '$getProductID'";
		            $stmt = $conn->prepare($sql);
		            $stmt->execute();

		            header("Location: Cart_View.php?success=Product updated");
        			exit;

                }

?>