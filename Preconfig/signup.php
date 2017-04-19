<?php

    include ("../Config/config.php");

    $userName=$_POST['userName'];
    $email=$_POST['email'];
    $passWord=$_POST['passWord'];
    $confirmPassword=$_POST['confirmPassword'];

    if($userName){

        if($email){

            if($passWord){

                if($confirmPassword){

                    if($passWord==$confirmPassword){

                        $bookUser=new BookUser();
                        $regUser=$bookUser->register($userName,$email,$passWord);

                    }else{
                        echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span>Password not match!</li>";
                    }

                }else{
                    echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> Please fill confirm password!</li>";
                }


            }else{
                echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> Please fill password!</li>";
            }


        }else{
            echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> Please fill email!</li>";
        }


    }else{
        echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-alert'></span> Please fill user name!</li>";
    }





