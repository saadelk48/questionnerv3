<?php 
include ("Config.php") ;

extract($_POST);

if(isset($_POST['namesend']) && isset($_POST['descriptionsend']) && isset($_POST['statussend']) ){
    $insert="INSERT INTO maladies( nom , description ,status) VALUES ('$namesend','$descriptionsend','$statussend')";
    mysqli_query($conn,$insert);
}

?>