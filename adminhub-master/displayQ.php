<?php 
include ("Config.php") ;

if(isset($_POST['displaySend'])){

    $table='<table class="table table-bordered">
    <thead>
        <tr>
        <th scope="col">ID</th>	
        <th scope="col">Valeur du Question</th>
        <th scope="col">Options</th>

        </tr>
    </thead> ';

    $sql="SELECT * FROM `questions` WHERE `status` !='deleted'"; 
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){

        $id=$row['id'];
        $valeur=$row['valeur'];
      
        $table.='<tr>
                    <td scope="row">'.$id.'</td>
                    <td>'.$valeur.'</td>
                    <td>
                    
									<a href="#" class="mr-3 editquestion justify-content-center me-2"  onclick="GetQinfo('.$id.')"><i class="fa-solid fa-edit"></i></a>

                                    <a href="#" class="mr-3 supprimer justify-content-center " onclick="openQmodaldelete('.$id.')" ><i class="fa-solid fa-trash"></i></a>
                                    <a href="#" class="mr-3 voir justify-content-center " onclick="viewmodal('.$id.')" ><i class="fa-solid fa-eye"></i></a>


					</td>
                </tr>';
    }

    $table.='</table>';
    echo $table;
}

?>