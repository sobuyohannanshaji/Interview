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
				<a href="<?= base_url('index')?>" class="nav-link fw-bold">Index</a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url('login')?>" class="nav-link fw-bold">User login</a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url('cart')?>" class="nav-link fw-bold ">Cart
				<span class="span"><?= $count;?></span></a>
				<style>
					.span{
						position:fixed;
						top:0;
						right:30;
						background-color:red;
						color:white;
						padding:3px 9px;
						border-radius:50%;
					}
					.counter-container {
						display: flex;
						align-items: center;
						margin-bottom:5px;
					}
					.counter-button {
						padding: 4px 8px;
						font-size: 16px;
						cursor: pointer;
					}
					.productCount {
						margin: 0px 15px;
						font-size: 16px;
						width:25px;
						border:none;
					}
					.counter-container1 {
						display: flex;
						align-items: center;
						margin-bottom:5px;
					}
					.counter-button1 {
						padding: 4px 8px;
						font-size: 16px;
						cursor: pointer;
					}
					.productCount1 {
						margin: 0px 15px;
						font-size: 16px;
						width:25px;
						border:none;
					}
				</style>
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
<script>
	$('.incrementCount1').on('click',function(){
			var count = $(this).closest('.counter-container').find('.productCount1').val();
			count++;
			$(this).closest('.counter-container').find('.productCount1').val(count);
			var id = $(this).data('id');
			$.ajax({
				type: "POST",
				url: "<?= base_url('cart-add'); ?>",
				data: { 'id': id,  'qty': count },
				success: function (response) {
					location.reload();
					console.log(response);
				}
			});
			// alert(id);
		});

		$('.decrementCount1').on('click',function(){
            var count = $(this).closest('.counter-container').find('.productCount1').val();
			if(count > 1){
				count --;
			}
			$(this).closest('.counter-container').find('.productCount1').val(count);
			var id = $(this).data('id');
			$.ajax({
				type: "POST",
				url: "<?= base_url('cart-add'); ?>",
				data: { 'id': id,  'qty': count },
				success: function (response) {
					location.reload();
					console.log(response);
				}
			});
			// alert(count);
        });
        $('.incrementCount').on('click',function(){
			var count = $(this).closest('.counter-container').find('.productCount').val();
			count++;
			$(this).closest('.counter-container').find('.productCount').val(count);
		});

		$('.decrementCount').on('click',function(){
            var count = $(this).closest('.counter-container').find('.productCount').val();
			if(count > 1){
				count --;
			}
			$(this).closest('.counter-container').find('.productCount').val(count);
        });
		$('.cart').on('click', function () {
			var id = $(this).data('id');
			var qty = $(this).closest('.card-body').find('.productCount').val();
			$.ajax({
				type: "POST",
				url: "<?= base_url('cart-add'); ?>",
				data: { 'id': id,  'qty': qty },
				success: function (response) {
					location.reload();
					console.log(response);
				}
			});
		});

    </script>
</html>