<?php
 

 if(isset($_POST['CatName'])&&
    isset($_POST['CatType'])){

    include "db_conn.php";

    $getCatName = $_POST['CatName'];
    $getCatType = $_POST['CatType'];

    $data = "CatName=".$getCatName."CatType=".$getCatType;

    $sql = "SELECT * FROM categories WHERE category_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$getCatName]);

    $CatExist = $stmt->rowCount();

    if(empty($getCatName)){
           $em = "Fill up Category Name";
           header("Location: Categories.php?error=$em&$data");
           exit;
    }else if(empty($getCatType)){
           $em = "Fill up Category Type";
           header("Location: Categories.php?error=$em&$data");
           exit;
    }else if($CatExist > 0){
        $em = "Category already exist";
        header("Location: Categories.php?error=$em&$data");
        exit;
    }else{
            $sql = "INSERT INTO categories(category_name, category_type)
                    VALUES(?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$getCatName,$getCatType]);
            
            header("Location: Categories.php?success=Category Added");
            exit;
    }
 }else{
    header("Location: Categories.php?error=error");
 }

?>