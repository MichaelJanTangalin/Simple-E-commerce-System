<?php


if(isset($_POST['fullname']) &&
   isset($_POST['email']) &&
   isset($_POST['password']) &&
   isset($_POST['address']) &&
   isset($_POST['contact'])){
	   
	   
	   include "db_conn.php";
	   
	   
		$getFULLname = $_POST['fullname'];
		$getEmail = $_POST['email'];
		$getPassword = $_POST['password'];
		$getAddress = $_POST['address'];
		$getContact = $_POST['contact'];
		
		
		$data = "fullname=".$getFULLname."&email=".$getEmail;
		
		
    	$sql = "SELECT * FROM user_customer WHERE email = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$getEmail]);

    	$AccountExist = $stmt->rowCount();
		
		if(empty($getFULLname)){
		   $em = "Full name is Required!";
		   header("Location: register.php?error=$em&$data");
		   exit;
		}else if(empty($getEmail)){
		   $em = "Email is Required!";
		   header("Location: register.php?error=$em&$data");
		   exit;
	   }else if(empty($getPassword)){
		   $em = "Password is Required!";
		   header("Location: register.php?error=$em&$data");
		   exit;
	   }else if(empty($getAddress)){
		   $em = "Address is Required!";
		   header("Location: register.php?error=$em&$data");
		   exit;
	   }else if(empty($getContact)){
		   $em = "Contact is Required!";
		   header("Location: register.php?error=$em&$data");
		   exit;
	   }else if($AccountExist > 0){
	   	$em = "Account already exist!";
		   header("Location: register.php?error=$em&$data");
		   exit;
	   }else{
		   //hashing the password
		   
		   $getPassword = password_hash($getPassword, PASSWORD_DEFAULT);
		   
		   $sql = "INSERT INTO user_customer(fullname, email, password, address, contact)
				   VALUES(?, ?, ?, ?, ?)";
			$stmt = $conn->prepare($sql);
			$stmt->execute([$getFULLname, 
								 $getEmail, 
								 $getPassword, 
								 $getAddress, 
								 $getContact]);

			$userInfo = "INSERT INTO account_history (User_ID)
							 SELECT User_ID 
							 FROM user_customer";
			
			$stmt = $conn->prepare($userInfo);
			$stmt->execute();

			header("Location: register.php?success=Account Registed Succesfully.");
			exit;
	
	   }
	   
		
   
   }else {
	   header("Location: register.php?error=error");
   }
   
?>