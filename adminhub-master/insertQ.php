<?php 
include ("Config.php") ;
extract($_POST);

$tab=$_POST['tab'];
    $numrows= count($tab);
    if($numrows!=0){
                if(isset($_POST['valeursend'])){
                    $insert="INSERT INTO questions(valeur) VALUES ('$valeursend')";
                    mysqli_query($conn,$insert);
                    $id = mysqli_insert_id($conn);
                    $check=true;
                        foreach($_POST['tab'] as $tb){
                            $sql="INSERT INTO `reponses`(`valeur`, `status`, `id_questions`) VALUES ('$tb','activated','$id')";
                            $results=mysqli_query($conn,$sql);
                            if(!$results) $check=false;
                        }
                    echo ($check) ? "ok" : "error";
    }else{
        echo"veuillez ajouter au moins une question";
    }

   

}

?>