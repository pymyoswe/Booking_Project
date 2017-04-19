<?php

    include ("../Config/productConfig.php");
    $updateId=$_POST['updateId'];
    $updateName=$_POST['updateName'];
    $updatePrice=$_POST['updatePrice'];
    $updateDetail=$_POST['updateDetail'];
    $photoName=$_FILES['pPhoto']['name'];
    $photoTmp=$_FILES['pPhoto']['tmp_name'];

    move_uploaded_file($photoTmp,"../Upload/$photoName");

    $product=new Product();
    $updateProduct=$product->updateProduct($updateId,$updateName,$updatePrice,$updateDetail,$photoName);
    header("location:../dashboard");









