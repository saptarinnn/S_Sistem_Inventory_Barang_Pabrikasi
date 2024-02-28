<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Supplier;
use CodeIgniter\HTTP\ResponseInterface;

class SupplierController extends BaseController
{
    protected $validation, $suppliers, $datas;
    public function __construct()
    {
        $this->validation = Services::validation();
        $this->suppliers = new Supplier();
        $this->datas = [
            'main_title'    => 'Data Suppliers',
            'sub_title'     => 'Pages',
            'suppliers'     => $this->suppliers->findAll(),
            'validation'    => $this->validation,
        ];
    }
    public function index()
    {
        return view('master/supplier/index', $this->datas);
    }
    public function create()
    {
        return view('master/supplier/create', $this->datas);
    }
    public function save()
    {
        # validation
        $rules = [
            'name'  => ['required', 'is_unique[suppliers.name]'],
        ];
        # if validation fails
        if (!$this->validate($rules)) {
            return view('master/supplier/create', $this->datas);
        }
        # if validation is successful. save data to database
        $this->users->save([
            'name'  => trim($this->request->getVar('name')),
        ]);
        # set message and redirect to suppliers
        session()->setFlashdata("message", 'Data Created Successfully');
        return redirect()->to('suppliers');
    }
    public function edit($id)
    {
        $data = [
            'validation'    => Services::validation(),
            'main_title'    => 'Data Suppliers',
            'sub_title'     => 'Pages',
            'supplier'      => $this->suppliers->where('id', $id)->first(),
        ];
        return view('master/supplier/edit', $data);
    }
    public function update($id)
    {
        # validation
        $rules = [
            'name'  => ['required', 'is_unique[suppliers.name,id,{id}]'],
        ];
        # if validation fails
        if (!$this->validate($rules)) {
            $data = [
                'validation'    => Services::validation(),
                'main_title'    => 'Data Suppliers',
                'sub_title'     => 'Pages',
                'supplier'      => $this->suppliers->where('id', $id)->first(),
            ];
            return view('master/supplier/edit', $data);
        }
        # if validation is successful. update data in the database
        $this->users->update($id, [
            'name'  => trim($this->request->getVar('name')),
        ]);
        # set message and redirect to suppliers
        session()->setFlashdata("message", 'Data Saved Successfully');
        return redirect()->to('suppliers');
    }
    public function delete($id)
    {
        # delete data in the database
        $this->suppliers->where('id', $id)->delete();
        # set message and redirect to suppliers
        session()->setFlashdata('message', 'Data Deleted Successfully');
        return redirect()->to('suppliers');
    }
}
