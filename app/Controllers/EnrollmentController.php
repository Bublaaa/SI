<?php

namespace App\Controllers;

use App\Models\EnrollmentModel;
use App\Models\UserModel;
use App\Models\ClassModel;

class EnrollmentController extends BaseController
{
    public function index()
    {
        $model = new EnrollmentModel();
        $data['enrollments'] = $model->getEnrollments();
        return view('enrollments/index', $data);
    }

    public function create()
    {
        $userModel = new UserModel();
        $classModel = new ClassModel();
        $data['students'] = $userModel->where('status', 'student')->findAll();
        $data['classes'] = $classModel->findAll();
        return view('enrollments/create', $data);
    }

    public function store()
    {
        $rules = [
            'user_id' => 'required|is_not_unique[users.id]',
            'class_id' => 'required|is_not_unique[classes.id]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors())
                ->with('error', 'Please correct the errors below.');
        }

        $model = new EnrollmentModel();
        $model->save([
            'user_id' => $this->request->getPost('user_id'),
            'class_id' => $this->request->getPost('class_id'),
        ]);

        return redirect()->to('/enrollments')->with('success', 'Enrollment created successfully.');
    }

    public function edit($id)
    {
        $model = new EnrollmentModel();
        $userModel = new UserModel();
        $classModel = new ClassModel();
        $data['enrollment'] = $model->find($id);
        $data['students'] = $userModel->where('status', 'student')->findAll();
        $data['classes'] = $classModel->findAll();
        return view('enrollments/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'user_id' => 'required|is_not_unique[users.id]',
            'class_id' => 'required|is_not_unique[classes.id]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors())
                ->with('error', 'Please correct the errors below.');
        }

        $model = new EnrollmentModel();
        $model->update($id, [
            'user_id' => $this->request->getPost('user_id'),
            'class_id' => $this->request->getPost('class_id'),
        ]);

        return redirect()->to('/enrollments')->with('success', 'Enrollment updated successfully.');
    }

    public function delete($id)
    {
        $model = new EnrollmentModel();
        $model->delete($id);
        return redirect()->to('/enrollments')->with('success', 'Enrollment deleted successfully.');
    }
}
