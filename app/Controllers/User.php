<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Product;
use App\Models\ProductGallery;

class User extends BaseController
{
    public function index()
    {
        $product = new Product();
        $productGallery = new ProductGallery();
        $data = [
            'products' => $product->where('user_id',session()->get('user')['user_id'])->findAll(),
            'images'   => $productGallery->findAll(),
        ];

        return view('user/index',$data);
    }
    public function productstore(){
        $product = new Product();
        $productGallery = new ProductGallery();
        $data = [
            'product_name'        => $this->request->getPost('name'),
            'product_description' => $this->request->getPost('description'),
            'product_price'       => $this->request->getPost('price'),
            'user_id'             => session()->get('user')['user_id'],
        ];
        $product->insert($data);
        $id = $product->getInsertID();
        $files = $this->request->getFileMultiple('images');
        foreach($files as $file){
            if($file->isValid() && ! $file->hasMoved()){
                $image = $file->getRandomName();
                $folder = ROOTPATH.'public/uploads/product';
                if(!is_dir($folder)){
                    mkdir($folder,0777,true);
                    $file->move('uploads/product/',$image);
                    $data_g = [
                        'product_id' => $id,
                        'image'      => $image,
                    ];
                    $productGallery->save($data_g);
                }else{
                    $file->move('uploads/product/',$image);
                    $data_g = [
                        'product_id' => $id,
                        'image'      => $image,
                    ];
                    $productGallery->save($data_g);
                }
            }
        }

        return redirect()->to(base_url('user/dashboard'))->with('status','Product added successfully');
        
    }
    public function delete($id){
        $product = new Product();
        $productGallery = new ProductGallery();

        $g = $productGallery->where('product_id',$id)->findAll();
        foreach($g as $gallery){
            if(file_exists('uploads/product/'.$gallery['image'])){
                unlink('uploads/product/'.$gallery['image']);
                $product->delete($id);
                $productGallery->where('product_id', $id)->delete();
        }
    }
        
        
        return redirect()->to(base_url('user/dashboard'))->with('status','Product Deleted successfully');
    }
}
