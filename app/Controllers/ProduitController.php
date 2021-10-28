<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Produit;
use App\Models\Listeprixproduit;

class ProduitController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect("default");
        $query = $db->query("SELECT p.id as id, p.nom as nom, p.categorie as categorie,p.prix as prix, 
                                liste.prix as liste_prix, liste.type as liste_type, 
                                liste.date_prix_debut as date_prix_debut, liste.date_prix_fin as date_prix_fin 
                                FROM produits p 
                                LEFT JOIN listeprixproduits liste ON p.id = liste.produit_id 
                                WHERE liste.created_at in (select max(created_at) FROM listeprixproduits GROUP BY produit_id,type)  
                                OR liste.date_prix_fin IS NULL 
                                ORDER BY p.categorie;
                            ");
        $produits = $query->getResult();

        return view('initial_dashboard/produits_list', ['produits'=>$produits]);
    }
    public function addProduit()
    {
        $produit = new Produit();
        
        $data = array(
            'nom' => $this->request->getPost('nom'),
            'prix' => $this->request->getPost('prix'),            
            'categorie' => $this->request->getPost('categorie'),            
        );
        $produit->save($data);
        return redirect()->to('Configuration/Produits');
    }


    public function addListeProduit()
    {
        $liste_produit = new Listeprixproduit();
        
        $data = array(
            'produit_id' => $this->request->getPost('produit_id'),
            'prix' => $this->request->getPost('prix_liste'),            
            'type' => $this->request->getPost('type_prix'),            
            'date_prix_debut' => $this->request->getPost('date_prix_debut'),            
            'date_prix_fin' => $this->request->getPost('date_prix_fin')            
        );
        $liste_produit->save($data);
        return redirect()->to('Configuration/Produits');
    }
}
