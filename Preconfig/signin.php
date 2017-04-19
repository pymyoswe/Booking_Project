<?php include ("../Config/config.php");

    $loginName=$_POST['loginName'];
    $loginPassword=$_POST['loginPassword'];

    if($loginName){

        if($loginPassword){


            $BookUser=new BookUser();
            $loginUser=$BookUser->login($loginName,$loginPassword);


        }else{
            echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> Please fill password!</li>";

        }
    }else{

        echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> Please fill user name!</li>";

    }
