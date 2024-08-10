
<?php
include("db.php");
$id=$_GET['id'];
if(isset($_POST['submit'])){

    $query2="UPDATE `buyer` SET `b_name`='".$_POST['name']."',`b_password`='".$_POST['password']."',`b_email`='".$_POST['email']."',`b_mobile`='".$_POST['phone']."' WHERE `b_id` = $id";
    $result2=mysqli_query($con,$query2);
    if($result2){
        echo '<script>alert("data updated")</script>';
        header( "Refresh:0; url=./manage_buyers.php");
    }
    else{
        echo '<script>alert("data not updated")</script>';
    }
}
?>