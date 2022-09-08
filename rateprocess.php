<?php

include ('includes/db.php');

$rating = $_POST['rate'];
$pid = $_POST['pid'];

// echo $rating;
// echo $pid;
// die();


$sql = "select total_rating, total_raters from posts where post_id = $pid";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
$a = $row['total_rating']+$rating;
$b = $row['total_raters']+1;
$c = $a/$b;


$sql1 = "Update posts set rating = $c, total_rating = $a, total_raters= $b where post_id=$pid";


if($connection->query($sql1)){
    header('Location:http://localhost/Rider/category.php?category=3#Rated Successfully');
}else{
    echo "$connection -> connect_error";
}

?>
