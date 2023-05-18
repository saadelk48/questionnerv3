<?php 
include ("Config.php") ;

if(isset($_POST['displaySend'])){

    $table='<table class="table table-bordered">
    <thead>
        <tr>
        <th scope="col">ID</th>	
        <th scope="col">Nom du maladie</th>
        <th scope="col">Description</th>
        <th scope="col">Status</th>
        <th scope="col">Options</th>
        </tr>
    </thead> ';

    $sql="SELECT * FROM `maladies` WHERE `status` ='activated'"; 
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){

        $id=$row['id'];
        $name=$row['nom'];
        $descriptionn=$row['description'];
        $status=$row['status'];

        $table.='<tr>
                    <td scope="row">'.$id.'</td>
                    <td>'.$name.'</td>
                    <td>'.$descriptionn.'</td>
                    <td>'.$status.'</td>
                    <td>
                    
									<a href="#" class="mr-3 editmaladie justify-content-center me-2" onclick="Getinfo('.$id.')"><i class="fa-solid fa-edit"></i></a>

                                    <a href="#" class="mr-3 supprimer justify-content-center " onclick="openmodaldelete('.$id.')" ><i class="fa-solid fa-trash"></i></a>

					</td>
                </tr>';
    }
//onclick="Deletemaladie('.$id.')"
    $table.='</table>';
    echo $table;
}

?>
