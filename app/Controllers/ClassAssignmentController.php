<?php

namespace App\Controllers;

use App\Models\ClassAssignmentModel;
use App\Models\UserModel;
use App\Models\ClassModel;

class ClassAssignmentController extends BaseController
{
    public function index()
    {
        $model = new ClassAssignmentModel();
        $data['assignments'] = $model->getAssignments();  
        return view('assignments/index', $data);
    }

    public function create()
    {
        $userModel = new UserModel();
        $classModel = new ClassModel();
        $data['teachers'] = $userModel->where('status', 'teacher')->findAll();
        $data['classes'] = $classModel->findAll();
        return view('assignments/create', $data);
    }

    public function store()
    {
        $rules = [
            'user_id' => 'required|numeric|is_not_unique[users.id]',
            'class_id' => 'required|numeric|is_not_unique[classes.id]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors())
                ->with('error', 'Please correct the errors below.');
        }
        
        $model = new ClassAssignmentModel();
        $model->save([
            'user_id' => $this->request->getPost('user_id'),
            'class_id' => $this->request->getPost('class_id'),
        ]);

        return redirect()->to('/assignments')->with('success', 'Class Assignment created successfully.');
    }

    public function edit($id)
    {
        $model = new ClassAssignmentModel();
        $userModel = new UserModel();
        $classModel = new ClassModel();
        
        $data['assignment'] = $model->find($id);
        $data['teachers'] = $userModel->where('status', 'teacher')->findAll();
        $data['classes'] = $classModel->findAll();
        
        return view('assignments/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'user_id' => 'required|numeric|is_not_unique[users.id]',
            'class_id' => 'required|numeric|is_not_unique[classes.id]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors())
                ->with('error', 'Please correct the errors below.');
        }

        $model = new ClassAssignmentModel();
        $model->update($id, [
            'user_id' => $this->request->getPost('user_id'),
            'class_id' => $this->request->getPost('class_id'),
        ]);

        return redirect()->to('/assignments')->with('success', 'Class Assignment updated successfully.');
    }

    public function delete($id)
    {
        $model = new ClassAssignmentModel();
        $model->delete($id);
        return redirect()->to('/assignments')->with('success', 'Class Assignment deleted successfully.');
    }
}
