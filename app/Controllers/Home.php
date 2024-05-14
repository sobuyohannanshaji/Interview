<?php

namespace App\Controllers;
use App\Models\User;

class Home extends BaseController
{
    public function index() 
    {
       return view('index');
    }

    public function signup(){
        return view('signup.php');
    }

    public function userstore(){
        $user = new User();
        $pass = $this->request->getPost('password');
        $password = password_hash($pass,PASSWORD_DEFAULT);
        $files = $this->request->getFile('image');
        if($files->isValid() && !$files->hasMoved()){
            $image = $files->getRandomName();
            $folder = ROOTPATH.'public/uploads/user';
            if(!is_dir($folder)){
                mkdir($folder,0777,true);
                $files->move('uploads/user/',$image);
                $data = [
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'phone' => $this->request->getPost('phone'),
                    'username' => $this->request->getPost('username'),
                    'password' => $password,
                    'image' => $image,
                ];
                $user->insert($data);
        
            }else{
                $files->move('uploads/user/',$image);
                $data = [
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'phone' => $this->request->getPost('phone'),
                    'username' => $this->request->getPost('username'),
                    'password' => $password,
                    'image' => $image,
                ];
                $user->insert($data);
        
            }
            }
            

            
            return redirect()->to(base_url('login'))->with('status','Successfully registered new user');
        }

    public function verify(){
        $user = new User();
        
        $check = $user->where('username',$this->request->getPost('username'))->first();
        if($check){
            $password = password_verify($this->request->getPost('password'),$check['password']);
            if($password){
                $ses_data['user'] = [
                    'user_id' => $check['id'],
                    'name' => $check['name'],
                    'logged_in' => TRUE
                ];
                session()->set($ses_data);
                return redirect()->to(base_url('user/dashboard'));
            }else{
                return redirect()->to(base_url('login'))->with('error','Incorrect Password');
            }
        }else{
            return redirect()->to(base_url('login'))->with('error','Incorrect Username');
        }
    }

    public function logout(){
        session()->remove('user');
        return redirect()->to(base_url('index'));
    }

    public function user(){
        $user = new User();
        $check = $user->where('username',$this->request->getPost('un'))->first();
        if($check){
           echo 1;
        }else{
            echo 0;
        }
    }
   
        

        

    
}
