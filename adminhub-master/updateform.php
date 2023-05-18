<div class="modal fade" id="modifyModal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
				<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
											<h1 class="modal-title fs-5" id="modal-title">modifier maladie</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
						 		<div class="modal-body">
									<form action="" method="post">
										<div class="mb-3">
											<label for="modifyName" class="col-form-label">Nouveau nom du maladie</label>
											<input type="text" name="nv_name" class="form-control" id="modifyName">
										</div>
										<div class="mb-3">
											<label for="modifyDescription" class="col-form-label">Nouvelle description</label>
											<input type="text" name="nv_description" class="form-control" id="modifyDescription">
											
										</div>
										<div class="mb-3">
											<label for="modifyStatus" class="col-form-label">changer Status</label>
											<input type="text" name="nv_status"  class="form-control" id="modifyStatus">
										</div>

											<div class="modal-footer">
												<button type="button" name="submit_1" class="btn btn-primary" data-bs-dismiss="modal" onclick="updateinfo()">modifier</button>
												<button type="reset" class="btn btn-secondary">reset</button>
												<input type="hidden" id="hiddendata">
											</div>

									</form>
								</div>
							</div>
				</div>	
			</div>