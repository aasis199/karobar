<?php
include 'base.php';
?>

<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
            <?php
                    if(isset($_SESSION['msg'])){
                        echo '  <div class="alert alert-info">
                        '.$_SESSION["msg"].'
                    </div>';
                            
                            unset($_SESSION['msg']);
                    }
                ?>
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Users</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="page-list-users.html" data-toggle="validator" novalidate="true">
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input type="email" class="form-control" placeholder="Enter Email" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
</diV>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number *</label>
                                        <input type="phone" class="form-control" placeholder="Enter Phone No"
                                            required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
</div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>User Name *</label>
                                        <input type="text" class="form-control" placeholder="Enter User Name"
                                            required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
</div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" placeholder="Enter Password"
                                            required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
</div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="text" class="form-control" placeholder="Enter Confirm Password"
                                            required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status *</label>
                                        <div class="dropdown bootstrap-select form-control"><select name="type"
                                                class="selectpicker form-control" data-style="py-0">
                                                <option>Admin</option>
                                                <option>User</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <button type="submit" class="btn btn-primary mr-2 disabled">Add User</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>