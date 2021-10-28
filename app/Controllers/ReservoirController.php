<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Reservoir;
use App\Models\Station;
use App\Models\Produit;


class ReservoirController extends BaseController
{
    public function index()
    {
        $station = new Station($db);
        $stations = $station->findAll();

        $produit = new Produit($db);
        $produits = $produit->where('categorie', 'Carburant')->findAll();

        $query = $db->query("SELECT r.id as id, r.nom as r_nom, r.stock_initial,
                                p.nom as p_nom, p.prix as p_prix,
                                s.nom as s_nom    
                                FROM reservoires r 
                                left join produits p on r.produit_id = p.id 
                                left join stations s on r.station_id = s.id");
        $reservoirs = $query->getResult();
        // $reservoir = new Reservoir($db);
        // $reservoirs = $reservoir->findAll();
        return view('initial_dashboard/reservoirs_list', ['reservoirs' => $reservoirs, 'stations' => $stations, 'produits' => $produits]);
    }
    public function addReservoir()
    {
        $reservoir = new Reservoir();

        $data = array(
            'nom' => $this->request->getPost('nom'),
            'stock_initial' => $this->request->getPost('stock_initial'),
            'station_id' => $this->request->getPost('station_id'),
            'produit_id' => $this->request->getPost('produit_id'),
        );
        $reservoir->save($data);
        return redirect()->to('Configuration/Reservoirs');
    }
}
