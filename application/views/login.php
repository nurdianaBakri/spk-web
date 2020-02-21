                        
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Produk Catalog</h4>
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
								<a href="#">Produk Katalog</a>
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

									<form action="<?php echo base_url()."index.php/ProdukCatalog/do_add" ?>" method="post">
										<div class="row">
											<div class="col-md-12 col-xs-6 col-lg-6"> 
												<div class="form-group form-floating-label">
													<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required name="kode_produk">
													<label for="inputFloatingLabel" class="placeholder">Kode Produk</label>
												</div>
												<div class="form-group form-floating-label">
													<select class="form-control input-border-bottom" id="selectFloatingLabel" required name="type_produk">
														<option value="">&nbsp;</option>
														<option>A</option>
														<option>B</option>
														<option>C</option> 
													</select>
													<label for="selectFloatingLabel" class="placeholder">Type Produk</label>
												</div> 
											</div>

											<div class="col-md-12 col-xs-6 col-lg-6"> 
												<div class="form-group form-floating-label">
													<textarea id="inputFloatingLabel"  class="form-control input-border-bottom" required name="keterangan_produk"></textarea>
													<label for="inputFloatingLabel" class="placeholder">Keterangan Produk</label>
												</div>
												<div class="form-group form-floating-label">
													<select class="form-control input-border-bottom" id="selectFloatingLabel" required name="status_produk">
														<option value="">&nbsp;</option>
														<option value="0">Tidak Aktif</option>
														<option value="1">Aktif</option> 
													</select>
													<label for="selectFloatingLabel" class="placeholder">Status Produk</label>
												</div> 
											</div>
										</div>

										<div class="card-action">
											<button class="btn btn-success" type="submit" >Submit</button>
											<a href="<?php echo base_url()."/index.php/ProdukCatalog" ?>" class="btn btn-danger" >Cancel</a>
										</div>  
									</form>
								
								</div> 
							</div>
						</div>


				</div>
            </div>