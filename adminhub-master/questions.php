

<?php 
$title_page="questions";
?>
<!DOCTYPE html>
<html lang="en">
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
	<?= ($title_page=="maladie") ? "active" : "" ; ?>
   

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
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div>
				<div class="left">
					<h1 class="display-6">questions</h1>
				</div>
			</div>
			<!-- modal button -->

			<div class="container ms-7">
				<div class="text-end">
					<button class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#qmodal">
					<i class="fa-solid fa-plus"></i>
							Ajouter une question
					</button>
				</div>
				<div id="displayQtable"></div>
			</div>
			<!--add modal it self-->

			<div class="modal fade" id="qmodal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
				<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
											<h1 class="modal-title fs-5" id="modal-title">Ajouter une nouvelle question</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<form id="addQform" method="post">
						 			<div class="modal-body">
										<div class="mb-3">
											<label for="Qvalue" class="col-form-label">Valeur du question</label><br>
											<TEXTAREA NAME="texte" id="Qvalue" ROWS="9" COLS="28" placeholder="Saisissez votre question ..."></TEXTAREA>
										</div>
										
										<div class="mb-3">
												<div id="container1">
											
												</div>
												<br>
												<button type="button" class="btn btn-primary" onclick="addReponseInput()"><i class="fa-solid fa-plus"></i>Ajouter une reponse</button>
										</div> 


											<div class="modal-footer">
												<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="addquestion()">ajouter</button>
												<button type="reset" class="btn btn-secondary">reset</button>
											</div>
									</div>
								</form>
							</div>
				</div>	
			</div>
			<!-- modify question modal -->

			<div class="modal fade" id="modifQmodal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
				<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
											<h1 class="modal-title fs-5" id="modal-title">Modifier une question</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<form id="ModifiyQform" method="post">
						 			<div class="modal-body">
										<div class="mb-3">
											<label for="newQvalue" class="col-form-label">Valeur du question</label>
											<TEXTAREA NAME="texte" id="newQvalue" ROWS="9" COLS="28"></TEXTAREA>
										</div>
										<div id="reponsesPlace" class="reponsesPlace" ></div>	
										<div class="mb-3">
												<br>
												<button type="button" class="btn btn-primary" onclick="addReponseInput1()"><i class="fa-solid fa-plus"></i>Ajouter une reponse</button>
										</div> 
									</div>	
											
											<div class="modal-footer">
												<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="updateQinfo()">Modifier</button>
												<button type="reset" class="btn btn-secondary">reset</button>
												<input type="hidden" id="hiddendata">
											</div>
									
								</form>
							</div>
				</div>	
			</div>



			<!-- delete modal-->
			<div class="modal fade" id="deleteeModal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
				<div class="modal-dialog">
							<div class="modal-content">
									<div class="modal-header">
												<h1 class="modal-title fs-5" id="modal-title">confirmation</h1>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									
										<div class="modal-body">
											<div class="container" id="maladieinfo">
												<h4>êtes-vous sûr de vouloir supprimer cette question ? </h4>
											</div>
										</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-primary" onclick="Deletequestion()">Oui</button>
													<button type="button" class="btn btn-danger" data-dimiss="modal">Non</button>
													<input type="hidden" id="hiddendata1">
												</div>	
							</div>
				</div>	
			</div>

			<!--view detail modal -->
			<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="modal-title">les reponses de cette maladie</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						
						<div class="container">
							<div class="resultDetail">
							</div>
						</div>
						
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dimiss="modal">Fermer</button>
							<input type="hidden" id="hiddendata2">
						</div>	
					</div>
				</div>	
			</div>




			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
	<script src="script.js"></script>

	<script>
		//function pour ajouter une question
		function addquestion(){
			var valeurAdd=$('#Qvalue').val();
			var tab = [];
			for(i=1 ; i <= $('#container1 >.input-container').length ;i++){

				tab.push($('#reponse'+i).val());
			}
			console.log(tab);

			$.ajax({
				url:"insertQ.php",
				type:"post",
				data:{
					valeursend:valeurAdd,
					tab:tab

				},
				success:function(data,status){
					console.log(data);
					displayQdata();
					$('#Qvalue').val("");
					for(i=1 ; i <= $('#container1 >.input-container').length ;i++){

						$('#reponse'+i).val("");
					}
					if(data.trim()=="ok"){
						alert("ajout avec succes");
					}else if(data.trim()=="error"){
						alert("error");
					}else{
						alert("la table questions doit avoir au moins une reponse");
					}
				}
			});


		}
		//function pour afficher les questions
		displayQdata();
		function displayQdata(){

			var displayQdata="true";
			$.ajax({
				url:"displayQ.php",
				type:"post",
				data:{
					displaySend:displayQdata
				},
				success:function(data,status){
					$('#displayQtable').html(data);
				}
			});
		}

		function GetQinfo(updateid){

			$.ajax({
				url:"updateQ.php",
				type:"post",
				data:{
					updateid:updateid
				},
				success:function(data){
					//console.log(data);

					var questionid=JSON.parse(data);
					console.log(questionid);
					// console.log(questionid[0].idr);
					$('#hiddendata').val(updateid);
					$('#newQvalue').val(questionid[0].question);
					html1="";
					for(i=0 ; i<questionid.length ; i++){
						var index= i+1;
						html1+='<div id="reponse'+updateid+'_'+index+'"  class="textarea-container"><label>reponse:</label><br><div class="row"><div class="col-9"><TEXTAREA class="reponse" id="reponse_'+updateid+'_'+index+'" name="'+questionid[i].idr+'"  placeholder="entrez la reponse ...">'+questionid[i].reponse+'</TEXTAREA> </div><div class="col-3 d-flex align-items-center"><a href="#" class="btn btn-primary mr-3 supprimerR " onclick="deletereponse('+questionid[i].idr+','+updateid+','+index+')" ><i class="fa-solid fa-trash"></i></a></div></div></div>';
						// $('#reponse'+i+'').val(questionid[i].reponse);
					}
					$('#reponsesPlace').html("");
					//var place=document.getElementById('#modal-body');
					$('#reponsesPlace').append(html1);

					// $('#newQvalue').val(questionid.question);
					// $('#newQvalue').html(questionid.nom);
					$('#modifQmodal').modal("show");

				}

			});

		}
		function updateQinfo(){
			var updatevaleur=$('#newQvalue').val();
			var hiddendata=$('#hiddendata').val();

			var tabidreponse=[];
			var tabreponse=[];

				for(i=1 ; i<=$('#reponsesPlace >.textarea-container').length; i++){

					tabreponse.push($('#reponse_'+hiddendata+'_'+i).val());alert($('#reponse_'+hiddendata+'_'+i).val());
					// console.log(document.querySelector('#reponse'+hiddendata+'_'+i).name);
					tabidreponse.push(document.querySelector('#reponse_'+hiddendata+'_'+i).name);
				}
			
			// var tbrpsToIn=[];
			// for(i=1 ; i<=$('#reponsesPlace > [name=0]').length;i++){
			// // for(i=1 ; i<=$('#reponsesPlace >.textarea-container').length;i++){
			// 	tbrpsToIn.push($('#reponse'+idQustion+'_'+index).val());
			// }
			// console.log(tbrpsToIn);
			// //console.log(tabreponse);
			// //console.log(tabidreponse);
									
			
			$.post(
				"updateQ.php",
				{
					updatevaleur : updatevaleur,
					hiddendata : hiddendata,
					tabreponse:tabreponse,
					tabidreponse:tabidreponse
				},
				function(data,status){
					$('#modifyModal').modal('hide');
					displayQdata();console.log(data);
					// if(data.trim()=="ok"){
					// 	alert("update avec succes");
					// }else{
					// 	alert("error");
					// }
				}
			);
		}

		//delete question

				function openQmodaldelete(deleteid){
						$('#deleteeModal').modal("show");
						$('#hiddendata1').val(deleteid);
					}

					function Deletequestion(){
						$.ajax({
									url:"delete.php",
									type:"post",
									data:{
										hiddendata1:$('#hiddendata1').val(),
										table:'questions'
									},
									success:function(data,status){
										$('#deleteeModal').modal("hide");
										displayQdata();

									}

						});

					}
				function viewmodal(qid){
					// $('#hiddendata2').val(qid);
					
					$.ajax({
						url:"details.php",
						type:"post",
						data:{
							hiddendata2:qid
						},
						success:function(response){
							console.log(response);
							$('.resultDetail').html(response);
							$('#detailModal').modal("show");
							
						}
						});

				}	

					var count=0;
					function addReponseInput(){
						count+=1;
						html='<div class="input-container"><label>reponse '+count+':</label><br><input id="reponse'+count+'"type="text" placeholder="entrez la reponse ..."></div>';
						var form=document.getElementById('container1');
						$('#container1').append(html);
					}
					var index=0;
					function addReponseInput1(){
						var idQustion=$('#hiddendata').val();
						index=document.querySelectorAll('.reponsesPlace > div').length;
						index ++;
						html='<div id="reponse'+idQustion+'_'+index+'" class="textarea-container"><label>reponse:</label><br><div class="row"><div class="col-9"><TEXTAREA class="reponse" id="reponse_'+idQustion+'_'+index+'" name="0"  placeholder="entrez la reponse ..."> </TEXTAREA></div><div class="col-3 d-flex align-items-center"><a href="#" class="btn btn-primary mr-3 supprimerR " onclick="deletereponse('+0+','+idQustion+','+index+')"><i class="fa-solid fa-trash"></i></a></div></div></div></div>';
						var form=document.getElementById('reponsesPlace');
						$('#reponsesPlace').append(html);
					}
				function deletereponse(id,updateid,index){

							Swal.fire({
								title: 'êtes-vous sûr de vouloir supprimer cette reponse?',
								text: "Vous ne pourrez pas revenir en arrière!",
								icon: 'warning',
								showCancelButton: true,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								confirmButtonText: 'Oui, supprime la reponse!'
								}).then((result) => {
								if (result.isConfirmed) {
									if(id!=0){					
										$.ajax({
											url:"deleterep.php",
											type:"post",
											data:{
												idreponse:id,
												idquestion:updateid
											},
											success:function(data,status){

												console.log(data);

												if(data.trim()=="ok"){

													Swal.fire(
														'Supprimé!',
														'suppression avec succe.',
														'success'
													);
													$("#reponse"+updateid+'_'+ index).remove();

												}else if(data.trim()=="erreur"){

													Swal.fire(
														'attention',
														'erreur.',
														'error'
													)
												}else{
													Swal.fire(
														'impossible',
														'la table questions doit avoir au moins une reponse.',
														'warning'
													)
												}
												$('#modifyModal').modal("show");	
												console.log(id);
											
											}
										});
										}
								}
							})

				

				}

			
	</script>

</body>
</html>