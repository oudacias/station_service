<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Produit;

class ProduitController extends BaseController
{
    public function index()
    {
        $produit = new Produit($db);
        $produits = $produit->findAll();
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
}
