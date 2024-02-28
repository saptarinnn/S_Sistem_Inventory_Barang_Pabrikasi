<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class UserController extends BaseController
{
    protected $validation, $users, $datas;
    public function __construct()
    {
        $this->validation = Services::validation();
        $this->users = new User();
        $this->datas = [
            'main_title'    => 'Data Users',
            'sub_title'     => 'Pages',
            'users'         => $this->users->findAll(),
            'roles'         => $this->users->roles(),
            'validation'    => $this->validation,
        ];
    }
    public function index()
    {
        return view('master/user/index', $this->datas);
    }
    public function create()
    {
        return view('master/user/create', $this->datas);
    }
    public function save()
    {
        # validation
        $rules = [
            'username'  => ['required', 'is_unique[users.username]'],
            'role'      => ['required'],
            'fullname'  => ['required'],
        ];
        # if validation fails
        if (!$this->validate($rules)) {
            return view('master/user/create', $this->datas);
        }
        # if validation is successful. save data to database
        $this->users->save([
            'username'  => trim($this->request->getVar('username')),
            'password'  => password_hash('qweasd123#', PASSWORD_BCRYPT),
            'role'      => trim($this->request->getVar('role')),
            'fullname'  => trim($this->request->getVar('fullname')),
        ]);
        # set message and redirect to users
        session()->setFlashdata("message", 'Data Created Successfully');
        return redirect()->to('users');
    }
    public function edit($id)
    {
        $data = [
            'validation'    => Services::validation(),
            'main_title'    => 'Data Users',
            'sub_title'     => 'Pages',
            'user'          => $this->users->where('id', $id)->first(),
            'roles'         => $this->users->roles(),
        ];
        return view('master/user/edit', $data);
    }
    public function update($id)
    {
        # validation
        $rules = [
            'username'  => ['required'],
            'role'      => ['required'],
            'fullname'  => ['required'],
        ];
        # if validation fails
        if (!$this->validate($rules)) {
            $data = [
                'validation' => Services::validation(),
                'main_title' => 'Data Users',
                'sub_title' => 'Pages',
                'user' => $this->users->where('id', $id)->first(),
            ];
            return view('master/user/edit', $data);
        }
        # if validation is successful. update data in the database
        $this->users->update($id, [
            'username'  => trim($this->request->getVar('username')),
            'role'      => trim($this->request->getVar('role')),
            'fullname'  => trim($this->request->getVar('fullname')),
        ]);
        # set message and redirect to users
        session()->setFlashdata("message", 'Data Saved Successfully');
        return redirect()->to('users');
    }
    public function delete($id)
    {
        # delete data in the database
        $this->users->where('id', $id)->delete();
        # set message and redirect to users
        session()->setFlashdata('message', 'Data Deleted Successfully');
        return redirect()->to('users');
    }
}
