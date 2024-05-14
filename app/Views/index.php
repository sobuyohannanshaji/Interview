<?= $this->extend('layout.php')?>
<?= $this->section('title');
	echo "Index";
	echo $this->endSection('title');?>


<?= $this->section('content')?>
<?php if(session()->getFlashdata('status')):?>
	<div class="alert alert-success"><?= session()->getFlashdata('status');?></div>
	<?php endif;?>
	<div class="row mt-5 pt-5">

		<div class="col-md-4 offset-md-4 ">
			<h2 class="text-center">Login</h2>
			<form method="post" enctype="multipart/form-data" class="form-control" action="<?= base_url('verify')?>">
				<input type="text" name="username" placeholder="Enter Username"  class="form-control" required>
				<input type="password" name="password" placeholder="Enter Password"  class="form-control mt-2"  required>
				<input type="submit" name="submit"  class="form-control mt-2 btn btn-primary">
				
			</form>
			<?php if(session()->getFlashdata('error')):?>
	<div class="alert alert-danger mt-3"><?= session()->getFlashdata('error');?></div>
	<?php endif;?>
			<p class="mt-2"> Don't have an account ?<a href="<?= base_url('signup')?>" class="text-decoration-none"> Sign up</a></p>
		</div>
	</div>
<?= $this->endSection('content')?>

