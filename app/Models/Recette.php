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

    protected $allowedFields = ['responsable_id','station_id','reference','valide','cloture','paiements','ventes','consommation_cuves','consommation_volucompteurs','etat','recette_date'];

    protected $useTimestamps = true;
    // protected $createdField  = 'created_date';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_date';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;

    public function getRecetteCount()
    {
        $data = $this->builder()->select('id')->get()->getLastRow('array');
        return $data;

    }
    
}