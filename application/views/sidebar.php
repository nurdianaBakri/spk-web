		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?php echo base_url()."assets/" ?>assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?= $this->session->userdata('nama'); ?>
									<span class="user-level"><?php
									if ($this->session->userdata('admin')=="0")
									{
										echo "Admin"; 
									}
									else
									{
										echo "User";
									}
									?> 
									</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div> 
						</div>
					</div>
					<ul class="nav nav-primary"> 
					   
						<li class="nav-item active">
							<a href="<?php echo base_url()."ManajemenWisata" ?>">
								<i class="fas fa-map"></i>
								<p>Manajemen Wisata</p> 
							</a>
						</li> 
						<li class="nav-item active">
							<a href="<?php echo base_url()."ManajemenKriteria" ?>">
								<i class="fas fa-list"></i>
								<p>Manajemen Kriteria</p> 
							</a>
						</li> 
						<li class="nav-item active">
							<a href="<?php echo base_url()."ManajemenHistory" ?>">
								<i class="fas fa-history"></i>
								<p>Manajemen History</p> 
							</a>
						</li> 
						<li class="nav-item active">
							<a href="<?php echo base_url()."ManajemenUser" ?>">
								<i class="fas fa-user"></i>
								<p>Manajemen User</p> 
							</a>
						</li> 
					</ul>
				</div>
			</div>
        </div>