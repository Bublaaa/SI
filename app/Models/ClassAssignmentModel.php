<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassAssignmentModel extends Model
{
    protected $table = 'class_assignments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'class_id'];

    public function getAssignments()
    {
        return $this->select('class_assignments.*, users.name AS teacher_name, classes.class_name')
            ->join('users', 'users.id = class_assignments.user_id')
            ->join('classes', 'classes.id = class_assignments.class_id')
            ->findAll();
    }
}

