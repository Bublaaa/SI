<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('users/index', $data);
    }

    public function create()
    {
        return view('users/create');
    }

    public function store()
    {
        $rules = [
            'name' => 'required|is_unique[users.name]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'status' => 'required|in_list[student,teacher]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors())
                ->with('error', 'Please correct the errors below.');
        }

        $model = new UserModel();
        $model->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/users')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        return view('users/edit', $data);
    }

    public function update($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        $rules = [
            'name' => "required|is_unique[users.name,id,{$id}]",
            'email' => "required|valid_email|is_unique[users.email,id,{$id}]",
            'status' => 'required|in_list[student,teacher]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors())
                ->with('error', 'Please correct the errors below.');
        }

        $model->update($id, [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/users')->with('success', 'User updated successfully.');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/users')->with('success', 'User deleted successfully.');
    }
}
