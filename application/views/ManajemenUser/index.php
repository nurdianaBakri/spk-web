
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">User</h4>
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
								<a href="#">User</a>
							</li>
							 
						</ul>
					</div>

					<div class="row"  id="div_kali">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
                                        <h4 class="card-title">Data User</h4> 
                                        <a  href="<?php echo base_url()."ManajemenUser/add" ?>" class="btn btn-primary btn-round ml-auto"  >
                                            <i class="fa fa-plus"></i>
                                            Tambah User
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
													<th>No</th>
													<th>Nama</th>
													<th>Username</th>
													<th>Alamat</th>
													<th>Email</th>
													<th>No HP</th>
													<th style="width: 10%">Aksi</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>No</th>
                                                    <th>Nama</th>
													<th>Username</th>
													<th>Alamat</th>
													<th>Email</th>
													<th>No HP</th>
													<th>Aksi</th>
												</tr>
											</tfoot>
											<tbody id="show_data">

												<?php 
												$no=1;
												foreach ($data as $key): ?>
													<tr>
														<td><?php echo $no++?></td>
														<td><?php echo $key->nama?></td>
														<td><?php echo $key->username; ?></td>
														<td><?php echo $key->alamat?></td>
														<td><?php echo $key->email?></td>
														<td><?php echo $key->no_hp?></td>
														<td>
															<div class="form-button-action">
																<a href="<?php echo base_url()."ManajemenUser/update/".$key->username ?>" class="btn btn-link btn-primary">
																	<i class="fa fa-edit"></i>
																</a>
																<a href="<?php echo base_url()."ManajemenUser/hapus/".$key->username ?>" class="btn btn-link btn-danger hapus" >
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