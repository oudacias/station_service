<?php

namespace App\Models;

use CodeIgniter\Model;

class userInfo extends Model
{
    protected $table      = 'user_infos';
    protected $primaryKey = 'id';

    /*
    protected $firstName = 'nom';
    protected $lastName = 'prenom';

    protected $role = 'role';*/

    protected $allowedFields = [
        'id','nom', 'prenom','station_id', 
    ];

    public function getUserStation(int $id)
    {

        $builder = $this->db->table('stations');
            $found =$builder->select('nom')
                ->join('user_info ', 'stations.id = user_info.station_id','left')
                ->where('user_info.users_id', $id)
                ->get()->getResult();       

        return $found;
    }
    //protected $useAutoIncrement = true;

    //protected $returnType     = 'array';
    //protected $useSoftDeletes = true;

    //protected $allowedFields = ['name', 'email'];

    //protected $useTimestamps = true;
    //protected $createdField  = 'created_date';
    //protected $updatedField  = 'updated_date';
    //protected $deletedField  = 'deleted_date';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    //protected $skipValidation     = false;
    
}