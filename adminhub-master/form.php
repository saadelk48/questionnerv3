<div class="modal fade" id="reg-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
				<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
											<h1 class="modal-title fs-5" id="modal-title">Ajouter une nouvelle maladie</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<form id="addform" method="post">
						 			<div class="modal-body">
										<div class="mb-3">
											<label for="recipient-name" class="col-form-label">Nom du maladie</label>
											<input type="text" name="name" class="form-control" id="recipient-name">
										</div>
										<div class="mb-3">
											<label for="recipient-description" class="col-form-label">Description</label>
											<input type="text" name="description" class="form-control" id="recipient-description">
											
										</div>
										<div class="mb-3">
											<label for="recipient-status" class="col-form-label">Status</label>
											<input type="text" name="status"  class="form-control" id="recipient-status">
										</div>

											<div class="modal-footer">
												<button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="addmalad()">ajouter</button>
												<button type="reset" class="btn btn-secondary">reset</button>
                                                <!--2 input feilds for adding and next for updating, deleting or viewing profile -->
                                                <input type="hidden" name="action" value="addmal">
                                                <input type="hidden" name="maladieID" id="maladieID" value=""> 
											</div>
									</div>
								</form>
							</div>
				</div>	
			</div>