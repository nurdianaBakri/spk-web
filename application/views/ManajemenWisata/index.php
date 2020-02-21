
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
							 
						</ul>
					</div>

					<div class="row"  id="div_kali">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
                                        <h4 class="card-title">Data Wisata</h4> 
                                        <a  href="<?php echo base_url()."ManajemenWisata/add" ?>" class="btn btn-primary btn-round ml-auto"  >
                                            <i class="fa fa-plus"></i>
                                            Tambah Wisata
                                        </a> 
									</div>
								</div>
								<div class="card-body">
									<?php
								 	if ($this->session->flashdata('pesan')!="")
								 	{
								 		?>
								 			<div class="alert alert-primary" role="alert">
											  <?php echo $this->session->flashdata('pesan'); ?>
											</div> 
								 		<?php
								 	}

								 	?>
								 
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Nama</th>
													<th>Jenis</th>
													<th>Alamat</th>
													<th>Fasilitas</th>
													<th>Gambar</th>
													<th style="width: 10%">Aksi</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
                                                    <th>Nama</th>
													<th>Jenis</th>
													<th>Alamat</th>
													<th>Fasilitas</th>
													<th>Gambar</th>
													<th>Aksi</th>
												</tr>
											</tfoot>
											<tbody id="show_data">

												<?php foreach ($data as $key): ?>
													<tr>
														<td><?php echo $key->nama_wisata?></td>
														<td><?php

														$this->db->where('id_jenis',$key->jenis_wisata);
														$jenis_wisata = $this->db->get('jenis_wisata')->row();

														 echo $jenis_wisata->nama;

														 ?></td>
														<td><?php echo $key->alamat?></td>
														<td><?php echo $key->fasilitas?></td>
														<td>
																<img src="<?php echo base_url()."gambar/".$key->gambar ?>" alt="title" class="img-thumbnail" width="100" height="50">
														</td>
														<td>
															<div class="form-button-action">
																<a href="<?php echo base_url()."ManajemenWisata/update/".$key->id_wisata ?>" class="btn btn-link btn-primary">
																	<i class="fa fa-edit"></i>
																</a>
																<a href="<?php echo base_url()."ManajemenWisata/hapus/".$key->id_wisata ?>" class="btn btn-link btn-danger hapus" >
																	<i class="fa fa-times"></i>
																</a>
															</div>
														</td>
													</tr> 
												<?php endforeach ?>
											 
											</tbody>
										</table>
									</div>
								</div>
							</div>
                        </div>
                        
					</div>
				</div>
            </div>
           

<script>
    $(document).ready(function(){

        $('#add-row').DataTable({
			// "pageLength": 5,
		});

    });
</script>