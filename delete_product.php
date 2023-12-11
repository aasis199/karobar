<?php
  require_once('includes/load.php');
?>
<?php
  $product = find_by_id('product',(int)$_GET['id']);
  if(!$product){
    $session->msg("d","Missing Product id.");
    redirect('page-list-product.php');
  }
?>
<?php
  $delete_id = delete_by_id('product',(int)$product['id']);
  if($delete_id){
      $session->msg("s","Products deleted.");
      redirect('page-list-product.php');
  } else {
      $session->msg("d","Products deletion failed.");
      redirect('page-list-product.php');
  }
?>
