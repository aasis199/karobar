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
                            <h4 class="card-title">Add category</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="add_category.php" method="POST" data-toggle="validator" novalidate="true">
                            <div class="row">                                
                                <div class="col-md-12">                      
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Category Name" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>                                 
                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Code *</label>
                                        <input type="text" class="form-control" name="code" placeholder="Enter Code" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>                                 
                            </div>                            
                            <button type="submit" class="btn btn-primary mr-2">Add category</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
      </div>