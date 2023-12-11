<?php
    if(isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM product WHERE id= $product_id";
        $query = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($query))
        {
           
        }
    }
?>