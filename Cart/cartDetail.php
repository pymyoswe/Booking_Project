<?php
include ("../header.php");
?>


<div class="container">
    <?php

    include ("../navBar.php");

    ?>



    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-dashboard"></span> Cart Detail

                </div>
                <div class="panel-body">
                    <div class="table-responsive">

                        <table class="table table-hover table-bordered" >
                            <thead>
                                <tr>
                                    <td>Product Name</td>
                                    <td>Unit Price</td>
                                    <td>Quantity</td>
                                    <td>Cost</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php session_start();
                            include ("../Config/productConfig.php");
                            $total=0;

                            foreach ($_SESSION['cart'] as $id=>$clickVal){

                                $product=new Product();
                                $getDetail=$product->getProductforCart($id);

                                foreach ($getDetail as $row){

                                    $total+=$row['pPrice']*$clickVal;
                                    ?>
                                    <tr>
                                        <td><?php echo $row['pName']?></td>
                                        <td><?php echo $row['pPrice']?></td>
                                        <td><?php echo $clickVal?></td>
                                        <td><?php echo $row['pPrice']*$clickVal?></td>

                                    </tr>
                                    <?php
                                }

                            }
                            ?>
                            <tr>
                                <td colspan="3">Total Price</td>
                                <td><?php echo $total?></td>

                            </tr>





                            </tbody>




                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Order Form
                </div>
                <div class="panel-body">
                    <form role="form">
                        <div id="orderInfo"></div>
                        <div class="form-group">
                            <label class="control-label" for="Name">Name</label>
                            <input type="text" name="Name" id="Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="Email">Email</label>
                            <input type="email" name="Email" id="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="Phone">Phone</label>
                            <input type="text" name="Phone" id="Phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="button" name="btnOrder" id="btnOrder" class="btn btn-block btn-lg btn-primary">Order</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>



    </div>




</div>


<?php
include ("../footer.php");
?>


