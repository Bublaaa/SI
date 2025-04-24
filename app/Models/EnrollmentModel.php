<?php

namespace App\Models;

use CodeIgniter\Model;

class EnrollmentModel extends Model
{
    protected $table = 'enrollments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'class_id'];
    
    public function getEnrollments()
    {
        return $this->select('enrollments.*, users.name AS student_name, classes.class_name')
            ->join('users', 'users.id = enrollments.user_id')
            ->join('classes', 'classes.id = enrollments.class_id')
            ->findAll();
    }
}
