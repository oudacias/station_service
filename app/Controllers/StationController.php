<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Station;
use App\Models\UserInfo;


class StationController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect("default");

        $station = new Station();
        $query = $db->query("SELECT station_id from user_infos where user_id =".user_id());
        $station_id = $query->getRow()->station_id;

        if (in_groups(['admin_central'])){
            $stations = $station->findAll();
        }else{ 
            $stations = $station->where('id',$station_id)->findAll();
        }
        return view('initial_dashboard/stations_list', ['stations'=>$stations]);
    }
    public function addStation()
    {
        $station = new Station();
        
        $data = array(
            'nom' => $this->request->getPost('nom'),
            'localisation' => $this->request->getPost('localisation'),            
        );
        $station->save($data);
        return redirect()->to('Configuration/Stations');
    }
    public function editStation(Type $var = null)
    {
        $station = new Station();
        $data = array(
            'id' => $this->request->getPost('station_id'),
            'nom' => $this->request->getPost('nom'),
            'localisation' => $this->request->getPost('localisation'),            
        );
        $station->save($data);
        return redirect()->to('Configuration/Stations');
    }
}
