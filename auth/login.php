<?php
    include ("../header.php");
?>

<div class="container">
    <?php

        include ("../navBar.php");

    ?>

    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <div id="loginInfo"></div>
                    <form role="form">
                        <div class="form-group">
                             <label for="loginName" class="control-label">User name</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user">
                                    </span>
                                </span>
                                <input type="text" class="form-control" name="loginName" id="loginName" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword" class="control-label" >Password</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </span>
                                <input type="password" class="form-control" name="loginPassword" id="loginPassword" required>

                            </div>
                        </div>
                       <div class="form-group">
                           <button type="button" class="btn-lg btn-primary btn-block" name="btnLogin" id="btnLogin">Login</button>
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


