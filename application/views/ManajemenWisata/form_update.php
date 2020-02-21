
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

									<?php echo form_open_multipart('ManajemenWisata/do_update');?>

										<div class="row">

											<div class="col-md-12 col-xs-6 col-lg-6"> 

												<input type="hidden" name="id_wisata" value="<?php echo $data->id_wisata ?>">
												
												<div class="form-group form-floating-label">
													<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required name="nama_wisata" value="<?php echo $data->nama_wisata ?>">
													<label for="inputFloatingLabel" class="placeholder">Nama Tempat Wisata</label>
												</div>
												<div class="form-group form-floating-label">
													<select class="form-control input-border-bottom" id="selectFloatingLabel" required name="jenis_wisata">
														<option value="pantai" <?php if($data->jenis_wisata=="pantai"){ echo "selected";} ?>>Pantai</option>
														<option value="air terjun" <?php if($data->jenis_wisata=="air terjun"){ echo "selected";} ?>>Air Terjun</option>
														<option value="lain" <?php if($data->jenis_wisata=="lain"){ echo "selected";} ?>>Lain</option> 
													</select>
													<label for="selectFloatingLabel" class="placeholder">Jenis Wisata</label>
												</div> 

												<div class="form-group form-floating-label">
													<textarea id="inputFloatingLabel"  class="form-control input-border-bottom" required name="alamat"><?php echo $data->alamat ?></textarea>
													<label for="inputFloatingLabel" class="placeholder">Alamat </label>
												</div>

												<div class="form-group form-floating-label">
													<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required name="lng" value="<?php echo $data->lng ?>">
													<label for="inputFloatingLabel" class="placeholder">Lng</label>
												</div>

												<div class="form-group form-floating-label">
													<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required name="lat" value="<?php echo $data->lat ?>">
													<label for="inputFloatingLabel" class="placeholder">Lat</label>
												</div>

											</div>

											<div class="col-md-12 col-xs-6 col-lg-6"> 

												<div class="form-group">
													<label  class="placeholder">Keterangan</label>
													<textarea  class="form-control input-border-bottom" required name="keterangan"><?php echo $data->keterangan ?></textarea>
												</div>

												<div class="form-group">
													<label class="form-label">Fasilitas</label>
													<div class="form-check"> 
														<label class="form-check-label">
															<input class="form-check-input" type="checkbox" name="fasilitas[]" <?php if( in_array("Mushola", $fasilitas)){ echo "checked";} ?> value="Mushola">
															<span class="form-check-sign">Mushola</span>
														</label>

														<label class="form-check-label">
															<input class="form-check-input" type="checkbox" name="fasilitas[]" <?php if( in_array("Hotel", $fasilitas)){ echo "checked";} ?> value="Hotel">
															<span class="form-check-sign">Hotel</span>
														</label>
														<label class="form-check-label">
															<input class="form-check-input" type="checkbox" name="fasilitas[]" <?php if( in_array("Rumah Makan", $fasilitas)){ echo "checked";} ?> value="Rumah Makan">
															<span class="form-check-sign">Rumah Makan</span>
														</label>
														<label class="form-check-label">
															<input class="form-check-input" type="checkbox" name="fasilitas[]" <?php if( in_array("Toilet Umum", $fasilitas)){ echo "checked";} ?> value="Toilet Umum">
															<span class="form-check-sign">Toilet Umum</span>
														</label>
													</div>
												</div>

												<div class="form-group">
													<label class="form-label">Gambar (Upload gambar jika ingin merubah)</label>
													<div class="row">
														<div class="col-6 col-sm-4">
															<figure class="imagecheck-figure">
																<img src="<?php echo base_url()."./gambar/".$data->gambar ?>" class="imagecheck-image">
															</figure>
														</div>
													</div>
													<input type="file" class="form-control input-border-bottom" name="gambar">
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