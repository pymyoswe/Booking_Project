<?php
include ("../auth/auth.php");
include ("../header.php");
?>
<div class="container">
    <?php

    include ("../navBar.php");

    ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span> Category
                    <a href="#" class="pull-right" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus-sign"></span> New category</a>
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
                    <h4 class="modal-title" id="myModalLabel">Add new category</h4>
                </div>
                <div class="modal-body">

                    <form role="form">
                        <div id="categoryInfo"></div>
                        <div class="form-group">
                            <label for="categoryName" class="control-label">Name</label>
                            <input type="text" class="form-control" name="categoryName" id="categoryName">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="btnAddCategory">Add</button>
                </div>
            </div>
        </div>
    </div>

</div>


<?php
include ("../footer.php");
?>


