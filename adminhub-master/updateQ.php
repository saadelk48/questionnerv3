<?php
include 'Config.php';

if(isset($_POST['updateid'])){

    $question_id = $_POST['updateid'];

    // $sql="SELECT `id`,`valeur` FROM `questions` where id=$question_id";
    $sql="SELECT r.id 'idr', q.valeur 'question',r.valeur 'reponse' FROM `questions` q INNER JOIN reponses r ON r.id_questions=q.id WHERE q.status!='deleted' and r.status!='deleted' AND q.id=$question_id";

    $result=mysqli_query($conn,$sql);
    // $row=mysqli_fetch_assoc($result);
    $table=array();
    while($row=mysqli_fetch_assoc($result)){

        $table[]=$row;
    }
    // foreach($table as $row){
    //     $id=$question_id;
    //     $question=$row['question'];
    //     $response=$row['reponse'];
    // }




    // $table=$tabq=$tabr=array();
    // $nbr=0;
    // while($row=mysqli_fetch_assoc($result)){
    //     $table[$nbr]=("id"=>$question_id);
    //                             $tabq[$nbr]=("question"=>$row['question']);
    //                             $tabr[$nbr]=("reponse"=>$row['reponse']);
                           
    //     $nbr++;
    // }
// echo mysqli_num_rows($result);
    // $response=array(
    //                     "id"=>$table,
    //                     "question"=>$tabq,
    //                     "reponse"=>$tabr,
    //                 );

    echo json_encode($table);
    // echo json_encode($response);
}

//update query

if(isset($_POST['hiddendata'])){
    $uniqueid=$_POST['hiddendata'];
    $value=$_POST['updatevaleur'];

    $sql="UPDATE `questions` SET `valeur`='$value'  WHERE id=$uniqueid ";
    $result=mysqli_query($conn,$sql);

    $tb_valreponse=$_POST['tabreponse'];
    $tb_idreponse=$_POST['tabidreponse'];
    $check=true;

    for($i=0 ; $i<count($tb_valreponse) ; $i++){
        echo $tb_valreponse[$i];

        if($tb_idreponse[$i] != '0'){

            $sql="UPDATE `reponses` SET `valeur` ='".$tb_valreponse[$i]."' WHERE id='".$tb_idreponse[$i]."' ";
            $results=mysqli_query($conn,$sql);
            if(!$results) $check=false;
        }else{
            
            $sql="INSERT INTO `reponses` (`valeur`,`id_questions`,`status`) VALUES ('".$tb_valreponse[$i]."','$uniqueid','activated')";
            $results=mysqli_query($conn,$sql);

        }
    }
    echo ($check) ? "ok" : "error";


}

?>