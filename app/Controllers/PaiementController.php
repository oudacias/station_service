<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Paiement;
use App\Models\Client;
use App\Models\Moyenpaiement;


class PaiementController extends BaseController
{
    public function Moyenpaiement()
    {
        $moyen = new Moyenpaiement($db);
        $moyens = $moyen->findAll();
        return view('initial_dashboard/moyens_list', ['moyens'=>$moyens]);
    }

    public function addMoyen()
    {
        $moyen = new Moyenpaiement();
        $data = array(
            'nom' => $this->request->getPost('nom'),
        );
        $moyen->save($data);
        return redirect()->back()->withInput(); 
    }

    public function index($id)
    {
        $moyen = new Moyenpaiement($db);
        $moyens = $moyen->findAll();

        $db = \Config\Database::connect("default");
        // $data  = new Paiement();
        $query = $db->query("SELECT p.id as id, p.reference as p_reference, p.montant, p.commission, p.montant_restant, p.quantite as quantite,
                                c.id as c_id, c.nom,  
                                m.nom as type_paiement
                                FROM paiements p 
                                left join recettes r on p.recette_id = r.id 
                                left join clients c on p.client_id = c.id
                                left join moyenpaiements m on p.type_paiement = m.id
                                where r.id = ".$id);
        $result = $query->getResult();

        $query1 = $db->query("SELECT sum(montant_restant) as somme
                                FROM paiements p 
                                where p.recette_id = ".$id);
        $montant = $query1->getResult();

        $client = new Client();
        $clients = $client->where('actif', true)->findAll();
        return view('recette_list',['paiements'=>$result,'clients'=>$clients,'montant'=>$montant,'moyens'=>$moyens]);
    }

    public function addPaiement()
    {
        // $paiement = new Paiement();

        // print_r($this->request->getPost('p_montant'));
        // // print_r($this->request->getPost('montants')[1]);
        // // print_r($this->request->getPost('client_id')[1]);
        // $data = array(
        //     'recette_id' => $this->request->getPost('recette_id'),
        //     'client_id' => $this->request->getPost('client_id'),
        //     'reference' => $this->request->getPost('reference'),
        //     'type_paiement' => $this->request->getPost('type_paiement'),
        //     'montant' => $this->request->getPost('montant'),
        //     'commission' => $this->request->getPost('commission'),
        //     'montant_restant' => $this->request->getPost('montant') - $this->request->getPost('commission'), 
        //     // 'quantite' => $this->request->getPost('quantite') 
        // );
        // // $paiement->save($data);
        // // return redirect()->to('paiements/'.$this->request->getPost('recette_id'));

        
    }

    public function editPaiement()
    {
        $paiement = new Paiement();
        $data = array(
            'id' => $this->request->getPost('id'),
            'recette_id' => $this->request->getPost('recette_id'),
            'client_id' => $this->request->getPost('client_id'),
            'reference' => $this->request->getPost('reference'),
            'type_paiement' => $this->request->getPost('type_paiement'),
            'montant' => $this->request->getPost('montant'),
            'commission' => $this->request->getPost('commission'),
            'montant_restant' => $this->request->getPost('montant') - $this->request->getPost('commission'), 
            'quantite' => $this->request->getPost('quantite') 
        );
        $paiement->save($data);
        return redirect()->to('paiements/'.$this->request->getPost('recette_id'));
    }

    public function deletePaiement($recette_id,$id)
    {
        $paiement = new Paiement();
        $paiement->delete($id);
        return redirect()->to('paiements/'.$recette_id);
    }
}
