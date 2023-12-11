<?php
include 'base.php';
?>

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Purchase List</h4>
                        <p class="mb-0"></p>
                    </div>
                    <a href="page-add-purchase.php" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add
                        Purchase</a>
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
                                <th>Date</th>
                                <th>Reference No</th>
                                <th>Supplier</th>
                                <th>SKU</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Received Status</th>
                                <th>Payment Status</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody class="ligth-body">
                            <?php
                $sql = "SELECT * from purchase";
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
                            <td>'.$row['date'].'</td>
                            <td>'.$row['purchase_no'].'</td>
                            <td>'.$row['supplier'].'</td>
                            <td>'.$row['sku'].'</td>
                            <td>'.$row['qty'].'</td>
                            <td>'.$row['amount'].'</td>


                            <td><div class="badge badge-success">'.$row['received_status'].'</div></td>
                            <td>'.$row['payment_status'].'</td>
                            <td>'.$row['note'].'</td>                            
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="#"><i class="ri-eye-line mr-0"></i></a>
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line mr-0"></i></a>
                                    <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line mr-0"></i></a>
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
    </div>
</div>