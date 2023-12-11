<?php
include 'base.php';
?>

<div class="content-page">
     <div class="container-fluid add-form-list">
     <div class="breadcrumbs p-3">
        <a href="http://localhost/karobar/">Home</a> / <a href="page-list-suppliers.php">List Suppliers</a> / <a href="page-add-suppliers.php">Add Suppliers</a>
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
                            <h4 class="card-title">Add Supplier</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="add-supplier.php" method="POST" data-toggle="validator" novalidate="true">
                            <div class="row"> 
                                <div class="col-md-6">                      
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number *</label>
                                        <input type="phone" name="phone" class="form-control" placeholder="Enter Phone Number" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>VAT Number *</label>
                                        <input type="number" name="vat" class="form-control" placeholder="Enter GST Number" >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>City *</label>
                                        <input type="text" name="city" class="form-control" placeholder="Enter City" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> 
                               
                            </div>                            
                            <button type="submit" class="btn btn-primary mr-2 disabled">Add Supplier</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
      </div>