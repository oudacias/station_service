<?php

namespace App\Models;

use CodeIgniter\Model;

class Volucompteur extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'volucompteurs';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['product_id','pompe_id','compteur_initial','compteur_final','compteur_final1','compteur_final2','compteur_final3','compteur_final4','compteur_final5','compteur_final6','prix_unitaire1','prix_unitaire2','prix_unitaire3','prix_unitaire4','prix_unitaire5','prix_unitaire6','recette_id','valide','cloture','prix_unitaire'];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    // protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];
}
