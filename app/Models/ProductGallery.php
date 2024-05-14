<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductGallery extends Model
{
    protected $table            = 'product_gallery';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['product_id','image'];
}
