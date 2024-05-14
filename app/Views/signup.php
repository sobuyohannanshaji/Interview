<?php   echo $this->extend('layout.php');
        echo $this->section('title');
        echo 'Signup Page';
        echo $this->endSection('title');
        echo $this->section('content');
       
?>
<div class="row mt-5 pt-5">

<div class="col-md-4 offset-md-4">
    <h2 class="text-center">Sign Up Page</h2>
    <form method="post" enctype="multipart/form-data" class="form-control" action="<?= base_url('userstore')?>">
        <input type="text" name="name" placeholder="Enter name"  class="form-control mt-2" required>
        <input type="text" name="phone" placeholder="Enter phone"  class="form-control mt-2" required>
        <input type="email" name="email" placeholder="Enter email"  class="form-control mt-2" required>
        <input type="file" name="image"  class="form-control mt-2" accept="image/*" >
        <input type="text" name="username" placeholder="Enter Username"  class="form-control mt-2" required>
        <input type="password" name="password" placeholder="Enter Password"  class="form-control mt-2" required>
        <input type="submit" name="submit"  class="form-control mt-2 btn btn-primary bt">
        <p class="error text-danger"></p>
        
    </form>
    <p class="mt-2">Have an account ?<a href="<?= base_url('login')?>" class="text-decoration-none"> login</a></p>
</div>
</div>
<?= $this->endSection('content')?>
