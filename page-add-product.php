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
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="card-title">Add Product</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="add_product.php" enctype="multipart/form-data" method="POST" novalidate="true">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input type="text" class="form-control" placeholder="Enter Name"
                                            data-errors="Please Enter Name." name="name" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SKU No. *</label>
                                        <input type="text" class="form-control" placeholder="Enter SKU"
                                            data-errors="Please Enter sku no." name="sku" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category *</label>
                                        <div class="dropdown bootstrap-select form-control">
                                            <select name="category" class="selectpicker form-control" data-style="py-0">
                                                <?php

                                                $sql = "SELECT * from category";
                                                $result = $connect->query($sql); 

                                                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                                    echo "<option name='hi' class='p-10' value=" . $row['name'] . ">" . $row['name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Brand *</label>
                                        <div class="dropdown bootstrap-select form-control">
                                            <select name="brand" class="selectpicker form-control" data-style="py-0">
                                                <?php

                                                $sql = "SELECT * from suppliers";
                                                $result = $connect->query($sql); 

                                                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                                    echo "<option name='hi' class='p-10' value=" . $row['name'] . ">" . $row['name'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Buying Price *</label>
                                        <input type="text" class="form-control" placeholder="Enter Buying Price"
                                            data-errors="Please Enter Buying Price." name="cost" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Selling Price *</label>
                                        <input type="text" class="form-control" placeholder="Enter Selling Price"
                                            data-errors="Please Enter Selling Price." name="price" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status *</label>
                                        <div class="dropdown bootstrap-select form-control"><select name="status"
                                                class="selectpicker form-control" data-style="py-0">
                                                <option>Active</option>
                                                <option>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control image-file" name="fileToUpload"
                                            id="fileToUpload">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description / Product Details</label>
                                        <textarea class="form-control" name="description" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" value="Upload Image" name="submit" class="btn btn-primary mr-2">Add
                                Product</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>