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
        $model = new ClassModel();
        $model->save([
            'class_name' => $this->request->getPost('class_name'),
            'description' => $this->request->getPost('description'),
        ]);
        return redirect()->to('/class');
    }

    public function edit($id)
    {
        $model = new ClassModel();
        $data['class'] = $model->find($id);
        return view('classes/edit', $data);
    }

    public function update($id)
    {
        $model = new ClassModel();
        $model->update($id, [
            'class_name' => $this->request->getPost('class_name'),
            'description' => $this->request->getPost('description'),
        ]);
        return redirect()->to('/class');
    }

    public function delete($id)
    {
        $model = new ClassModel();
        $model->delete($id);
        return redirect()->to('/class');
    }
}
