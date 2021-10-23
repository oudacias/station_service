<?php namespace App\Controllers;

use App\Models\vcModel;
use App\Models\Recette;
use App\Models\Reservoir;
use App\Models\Moyenpaiement;
use App\Models\Client;
use App\Models\Paiement;
use App\Models\VoluCompteur;
use App\Models\Stock;
use App\Models\Produit;
use App\Models\Creditclient;
use App\Models\Venteservice;



class RecetteController extends BaseController
{
	public function newRecette(){

        $db = \Config\Database::connect("default");

		$query = $db->query("SELECT p.id as pompe_ids, p.nom as p_nom,pr.nom as pr_nom,pr.prix as pr_prix,pr.id as pr_ids, IFNULL(v.compteur_initial,0) as compteur_initial, IFNULL((v.compteur_final),0) as compteur_final ,v.id, v.pompe_id,
                            IFNULL((compteur_final - v.compteur_initial),0) as sortie, IFNULL((v.compteur_final - v.compteur_initial) * pr.prix,0) as ca
                            FROM volucompteurs v 
                            RIGHT JOIN pompes p ON p.id = v.pompe_id 
                            INNER join reservoires r on p.reservoir_id = r.id 
                            INNER join produits pr on r.produit_id = pr.id
                            where v.created_at in (SELECT max(created_at) from volucompteurs GROUP by pompe_id) or v.created_at is null
                            GROUP BY p.id;");
        $volucompteurs = $query->getResult();


        $query = $db->query("SELECT r.id as id, r.nom as r_nom, r.stock_initial as r_stock_initial, pr.nom as pr_nom, pr.id as produits_ids,
                                IFNULL(s.stock_comptable,0) as s_stock_comptable
                                FROM reservoires r 
                                LEFT JOIN stocks s on s.reservoir_id = r.id 
                                INNER join produits pr on r.produit_id = pr.id 
                                where s.created_at in (SELECT max(created_at) from stocks GROUP by reservoir_id) or s.created_at is null GROUP BY r.id;");

        $reservoirs = $query->getResult();
        
        $moyen = new Moyenpaiement($db);
        $moyens = $moyen->findAll();

        $query = $db->query("SELECT recette_date FROM recettes");
        $recette_date = $query->getResult();

        $produit = new Produit($db);
        $produits = $produit->findAll();


        $client = new Client();
        $clients = $client->where('actif', true)->findAll();
		return view('initial_dashboard/nouvelle_recette',['volucompteurs'=>$volucompteurs,'reservoirs'=>$reservoirs,'moyens'=>$moyens,'clients'=>$clients,'recette_date'=>$recette_date,'produits'=>$produits]);
    }

    public function add_recette(){
        $db = \Config\Database::connect("default");
        $recette = new Recette();
        $recettes = $recette->where('recette_date', date_format(date_create($this->request->getPost('recette_date')),"Y-m-d"))->findAll();

        if(!is_null($recettes)) {
            $data = array(
                'responsable_id' => user_id(),
                'recette_date' => date_format(date_create($this->request->getPost('recette_date')),"Y-m-d"),
            );
            $recette->save($data);

            $paiement = new Paiement();
            if(!is_null($this->request->getPost('p_client_id'))){
                for($i=0; $i<count($this->request->getPost('p_client_id')); $i++){
                    $data = array(
                        'recette_id' => $recette->insertID,
                        'client_id' => $this->request->getPost('p_client_id')[$i],
                        'reference' => $this->request->getPost('p_reference')[$i],
                        'type_paiement' => $this->request->getPost('p_type_paiement')[$i],
                        'montant' => $this->request->getPost('p_montant')[$i],
                        'commission' => $this->request->getPost('p_commission')[$i],
                        'montant_restant' => $this->request->getPost('p_montant')[$i] - $this->request->getPost('p_commission')[$i], 
                        // 'quantite' => $this->request->getPost('quantite') 
                    );
                    $paiement->save($data);
                }
            }
            $volucompteur = new VoluCompteur();
            if(!is_null($this->request->getPost('pompe_ids'))){
                for($i=0; $i<count($this->request->getPost('pompe_ids')); $i++){
                    $data = array(
                        'recette_id' => $recette->insertID,
                        'pompe_id' => $this->request->getPost('pompe_ids')[$i],
                        'product_id' => $this->request->getPost('pr_ids')[$i],
                        'compteur_initial' => $this->request->getPost('compteur_initial')[$i],
                        'compteur_final' => $this->request->getPost('compteur_final')[$i],
                        'prix_unitaire' => $this->request->getPost('prix')[$i],
                    );
                    $volucompteur->save($data);
                }
            }
            $stock = new Stock();
            if(!is_null($this->request->getPost('pompe_ids'))){
                for($i=0; $i<count($this->request->getPost('pompe_ids')); $i++){
                    $data = array(
                        'recette_id' => $recette->insertID,
                        'sortie' => $this->request->getPost('sortie')[$i],
                        'entree' => $this->request->getPost('entree')[$i],
                        'stock_initial' => $this->request->getPost('stock_initial')[$i],
                        'stock_comptable' => $this->request->getPost('stock_initial')[$i] - $this->request->getPost('sortie')[$i] + $this->request->getPost('entree')[$i],
                        'stock_physique' => $this->request->getPost('physique')[$i],
                        'manquant_excedent' => $this->request->getPost('physique')[$i] - ($this->request->getPost('stock_initial')[$i] - $this->request->getPost('sortie')[$i] + $this->request->getPost('entree')[$i]),
                        'reservoir_id' => $this->request->getPost('reservoir_id')[$i],
                        'produit_id' => $this->request->getPost('prix')[$i],
                    );
                    $stock->save($data);
                }
            }
            $credit = new Creditclient();
            $client = new Client();
            if(!is_null($this->request->getPost('c_client_id1'))){
                for($i=0; $i<count($this->request->getPost('c_client_id1')); $i++){
                    $data = array(
                        'recette_id' => $recette->insertID,
                        'client_id' => $this->request->getPost('c_client_id1')[$i],
                        'produit_id' => $this->request->getPost('select_produit_credit1')[$i],
                        'reference' => $this->request->getPost('c_reference1')[$i],
                        'qt' => $this->request->getPost('c_quantite1')[$i],
                        'montant' => $this->request->getPost('c_montant1')[$i],
                        // 'quantite' => $this->request->getPost('quantite') 
                    );
                    $credit->save($data);
                    $data = array(
                        'id' => $this->request->getPost('c_client_id1')[$i],
                        'solde' => $this->request->getPost('c_solde1')[$i],
                        'reliquat' => $this->request->getPost('c_reliquat1')[$i],
                    );
                    $client->save($data);
                }
            }
            $v_s = new Venteservice;
            if(!is_null($this->request->getPost('select_produit_v_s1'))){
                for($i=0; $i<count($this->request->getPost('select_produit_v_s1')); $i++){
                    $data = array(
                        'recette_id' => $recette->insertID,
                        'produit_id' => $this->request->getPost('select_produit_v_s1')[$i],
                        'qt' => $this->request->getPost('qte_v_s1')[$i],
                        'type_paiement' => $this->request->getPost('type_paiement_v_s1')[$i],
                        'montant' => $this->request->getPost('total_v_s')[$i],
                    );
                    $v_s->save($data);
                }
            }

            $query = $db->query("SELECT IFNULL(SUM((compteur_final - compteur_initial) * prix_unitaire),0) FROM volucompteurs WHERE recette_id = $recette_id");
            $sum_volucompteur = $query->getResult();

            $query = $db->query("SELECT IFNULL(SUM(montant),0) FROM creditclients WHERE recette_id = $recette_id");
            $sum_credit = $query->getResult();

            $query = $db->query("SELECT IFNULL(SUM(montant_restant),0) FROM paiements WHERE recette_id = $recette_id");
            $sum_paiement = $query->getResult();

            $query = $db->query("SELECT IFNULL(SUM(montant),0) FROM venteservices WHERE recette_id = $recette_id");
            $sum_ventes_services = $query->getResult();



            $data = array(

                'id' => $recette->insertID,
                'volucompteur' => $sum_volucompteur,
                'credit' => $sum_credit,
                'paiement' => $sum_paiement,
                'ventes_services' => $sum_ventes_services,
                'diff' => $sum_paiement - $sum_volucompteur + $sum_credit + $sum_ventes_services,
                'recette_date' => date_format(date_create($this->request->getPost('recette_date')),"Y-m-d"),
            );
            $recette->save($data);

            return redirect()->to('/');

        }else{ 
            print("Error");
        }

        // return redirect()->to('/');
    }
}

// (total_recette - total_volucompteur + total_credit_client + total_vendu + total_depense - total_reg_credit)