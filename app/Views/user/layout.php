<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $this->renderSection('title');?></title>
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<a class="navbar-brand ms-5">Ec</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" >
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
		<ul class="navbar-nav me-5">
			
			<li class="nav-item">
				<a href="<?= base_url('logout')?>" class="nav-link fw-bold">Logout</a>
			</li>
		</ul>
		</div>
		
	</nav>
<div class="container-fluid mt-5 mb-5">
<?= $this->renderSection('content');?>
</div>
</body>
<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/popper.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/jquery.js')?>"></script>
</html>