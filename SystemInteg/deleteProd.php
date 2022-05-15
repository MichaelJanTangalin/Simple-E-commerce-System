<?php
	include "db_conn.php";

if(isset($_POST['deleteData'])){


	$getProdID = $_POST['deleteID'];

			$sql = "DELETE FROM products WHERE product_ID='$getProdID'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            header("Location: Product.php?success=Product deleted successfully");
            exit;



}else{
    header("Location: Product.php?error=error");
 }


?>