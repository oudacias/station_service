<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Station;


class StationController extends BaseController
{
    public function index()
    {
        $station = new Station($db);
        $stations = $station->findAll();
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
}
