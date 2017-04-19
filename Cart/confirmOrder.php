<?php
    include ("../Config/productConfig.php");
    $orderName=$_POST['orderName'];
    $orderEmail=$_POST['orderEmail'];
    $orderPhone=$_POST['orderPhone'];



    $product=new Product();
    $order=$product->order($orderName,$orderEmail,$orderPhone);

