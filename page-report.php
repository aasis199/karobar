<?php
include 'base.php';
require_once('includes/load.php');

?>

<style>
.box {
    background-color: white !important;
    padding: 30px;
    box-shadow: 2px 3px 4px #c9c6c6;
}
</style>

<div class="content-page">
    <div class="container-fluid">
        <div class="col-md-6">
        <?php
                    if(isset($_SESSION['msg'])){
                        echo '  <div class="alert alert-info">
                        '.$_SESSION["msg"].'
                    </div>';
                            
                            unset($_SESSION['msg']);
                    }
                ?>
            <div class="panel">
                <div class="panel-heading">
                    <h1>Sales Report</h1>
                </div>
                <div class="panel-body">
                    <form class="clearfix" method="post" action="sale_report_process.php">
                        <div class="form-group">

                            <label class="form-label">Date Range</label>
                            <div class="input-group">
                                <input type="date" class="datepicker form-control" name="start-date" placeholder="From">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-menu-right"></i></span>
                                <input type="date" class="datepicker form-control" name="end-date" placeholder="To">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Generate Report</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="col-md-6 mt-5">
            <div class="panel">
                <div class="panel-heading">
                    <h1>Purchase Report</h1>
                </div>
                <div class="panel-body">
                    <form class="clearfix" method="post" action="inventory_report_process.php">
                        <div class="form-group">

                            <label class="form-label">Date Range</label>
                            <div class="input-group">
                                <input type="date" class="datepicker form-control" name="start-date" placeholder="From">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-menu-right"></i></span>
                                <input type="date" class="datepicker form-control" name="end-date" placeholder="To">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Generate Report</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <!-- <div class="col-md-6 mt-5">
            <div class="panel">
                <div class="panel-heading">
                    <h1>Inventory Report</h1>
                </div>
                <div class="panel-body">
                    <form class="clearfix" method="post" action="inventory_report_process.php">
                        <div class="form-group">

                            <label class="form-label">Date Range</label>
                            <div class="input-group">
                                <input type="date" class="datepicker form-control" name="start-date" placeholder="From">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-menu-right"></i></span>
                                <input type="date" class="datepicker form-control" name="end-date" placeholder="To">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Generate Report</button>
                        </div>
                    </form>
                </div>

            </div> -->
        </div>
    </div>
</div>