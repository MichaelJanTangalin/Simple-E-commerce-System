<?php
	include "db_conn.php";

if(isset($_POST['deleteData'])){


	$getCatName = $_POST['deleteID'];

			$sql = "DELETE FROM categories WHERE category_ID='$getCatName'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            header("Location: Categories.php?success=Category deleted successfully");
            exit;



}else{
    header("Location: Categories.php?error=error");
 }


?>