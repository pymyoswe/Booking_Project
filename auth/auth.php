<?php
    session_start();
    if(!$_SESSION['login']){
        header("location:login");
        exit();
    }
/**
 * Created by PhpStorm.
 * User: root
 * Date: 4/8/17
 * Time: 9:23 AM
 */