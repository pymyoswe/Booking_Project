<?php
    include ("header.php");
?>
<div class="container">
    <?php

    include ("navBar.php");

    ?>

    <?php include ("Config/productConfig.php");
    ?>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-home"></span> Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav">

                    <?php

                            $productCat=new Product();
                            $showCat=$productCat->showCat();

                            foreach ($showCat as $row){
                                ?>
                                <li><a href="/?cat_id=<?php echo $row['id']?>"><?php echo $row['cat_name']?></a></li>
                                <?php

                            }
                    ?>

                </ul>
                 <ul class="nav navbar-nav navbar-right">
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

        <div class="row">

            <?php

            $catID=$_GET['cat_id'];
            $product=new Product();
            $showProduct=$product->showProduct($catID);

            foreach ($showProduct as $row){
                ?>
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail clearfix">
                        <img src="../Upload/<?php echo $row['pPhoto']?>" class="img-thumbnail" alt="...">
                        <div class="caption">
                            <h3><?php echo $row['pName']?></h3>
                            <p><?php echo $row['pDetail']?></p>
                            <p>$<?php echo $row['pPrice']?></p>
                            <p><a href="#" name="btnAddCart" id="btnAddCart" idd="<?php echo $row['id']?>" class="btn btn-primary pull-right" role="button"> <span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</a></p>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>




        </div>

</div>


<?php
    include ("footer.php");
?>


