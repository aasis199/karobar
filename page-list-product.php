<?php
include 'base.php';
require_once('includes/load.php');



?>
<style>
.zoom {
    transition: transform .2s;
    /* Animation */
}

.zoom:hover {
    transform: scale(2);
}
</style>

<div class="content-page">

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">

              
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Product List</h4>

                    </div>
                    <a href="page-add-product.php" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add
                        Product</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-tables table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>
                                    <div class="checkbox d-inline-block">
                                        <input type="checkbox" class="checkbox-input" id="checkbox1">
                                        <label for="checkbox1" class="mb-0"></label>
                                    </div>
                                </th>
                                <th>Product</th>
                                <th>SKU NO.</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Brand Name</th>
                                <th>Cost</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            <?php

                                $sql = "SELECT * from product";
                                $result = $connect->query($sql);
        
                                while ($row = $result->fetch_array(MYSQLI_ASSOC)) { //Creates a loop to loop through results

                                    echo '<tr>
                                    <td>
                                        <div class="checkbox d-inline-block">
                                            <input type="checkbox" class="checkbox-input" id="checkbox2">
                                            <label for="checkbox2" class="mb-0"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                        <div class="zoom">
                                            <img src="uploads/'.$row['image'].'" class="img-fluid rounded avatar-50 mr-3" alt="image">
                                        </div>
                                            <div>
                                                '.$row['name'].'
                                                <p class="mb-0"><small>'.$row['description'].'</small></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>'.$row['sku'].'</td>
                                    <td>'.$row['cat'].'</td>
                                    <td>'.$row['price'].'</td>
                                    <td>'.$row['brand'].'</td>
                                    <td>'.$row['cost'].'</td>
                                    <td>'.$row['qty'].'</td>
                                    <td>
                                        <div class="d-flex align-items-center list-action">
                                            <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top"
                                                title="" data-original-title="Edit" href="edit_product?id'.$row['id'].'"><i
                                                    class="ri-pencil-line mr-0"></i></a>
                                            <a href="delete_product.php?id='.$row['id'].'" class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top"
                                                title="" data-original-title="Delete"><i
                                                    class="ri-delete-bin-line mr-0"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>';
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>