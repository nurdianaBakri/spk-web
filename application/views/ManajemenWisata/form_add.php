                        
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Wisata</h4>
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
								<a href="#">Wisata</a>
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

									<?php echo form_open_multipart('ManajemenWisata/do_add');?>

										<div class="row">

											<div class="col-md-12 col-xs-6 col-lg-6"> 
												
												<div class="form-group form-floating-label">
													<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required name="nama_wisata">
													<label for="inputFloatingLabel" class="placeholder">Nama Tempat Wisata</label>
												</div>
												<div class="form-group form-floating-label">
													<select class="form-control input-border-bottom" id="selectFloatingLabel" required name="jenis_wisata">
														<option value="">&nbsp;</option>
														<?php

															$jenis_wisata = $this->db->get('jenis_wisata')->result_array();
															foreach ($jenis_wisata as $key) { ?>
																<option value="<?= $key['id_jenis'] ?>"><?= $key['nama'] ?></option>
															<?php }

														?> 
													</select>
													<label for="selectFloatingLabel" class="placeholder">Jenis Wisata</label>
												</div> 

												<div class="form-group form-floating-label">
													<textarea id="inputFloatingLabel"  class="form-control input-border-bottom" required name="alamat"></textarea>
													<label for="inputFloatingLabel" class="placeholder">Alamat </label>
												</div>

												<div class="form-group form-floating-label">
													<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required name="lng">
													<label for="inputFloatingLabel" class="placeholder">Lng</label>
												</div>

												<div class="form-group form-floating-label">
													<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required name="lat">
													<label for="inputFloatingLabel" class="placeholder">Lat</label>
												</div>

											</div>

											<div class="col-md-12 col-xs-6 col-lg-6"> 

												<div class="form-group form-floating-label">
													<textarea id="inputFloatingLabel"  class="form-control input-border-bottom" required name="keterangan"></textarea>
													<label for="inputFloatingLabel" class="placeholder">Keterangan</label>
												</div>

												<div class="form-group">
													<label class="form-label">Fasilitas</label>
													<div class="form-check">
														<label class="form-check-label">
															<input class="form-check-input" type="checkbox" name="fasilitas[]" value="Mushola">
															<span class="form-check-sign">Mushola</span>
														</label>
														<label class="form-check-label">
															<input class="form-check-input" type="checkbox" name="fasilitas[]" value="Hotel">
															<span class="form-check-sign">Hotel</span>
														</label>
														<label class="form-check-label">
															<input class="form-check-input" type="checkbox" name="fasilitas[]" value="Rumah Makan">
															<span class="form-check-sign">Rumah Makan</span>
														</label>
														<label class="form-check-label">
															<input class="form-check-input" type="checkbox" name="fasilitas[]" value="Toilet Umum">
															<span class="form-check-sign">Toilet Umum</span>
														</label>
													</div>
												</div>
											

												<div class="form-group form-floating-label">
													<input type="file" class="form-control input-border-bottom" required name="gambar">
												</div> 
											</div>
										</div>

										<div class="card-action">
											<button class="btn btn-success" type="submit" >Submit</button>
											<a href="<?php echo base_url()."/index.php/ManajemenWisata" ?>" class="btn btn-danger" >Cancel</a>
										</div>  
									</form>
								
								</div> 
							</div>
						</div>


				</div>
            </div>