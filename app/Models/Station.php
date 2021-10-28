<?php

namespace App\Models;

use CodeIgniter\Model;

class Station extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'stations';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['nom','localisation','reference'];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';

    public function getStations()
    {

        $found = $this->builder()
        ->select('id,nom')
        ->get()->getResult();        

        return $found;
    }
}
