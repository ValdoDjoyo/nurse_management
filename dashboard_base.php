<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<meta charset="utf-8">
	<!--<link rel="stylesheet" type="text/css" href="<?php /*echo base_url("assets/bootstrap/css/bootstrap.css");*/?>"/>-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css");?>">
	<!--<link rel="stylesheet" type="text/css" href="<?php /*echo base_url("assets/bootstrap/css/dataTables.bootstrap.min.css");*/?>">-->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/site_accueil.css");?>" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script src="<?php echo base_url("assets/javascript/jquery.js");?>"></script>
    <script src="<?php echo base_url("assets/javascript/menu_deroulant.js");?>"></script>
    <!--<script src="<?php /*echo base_url("assets/javascript/jquery.dataTables.min.js");?>"></script>
    <script src="<?php echo base_url("assets/javascript/dataTables.bootstrap.min.js");*/?>"></script>-->
	<script src="<?php echo base_url("assets/bootstrap/js/jQuery.js");?>"></script>
	<script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js");?>"></script>
	 <!-- pour IE : -->
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">  
	<!-- pour les mobiles : -->    
	<meta name="viewport" content="width=device-width, initialscale=1"> 
	<!-- pour IE 8 -->
	<!--[if lt IE 9]>
		<script src="../../assets/bootstrap/js/bootstrap.js"></script>
		<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
	<![endif]--> 
	<style type="text/css">
		#mon_heure
		{
			font-size: 20px;
			border-radius: 5px;
			border: solid 1px grey;
			display: inline;
			padding: 4px;
			color: white;
			margin-top: 10px;
		}
		.list-group .list-group-item
		{
			background-color: #333333; 
			color:white;
		}
		#arborescence
		{
			font-size: 1.5em;
			font-family: "Trebuchet MS","Times New Roman",Arial,serif;
			padding-top: 5px;
			padding-bottom: 5px;
			border-bottom: 1px solid gray;
		}
		table td
		{
			font-size: 1.1em;
			font-family: "Times New Roman",Arial,serif;
			padding-top: 7px;
			padding-bottom: 2px;
			border-bottom: 1px solid gray;
		}
		.tab_projets table
		{
			border-collapse:collapse;
			text-align: center;
  			margin: auto;
		}
		.tab_projets table td
		{
			border: 1px solid #ddd;
  			padding: 6px;
		}
		.tab_projets table tr:nth-child(even){background-color: #fdfdfd;}
		.tab_projets table tr:hover {background-color: #fdfdfd;}
		.tab_projets table th {
			padding: 6px;
			padding-top: 8px;
			padding-bottom: 8px;
			text-align: center;
			background-color: #012704;
			color: white;
			border: 1px solid #ddd;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<header>
			<div class="row">
				<div class="col-lg-12">
					<nav class="navbar navbar-inverse justify-content-end"  style="margin: 0px; background: url('<?php echo base_url("assets/image/bg.jpg");?>') repeat;">
						<div class="row">
							<div class="col-lg-1 col-xs-2 col-sm-1">
								<div class="navbar-header">
									<img src="<?php echo base_url("assets/image/logo.png");?>" alt="logo" style="height: 70px; padding-top: 10px; margin-left: 15px;" />
								</div>
								<!--<a type="button" href="#menu" class="btn btn-default" data-toggle="collapse"> onclick="visibilite('menu');"
									<span class="sr-only">Menu</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</a>-->
							</div>
							<div class="col-lg-1 col-sm-3 col-xs-5">
								<h2 style="color:white/*#34db0d*/; font-size: 2.5em; font-weight: bold; font-family: 'Times New Roman',Arial,serif;"> SyGePa</h2>
							</div>
							<div class="col-lg-offset-2 col-lg-1 col-sm-offset-1 col-sm-1 col-xs-1">
							</div>
							<div class="col-lg-7 col-sm-6 col-xs-5 pull-right">
								<div class="row">
									<div class="col-lg-11 col-sm-11 col-xs-11" style="margin-top: 20px;">
										<h1 id="mon_heure"></h1>
										<script type="text/javascript">
											function getTime()
											{
												var date= new Date();
												var heure=date.getHours();
												var minutes=date.getMinutes();
												var secondes=date.getSeconds();
												heure=((heure<10)?"0":"")+heure;
												minutes=((minutes<10)?" : 0":" : ")+minutes;
												secondes=((secondes<10)?" : 0":" : ")+secondes;
												var mon_heure=document.getElementById("mon_heure");
												mon_heure.textContent=heure+minutes+secondes;
												setTimeout("getTime()",1000);
											}
											getTime();
										</script>
										<a class="btn btn-danger pull-right" href="<?php echo site_url('Accueil/deconnexion'); ?>" >
								 			Quitter &nbsp &nbsp<span class="glyphicon glyphicon-off"></span>
										</a><br/>
									</div>
								<div class="col-lg-1 col-sm-2 col-xs-3 pull-right">
									<h4 >
										<a href="<?php echo site_url('Dashboard_admin/verrouiller_session'); ?>">
											<span class="glyphicon glyphicon-lock" style="color: white;margin-right: 5px;">		
											</span>
										</a>
									</h4>
								</div>
								<div class="col-lg-1 col-sm-1 col-xs-2 pull-right" > 
									<h4>
										<span class="glyphicon glyphicon-question-sign" style="color: white;margin-right: 5px;">			
										</span>
									</h4>
								</div>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</header>
		<session>
			<div class="row" style="width: 100%; margin:auto;">
				<?php 
					if(isset($menu))
					{
						echo $menu;
					}
				?>
					<?php 
						if(isset($contenu))
						{
							echo $contenu;
						}
					?>
			</div>
		</session>
		
		<!-- Mon footer -->
		<footer>
	        <div class="row">
	        	<div class="col-sm-12">
	                Copyright &copy 2020 <a href="https://www.agribusiness.com">Agri-Business SA</a>
	            </div>
	        </div>
		</footer>
	</div>
</body>
</html>
<script type="text/javascript" language="javascript">
	$(document).ready(function()
	{
		var dataTable=$('#user_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":
			{
				url:"<?php echo site_url('personnel/chercher_membre'); ?>",
				type:"POST"
			},
			"columnDefs":
			[
				{
					"targets":[0,4,5,6,7,8],
					"orderable":false, 
				}
			]
		});
	});
	$(document).ready(function()
	{
		var dataTable=$('#compte_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":
			{
				url:"<?php echo site_url('gestion_compte/chercher_compte'); ?>",
				type:"POST"
			},
			"columnDefs":
			[
				{
					"targets":[2,4,5],
					"orderable":false, 
				}
			]
		});
	});
	$(document).ready(function()
	{
		var dataTable=$('#annonce_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":
			{
				url:"<?php echo site_url('annonce/chercher_annonce'); ?>",
				type:"POST"
			},
			"columnDefs":
			[
				{
					"targets":[4,5,6],
					"orderable":false, 
				}
			]
		});
	});
</script>