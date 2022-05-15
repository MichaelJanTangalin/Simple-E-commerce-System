<?php
include "db_conn.php";

if(isset($_POST['addProduct'])){
	$getProduct = $_POST['ProdName'];
	$getCatID = $_POST['category_ID'];
	$getProdPrice = $_POST['prodPrice'];
	$getProdDesc = $_POST['prodDesc'];
	$getProdImg = $_FILES['upload_image']['name'];

	$getProdImg_tmp_name = $_FILES['upload_image']['tmp_name'];

	$getProdImg_Folder = 'uploaded_img/'.$getProdImg;


	$data = "ProdName=".$getProduct."CatType=".$getCatID."category_ID=".$getCatID."prodPrice=".$getProdPrice."prodDesc=".$getProdDesc."upload_image=".$getProdImg;

    

    if(empty($getProduct)){
    	$em = "Fill up Product Name";
        header("Location: Product.php?error=$em&$data");
        exit;
    }else if(empty($getCatID)){
    	$em = "Choose a Category";
        header("Location: Product.php?error=$em&$data");
        exit;
    }else if(empty($getProdPrice)){
    	$em = "Fill up the Price";
        header("Location: Product.php?error=$em&$data");
        exit;
    }else if(empty($getProdDesc)){
    	$em = "Fill up the Description";
        header("Location: Product.php?error=$em&$data");
        exit;
    }else if(empty($getProdImg)){
    	$em = "Insert a file";
        header("Location: Product.php?error=$em&$data");
        exit;
    }else{
    	$sql = "INSERT INTO products (product_name, category_ID, product_price, productDesc, product_image)
    			VALUES (?, ?, ?, ?, ?)";
	    $stmt = $conn->prepare($sql);
	    $stmt->execute([$getProduct, $getCatID, $getProdPrice, $getProdDesc, $getProdImg]);

	    if($stmt){
        	move_uploaded_file($getProdImg_tmp_name, $getProdImg_Folder);
        }

	    header("Location: Product.php?success=Product Added");
        exit;

        
    }


} else{
    header("Location: Product.php?error=error");
 }


?>