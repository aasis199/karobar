<?php
include 'base.php';
?>

<div class="content-page">
     <div class="container-fluid add-form-list">
     <div class="breadcrumbs p-3">
        <a href="http://localhost/karobar/">Home</a> / <a href="page-list-customers.php">List Customers</a> / <a href="page-add-customers.php">Add Customers</a>
        </div>
        
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
                            <h4 class="card-title">Add Customer</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="add_customers.php" data-toggle="validator" novalidate="true" method="POST">
                            <div class="row"> 
                                <div class="col-md-6">                      
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Name" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>    
                              
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number *</label>
                                        <input type="number" class="form-control" name="phone" placeholder="Enter Phone Number" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter Email" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                </div>
                            </div>                            
                            <button type="submit" class="btn btn-primary mr-2">Add Customer</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
      </div>