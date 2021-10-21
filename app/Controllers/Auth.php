<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();

        $this->validation = \Config\Services::validation();

        $this->session = \Config\Services::session();
    }

    public function login()
    {
        $user = session()->get('role');
        if ($user == 1) {
            return redirect()->to('/admin/index');
        }
        if ($user == 2) {
            return redirect()->to('/user/index');
        }

        return view('auth/login');
    }
    public function register()
    {
        return view('auth/register');
    }
    public function validRegister()
    {
        $data = $this->request->getPost();
        $this->validation->run($data, 'register');
        $errors = $this->validation->getErrors();

        if ($errors) {
            session()->setFlashdata('error', $errors);
            return redirect()->to('/auth/register');
        }

        $salt = uniqid('', true);
        $password = md5($data['password']) . $salt;

        $this->userModel->save([
            'username' => $data['username'],
            'password' => $password,
            'salt' => $salt,
            'role' => 2
        ]);

        session()->setFlashdata('login', 'Thank you for the registration, please login in here');
        return redirect()->to('/auth/login');
    }

    public function validLogin()
    {
        $data = $this->request->getPost();
        $user = $this->userModel->where('username', $data['username'])->first();

        if ($user) {
            if ($user['password'] == md5($data['password']) . $user['salt']) {
                $sessionLogin = [
                    'isLogin' => true,
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                ];
                $this->session->set($sessionLogin);
                if ($user['role'] == 1) {
                    return redirect()->to('/admin/index');
                } else {
                    return redirect()->to('/user/index');
                }
            } else {
                session()->setFlashdata('password', 'Incorrect password');
                return redirect()->to('/auth/login');
            }
        } else {
            session()->setFlashdata('username', 'Invalid username, there is no username like yours');
            return redirect()->to('/auth/login');
        }
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/auth/login');
    }
}
