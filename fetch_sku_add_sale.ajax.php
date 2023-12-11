 <?php
 include 'db_connect.php';

 $sql = "SELECT * from product";
 $result = $connect->query($sql); 

 $key = 4;

    echo '

    <tr id="row'.$key.'" class="Items '.$key.'">
     <td><input class="itemRow" type="checkbox"></td>
     <td id="fetch_sku">
             <div class="form-group">
                 <div class="mt-3">
                     <select name="productCode[]" id="productCode'.$key.'" class=" form-control" data-style="py-0" required>
                         <option value="">SELECT</option>';
                         while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                             echo ' <option class="form-control p-2" id="'.$row['id'].'" value="' .$row['sku'].'">'.$row['sku'].'</option>';
                         }
                         echo '
                     </select>
                 </div>
             </div>
             </td>
             <td><input type="text" name="productName[]" id="productName'.$key.'" class="form-control" autocomplete="off">
             <span id="description'.$key.'"
             style="color: green; font-size: 12px;"> </span></td>
             <td><input type="number" name="quantity[]" id="quantity'.$key.'" class="form-control quantity" autocomplete="off">
             <span id="available_qty'.$key.'"
             style="color: green; font-size: 12px;"></span></td>
             <td><input type="number" name="price[]" id="price'.$key.'" class="form-control price" autocomplete="off" disabled="True"></td>
             <td><input type="number" name="total[]" id="total'.$key.'" class="form-control total" autocomplete="off" disabled="True"></td>
             <td><button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow'.$key.'"><i class="fa fa-trash"></i></button></td>
             </tr>
         ';    
?>