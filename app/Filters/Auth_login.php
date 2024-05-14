<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ReponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth_login implements FilterInterface{
    public function before(RequestInterface $request,$arguement = null){
        if(! session()->get('user')['logged_in']){
            return redirect()->to('index');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguement = null){

    }
}
?>