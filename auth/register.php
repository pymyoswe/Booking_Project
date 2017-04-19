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
                <div class="panel-heading">Sign Up</div>
                <div class="panel-body">
                    <div id="infoMsg"></div>
                    <form role="form">
                        <div class="form-group">
                            <label for="userName" class="control-label">User Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span> </span>
                                <input type="text" name="userName" id="userName" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" name="email" id="email" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="passWord" class="control-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </span>
                                <input type="password" name="passWord" id="passWord" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword" class="control-label">Confirm password</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </span>
                                <input type="password" name="confirmPassword" id="confirmPassword" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-block btn-lg" id="btnReg">Signup</button>

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


