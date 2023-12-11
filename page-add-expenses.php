<?php
include 'base.php';
?>

<div class="content-page">
<div class="breadcrumbs p-3">
        <a href="http://localhost/karobar/">Home</a> / <a href="page-list-expenses.php">List Expenses</a> / <a href="page-add-expenses.php">Add Expenses</a>
        </div>


    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Record Expense</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="add_expense.php" method="post" data-toggle="validator" novalidate="true">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date *</label>
                                        <input type="date" name="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-9"></div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Category Name*</label>
                                        <div class="dropdown bootstrap-select form-control">
                                            <select id="" name="account" class="selectpicker form-control" data-style="py-0" >
                                            <option value=""></option>
                                            <option type="text" id="" value="Advertising And Marketing">Advertising And Marketing</option>
                                            <option type="text" id="" value="Cost of Goods Sold">Cost of Goods Sold</option>
                                            <option type="text" id="" value="Bad Debt">Bad Debt</option>
                                            <option type="text" id="" value="It and Internet Expenses"></option>
                                            <option type="text" id="" value="Office Supplies">Office Supplies</option>
                                            <option type="text" id="" value="Meals and Entertainment">Meals and Entertainment</option>
                                            <option type="text" id="" value="Repair and Maintainance">Repair and Maintainance</option>
                                            <option type="text" id="" value="Printing and Stationary">Printing and Stationary</option>
                                            <option type="text" id="" value="Rent">Rent</option>
                                            <option type="text" id="" value="Salaries and Wages">Salaries and Wages</option>
                                            <option type="text" id="" value="Telephone">Telephone</option>
                                            <option type="text" id="" value="Travel Expenses">Travel Expenses</option>
                                            <option type="text" id="" value="Employee Reimbursement">Employee Reimbursement </option>
                                   </select>
                                   </div>
                                </div>
                                </div>

                                <div class="col-md-9"></div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Vendor *</label>
                                        <div class="dropdown bootstrap-select form-control">
                                            <select id="c_name" name="vendor" class="selectpicker form-control"  data-style="py-0" required>
                                            <option value="" name="-">Select Vendor</option>
                                            <?php 
                                        $sql = "SELECT * from suppliers";
                                        $result = $connect->query($sql);
                                        
                                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                            echo '<option type="text" id="'.$row['id'].'" value="'.$row['name'].'">'.$row['name'].'</option>';
                                        };
                                        ?>
                                   </select>
                                   <span class="fs-5"><a href="page-add-suppliers.php">Add New Vendor</a></span>
                                   </div>
                                </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Amount #</label>
                                        <input type="number" name="amount" class="form-control" placeholder="Enter Amount"
                                            required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                               

                                <div class="col-md-6"></div>

                                

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Reference #</label>
                                        <input type="text" name=
                                        "ref" class="form-control" placeholder="Enter Reference No"
                                     >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                               
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Attach Document</label>
                                        <input type="file" class="form-control image-file" name="pic" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5 ">
                                    <div class="form-group">
                                        <label>Note *</label>
                                        <input type="text" name="note"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2 mt-5 disabled">Add Returns</button>
                            <button type="reset" class="btn mt-5 btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>