
<?php
include("db.php");
$id=$_GET['rid'];


$query2="DELETE FROM `review_table` WHERE `review_id`= $id";
$result2=mysqli_query($con,$query2);
if($result2){
    echo '<script>alert("review deleted")</script>';
    header( "Refresh:0; url=./manage_reviews.php");
}
else{
    echo '<script>alert("review not deleted")</script>';
}

?>