<?php
include ("../auth/auth.php");
include ("../header.php");
?>

<?php include ("../Config/productConfig.php");
?>
<div class="container">
    <?php

    include ("../navBar.php");

    ?>



    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-dashboard"></span> Dashboard
                    <a href="#" class="pull-right" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus-sign"></span> New Product</a>

                </div>
                <div class="panel-body">
                    <div class="table-responsive">

                        <table class="table table-hover table-bordered" >
                            <form action="../Product/removeProduct.php" method="post">


                            <tr class="alert-success">
                                <td>Product ID</td>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Detail</td>
                                <td><button type="submit" class="btn-danger btn-sm btn-block"><span class="glyphicon glyphicon-remove-sign"></span> Remove</button> </td>
                                <td></td>
                            </tr>

                            <?php


                                    $product=new Product();
                                    $showProduct=$product->showProduct();

                                    foreach ($showProduct as $row){
                                        ?>
                                        <tr class="alert-warning">
                                            <td><img class="img-responsive" width="30px" src="../Upload/<?php echo $row['pPhoto']?>"></td>
                                            <td><?php echo  $row['pName']?></td>
                                            <td><?php echo  $row['pPrice']?></td>
                                            <td><?php echo  $row['pDetail']?></td>
                                            <td><input type="checkbox" name="chkRemove[]" id="chkRemove" value="<?php echo $row['id']?>"></td>
                                            <td><a href="dashboard?editId=<?php echo  $row['id']?>" class="btn-block btn-primary btn-sm" name="editId" id="editId"><span class="glyphicon glyphicon-edit"></span> Edit</a> </td>

                                        </tr>
                                        <?php

                                    }


                            ?>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-edit"></span> Update
                </div>
                <div class="panel-body">

                   <form role="form" action="../Product/updateProduct.php" method="post" enctype="multipart/form-data">

                        <div id="updateInfo"></div>
                       <?php

                       $editId=$_GET['editId'];
                       $product=new Product();
                       $editProduct=$product->editProduct($editId);



                      ?>



                        <div class="form-group">
                            <label for="updateName" class="control-label">Name</label>
                            <input type="text" class="form-control" name="updateName" id="updateName" value="<?php echo $editProduct['pName']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="updatePrice" class="control-label">Price</label>
                            <input type="number" class="form-control" name="updatePrice" id="updatePrice" value="<?php echo $editProduct['pPrice']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="updateDetail" class="control-label">Detail</label>
                            <textarea class="form-control" name="updateDetail" id="updateDetail"><?php echo $editProduct['pDetail']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" name="pPhoto" id="pPhoto">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="updateId" id="updateId" value="<?php echo $editProduct['id']?>">
                            <button type="submit" class="btn-lg btn-primary btn-block" name="btnUpdate" id="btnUpdate">Update</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add new product</h4>
                </div>
                <div class="modal-body">


                    <form role="form">
                        <div id="productInfo"></div>
                        <div class="form-group">
                            <label for="pCatId" class="control-label">Category ID</label>
                            <select name="cat_id" id="cat_id">
                            <?php


                                $product=new Product();
                                $viewCat=$product->showCat();

                                foreach ($viewCat as $row){
                                    ?>
                                    <option value="<?php echo $row['id']?>"><?php echo $row['cat_name']?></option>

                                    <?php
                                }
                            ?>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="productName" class="control-label">Name</label>
                            <input type="text" class="form-control" name="productName" id="productName">
                        </div>
                        <div class="form-group">
                            <label for="productPrice" class="control-label">Price</label>
                            <input type="number" class="form-control" name="productPrice" id="productPrice">
                        </div>
                        <div class="form-group">
                            <label for="productDetail" class="control-label">Detail</label>
                            <textarea class="form-control" name="productDetail" id="productDetail"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="btnAddProduct">Add</button>
                </div>
            </div>
        </div>
    </div>

</div>


<?php
include ("../footer.php");
?>


