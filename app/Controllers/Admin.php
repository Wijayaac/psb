<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RegisterModel;

class Admin extends BaseController
{
    protected $userModel;
    protected $registerModel;
    protected $db;
    public function __construct()
    {
        $this->session = session();
        $this->registerModel = new RegisterModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {

        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }
        if ($this->session->get('role') != 1) {
            return redirect()->to('/user');
        }

        return view('admin/index');
    }
    public function registration()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }
        if ($this->session->get('role') != 1) {
            return redirect()->to('/user');
        }

        $query = $this->db->query("SELECT id,username FROM `user` WHERE role = 2");
        $results = $query->getResultArray();
        $data = [
            'users' => $results,
        ];
        return view('admin/registration', $data);
    }
    public function detail($id)
    {
        $query = $this->db->query("SELECT id,username, photo, name FROM `user` WHERE id = " . $id . "");
        $result = $query->getResultArray();
        $data = [
            'user' => $result,
        ];
        return view('admin/user', $data);
    }
    public function status()
    {
        $query = $this->db->query("SELECT register.id as id, register.name as name, school.name as school ,status FROM `register` LEFT JOIN school ON register.school = school.id");
        $results = $query->getResultArray();

        $data = [
            'registers' => $results
        ];

        return view('admin/status', $data);
    }
    public function change($id)
    {
        $data = [
            'id'  => $id,
        ];
        return view('admin/edit', $data);
    }
    public function update()
    {
        $id = $this->request->getVar('id');
        $status = $this->request->getVar('status');
        $data = [
            'status' => $status,
        ];
        $this->registerModel->update($id, $data);
        $response = [
            'result'   => 1,
            'message'   => "Status has been updated"
        ];
        return $this->response->setJSON($response);
    }
    public function profile()
    {
        $id = session()->get('id');
        $data = [
            'id' => $id,
            'user' => $this->userModel->find($id),
        ];

        return view('admin/profile', $data);
    }
    public function save()
    {
        $profileId          = $this->request->getVar('id');
        $profileName        = $this->request->getVar('name');

        $oldData = $this->userModel->find($profileId);
        $oldImage = $oldData['photo'];
        $isValid = $this->validate([
            'photo' => [
                'rules' => 'max_size[photo,1024]|is_image[photo]|mime_in[photo,image/jpeg,image/png,image/jpg]',
                'errors' => [
                    'max_size' => 'Maximum upload 1024 KB',
                    'is_image' => 'Please input an Image (jpg/png)',
                    'mime_in'  => 'Please input an Image (jpg/png)',
                ]
            ],
        ]);
        if ($isValid) {
            $imageFile = $this->request->getFile('photo');

            if ($imageFile->getError() === 4) {
                $imageName = $oldImage;
            } else if ($oldImage != 'untitled.png') {
                $imageName = rand() . '.' . $imageFile->guessExtension();
                $imageFile->move('uploads/photo/', $imageName);
            } else {
                $imageName = rand() . '.' . $imageFile->guessExtension();
                $imageFile->move('uploads/photo/', $imageName);
            }
            $data = [
                'name' => $profileName,
                'photo' => $imageName,
            ];
            $this->userModel->update($profileId, $data);
            $response = [
                'status' => 204,
                'message' => "Profile are updated"
            ];
        } else {
            $response = [
                'status' => 404,
                'message' => [
                    'errorPhoto'  => $this->validator->getError('photo'),
                ],
                'data' => [
                    'name' => $profileName
                ]
            ];
        }
        return $this->response->setJSON($response);
    }
}
