<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Client;


class ClientController extends BaseController
{
    public function index()
    {
        $client = new Client($db);
        $clients = $client->findAll();
        return view('initial_dashboard/clients_list', ['clients'=>$clients]);
    }
    public function addClient()
    {

        // echo count($this->request->getPost('nom'));

        $client = new Client();
        //$data2 = $this->request->getPost();
            $data = array(
                'nom' => $this->request->getPost('nom'),
                'plafond' => $this->request->getPost(('plafond')),
                'solde' => 0,
                'reliquat' => $this->request->getPost('plafond')
            );
            echo var_dump($data);
            $client->save($data);
            // return view('initial_dashboard/index');
            return redirect()->back()->withInput(); 
        
    }
}


