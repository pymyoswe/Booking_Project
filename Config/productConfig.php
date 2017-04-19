<?php
session_start();
 class Product{

     public function __construct()
     {
         try{

             $this->db=new PDO('mysql:host=localhost;dbname=Booking','root','root');

         }catch (PDOException $e){
             die("Connection error");
         }
     }

     public function newProduct($productName,$productPrice,$productDetail,$pcatId){

         $result=$this->db->query("INSERT INTO product(pName,pPrice,pDetail,cat_id,pCreated_date,pPhoto) VALUES('$productName','$productPrice','$productDetail','$pcatId',now(),'photo')");
         if ($result) {
             echo "<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> Success!</li>";
         }
         else{

             echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-warning-sign'></span>Failed!</li>";

         }
     }


     public function newCategory($categoryName){
         $result=$this->db->query("INSERT INTO catagory(cat_name) VALUES('$categoryName')");
         if ($result) {
             echo "<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> Success!</li>";
         }
         else{

             echo "<li class='alert alert-danger'><span class='glyphicon glyphicon-warning-sign'></span>Failed!</li>";

         }
     }


     public function showCat(){
         $result=$this->db->query("SELECT * FROM catagory");
         return $result;
     }

     public function showProduct($catId){
         if($catId){
             $result=$this->db->query("SELECT * FROM product WHERE cat_id='$catId'");
             return $result;

         }else{
             $result=$this->db->query("SELECT * FROM product");
             return $result;
         }

     }

     public function removeProduct($val){

         $this->db->query("DELETE FROM product WHERE id IN ($val)");
         header("location: /dashboard");
     }

     public function editProduct($editId){

         $q=$this->db->query("SELECT * FROM product WHERE id='$editId'");
         $result=$q->fetch(PDO::FETCH_ASSOC);
         return $result;

     }

     public function updateProduct($updateId,$updateName,$updatePrice,$updateDetail,$photoName){

         $this->db->query("UPDATE product SET pName='$updateName',pPrice='$updatePrice',pDetail='$updateDetail',pPhoto='$photoName' WHERE id='$updateId'");


     }
     public function getProductforCart($id){
         $result=$this->db->query("SELECT * FROM product WHERE id='$id'");
         return $result;
     }

     public function order($orderName,$orderEmail,$orderPhone){
         $result=$this->db->query("INSERT INTO orders (order_name,order_email,order_phone,order_date,delever_status,cash_status) VALUES ('$orderName','$orderEmail','$orderPhone',now(),0,0)");
         if($result){
             $orderId=$this->db->lastInsertId();

             foreach ($_SESSION['cart'] as $id=>$clickVal){

                 $product=new Product();
                 $cartDeatil=$product->getProductforCart($id);

                 foreach ($cartDeatil as $row){
                     $pName=$row['pName'];
                     $pPrice=$row['pPrice'];
                     $pQty=$clickVal;


                     $res=$this->db->query("INSERT INTO orderItems (item_Name,item_Qty,item_Price,order_id) VALUES ('$pName','$pQty','$pPrice','$orderId')");


                 }
             }

             if($res){
                 echo "Order success";
             }
         }
     }

     public function orderSet(){
         $result=$this->db->query("SELECT * FROM orders ORDER BY id DESC ");
         return $result;
     }

     public function orderItem($orderId){
         $result=$this->db->query("SELECT * FROM orderItems WHERE order_id='$orderId'");
         return $result;

     }

     public function deliver($did){

         $result=$this->db->query("SELECT * FROM orders WHERE id='$did'");
         $row=$result->fetch(PDO::FETCH_ASSOC);
         if($row['delever_status']=='0'){
             $deliverStatus=1;
         }else{
             $deliverStatus=0;
         }

         $deliver=$this->db->query("UPDATE orders SET delever_status='$deliverStatus' WHERE id='$did'");
         return $deliver;
     }

     public function cash($cid){

         $result=$this->db->query("SELECT * FROM orders WHERE id='$cid'");
         $row=$result->fetch(PDO::FETCH_ASSOC);
         if($row['cash_status']=='0'){
             $cash_Status=1;
         }else{
             $cash_Status=0;
         }

         $deliver=$this->db->query("UPDATE orders SET cash_status='$cash_Status' WHERE id='$cid'");
         return $deliver;
     }
 }