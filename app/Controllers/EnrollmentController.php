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
        $data['enrollments'] = $model->findAll();
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
        $model = new EnrollmentModel();
        $model->save([
            'user_id' => $this->request->getPost('user_id'),
            'class_id' => $this->request->getPost('class_id'),
        ]);
        return redirect()->to('/enrollments');
    }
}
