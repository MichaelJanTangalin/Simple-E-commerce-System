<?php
include "db_conn.php";

	if(isset($_POST['dispatch'])){

       $getTransID = $_POST['transID'];
       $getUserID = $_POST['UserID'];
       $getStatus = $_POST['Status'];

       $sql = "UPDATE payment SET Status ='Being Delivered' WHERE User_ID = '$getUserID' AND Transaction_ID = '$getTransID'";
       $stmt = $conn->prepare($sql);
       $stmt->execute();

       //INSERTION

       $sql = "INSERT INTO dispatch (Transaction_ID, User_ID, Status)
    			VALUES (?, ?, ?)";
	   $stmt = $conn->prepare($sql);
	   $stmt->execute([$getTransID, $getUserID, $getStatus]);

	   header("Location: viewOrders.php?success=Order Has been Sent off");
       exit;
    }else{
    	 header("Location: viewOrders.php?error=error");
    }

                
?>