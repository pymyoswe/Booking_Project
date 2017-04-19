<?php
include ("../Config/productConfig.php");
$categoryName=$_POST['categoryName'];


$product=new Product();
$addnew=$product->newCategory($categoryName);


