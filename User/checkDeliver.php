<?php
include ("../Config/productConfig.php");
$did=$_POST['did'];

$product=new Product();
$deliver=$product->deliver($did);