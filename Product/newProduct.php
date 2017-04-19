<?php
    include ("../Config/productConfig.php");
    $productName=$_POST['productName'];
    $productPrice=$_POST['productPrice'];
    $productDetail=$_POST['productDetail'];
    $pcatId=$_POST['cat_id'];

    $product=new Product();
    $product->newProduct($productName,$productPrice,$productDetail,$pcatId);


