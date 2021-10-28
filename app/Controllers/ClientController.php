<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Client;
use App\Models\Station;


class ClientController extends BaseController
{
    public function index()
    {
        // $client = new Client($db);
        $db = \Config\Database::connect("default");
        $station = new Station($db);

        $query = $db->query("SELECT station_id from user_infos where user_id =".user_id());
        $station_id = $query->getRow()->station_id;

        if (in_groups(['admin_central'])){
            $stations = $station->findAll();
        }else{ 
            $stations = $station->where('id',$station_id)->findAll();
        }
        $station_id = implode(",", (array_column($stations,'id')));
        
        $query = $db->query("SELECT c.*,c.id as client_id, s.nom as station_nom
                                FROM clients c
                                LEFT JOIN stations s ON s.id = c.station_id
                                WHERE s.id in ($station_id)");
        $clients = $query->getResult();
        return view('initial_dashboard/clients_list', ['clients'=>$clients,'stations'=>$stations]);
    }


    public function client_history($id){

       // $client = new Client($db);
        $db = \Config\Database::connect("default");
        $station = new Station($db);

        
        
        $query = $db->query("SELECT sum(credit.montant) as montant,
                                    credit.recette_id as recette_id,
                                    client.nom as client_nom,
                                    recette.recette_date as recette_date,
                                    recette.id as recette_id
                                    FROM creditclients credit
                                    INNER JOIN clients client ON client.id = credit.client_id
                                    INNER JOIN recettes recette ON recette.id = credit.recette_id
                                    WHERE credit.client_id = ".$id."
                                    GROUP BY recette.id");
                                    
        $clients = $query->getResult();
        return view('initial_dashboard/clients_history', ['clients'=>$clients]);
    }
    public function addClient()
    {
        $client = new Client();
        // $data = array(
        //     'nom' => $this->request->getPost('nom'),
        //     'plafond' => $this->request->getPost('plafond'),
        //     'solde' => 0,
        //     'reliquat' => $this->request->getPost('plafond')
        // );
        $data = array(
            'nom' => $this->request->getPost('nom'),
            'plafond' => 0,
            'solde' => 0,
            'reliquat' => 0,
            'station_id' => $this->request->getPost('station_id')
        );
        // print_r($data);
        $client->save($data);
        return redirect()->back()->withInput(); 
    }

    public function activateClient()
    {
        $client = new Client();
        $data = array(
            'id' => $this->request->getPost('client_id'),
            'actif' => $this->request->getPost('actif'),
        );
        $client->save($data);
        echo json_encode($data);
        // return redirect()->back()->withInput(); 
    }
}


