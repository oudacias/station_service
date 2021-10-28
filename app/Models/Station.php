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
        ->select('id,nom,localisation,created_at,updated_at')
        ->get()->getResult();        

        return $found;
    }
    public function getStationID($id)
    {

        $found = $this->builder()
        ->select('stations.id as id')
        ->join('user_info','user_info.station_id=stations.id','left')
        ->where('user_info.id',$id)
        ->get()->getRowArray();
         

        return $found['id'];
    }
}
