
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
							 
						</ul>
					</div>

					<div class="row"  id="div_kali">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
                                        <h4 class="card-title">Data History</h4>  
									</div>
								</div>
								<div class="card-body"> 
								 
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No.</th>
													<th>Tanggal</th>
													<th>Titik Awal</th>
													<th>Titik Akhir</th>
													<th style="width: 10%">Aksi</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>No.</th>
                                                    <th>Tanggal</th>
													<th>Titik Awal</th>
													<th>Titik Akhir</th>
													<th>Aksi</th>
												</tr>
											</tfoot>
											<tbody id="show_data">

												<?php 
												if ($data!=NULL)
												{
													$i=1;
													foreach ($data as $key): ?>
														<tr>
															<td><?php echo $key->i?></td>
															<td><?php echo $key->tanggal; ?></td>
															<td><?php echo $key->titik_awal?></td>
															<td><?php echo $key->titik_akhir?></td> 
															<td>
																<div class="form-button-action">
																	<a href="<?php echo base_url()."ManajemenHistory/detail/".$key->id_history ?>" class="btn btn-link btn-primary">
																		<i class="fa fa-list"></i>
																	</a>   
																</div>
															</td>
														</tr> 
													<?php endforeach ?>
												<?php } ?> 
											 
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