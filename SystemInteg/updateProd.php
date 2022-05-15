<?php
if(isset($_POST['updateID'])&&
	isset($_POST['ProdName'])&&
	isset($_POST['category_ID'])&&
	isset($_POST['prodPrice'])&&
    isset($_POST['prodDesc'])){

    include "db_conn.php";

	$getprodID = $_POST['updateID'];

	$getprodName = $_POST['ProdName'];
    $getCatID = $_POST['category_ID'];
    $getProdPrice = $_POST['prodPrice'];
    $getProdDesc = $_POST['prodDesc'];

    $data = "ProdName=".$getprodName."category_ID=".$getCatID."prodPrice=".$getProdPrice."prodDesc=".$getProdDesc;

    if(empty($getprodName)){
           $em = "Fill up Product Name";
           header("Location: Product.php?error=$em&$data");
           exit;
    }else if(empty($getCatID)){
           $em = "Choose a Category";
           header("Location: Product.php?error=$em&$data");
           exit;
    }else if(empty($getProdPrice)){
    	   $em = "Fill up Product Price";
           header("Location: Product.php?error=$em&$data");
           exit;
    }else if(empty($getProdDesc)){
    	   $em = "Fill up Product Description";
           header("Location: Product.php?error=$em&$data");
           exit;
    }else{
            $sql = "UPDATE products SET product_name ='$getprodName', 
            				     category_ID = '$getCatID',
            				     product_price = '$getProdPrice', 
            				     productDesc = '$getProdDesc'
                                        
            			WHERE product_ID='$getprodID'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            header("Location: Product.php?success=Product updated successfully");
            exit;
    }
 }else{
    header("Location: Product.php?error=error");
 }

?>