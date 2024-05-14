<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Product;
use App\Models\ProductGallery;

class Guest extends BaseController
{
    public function index()
    {
        $count = 0 ;
        $cart = session()->get('cart');
        if(!empty($cart)){
            $count = count($cart);
            // $data = []; 
        }
        $product = new Product();
        $productGallery = new ProductGallery();
        $data = [
            'products' => $product->findAll(),
            'images'   => $productGallery->findAll(),
            'count'    => $count,
            'carts' => $cart,
        ];

        return view('guest/index',$data);
    }
    public function cart_add(){

        $id = $this->request->getPost('id');
        $qty = $this->request->getPost('qty');

        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [];
        }

        if (isset($cart[$id])) {
            $cart[$id]['qty'] = $qty;
        } else {
            $cart[$id] = [
                'id' => $id,
                'qty' => $qty
            ];
        }

        session()->set('cart', $cart);

        
    }

    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->set('cart', $cart);

        return redirect()->back()->with('status', 'Product removed from cart');
    }

    public function cart()
    {
        $product = new Product();
        $count = 0 ;
        
        $cart = session()->get('cart');

        if(!empty($cart)){
            $count = count($cart);
        }
        $data = [
            'cart' => $cart , 
            'product' => $product->findAll(),
            'count' => $count,
        ];
        return view('guest/cart', $data);
    }
}
