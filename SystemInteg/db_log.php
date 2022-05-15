
<?php 

session_start();

if(isset($_POST['email']) && 
   isset($_POST['password'])){

    include "db_conn.php";

		$getEmail = $_POST['email'];
		$getPassword = $_POST['password'];
		

    $data = "email=".$getEmail;
    
    if(empty($getEmail)){
    	$em = "Please Enter your Email";
    	header("Location: login.php?error=$em&$data");
	    exit;
    }else if(empty($getPassword)){
    	$em = "Please Enter your Password";
    	header("Location: login.php?error=$em&$data");
	    exit;
    }else {

    	$sql = "SELECT * FROM user_customer WHERE email = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$getEmail]);

      if($stmt->rowCount() == 1){
          $user = $stmt->fetch();

          $userEmail =  $user['email'];
          $userPassword=  $user['password'];
          $fullname =  $user['fullname'];
          $id =  $user['User_ID'];
          if($userEmail === $getEmail){
             if(password_verify($getPassword, $userPassword)){
				        $_SESSION['User_ID'] = $id;
                $_SESSION['fullname'] = $fullname;
				 
          if($userEmail == 'admin@localhost.com'){
                header("Location: adminHome.php");
                exit;
          }else{
            header("Location: home.php");
            exit;
          }
           
             }else {
               $em = "Incorrect password";
               header("Location: login.php?error=$em&$data");
               exit;
            }

          }else {
            $em = "Incorrect Email";
            header("Location: login.php?error=$em&$data");
            exit;
         }

      }else {
         $em = "Incorrect Email or password";
         header("Location: login.php?error=$em&$data");
         exit;
      }
    }


}else {
	header("Location: login.php?error=error");
	exit;
}

    
?>