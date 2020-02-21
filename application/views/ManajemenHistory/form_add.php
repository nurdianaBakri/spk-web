                        
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">History</h4>
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
								<a href="#">History</a>
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

									<?php echo form_open_multipart('ManajemenHistory/do_add');?>

										<div class="row">

											<div class="col-md-12 col-xs-6 col-lg-6"> 
												
												<div class="form-group form-floating-label">
													<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required name="nama">
													<label for="inputFloatingLabel" class="placeholder">Nama</label>
												</div>  
										 
												<div class="form-group form-floating-label">
													<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required name="alamat">
													<label for="inputFloatingLabel" class="placeholder">Alamat</label>
												</div>

												<div class="form-group form-floating-label">
													<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required name="no_hp">
													<label for="inputFloatingLabel" class="placeholder">No_hp</label>
												</div>

												<div class="form-group form-floating-label">
													<select class="form-control input-border-bottom" id="selectFloatingLabel" required name="admin">
														<option value="">&nbsp;</option>
														<option value="0">Tidak</option>
														<option value="1">Ya</option>
													</select>
													<label for="selectFloatingLabel" class="placeholder">Is Admin</label>
												</div>
											</div> 

											<div class="col-md-12 col-xs-6 col-lg-6"> 				
											 

												<div class="form-group form-floating-label">
													<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required name="username">
													<label for="inputFloatingLabel" class="placeholder">Username</label>
												</div> 

												<div class="form-group form-floating-label">
													<input id="inputFloatingLabel" type="email" class="form-control input-border-bottom" required name="email">
													<label for="inputFloatingLabel" class="placeholder">email</label>
												</div>

												<div class="form-group form-floating-label">
													<input id="inputFloatingLabel" type="password" class="form-control input-border-bottom" required name="password">
													<label for="inputFloatingLabel" class="placeholder">Password</label>
												</div>
											</div> 
										</div>

										<div class="card-action">
											<button class="btn btn-success" type="submit" >Submit</button>
											<a href="<?php echo base_url()."/index.php/ManajemenUser" ?>" class="btn btn-danger" >Cancel</a>
										</div>  
									</form>
								
								</div> 
							</div>
						</div> 
				</div>
            </div>