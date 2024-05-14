<?= $this->extend('guest/layout.php')?>
<?= $this->section('title');
	echo "Cart";
	echo $this->endSection('title');?>


<?= $this->section('content')?>
<?php if(session()->getFlashdata('status')):?>
	<div class="alert alert-success"><?= session()->getFlashdata('status');?></div>
	<?php endif;?>
		<div class="row pt-5">
			<div class="col-md-9">
				<h4>My Cart</h4>
			</div>
		</div>
<div class="col-md-12 mt-5" style="overflow-x:auto;">
			<?php if($cart):?>
			<table class="table table-striped"  >
				<thead>
				<tr>
					<th>Sl No</th>
					<th>Name</th> 
					<th>Qty</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
					<?php 
					      $n = 1;
						foreach($cart as $c):
                         foreach($product as $p):
                         if($p['id'] == $c['id']):?>
					<tr>
					<td>
						<?= $n;?>
					</td>
					<td>
						<?= $p['product_name'];?>
					</td>
					<td class="text-wrap">
						<?= $c['qty'];?>
					</td>
					<td>
						<?= $p['product_price'] * $c['qty'];?>
					</td>
					<td>
						<a href="<?= base_url('cart-remove/'.$p['id'])?>" class="btn btn-danger">Remove</a>
					</td>
					</tr>
					<?php $n++;
				endif;endforeach;endforeach;?>
                 <tr>
                    <th colspan="3" class="text-center">Total</th>
                    <th><?php $amt = 0;
                     foreach($cart as $c){
                         foreach($product as $p){
                         if($p['id'] == $c['id']){
                            $amt += ($p['product_price'] * $c['qty']);
                         }
                         }}
                         echo $amt; ?></t>
                </tr>
				</tbody>
			</table>
			<?php else:
					echo 'No product found';
					endif;?>
		</div>
        <?= $this->endSection('content')?>