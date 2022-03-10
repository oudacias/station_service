<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Inventory;

class InventoryController extends BaseController
{

    public function inventoryIndex()
    {
        $db = \Config\Database::connect("default");

        $query = $db->query("SELECT station_id from user_infos where user_id =".user_id());
        $station_id = $query->getRow()->station_id;

        $query = $db->query("SELECT p.id as id_produit, SUM(IFNULL(i.quantity,0)) as quantity ,p.nom as nom_produit,
                                i.updated_at as inventory_update
                                FROM inventorys i RIGHT JOIN produits p ON p.id = i.product_id 
                                where p.station_id = $station_id
                                and categorie = 'Lubrifiant' or categorie = 'Vente'
                                GROUP BY id_produit ");

        $inventory = $query->getResult();

        return view('stock/index_stock',['inventory'=>$inventory]);
    }


    public function inventoryHistorique()
    {
        $db = \Config\Database::connect("default");

        $query = $db->query("SELECT station_id from user_infos where user_id =".user_id());
        $station_id = $query->getRow()->station_id;

        $query = $db->query("SELECT p.id as id_produit, IFNULL(i.quantity,0) as quantity ,p.nom as nom_produit,
                                i.updated_at as inventory_update
                                FROM inventorys i RIGHT JOIN produits p ON p.id = i.product_id 
                                where p.station_id = $station_id
                                and categorie = 'Lubrifiant' or categorie = 'Vente'
                                Order BY i.updated_at desc");

        $inventory = $query->getResult();

        return view('stock/historique_stock',['inventory'=>$inventory]);
    }

    public function InventoryAdd()
    {
        $inventory = new Inventory();
		$data = array(
            'product_id' =>  $this->request->getPost('produit_id'),
            'quantity' =>  $this->request->getPost('quantite'),
        );
        $inventory->save($data);

		return redirect()->back()->withInput(); 
    }
    
}
