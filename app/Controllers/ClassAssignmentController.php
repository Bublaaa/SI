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
        $data['assignments'] = $model->findAll();
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
        $model = new ClassAssignmentModel();
        $model->save([
            'user_id' => $this->request->getPost('user_id'),
            'class_id' => $this->request->getPost('class_id'),
        ]);
        return redirect()->to('/assignments');
    }
}
