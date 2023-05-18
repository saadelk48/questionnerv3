<?php
include 'Config.php';

if(isset($_POST['hiddendata1'])){
    $unique=$_POST['hiddendata1'];
    $table=$_POST['table'];
    if($table=='questions'){
        $delreponse="UPDATE `reponses` SET `status`='deleted' WHERE id_questions=$unique";
        $results=mysqli_query($conn,$delreponse);
    }
    $sql="UPDATE `$table` SET `status`='deleted' WHERE id=$unique ";
    $result=mysqli_query($conn,$sql);
}

?>