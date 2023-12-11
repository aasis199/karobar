<?php
include 'base.php';
require_once('includes/load.php');

$lowStockSql = "SELECT * FROM product WHERE qty <= 3";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

 $c_product       = count_by_id('product');
 $c_sale          = count_by_id('sales');
 $c_user          = count_by_id('customers');
 $products_sold   = find_higest_saleing_product('10');
//  $recent_products = find_recent_product_added('5');
 $recent_sales    = recent_sales('10');
?>

<style>
.box {
    background-color: white !important;
    width: 300px;
    box-shadow: 2px 3px 4px #c9c6c6;
}
</style>

<div class="content-page">
    <div class="container-fluid">
        <div class="row justify-content-around">
            <a href="page-list-sale.php" class="box" style="color:black;">
                <div class="col-md-3 ">
                    <div class="panel panel-box clearfix">
                        <div class="panel-value pull-right">
                            <h2 class="margin-top">
                                <?php  echo $c_sale['total']; ?>
                            </h2>
                            <div class="panel-icon pull-left bg-secondary1">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                    <path
                                        d="M160 80c0-26.5 21.5-48 48-48h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H208c-26.5 0-48-21.5-48-48V80zM0 272c0-26.5 21.5-48 48-48H80c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V272zM368 96h32c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48H368c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48z" />
                                </svg>
                                <p class="text-muted">Sales</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <a href="page-list-customers.php" class="box" style="color:black;">
                <div class="col-md-3">
                    <div class="panel panel-box clearfix">
                        <div class="panel-value pull-right">
                            <h2 class="margin-top">
                                <?php  echo $c_user['total']; ?>
                            </h2>
                            <div class="panel-icon pull-left bg-secondary1">

                                <svg class="svg-icon" id="p-dash8" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>

                                <p class="text-muted">Customers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>


            <a href="page-list-product.php" class="box" style="color:black;">
                <div class="col-md-3">
                    <div class="panel panel-box clearfix">

                        <div class="panel-value pull-right">
                            <h2 class="margin-top">
                                <?php echo $countLowStock; ?>
                            </h2>
                            <div class="panel-icon pull-left bg-secondary1 w-100">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                    <path
                                        d="M384 352c-17.7 0-32 14.3-32 32s14.3 32 32 32H544c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32s-32 14.3-32 32v82.7L342.6 137.4c-12.5-12.5-32.8-12.5-45.3 0L192 242.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0L320 205.3 466.7 352H384z" />
                                </svg>
                                <p class="text-muted">LowStock</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <a href="page-list-product.php" class="box" style="color:black;">
                <div class="col-md-3">
                    <div class="panel panel-box clearfix">
                        <i class="glyphicon glyphicon-user"></i>
                    </div>
                    <div class="panel-value pull-right">
                        <h2 class="margin-top">
                            <?php  echo $c_product['total']; ?>
                        </h2>
                        <div class="panel-icon pull-left bg-secondary1">

                            <svg class="svg-icon" id="p-dash2" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            <p class="text-muted">Products</p>
                        </div>
                    </div>
                </div>
        </div>
        </a>
    </div>



    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-md-4 p-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>
                            <span class="glyphicon glyphicon-th"></span>
                            <span>Highest Selling Products</span>
                        </strong>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Total Sales</th>
                                    <th>Total Quantity</th>
                                <tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products_sold as  $product_sold): ?>
                                <tr>
                                    <td><a target="_blank"
                                            href="http://localhost/karobar/page-list-product.php"><?php echo remove_junk(first_character($product_sold['item_code'])); ?></a>
                                    </td>
                                    <td><?php echo (int)$product_sold['totalSold']; ?></td>
                                    <td><?php echo (int)$product_sold['totalQty']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-md-4 p-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>
                            <span class="glyphicon glyphicon-th"></span>
                            <span>LATEST SALES</span>
                        </strong>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Date</th>
                                    <th class="p-2">Invoice No.</th>
                                    <th>Qty</th>
                                    <th>Total Sale</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_sales as  $recent_sale): ?>

                                <tr>
                                    <td class="text-center"><?php echo count_id();?></td>
                                    <td><?php echo remove_junk($recent_sale['date']); ?></td>
                                    <td>
                                        <a href="view_order.php?id=<?php echo (int)$recent_sale['order_id']; ?>">Order: <?php echo remove_junk($recent_sale['order_id']); ?>
                                        </a>
                                    </td>
                                    <!-- <td><//?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td> -->
                                    <td><?php echo remove_junk($recent_sale['order_item_quantity']); ?></td>
                                    <td>Rs.<?php echo remove_junk($recent_sale['order_item_final_amount']); ?></td>

                                </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



</div>
</div>
</div>