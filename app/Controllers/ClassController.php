<?php

namespace App\Controllers;

use App\Models\ClassModel;

class ClassController extends BaseController
{
    public function index()
    {
        $model = new ClassModel();
        $data['classes'] = $model->findAll();
        return view('classes/index', $data);
    }

    public function create()
    {
        return view('classes/create');
    }

    public function store()
    {
        $rules = [
            'class_name' => 'required|is_unique[classes.class_name]',
            'description' => 'permit_empty|string'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors())
                ->with('error', 'Class name already exist.');
        }

        $model = new ClassModel();
        $model->save([
            'class_name' => $this->request->getPost('class_name'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to('/class')->with('success', 'Class created successfully.');
    }

    public function edit($id)
    {
        $model = new ClassModel();
        $data['class'] = $model->find($id);
        return view('classes/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'class_name' => "required|is_unique[classes.class_name,id,{$id}]",
            'description' => 'permit_empty|string'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors())
                ->with('error', 'Please correct the errors below.');
        }

        $model = new ClassModel();
        $model->update($id, [
            'class_name' => $this->request->getPost('class_name'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to('/class')->with('success', 'Class updated successfully.');
    }

    public function delete($id)
    {
        $model = new ClassModel();
        $model->delete($id);
        return redirect()->to('/class')->with('success', 'Class deleted successfully.');
    }
}
