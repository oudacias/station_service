<?php

namespace App\Models;

use CodeIgniter\Model;

class Recette extends Model
{
    protected $table      = 'recettes';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['station_id','responsable_id','valide','cloture','volucompteur','stock','credit','paiement','ventes_services','depense','diff','recette_date','validation_date'];

    protected $useTimestamps = true;
    // protected $createdField  = 'created_date';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_date';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;
    
}