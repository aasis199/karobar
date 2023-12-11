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
                            <h4 class="card-title">Add Purchase</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="add_purchase.php" method="POST" data-toggle="validator" novalidate="true">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="dob">Date *</label>
                                        <input type="date" name="date" class="form-control" id="dob" name="dob">
                                    </div>
                                </div>

                                <div class="col-md-9">
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Purchase No *</label>
                                        <?php
                                        $sql = "SELECT * FROM purchase ORDER BY purchase_no DESC LIMIT 1";
                                        $result = $connect->query($sql);
                
                                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                            $new = $row['purchase_no'] +1;
                                            echo '<input name="purchase_no" type="id" class="form-control" value='.$new.' editable="False" placeholder="" readonly >';
                                        };
                                        ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supplier</label>
                                        <div class="dropdown bootstrap-select form-control">
                                        <input type="name" name="supplier" class="form-control" placeholder="suppplier name" id="supplier" readonly >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SKU</label>
                                        <div class="dropdown bootstrap-select form-control">
                                            <select name="sku" id="sku" class="selectpicker form-control" data-style="py-0">
                                            <?php
                                            $sql = "SELECT * from product";
                                            $result = $connect->query($sql); 
                                            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                                echo "<option class='p-10' id=". $row['id'] ." value=" . $row['sku'] . ">" . $row['sku'] . "</option>";
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" name="qty" id="quantity" class="form-control" placeholder="Quantity">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Rate</label>
                                        <input type="number" name="rate" id="cost" value="" class="form-control" placeholder="Rate" readonly >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input type="number" name="amount" id="total" value="" class="form-control" placeholder="Amount" readonly >
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Received Status</label>
                                        <div class="dropdown bootstrap-select form-control">
                                            <select name="r_status"
                                                class="selectpicker form-control" data-style="py-0">
                                                <option value="Received">Received</option>
                                                <option value="Not received yet">Not received yet</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Payment Status</label>
                                        <div class="dropdown bootstrap-select form-control">
                                            <select name="p_status"
                                                class="selectpicker form-control" data-style="py-0">
                                                <option>Paid</option>
                                                <option>Not Paid</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 mb-5 ">
                                    <div class="form-group">
                                        <label>Note *</label>
                                        <textarea type="text" name="note"  class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2 mt-5">Add Purchase</button>
                            <button type="reset" class="btn btn-danger mt-5">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>

<script type="text/javascript">
     $('#sku').change(function() {
            console.log( 'changed');
            var id = $(this).find(':selected')[0].id;
            $.ajax({
                method: 'POST',
                url: 'fetch_product.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    $('#cost').val(data.cost);
                    $('#supplier').val(data.brand);

                    $('#quantity').change(function() {
                        //calculating total price of each item after qty change 
                        var qty = $('#quantity').val();
                        var rate = $('#cost').val();

                        var total = rate * qty;
                        $('#total').val(total);
                    });
                }
            });
        });
    </script>