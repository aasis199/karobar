
<?php
include 'base.php';
require_once('includes/load.php');
?>

<div class="content-page">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3 mx-3">Sales Orders</h4>
                        <p class="mb-0"></p>
                    </div>
                    <!-- <a href="page-add-order.php" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Sales Order</a> -->
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-table table mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>
                                <div class="checkbox d-inline-block">
                                    <input type="checkbox" class="checkbox-input" id="checkbox1">
                                    <label for="checkbox1" class="mb-0"></label>
                                </div>
                            </th>
                            <th>Invoice Id</th>
                            <th>Order Id</th>
                            <th>SKU</th>
                            <th>Item Name</th>
                            <th>Qty.</th>
                            <th>Rate</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        <?php

$id = intval($_GET['id']);             
$sql = "SELECT * from invoice_order_item where order_id = $id ORDER BY order_item_id DESC";
$result = $connect->query($sql);

while ($row = $result->fetch_array(MYSQLI_ASSOC)) { 
    echo '
                        <tr>
                            <td>
                                <div class="checkbox d-inline-block">
                                    <input type="checkbox" class="checkbox-input" id="checkbox2">
                                    <label for="checkbox2" class="mb-0"></label>
                                </div>
                            </td>
                            <td>'.$row["order_id"].'</td>
                            <td>'.$row["order_item_id"].'</td>
                            <td>'.$row["item_code"].'</td>
                            <td>'.$row["item_name"].'</td>
                            <td>'.$row["order_item_quantity"].'</td>
                            <td>'.$row["order_item_price"].'</td>
                            <td>'.$row["order_item_final_amount"].'</td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="#"><i class="ri-eye-line mr-0"></i></a>
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line mr-0"></i></a>
                                </div>
                            </td>
                        </tr>';
}
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
  