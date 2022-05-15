<?php
include "db_conn.php";

	if(isset($_POST['cancelOrder'])){

       $getTransID = $_POST['transID'];
       $getUserID = $_POST['UserID'];
       $getStatus = $_POST['Status'];


       $sql = "DELETE FROM payment WHERE User_ID = '$getUserID' AND Transaction_ID = '$getTransID'";
       $stmt = $conn->prepare($sql);
       $stmt->execute();


	   header("Location: profile.php?success=Order Has been Cancelled");
       exit;
       
    }else if(isset($_POST['orderReceived'])){
        header("Location: profile.php?success=Order Received Please Rate our product");
       exit;
    }else{
    	 header("Location: profile.php?error=error");
    }

                
?>