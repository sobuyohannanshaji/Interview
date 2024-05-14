<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table            = 'product';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['product_name','product_price','product_description','product_price','user_id'];

}
