<?php
include 'Config.php';
// $response=array();
if(isset($_POST['updateid'])){
    $maladie_id=$_POST['updateid'];
    $sql="SELECT `id`, `nom`, `description`, `status` FROM `maladies` where id=$maladie_id";
    $result=mysqli_query($conn,$sql);
    // $row=mysqli_fetch_assoc($result);

    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $nom=$row['nom'];
        $description=$row['description'];
        $status=$row['status'];
    }
    $response=array(
                        "id"=>$id,
                        "nom"=>$nom,
                        "description"=>$description,
                        "status"=>$status
                    );

    echo json_encode($response);
}


//update query

if(isset($_POST['hiddendata'])){

    $uniqueid=$_POST['hiddendata'];
    $name=$_POST['updatename'];
    $description=$_POST['updatedescription'];
    $status=$_POST['updatestatus'];

    $sql="UPDATE `maladies` SET `nom`='$name',`description`='$description', `status`='$status' WHERE id=$uniqueid ";
    $result=mysqli_query($conn,$sql);

}

?>