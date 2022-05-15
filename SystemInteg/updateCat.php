<?php

if(isset($_POST['CatName'])&&
    isset($_POST['CatType'])){

    include "db_conn.php";

	$getcatID = $_POST['updateID'];

    $getCatName = $_POST['CatName'];
    $getCatType = $_POST['CatType'];

    $data = "CatName=".$getCatName."CatType=".$getCatType;

    if(empty($getCatName)){
           $em = "Fill up Category Name";
           header("Location: Categories.php?error=$em&$data");
           exit;
    }else if(empty($getCatType)){
           $em = "Fill up Category Type";
           header("Location: Categories.php?error=$em&$data");
           exit;
    }else{
            $sql = "UPDATE categories SET category_name ='$getCatName', category_type = '$getCatType' WHERE category_ID='$getcatID'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            header("Location: Categories.php?success=Category updated successfully");
            exit;
    }
 }else{
    header("Location: Categories.php?error=error");
 }



?>