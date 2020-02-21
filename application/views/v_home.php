<!DOCTYPE html>
<html>
	<head>
		<title>Pengurus Kota Taekwondo Mataram</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/datepicker3.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/styles.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet">
        
        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
	</head>
	<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#">Taekwondo <span>Mataram</span></a>
				<ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <em class="fa fa-users"></em><span class="label label-primary">Anggota</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">							
                            <li>
                                <div class="all-button"><a href="<?php echo base_url('user_anggota'); ?>">
                                    <em class="fa fa-list"></em> <strong>Anggota</strong>
                                </a></div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="all-button"><a href="<?php echo base_url('user_anggota/formanggota'); ?>">
                                    <em class="fa fa-edit"></em> <strong>Daftar</strong>
                                </a></div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						    <em class="fa fa-users"></em><span class="label label-danger">Pelatih</span>
					    </a>
						<ul class="dropdown-menu dropdown-messages">							
							<li>
								<div class="all-button"><a href="<?php echo base_url('user_pelatih'); ?>">
									<em class="fa fa-list"></em> <strong>Pelatih</strong>
								</a></div>
							</li>
						</ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						    <em class="fa fa-map-marker"></em><span class="label label-primary">Dojang</span>
					    </a>
						<ul class="dropdown-menu dropdown-messages">							
							<li>
								<div class="all-button"><a href="<?php echo base_url('user_dojang'); ?>">
									<em class="fa fa-list"></em> <strong>Dojang</strong>
								</a></div>
							</li>
						</ul>
					</li>
                    <li class="dropdown">
					<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-list"></em><span class="label label-danger">Jadwal</span>
					</a>
					<ul class="dropdown-menu dropdown-messages">							
						<li>
							<div class="all-button"><a href="<?php echo base_url('user_jadwal'); ?>">
								<em class="fa fa-list"></em> <strong>Jadwal</strong>
							</a></div>
						</li>
					</ul>
				</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav><br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <center>
                            <h3>Selamat datang di website Pengurus Kota Taekwondo Mataram</h3>
                        </center>
                    </div>
                </div>                
            </div>                                    
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>		
                        </ol>
                
                        <!-- deklarasi carousel -->
                        <div class="carousel-inner">
                            <?php
                            $item_class = 'active';
                            foreach ($event as $e): 
                            ?>
                            <div class="item <?php echo $item_class; ?>">
                                <img src="<?php echo base_url('gambar/event/').$e->gambar; ?>" width="100%" alt="galeri1"/>
                                <div class="carousel-caption"> 
                                    <h2><a style="color: white;" href="<?php echo base_url('user_event'); ?>">Event</a></h2>
                                    <h4 style="color: white;"><?php echo $e->nama_event; ?></h4>
                                </div>
                            </div>
                            <?php  
                                $item_class = '';
                            endforeach;
                            ?>
                        </div>

                        <!-- membuat panah next dan previous -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div><br>
            <!-- 
            <div class="panel panel-container">
                <div class="row">
                    <div class="col-xs-6 col-md-4 col-lg-4 no-padding">
                        <div class="panel panel-teal panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-users color-blue"></em>
                                <div class="large">120</div>
                                <div class="text-muted">Anggota</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 col-lg-4 no-padding">
                        <div class="panel panel-blue panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-map-marker color-orange"></em>
                                <div class="large">52</div>
                                <div class="text-muted">Dojang</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 col-lg-4 no-padding">
                        <div class="panel panel-orange panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                                <div class="large">24</div>
                                <div class="text-muted">Pelatih</div>
                            </div>
                        </div>
                    </div>
                </div>/.row
            </div>             -->
        </div>

        <nav class="nav navbar-custom" style="bottom: 0;margin: 0" id="footer">
            <div class="container">	
                <ul class="nav navbar-nav">
                    <li><a href="#">&copy; Pengurus Kota Taekwondo Mataram - <?php $date = date('Y'); echo $date; ?></a></li>				
                </ul>
            </div>
        </nav>

        
		<!-- <script type="text/javascript">
			window.setTimeout(function(){
				$(".alert").fadeTo(500, 0).slideUp(500,
					function(){
						$(this).remove();
					});
			}, 4000);
		</script> -->

		<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>        
        <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
        
    </body>
</html>