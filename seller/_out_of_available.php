<?php
include("db.php");
// session_start()
$query = mysqli_query($con,"UPDATE `product_master` SET`status`= 0 WHERE `p_id`= '".$_GET['id']."'");
if($query){
    echo '<script>window.location.href="manage_products.php"</script>';
}

?>