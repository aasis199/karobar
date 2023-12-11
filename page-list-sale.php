<?php
include 'base.php';
?>
<style>
.modal {
    display: none;
    position: fixed;
    z-index: 999999;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0, 0, 0);
    background-color: rgba(0, 0, 0, 0.4);
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 100%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?php
                    if(isset($_SESSION['msg'])){
                        echo '  <div class="alert alert-info">
                        '.$_SESSION["msg"].'
                    </div>';
                            
                            unset($_SESSION['msg']);
                    }
                ?>

                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div class="d-flex p-4">
                        <h4 class="mb-3">Sale List</h4>
                        <p class="mb-0"></p>

                        <div class="px-4">
                            <span>Filter:</span>
                            <span><a href="view_pending_payment.php">By Payment Pending</a></span>
                        </div>
                    </div>


                    <div>
                        <a href="page-add-sale.php" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add
                            Sale</a>
                        <div>
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
                                        <th>Customer</th>
                                        <th>Order Id</th>
                                        <th>Subtotal</th>
                                        <th>Advance</th>
                                        <th>Balance</th>
                                        <th>Discount</th>
                                        <th>Payment</th>
                                        <th>Biller</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="ligth-body">
                                    <?php
                $sql = "SELECT * from sales ORDER BY id DESC";
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
                            <td>'.$row["date"].'</td>
                            <td>'.$row["c_name"] . " - " .$row["c_phone"] .'</td>
                      

                            <td ><a target="_blank" href="view_order.php?id='.$row["id"].'" >'.$row["id"].'</a></td>
                            <td>'.$row["subtotal"].'</td>
                            <td>'.$row["advance"].'</td>
                            <td>'.$row["balance"].'</td>
                            <td>'.$row["discount"].'</td>';
                            if($row["payment_status"] ==="Paid"){
                                echo '<td><div class="badge badge-success">'.$row["payment_status"].'</div></td>';
                            }
                            else{
                                echo '<td><div class="badge badge-warning">'.$row["payment_status"].'</div></td>';
                            }
                             echo '   
                            <td>'.$row["biller"].'</td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge badge-info mr-2" data-toggle="modal" data-target="#show-order"><i class="ri-eye-line mr-0"></i></a>
                                    <a class="badge bg-success mr-2 paymentOrderModal" onclick="recordPayment('.$row["id"].')"><i class="ri-pencil-line mr-0"></i></a>
                                    <a class="badge bg-success mr-2" type="button" onclick="printOrder('.$row["id"].')"> <i class="fa fa-print"></i> </a>
                                </div>
                            </td>
                        </tr>';
                    }
                ?>
                                </tbody>
                            </table>
                            <!-- edit order -->
                            <div class="modal fade" tabindex="-1" role="dialog" id="paymentOrderModal">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title justify-content-between">
                                                <div>Edit Payment</div>
                                            </h4>

                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>

                                        <form method="POST" action="add_payment.php">
                                            <div class="modal-body form-horizontal"
                                                style="max-height:500px; overflow:auto;">


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                                                <button type="submit" class="btn btn-primary"> Save changes</button>
                                            </div>
                                        </form>
                                        <!--/modal-body-->



                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- /edit order-->

                            <div class="modal w-100 fade" id="show-order" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="popup text-left">
                                                <h5 class="mb-3">Order Details #</h5>
                                                <hr>
                                                <div class="content create-workform bg-body">
                                                    <p>Invoice No: </p>
                                                    <p>Date Created: </p>

                                                    <p>Customer Name: </p>
                                                    <p>Contact: </p>
                                                    <p>Address: </p>
                                                    <hr>
                                                    <div class="col-lg-12 mt-4">
                                                        <div class="d-flex  justify-content-center">
                                                            <div class="btn btn-primary mr-4" data-dismiss="modal">
                                                                Cancel</div>
                                                            <div class="btn btn-outline-primary" data-dismiss="modal">
                                                                Create
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <script>
            function recordPayment(orderId) {
                if (orderId) {
                    console.log(orderId);

                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'POST',
                        data: {
                            orderId: orderId
                        },
                        success: function(response) {
                            // Add response in Modal body
                            $('.modal-body').html(response);

                            // Display Modal
                            $('#paymentOrderModal').modal('show');
                        }
                    });
                }
            }



            // print order function
            function printOrder(orderId = null) {
                if (orderId) {

                    $.ajax({
                        url: 'printOrder.php',
                        type: 'POST',
                        data: {
                            orderId: orderId
                        },
                        dataType: 'text',
                        success: function(response) {

                            var mywindow = window.open('', 'KAROBAR', 'height=400,width=600');
                            mywindow.document.write('<html><head><title>Order Invoice</title>');
                            mywindow.document.write('</head><body>');
                            mywindow.document.write(response);
                            mywindow.document.write('</body></html>');

                            mywindow.document.close(); // necessary for IE >= 10
                            mywindow.focus(); // necessary for IE >= 10
                            mywindow.resizeTo(screen.width, screen.height);
                            setTimeout(function() {
                                mywindow.print();
                                mywindow.close();
                            }, 1250);

                            //mywindow.print();
                            //mywindow.close();

                        } // /success function
                    }); // /ajax function to fetch the printable order
                } // /if orderId
            } // /print order function
            </script>