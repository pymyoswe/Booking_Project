<?php
session_start();
$ses=$_SESSION['cart'];
$total=0;
foreach ($ses as $key=>$val){
    $total+=$val;

}

echo "$total Items in your cart.";
