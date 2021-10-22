<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pompe;
use App\Models\Station;
use App\Models\Reservoir;
use App\Models\Volucompteur;


class PompeController extends BaseController
{
    public function index()
    {
        $station = new Station($db);
        $stations = $station->findAll();
        
        $reservoir = new Reservoir();
        $reservoirs = $reservoir->findAll();
        
        // $pompe = new Pompe($db);
        // $pompes = $pompe->findAll();

        $query = $db->query("SELECT p.id as id, p.nom as p_nom,
                                r.nom as r_nom,
                                s.nom as s_nom    
                                FROM pompes p 
                                left join reservoires r on p.reservoir_id = r.id 
                                left join stations s on p.station_id = s.id");
        $pompes = $query->getResult();
        return view('initial_dashboard/pompes_list', ['pompes'=>$pompes,'stations'=>$stations,'reservoirs'=>$reservoirs]);
    }
    public function addPompe()
    {
        $pompe = new Pompe();
        $data = array(
            'nom' => $this->request->getPost('nom'),
            'station_id' => $this->request->getPost('station_id'),
            'reservoir_id' => $this->request->getPost('reservoir_id'),
        );
        $pompe->save($data);

        // $vompteur = new Volucompteur();
        // $data = array(
        //     'pompe_id' => $pompe->insertID,
        // );
        // $vompteur->save($data);
        // return view('initial_dashboard/index');
        return redirect()->back()->withInput(); 
        
    }
}
