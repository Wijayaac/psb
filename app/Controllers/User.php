<?php

namespace App\Controllers;

use App\Models\SchoolModel;
use App\Models\RegisterModel;

class User extends BaseController
{
    protected $schoolModel;
    protected $registerModel;
    protected $db;

    public function __construct()
    {
        $this->registerModel = new RegisterModel();
        $this->schoolModel = new SchoolModel();
        $this->session = session();
    }

    public function index()
    {

        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }
        if ($this->session->get('role') != 2) {
            return redirect()->to('/admin');
        }

        return view('user/index');
    }
    public function registration()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }
        if ($this->session->get('role') != 2) {
            return redirect()->to('/admin');
        }
        $data = [
            'id' => $this->session->get('id'),
            'schools' => $this->schoolModel->findAll(),
        ];
        return view('user/registration', $data);
    }
    public function signUp()
    {
        if ($this->request->isAJAX()) {

            $isValid = $this->validate([
                'transcript' => [
                    'rules' => 'max_size[transcript,1024]|mime_in[transcript,application/pdf]',
                    'errors' => [
                        'max_size' => 'Maximum upload 1024 KB',
                        'mime_in'  => 'Please input an Doc (pdf)',
                    ]
                ]
            ]);

            $id = rand();
            $userId = $this->session->get('id');
            $name = $this->request->getVar('name');
            $school = $this->request->getVar('school');
            $city = $this->request->getVar('city');
            $code = $this->request->getVar('code');
            $address = $this->request->getVar('address');
            if ($isValid) {
                $transcriptFile = $this->request->getFile('transcript');

                if ($transcriptFile->getError() == 4) {
                    $transcriptName = 'untitled.pdf';
                } else {
                    $transcriptName = $id . '.' . $transcriptFile->guessExtension();
                    $transcriptFile->move('uploads/', $transcriptName);
                }
                $data = [
                    'id' => $id,
                    'name' => $name,
                    'user_id' => $userId,
                    'city' => $city,
                    'address' => $address,
                    'code' => $code,
                    'school' => $school,
                    'status' => 3,
                    'transcript' => $transcriptName,
                ];
                $this->registerModel->insert($data);
                $response = [
                    'status' => 204,
                    'message' => 'Registration success,please wait the announcement',
                ];
            } else {
                $response = [
                    'result'   => 404,
                    'message'   => [
                        'errorTranscript'        => $this->validator->getError('transcript'),
                    ],
                    'data'                  => [
                        'address'            => $address,
                    ]
                ];
            }
            return $this->response->setJSON($response);
        } else {
            $response = 'unauthorized method call';
            return $response;
        }
    }
    public function status()
    {


        $userId = $this->session->get('id');
        $query = $this->db->query("SELECT register.id as id,register.name as name, school.name as school, city,code,register.created_at as date,status FROM register LEFT JOIN school ON register.school = school.id WHERE user_id = " . $userId . "");
        $results = $query->getResultArray();
        $data = [
            'registers' =>  $results,
        ];
        return view('user/status', $data);
    }
    public function print($id)
    {

        $query = $this->db->query("SELECT register.id as id, register.name as name, school.name as school, city, address, code,status FROM register LEFT JOIN school ON register.school = school.id WHERE register.id = " . $id . "");
        $result = $query->getResultArray();

        $data = [
            'register' => $result,
        ];
        return view('user/print', $data);
    }
}
