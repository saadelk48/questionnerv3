<?php 
include 'Config.php';

if(isset($_POST['idreponse'])){
    
    $idreponse=$_POST['idreponse'];
    $idquestion=$_POST['idquestion'];

    $select="SELECT * FROM `reponses` WHERE id_questions=$idquestion AND status != 'deleted' ";
    $resultat=mysqli_query($conn,$select);
    $numrow=mysqli_num_rows($resultat);
    
    // echo $numrow;

    if($numrow>1){
        $sql="UPDATE `reponses` SET `status`='deleted' WHERE id='$idreponse'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "ok";
        }else{
            echo "erreur";
        }
    }else{
        echo "la table questions doit avoir au moins une reponse";
    }



}

?>