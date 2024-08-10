
<?php
include("db.php");
$id=$_GET['id'];
if(isset($_POST['submit'])){

    $query2="UPDATE `seller` SET `s_name`='".$_POST['name']."',`s_password`='".$_POST['password']."',`s_email`='".$_POST['email']."',`s_mobile`='".$_POST['phone']."' WHERE `s_id` = $id";
    $result2=mysqli_query($con,$query2);
    if($result2){
        echo '<script>alert("data updated")</script>';
        header("refresh:0;url=manage_sellers.php");
    }
    else{
        echo '<script>alert("data not updated")</script>';
    }

}
?>
