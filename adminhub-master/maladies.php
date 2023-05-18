

<?php 
$title_page="maladie";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">


	<title>AdminHub</title>
</head>
<body>


	<?php include("php/SIDEBAR.php");?>


	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div>
				<div class="left">
					<h1 class="display-6">Maladies</h1>
				</div>
			</div>
			<!--modal button-->
			<div class="container ms-7">
					<div class="text-end ">
						<button class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#reg-modal">
						<i class="fa-solid fa-plus"></i>
							Ajouter une maladie
						</button>
					</div>
				<div id="displayDataTable"></div>
			</div>
			<!--modal it self-->
			<?php include 'form.php' ?>
			<?php include 'updateform.php' ?>
			


			<div class="modal fade" id="aresuremodal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
			<div class="modal-dialog">
						<div class="modal-content">
								<div class="modal-header">
											<h1 class="modal-title fs-5" id="modal-title">confirmation</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								
						 			<div class="modal-body">
										<div class="container" id="maladieinfo">
                                            <h4>êtes-vous sûr de vouloir supprimer cette maladie ? </h4>
                                        </div>
                                    </div>
											<div class="modal-footer">
												<button type="button" class="btn btn-primary" onclick="Deletemaladie()">Oui</button>
												<button type="button" class="btn btn-danger" data-dimiss="modal">Non</button>
												<input type="hidden" id="hiddendata1">
											</div>	
						</div>
			</div>	
			</div>

			<!-- table-->
			
			<?php include 'maladiedesc.php' ?>
			

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
	<!-- <script src="tools/js/bootstarp.bundle.min.js"></script>
	<script src="tools/bootstarp.bundle.min.js"></script> -->
	<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> -->
	<script src="script.js"></script>
	
	

	<script>
		displayData();
//display fucntion
function displayData(){

	var displayData="true";
	$.ajax({
		url:"display.php",
		type:"post",
		data:{
			displaySend:displayData
		},
		success:function(data,status){
			$('#displayDataTable').html(data);
		}
	});


}



		
	function addmalad(){

			var nameAdd= $('#recipient-name').val();
			var descriptionAdd= $('#recipient-description').val();
			var statusAdd= $('#recipient-status').val();
			//ajax
			$.ajax({
						url:"insert.php",
						type:"post",
						data:{
							namesend:nameAdd,
							descriptionsend:descriptionAdd,
							statussend:statusAdd
						},
						success:function(data,status){
							//function to display data
							console.log(status);
							$('#recipient-name').val("");
							$('#recipient-description').val("");
							$('#recipient-status').val("");
							displayData();

						}
				});
	}


//deletemaladie function

function openmodaldelete(deleteid){
	$('#aresuremodal').modal("show");
	$('#hiddendata1').val(deleteid);
}

function Deletemaladie(){
	$.ajax({
				url:"delete.php",
				type:"post",
				data:{
					hiddendata1:$('#hiddendata1').val(),
					table:'maladies'
				},
				success:function(data,status){
					displayData();
				}

	});

}
//updatemaladie function 
function Getinfo(updateid){
	
	
	$.ajax({
		url:"update.php",
		type:"post",
		data:{
			updateid:updateid
		},
		success:function(data){
			$('#modifyModal').modal("show");
			console.log(data);
			var maladieid=JSON.parse(data);
			console.log(maladieid);
			$('#hiddendata').val(updateid);
			$('#modifyName').val(maladieid.nom);
			$('#modifyDescription').val(maladieid.description);	
			$('#modifyStatus').val(maladieid.status);
							
			}
	});


	// $.post("update.php",{updateid:updateid},function(data,status){
	// 	var maladieid=JSON.parse(data);
	// 	$('#modify-name').val(maladieid.nom);
	// 	$('#modify-description').val(maladieid.description);	
	// 	$('#modify-status').val(maladieid.status);
	// });

	

}

function updateinfo(){
var updatename=$('#modifyName').val();
var updatedescription=$('#modifyDescription').val();	
var updatestatus=$('#modifyStatus').val();
var hiddendata=$('#hiddendata').val();

$.post("update.php",{

	updatename:updatename,
	updatedescription:updatedescription,
	updatestatus:updatestatus,
	hiddendata:hiddendata

},function(data,status){
	$('#modifyModal').modal('hide');
	displayData();
}

);

}



	</script>						

</body>
</html>