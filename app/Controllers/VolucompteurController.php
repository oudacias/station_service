<?php namespace App\Controllers;

use App\Models\vcModel;
use App\Models\Volucompteur;

class VolucompteurController extends BaseController
{
	public function index($id)
	{
		$db = \Config\Database::connect("default");

		$query = $db->query("SELECT v.id, v.compteur_initial as compteur_initial, v.compteur_final, (v.compteur_final - v.compteur_initial) as sortie,(v.compteur_final - v.compteur_initial) * pr.prix as ca,
                                p.nom as p_nom,
								pr.nom as pr_nom, pr.prix as pr_prix
                                FROM volucompteurs v 
                                left join pompes p on v.pompe_id = p.id 
                                left join reservoirs r on p.reservoir_id = r.id 
                                left join produits pr on r.produit_id = pr.id");
        $volucompteurs = $query->getResult();
		$query = $db->query("SELECT sum((v.compteur_final - v.compteur_initial) * pr.prix) as ca_sum,
								p.nom as p_nom,
								pr.nom as pr_nom, pr.prix as pr_prix
								FROM volucompteurs v 
								left join pompes p on v.pompe_id = p.id 
								left join reservoirs r on p.reservoir_id = r.id 
								left join produits pr on r.produit_id = pr.id");
        $sum_volucompteurs = $query->getResult();

		// print_r($volucompteurs);
		return view('volucompteurs_list',['volucompteurs'=>$volucompteurs,'sum_volucompteurs'=>$sum_volucompteurs]);

	}
	public function editCompteurFinal()
	{
		$volucompteur = new Volucompteur();
        $data = array(
            'id' => $this->request->getPost('id'),
            'compteur_final' => $this->request->getPost('compteur_final'),
        );
        $volucompteur->save($data);
        return redirect()->to('volucompteurs/');
    
	}


}
