<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<link rel="icon" href="<?php echo base_url(); ?>public/images/logoCode.png">
		<title>Crud Alunos</title>
		<link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet">
		<script src="<?php echo base_url(); ?>public/js/ie-emulation-modes-warning.js"></script>
		<?php 
			if(isset($styles)){
				foreach($styles as $style_name){
					$href = base_url() . "public/css/" . $style_name; ?>
					<link href="<?=$href?>" rel="stylesheet">
				<?php }
			}
		?>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-shrink navbar-fixed-top">
			<div class="container">
				<div class="navbar-header page-scroll">
					<a class="navbar-brand page-scroll logo"><img src="<?php echo base_url(); ?>public/images/logoCode.png" style="width: 40px;"></a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a class="page-scroll" href="<?php base_url(); ?>">Login</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>