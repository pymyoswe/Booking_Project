<?php
include ("../Config/productConfig.php");
$cid=$_POST['cid'];

$product=new Product();
$cash=$product->cash($cid);