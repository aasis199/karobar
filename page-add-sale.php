<?php
include 'base.php';
?>
<!-- <script src="custom/js/order.js"></script> -->

<div class="content-page">


    <div class="container-fluid add-form-list">
        <div class="breadcrumbs">
            <a href="http://localhost/karobar/">Home</a> / <a href="page-list-sale.php">List Sales</a> / <a
                href="page-add-sale.php">Add Sales</a>
        </div>
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
                <div class="card m-3">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Sale</h4>
                        </div>
                    </div>
                    <div class="container content-invoice">
                        <form action="add_sales.php" method="POST" data-toggle="validator" novalidate="true"
                            id="invoice-form" class="invoice-form" role="form">
                            <?php
                                echo'
                            <div class="row mt-5">
                                <div class="col-md-3">';
                                    echo '
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <div class="form-group float-right">
                                        <label>Invoice No:</label>';
                                        $sql = "SELECT * FROM sales ORDER BY id DESC LIMIT 1";
                                        $result = $connect->query($sql);
                
                                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                            $new = $row['id'] +1;
                                            echo '<input type="id" class="form-control" value='.$new.' editable="False" placeholder="">';
                                        };

                                  echo '</div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Customer</label>
                                        <div class="dropdown bootstrap-select form-control">
                                            <select id="c_name" type="text" name="name" class="selectpicker form-control" data-style="py-0" required>
                                            <option value="" name="-">SELECT CUSTOMER</option>';
                                        $sql = "SELECT * from customers";
                                        $result = $connect->query($sql);
                                        
                                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                            echo '<option type="text" id="'.$row['id'].'" value="'.$row['name'].'">'.$row['name'].'</option>';
                                        };
                                   echo' 
                                   </select>
                                   </div>
                                </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Phone</label>
                                     <input id="phone" value="" type="number" class="form-control" name="phone">
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Biller *</label>
                                        <div class="">
                                        <select name="biller"
                                                class="selectpicker form-control" data-style="py-0">
                                                <option value="Aashish">Aashish</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>

                                ';
                                ?>
                            <div class="col-12">
                                <table class="table table-bordered table-hover w-100" id="invoiceItem">
                                    <tbody id="tbody">
                                    <tr>
                                        <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                                        <th width="15%">SKU No</th>
                                        <th width="38%">Item Name</th>
                                        <th width="15%">Quantity</th>
                                        <th width="15%">Price</th>
                                        <th width="15%">Total</th>
                                    </tr>
                                    <?php
			  		                $arrayNumber = 0;
			  		                for($x = 1; $x < 4; $x++) { ?>

                                    <tr id="row<?php echo $x; ?>" class="Items <?php echo $arrayNumber; ?>">
                                        <td><input class="itemRow" type="checkbox"></td>
                                        <td id="fetch_sku">
                                            <?php
                                             $sql = "SELECT * from product WHERE qty>0";
                                             $result = $connect->query($sql); 
                                                 echo '
                                                         <div class="form-group">
                                                             <div class="mt-3">
                                                                 <select name="productCode[]" id="productCode'. $x.'"
                                            class=" form-control" data-style="py-0">
                                            <option value="">SELECT</option>';
                                            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                            echo ' <option class="form-control p-2" id="'.$row['id'].'"
                                                value="' .$row['sku'].'">'.$row['sku'].'</option>';
                                            }
                                            echo '
                                            </select>
                                                    </div>
                                                            </div>

                                                    ';
                                            ?>
                                        </td>
                                        <td><input value="" type="text" name="productName[]"
                                                id="productName<?php echo $x; ?>" class="form-control">
                                            <span id="description<?php echo $x; ?>"
                                                style="color: green; font-size: 12px;"> </span>

                                        </td>
                                        <td><input type="number" name="quantity[]" id="quantity<?php echo $x; ?>"
                                                class="form-control quantity">
                                            <span id="available_qty<?php echo $x; ?>"
                                                style="color: green; font-size: 12px;"></span>
                                        </td>
                                        <td>
                                            
                                        <input type="number" id="price<?php echo $x; ?>" name="price[]" value="" 
                                                 class="form-control price"></td>
                                        <td><input type="number" value="" name="total[]" id="total<?php echo $x; ?>"
                                                class="form-control total"></td>
                                        <td>

                                            <button class="btn btn-default removeProductRowBtn" type="button"
                                                id="removeProductRowBtn"
                                                onclick="removeProductRow(<?php echo $x; ?>)"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                        <?php
		  			$arrayNumber++;
			  		} // /for
			  		?>
                                    </tr>
                </tbody>
                                </table>
                            </div>

                            <div class="col-12 mx-5">
                                <!-- <button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button> -->
                                <button class="btn btn-success" href="javascript:;" id="addRows" type="button">+ Add
                                    More</button>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                            <h6>Notes: </h6>
                            <div class="form-group">
                                <textarea class="form-control txt" rows="5" name="note" id="notes"
                                    placeholder="Your Notes"></textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn"
                                    value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-4">
                            <div class="form-group">
                                <input type="number" id="subtotal" name="subtotal" value="" class="form-control"  placeholder="Subtotal">
                            </div>

                            <div class="form-group">
                                <input type="number" id="paid_amount" name="paid_amount" value="" class="form-control"
                                    placeholder="Paid Amount">
                            </div>

                            <div class="form-group">
                                <input type="number" id="balance" name="balance" value="" class="form-control"
                                    placeholder="Balance">
                            </div>
                        </div>
                    </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="shipping" class="selectpicker form-control" data-style="py-0">
                                    <option value="-">Shipping</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="dropdown bootstrap-select form-control">
                                    <select name="payment_status" class="selectpicker form-control" data-style="py-0">
                                        <option value="-">Payment Status</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Paid">Paid</option>
                                    </select>

                                    <div class="dropdown-menu ">
                                        <div class="inner show" role="listbox" id="bs-select-4" tabindex="-1">
                                            <ul class="dropdown-menu inner show" role="presentation"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>
</div>

<script>
calculate();
$("#addRows").on("click", function() {
    $.ajax({
        type: 'POST',
        url: 'fetch_sku_add_sale.ajax.php',
        data: {
            'action': 'addDataRow'
        },
        success: function(data) {
            $('#tbody').append(data);
            calculate();
        }
    });
});


function calculate() {
    var count = $(".itemRow").length;
    console.log(count);
    for (let i = 1; i <= count; i++) {
        $('#productCode' + i).change(function() {
            console.log(i, 'changed');
            var id = $(this).find(':selected')[0].id;
            $.ajax({
                method: 'POST',
                url: 'fetch_product.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(data) {
                    $('#price' + i).val(data.price);
                    $('#productName' + i).val(data.name);
                    $('#available_qty' + i).text("In stock:" + data.qty);
                    $('#description' + i).text(data.description);


                    $('#quantity' + i).change(function() {
                        //calculating total price of each item after qty change 
                        var qty = $('#quantity' + i).val();
                        var rate = $('#price' + i).val();

                        var total = rate * qty;
                        $('#total' + i).val(total);
                        // 123
                        subAmount();
                    });
                }
            });
        });
    }
}

$('#c_name').change(function() {
    var id = $(this).find(':selected')[0].id;
    $.ajax({
        method: 'POST',
        url: 'fetch_customers.php',
        data: {
            id: id
        },
        dataType: 'json',
        success: function(data) {
            $('#phone').val(data.phone);
        }
    });
});


//     var sku = $('#fetch_sku').html();

//     $(document).on('click', '#addRows', function() {
//         console.log(sku);
//     count++;
//     var htmlRows = '';
//     htmlRows += '<tr>';
//     htmlRows += '<td><input class="itemRow" type="checkbox"></td>';
//     htmlRows += sku;
//     htmlRows += '<td><input type="text" name="productName[]" id="productName_' + count +
//         '" class="form-control" autocomplete="off"></td>';
//     htmlRows += '<td><input type="number" name="quantity[]" id="quantity_' + count +
//         '" class="form-control quantity" autocomplete="off"></td>';
//     htmlRows += '<td><input type="number" name="price[]" id="price_' + count +
//         '" class="form-control price" autocomplete="off"></td>';
//     htmlRows += '<td><input type="number" name="total[]" id="total_' + count +
//         '" class="form-control total" autocomplete="off"></td>';
//     htmlRows += '</tr>';
//     $('#invoiceItem').append(htmlRows);

// console.log(count);

// });

function removeProductRow(x) {
    if (x) {
        $("#row" + x).remove();
        subAmount();
    } else {
        alert('error! Refresh the page again');
    }
}

function subAmount() {
    var tableProductLength = $("#invoiceItem tr").length;
    var totalSubAmount = 0;
    for (x = 1; x < tableProductLength; x++) {
        var tr = $("#invoiceItem tr")[x];
        var count = $(tr).attr('id');
        count = count.substring(3);

        totalSubAmount = Number(totalSubAmount) + Number($("#total" + count).val());
    } // /for

    totalSubAmount = totalSubAmount.toFixed(0);

    // sub total
    $("#subtotal").val(totalSubAmount);
    $("#balance").val(totalSubAmount);

    $('#paid_amount').change(function() {
        var paidAmount = $('#paid_amount').val();
        $('#balance').val(totalSubAmount - paidAmount);
    });
}
</script>

<?php
include 'footer.php';
?>