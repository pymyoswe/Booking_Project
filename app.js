/**
 * Created by root on 4/7/17.
 */
$(function () {

    showCart();
    showOrder();

    $("#btnReg").on("click",function () {
        var userName=$("#userName").val();
        var email=$("#email").val();
        var passWord=$("#passWord").val();
        var confirmPassword=$("#confirmPassword").val();

        $.ajax({
            type:"post",
            url:"Preconfig/signup.php",
            data:{userName:userName,email:email,passWord:passWord,confirmPassword:confirmPassword},
            success:function (msg) {

                $("#infoMsg").html(msg);
                if(msg==="<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> Signup success</li>"){
                    setInterval(function () {
                       window.location.replace("login");
                    },3000);
                }
                
            }

        });



    });

    $("#btnLogin").on("click",function () {

        var loginName=$("#loginName").val();
        var loginPassword=$("#loginPassword").val();

        $.ajax({

            type:"post",
            url:"Preconfig/signin.php",
            data:{loginName:loginName,loginPassword:loginPassword},
            success:function (loginInfo) {
                $("#loginInfo").html(loginInfo);

                if(loginInfo==="<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span>Success!</li>"){

                   setInterval(function () {
                       window.location.replace("dashboard");
                   },2000);

                }

            }

        });

    });

    $("#btnLogout").on("click",function () {
       $.ajax({

           type:"post",
           url:"User/logout.php",
           success:function (msg) {
               if(msg==="logout"){
                   window.location.replace("login");
               }

               
           }
       }) ;
    });

    $("#btnAddProduct").on("click",function () {

        var productName=$("#productName").val();
        var productPrice=$("#productPrice").val();
        var productDetail=$("#productDetail").val();
        var catId=$("#cat_id").val();


        $.ajax({

            type:"post",
            url:"Product/newProduct.php",
            data:{productName:productName,productPrice:productPrice,productDetail:productDetail,cat_id:catId},
            success:function (msg) {
                $("#productInfo").html(msg);

                if(msg==="<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> Success!</li>"){
                    setInterval(function () {
                        window.location.replace("dashboard");
                    },2000);

                }

            }

        });

    });

    $("#btnAddCategory").on("click",function () {

        var categoryName=$("#categoryName").val();


        $.ajax({

            type:"post",
            url:"Product/addnewCategory.php",
            data:{categoryName:categoryName},
            success:function (msg) {
                $("#categoryInfo").html(msg);

                if(msg==="<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> Success!</li>"){
                    setInterval(function () {
                        window.location.replace("category");
                    },2000);

                }

            }
        });
    });

    $("body").delegate('#btnAddCart','click',function () {
        var id=$(this).attr('idd');
       $.ajax({
          type:"post",
           url:"Cart/addToCart.php",
           data:{id:id},
           success:function () {

                showCart();
               
           }
       });
       
       

    });

    function showCart()
    {
        $.ajax({
           type:"post",
            url:"Cart/showCart.php",
            success:function (msg) {

               $("#cartShow").html(msg);

            }
        });

        
    }

    $("#btnOrder").on("click",function () {

        var oName=$("#Name").val();
        var oEmail=$("#Email").val();
        var oPhone=$("#Phone").val();

        $.ajax({
            type:"post",
            url:"Cart/confirmOrder.php",
            data:{orderName:oName,orderEmail:oEmail,orderPhone:oPhone},
            success:function (msg) {
                $("#orderInfo").html(msg);
                
            }
        });

    });


    function showOrder() {

        $.ajax({
           type:"post",
            url:"User/adminOrder.php",
            success:function (msg) {
                $("#orderClient").html(msg);
                console.log(msg);
            }
        });

    }

    setInterval(function () {

        showOrder();

    },5000);

    $("body").delegate('#btnDeliver','click',function () {

        var did=$(this).attr('did');

        $.ajax({
            type:"post",
            url:"User/checkDeliver.php",
            data:{did:did},
            success:function (msg) {

                showOrder();
            }
            
        });

    });

    $("body").delegate('#btnCash','click',function () {

        var cid=$(this).attr('cid');

        $.ajax({
            type:"post",
            url:"User/checkCash.php",
            data:{cid:cid},
            success:function () {

                showOrder();
            }

        });

    });











});