<?php

namespace App\Models;

use CodeIgniter\Model;

class vcModel extends Model
{
    protected $table      = 'volucompteur';
    protected $primaryKey = 'id';

    //protected $useAutoIncrement = true;

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    //protected $allowedFields = ['name', 'email'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_date';
    protected $updatedField  = 'updated_date';
    protected $deletedField  = 'deleted_date';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;
    
}