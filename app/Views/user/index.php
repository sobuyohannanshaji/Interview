<?= $this->extend('user/layout.php')?>
<?= $this->section('title');
	echo "User Dashboard";
	echo $this->endSection('title');?>


<?= $this->section('content')?>
<?php if(session()->getFlashdata('status')):?>
	<div class="alert alert-success"><?= session()->getFlashdata('status');?></div>
	<?php endif;?>
		<div class="row pt-5">
			<div class="col-md-9">
				<h4>My Products</h4>
			</div>
			<div class="col-md-3">
				<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#product">Add Product</button>
			</div>
		</div>

		<div class="col-md-12 mt-5" style="overflow-x:auto;">
			<?php if($products):?>
			<table class="table table-striped"  >
				<thead>
				<tr>
					<th>Sl No</th>
					<th>Name</th>
					<th>Description</th>
					<th>Price</th>
					<th>Images</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
					<?php 
					      $n = 1;
						foreach($products as $product):?>
					<tr>
					<td>
						<?= $n;?>
					</td>
					<td>
						<?= $product['product_name'];?>
					</td>
					<td class="text-wrap">
						<?= $product['product_description'];?>
					</td>
					<td>
						<?= $product['product_price'];?>
					</td>
					<td>
						<?php if($images){
							foreach($images as $image){
								if($image['product_id'] == $product['id']){
									echo '
									<img src="'.base_url('uploads/product/'.$image['image']).'" class="ms-2" width="30px">';
								}
							}
						}?>
					</td>
					<td>
						<a href="<?= base_url('user/delete/'.$product['id'])?>" class="btn btn-danger">Delete</a>
					</td>
					</tr>
					<?php $n++;
				endforeach;?>
				</tbody>
			</table>
			<?php else:
					echo 'No product found';
					endif;?>
		</div>
	</div>

	<div class="modal fade" tabIndex="-1" role="dialog" id="product">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Product</h5>
        				<button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      			</div>
      			<div class="modal-body">
        			<div class="row">
						<div class="col-md-12">
							<form action="<?= base_url('user/productstore')?>" method="POST" enctype="multipart/form-data">
								<input type="text" name="name" placeholder="Enter Title" class="form-control mt-2" id="" required>
								<input type="text" name="price" placeholder="Enter Price" class="form-control mt-2" id="" required>
								<input type="file" name="images[]" class="form-control mt-2" required multiple>
								<textarea name="description" id="" class="form-control mt-2" placeholder="description" required></textarea>
								<input type="submit" name="submit" class="form-control btn btn-danger mt-2">
							</form>
						</div>
					</div>
      			</div>
			</div>
		</div>
	</div>
<?= $this->endSection('content')?>

