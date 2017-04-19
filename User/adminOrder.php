<?php
include ("../Config/productConfig.php");
include ("../auth/auth.php");

$product=new Product();
$orderSetUp=$product->orderSet();
$total=0;
foreach ($orderSetUp as $od){
    $orderId=$od['id'];

    ?><li>
        <ul>
            <li><?php echo $od['order_name']?></li>
            <li><?php echo  $od['order_email']?></li>
            <li><?php echo  $od['order_phone']?></li>
            <li><?php echo $od['order_date']?></li>
        </ul>
    </li>
    <table class="table table-bordered table-hover">
        <thead>
            <tr><td>Name</td>
                <td>Unit Price</td>
                <td>Qty</td>
                <td>Price</td>
            </tr>

        </thead>
        <?php
    $orderP=new Product();
    $orderItem=$orderP->orderItem($orderId);

    foreach ($orderItem as $row){
        $total+=$row['item_Qty']*$row['item_Price'];
        ?>
        <tr>
            <td><?php echo $row['item_Name']?></td>
            <td><?php echo $row['item_Price']?></td>
            <td><?php echo $row['item_Qty']?></td>
            <td><?php echo $row['item_Qty']*$row['item_Price']?></td>

        </tr>
        <?php
    }


    ?>

        <tr>
            <td colspan="3">Total</td>
            <td><?php echo $total?></td>
        </tr>
    <tr>
        <td colspan="2"></td>
        <td><?php
            if($od['delever_status']=='0'){
                ?>
                <button class="btn-sm btn-block btn-danger" id="btnDeliver" did="<?php echo $od['id']?>"><span class="glyphicon glyphicon-remove-sign"></span> Not delivered</button>

                <?php
            }
            else{
                ?>
                <button class="btn-sm btn-block btn-success" id="btnDeliver" did="<?php echo $od['id']?>"><span class="glyphicon glyphicon-ok-circle"></span> Delivered</button>
                <?php
            }?>
        </td>
        <td><?php
            if($od['cash_status']=='0'){
                ?>
                <button class="btn-sm btn-block btn-danger" id="btnCash" cid="<?php echo $od['id']?>"><span class="glyphicon glyphicon-remove-sign"></span> Not cashed</button>

                <?php
            }
            else{
                ?>
                <button class="btn-sm btn-block btn-success" id="btnCash" cid="<?php echo $od['id']?>"><span class="glyphicon glyphicon-ok-circle"></span> Cashed</button>
                <?php
            }?>
        </td>


    </tr>

    </table><?php


}

