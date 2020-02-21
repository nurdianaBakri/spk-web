                        
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Kriteria</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Kriteria</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Tambah</a>
							</li>
							 
						</ul>
					</div>

					<div class="col-md-12">
							<div class="card">  
								<div class="card-body">

									<?php echo form_open_multipart('ManajemenKriteria/do_add');?>

										<div class="row">

											<div class="col-md-12 col-xs-6 col-lg-6"> 
												
												<div class="form-group form-floating-label">
													<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required name="nama">
													<label for="inputFloatingLabel" class="placeholder">Nama Kriteria</label>
												</div>  
											</div>

											<div class="col-md-12 col-xs-6 col-lg-6">  
												<div class="form-group form-floating-label">
													<input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" required name="nilaiP"> 
													<label for="inputFloatingLabel" class="placeholder">Nilai </label>
												</div> 
											</div>
										</div>

										<div class="card-action">
											<button class="btn btn-success" type="submit" >Submit</button>
											<a href="<?php echo base_url()."/index.php/ManajemenKriteria" ?>" class="btn btn-danger" >Cancel</a>
										</div>  
									</form>
								
								</div> 
							</div>
						</div>


				</div>
            </div>