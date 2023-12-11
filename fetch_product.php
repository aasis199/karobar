
<?php 
  include("db_connect.php");
 
$id = $_POST['id'];
   $sql = "SELECT * FROM product WHERE id= $id";
   $query = mysqli_query($connect,$sql);
   while($row = mysqli_fetch_assoc($query))
   {
         $data = $row;
   }
    echo json_encode($data);
 ?>