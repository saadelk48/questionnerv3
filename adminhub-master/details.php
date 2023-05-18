<?php
include ("Config.php");


if(isset($_POST['hiddendata2'])){
    $uniqueid=$_POST['hiddendata2'];
    $sql="SELECT `valeur` FROM `reponses` WHERE id_questions='$uniqueid' and status='activated'";
    $result=mysqli_query($conn,$sql);
    $text="";
    while($row=mysqli_fetch_assoc($result)){
        $valeur=$row['valeur'];
        $text.='<div class="row"><textarea class="mb-3" disabled>'.$valeur.'</textarea><div>';
     
    }
    echo $text;   
}
?>