<?php
include "db_conn.php";

				 if(isset($_POST['remove']) || isset($_POST['Save'])){

                	$getProductID = $_POST['productID'];

                	$sql = "DELETE FROM order_details WHERE product_ID='$getProductID'";
		            $stmt = $conn->prepare($sql);
		            $stmt->execute();

		            header("Location: Cart_View.php?success=Product removed");
        			exit;

                }else{
                	header("Location: Cart_View.php?error=error");
        			exit;
                }

                
?>