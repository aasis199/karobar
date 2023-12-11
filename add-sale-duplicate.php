<?php
include 'base.php';
?>
<script src="assets/js/add_sale.js"></script>
<div class="content-page">


    <div class="container-fluid add-form-list">
    <div class="breadcrumbs">
        <a href="http://localhost/karobar/">Home</a> / <a href="page-list-sale.php">List Sales</a> / <a href="page-add-sale.php">Add Sales</a>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Sale</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="add_sales.php" method="POST" data-toggle="validator" novalidate="true">
                            <?php
                                echo'
                            <div class="row">
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
                                            <select id="c_name" name="name" class="selectpicker form-control" data-style="py-0" required>
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
                                                <option >Aashish</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>

                                ';

                                // for($i=1; $i<=3; $i++){
                                $sql = "SELECT * from product";
                                $result = $connect->query($sql); 
                                    echo '<div class="col-md-6" >
                                            <div class="form-group">
                                                <div class="">
                                                    <select name="item" id="c_item" class=" selectpicker form-control" data-style="py-0" required>
                                                        <option value="">SELECT</option>';
                                                        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                                                            echo ' <option id="'.$row['id'].'" value=' .$row['name'].'>'.$row['name']. " - SKU( " .$row['sku'] .")".'</option>';
                                                        }
                                                        echo '
                                                    </select>
                                                    <span id="description" style="color: green; font-size: 12px;"> </span>
                                                </div>
                                            </div>
                                        </div>

                                <div class="col-md-1">
                                    <div class="form-group">
                                        <input id="qty" name="qty" class="form-control" placeholder="Qty" required>
                                        <span id="available_qty" style="color: green; font-size: 12px;"> </span>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input value="" id="rate" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number" id="price" name="price" class="form-control" value="">
                                    </div>
                                </div>
                                                                        
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                <button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
                                <button class="btn btn-success" id="addRows" type="button">+ Add More</button>
                            </div>';
                            echo '
                            <div class="col-md-12">
                            <hr>
                            </div>


                                <div class="col-md-3">  
                                    <div class="form-group">
                                        <input type="number" name="discount" id="discount" class="form-control" placeholder="Discount">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number" id="subtotal" name="subtotal" value="" class="form-control" >
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

                                <div class="col-md-6"></div>

                               <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="number"  id="advance" name="advance" value="" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                    <div class="dropdown bootstrap-select form-control">
                                    <select name="payment_status" class="selectpicker form-control" data-style="py-0">
                                        <option value="-">Payment Status</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Due">Due</option>
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
                                <div class="col-md-6"></div>
                                <div class="col-md-3">

                               <div class="form-group">
                                <input type="number" id="balance" name="balance" value="" class="form-control" >
                               </div>
                                </div>




                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="dropdown bootstrap-select form-control">
                                        <select name="sale_status"
                                                class="selectpicker form-control" data-style="py-0">
                                                <option>Sale Status</option>
                                                <option>Completed</option>
                                                <option>Pending</option>
                                            </select>
                                            <div class="dropdown-menu ">
                                                <div class="inner show" role="listbox" id="bs-select-3" tabindex="-1">
                                                    <ul class="dropdown-menu inner show" role="presentation"></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Add Sale</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            ';
                            ?>
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
  
 $(document).ready(function(){
     $('#c_name').change(function() {
      var id = $(this).find(':selected')[0].id;
       $.ajax({
          method:'POST',
          url:'fetch_customers.php',
          data:{id:id},
          dataType:'json',
          success:function(data)
            {
               $('#phone').val(data.phone);
 
               //$('#qty').text(data.product_qty);
            }
       });
     });

     $('#c_item').change(function() {
      var id = $(this).find(':selected')[0].id;
       $.ajax({
          method:'POST',
          url:'fetch_product.php',
          data:{id:id},
          dataType:'json',
          success:function(data) {
                    var rate = data.price;
                    $('#rate').val(rate);
                    $('#available_qty').text("In stock:"+ data.qty);
                    $('#description').text( data.description);

                        $('#qty').change(function() {
                            
                            var advanceId = $('#advance').val();
                            var qty = $('#qty').val();
                            var price = rate * qty ;
                            var total = price- advanceId

                            $('#price').val(price);
                            $('#subtotal').val(total);
                            $('#balance').val(total);
                            

                                $('#advance').change(function() {
                                    var advanceId = $('#advance').val();
                                    $('#balance').val(price - advanceId);
                                $('#discount').change(function() {
                                    var discount = $('#discount').val();
                                    $('#balance').val(price - advanceId - discount);
                                });
                                });
                                
                               
                        });
            }
       });
     });

     var count = $(".itemRow").length;
	$(document).on('click', '#addRows', function() { 
		count++;
		var htmlRows = '';
		htmlRows += '<tr>';
		htmlRows += '<td><input class="itemRow" type="checkbox"></td>';          
		htmlRows += '<td><input type="text" name="productCode[]" id="productCode_'+count+'" class="form-control" autocomplete="off"></td>';          
		htmlRows += '<td><input type="text" name="productName[]" id="productName_'+count+'" class="form-control" autocomplete="off"></td>';	
		htmlRows += '<td><input type="number" name="quantity[]" id="quantity_'+count+'" class="form-control quantity" autocomplete="off"></td>';   		
		htmlRows += '<td><input type="number" name="price[]" id="price_'+count+'" class="form-control price" autocomplete="off"></td>';		 
		htmlRows += '<td><input type="number" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off"></td>';          
		htmlRows += '</tr>';
		$('#invoiceItem').append(htmlRows);
	}); 

    });
</script>

<?php
include 'footer.php';
?>
