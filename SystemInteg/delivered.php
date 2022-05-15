<?php
include "db_conn.php";

	if(isset($_POST['deliver'])){

       $getTransID = $_POST['transID'];
       $getUserID = $_POST['UserID'];
       $getStatus = $_POST['Status'];
       $getDeliveryCode = $_POST['DeliveryCode'];

       $sql = "UPDATE dispatch SET Status ='Delivered' WHERE User_ID = '$getUserID' AND Delivery_Code = '$getDeliveryCode'";
       $stmt = $conn->prepare($sql);
       $stmt->execute();

       $sql = "UPDATE payment SET Status ='Delivered' WHERE User_ID = '$getUserID' AND Transaction_ID = '$getTransID'";
       $stmt = $conn->prepare($sql);
       $stmt->execute();


	   header("Location: adminHome.php?success=Order Has been delivered");
       exit;
    }else{
    	 header("Location: adminHome.php?error=error");
    }

                
?>