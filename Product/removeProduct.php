<?php include ("../Config/productConfig.php");
$removeName=$_POST['chkRemove'];


if($removeName){

    foreach ($removeName as $id=>$val){


        $product=new Product();
        $removeProduct=$product->removeProduct($val);
        //header("location:dashboard");

    }

}else{
    //header("location:dashboard");

}

