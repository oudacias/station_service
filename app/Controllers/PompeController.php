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
        $db = \Config\Database::connect("default");


        $station = new Station();

        $query = $db->query("SELECT station_id from user_infos where user_id =".user_id());
        $station_id = $query->getRow()->station_id;

        if (in_groups(['admin_central'])){
            $stations = $station->findAll();
        }else{ 
            $stations = $station->where('id',$station_id)->findAll();
        }
        $station_id = implode(",", (array_column($stations,'id')));       

       
        $reservoir = new Reservoir($db);
        $reservoirs = $reservoir->findAll();

        $query = $db->query("SELECT *    
                                FROM reservoirs
                                WHERE actif = FALSE
                                AND station_id in ($station_id)");
        $reservoirs = $query->getResult();


        $query = $db->query("SELECT p.id as id, p.nom as p_nom,
                                r.nom as r_nom,
                                s.nom as s_nom    
                                FROM pompes p 
                                left join reservoirs r on p.reservoir_id = r.id 
                                left join stations s on p.station_id = s.id
                                WHERE s.id in ($station_id)");
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


        $reservoir = new Reservoir();
        $data = array(
            'id' => $this->request->getPost('nom'),
            'actif' => 1,
        );
        $reservoir->save($data);
        return redirect()->back()->withInput(); 
    }
    public function editPompe()
    {
        $pompe = new Pompe();
        $data = array(
            'id' => $this->request->getPost('pompe_id'),
            'nom' => $this->request->getPost('nom'),
            'station_id' => $this->request->getPost('station_id'),
            'reservoir_id' => $this->request->getPost('reservoir_id'),
        );
        $pompe->save($data);
        return redirect()->back()->withInput(); 
    }
}
