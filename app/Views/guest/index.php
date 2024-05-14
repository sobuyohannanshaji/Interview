<?= $this->extend('guest/layout.php')?>
<?= $this->section('title');
	echo "Guest Dashboard";
	echo $this->endSection('title');?>


<?= $this->section('content')?>
		<div class="row pt-5">
			<div class="col-md-9">
				<h4>Products</h4>
			</div>
		</div>

		<div class="row mt-5">
		<?php if($products):?>
		
			<?php foreach($products as $pro):?>
		<div class="col-md-2">
			<div class="card" style="width: 18rem;">
				<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="min-height :200px;">
					<div class="carousel-inner">
						<?php if($images):
							
								foreach($images as $img):
								if($img['product_id'] == $pro['id']):
									$i = 0;?>
						<div class="carousel-item <?php if($i == 0){echo "active";}?>">
							<img src="<?= base_url('uploads/product/'.$img['image'])?>" class="card-img-top" width="150px" height="150px" alt="Image <?= $i+1;?>">
						</div>
						<?php $i++;endif;endforeach;endif;?>
						
					</div>
					
				</div>

						<div class="card-body">
							<h5 class="card-title"><?= $pro['product_name']?></h5>
							<p class="card-text"><?= $pro['product_description']?>.</p>
							<h3><?= $pro['product_price']?></h3>
							<?php $nm = 0;
							if(!empty($carts)):
							foreach($carts as $c):
							if($c['id'] == $pro['id']):
							$nm = 1;
							?>
							<div class="counter-container">
								<button class="counter-button decrementCount1" data-id="<?= $pro['id']?>">-</button>
								<input type="text" class="productCount1" value="<?= $c['qty']?>">
								<button class="counter-button incrementCount1" data-id="<?= $pro['id']?>">+</button>
							</div>
							<a href="<?= base_url('cart-remove/'.$c['id'])?>" class="btn btn-danger " >Remove from cart</a>
							<?php 
							endif;endforeach;endif;

							if($nm == 0):
							?>
							<div class="counter-container">
								<button class="counter-button decrementCount">-</button>
								<input type="text" class="productCount" value="1">
								<button class="counter-button incrementCount">+</button>
							</div>
							<a href="" class="btn btn-success cart" data-id="<?= $pro['id']?>">Add to cart</a>
							<?php endif;?>
						</div>
				</div>
			</div>
			<?php endforeach;?>
		</div>
		<?php endif;?>
		
<?= $this->endSection('content')?>

