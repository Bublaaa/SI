<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassAssignmentModel extends Model
{
    protected $table = 'class_assignments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'class_id'];
}

