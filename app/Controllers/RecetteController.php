<?php namespace App\Controllers;

use App\Models\vcModel;
use App\Models\Recette;
use App\Models\Reservoir;
use App\Models\Moyenpaiement;
use App\Models\Client;
use App\Models\Paiement;
use App\Models\Volucompteur;
use App\Models\Subvolucompteur;
use App\Models\Stock;
use App\Models\Produit;
use App\Models\Creditclient;
use App\Models\Venteservice;
use App\Models\Depense;
use App\Models\Reglement;
use App\Models\CumulStation;
use CodeIgniter\Files\File;

use App\Recettedocument;

use ZipArchive;
use CodeIgniter\I18n\Time;



class RecetteController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect("default");

        if(isset($_SESSION['station_id'])){
            $station_id = $_SESSION['station_id'];
        }else{
            $query = $db->query("SELECT station_id from user_infos where user_id =".user_id());
            $station_id = $query->getRow()->station_id;
        }

        $query = $db->query("SELECT r.id as recette_id, r.recette_date as recette_date, r.valide,
                                (IFNULL(r.credit,0) + IFNULL(r.paiement,0)) as montant_a_deduire,
                                (IFNULL(r.volucompteur,0) + IFNULL(r.ventes_services,0)) as recette_brutte,
                                r.created_at,r.validation_date,
                                s.nom as station_nom
                                from recettes r
                                INNER join stations s on s.id = r.station_id
                                where r.station_id = $station_id");
        $recettes = $query->getResult();
        
        return view('initial_dashboard/recettes_list',['recettes'=>$recettes]);
    }
	// public function newRecette(){

    //     $db = \Config\Database::connect("default");

	// 	$query = $db->query("SELECT p.id as pompe_ids, p.nom as p_nom,pr.nom as pr_nom,pr.prix as pr_prix,pr.id as pr_ids, IFNULL(v.compteur_initial,0) as compteur_initial, IFNULL((v.compteur_final),0) as compteur_final ,v.id, v.pompe_id,
    //                         IFNULL((compteur_final - v.compteur_initial),0) as sortie, IFNULL((v.compteur_final - v.compteur_initial) * pr.prix,0) as ca,
    //                         r.id as reservoir_id
    //                         FROM volucompteurs v 
    //                         RIGHT JOIN pompes p ON p.id = v.pompe_id 
    //                         INNER join reservoirs r on p.reservoir_id = r.id 
    //                         INNER join produits pr on r.produit_id = pr.id
    //                         where v.created_at in (SELECT max(created_at) from volucompteurs GROUP by pompe_id) or v.created_at is null
    //                         GROUP BY p.id;");
    //     $volucompteurs = $query->getResult();



    //     $query = $db->query("SELECT r.id as id, r.nom as r_nom, r.stock_initial as r_stock_initial, pr.nom as pr_nom, pr.id as produits_ids,
    //                             IFNULL(s.stock_comptable,0) as s_stock_comptable
    //                             FROM reservoirs r 
    //                             LEFT JOIN stocks s on s.reservoir_id = r.id 
    //                             INNER join produits pr on r.produit_id = pr.id 
    //                             where s.created_at in (SELECT max(created_at) from stocks GROUP by reservoir_id) or s.created_at is null GROUP BY r.id;");

    //     $reservoirs = $query->getResult();
        
    //     $moyen = new Moyenpaiement($db);
    //     $moyens = $moyen->findAll();

    //     $query = $db->query("SELECT recette_date FROM recettes");
    //     $recette_date = $query->getResult();

    //     $produit = new Produit($db);
    //     $produits = $produit->findAll();


    //     $client = new Client();
    //     $clients = $client->where('actif', true)->findAll();
	// 	return view('initial_dashboard/nouvelle_recette',['volucompteurs'=>$volucompteurs,'reservoirs'=>$reservoirs,'moyens'=>$moyens,'clients'=>$clients,'recette_date'=>$recette_date,'produits'=>$produits]);
	// }
	public function newRecette(){

        $is_prix = 0;
        $db = \Config\Database::connect("default");

        if(isset($_SESSION['station_id'])){
            $station_id = $_SESSION['station_id'];
        }else{
            $query = $db->query("SELECT station_id from user_infos where user_id =".user_id());
            $station_id = $query->getRow()->station_id;
        }

        
        
        $query = $db->query("SELECT id, recette_date from recettes where created_at = (select max(created_at) from recettes) and station_id = $station_id  ");
        $latest_recette = $query->getRow();
        
        if(isset($latest_recette)){
            $query = $db->query("select * FROM listeprixproduits where type='Vente' and date_prix_debut <= '$latest_recette->recette_date' and date_prix_fin >= '$latest_recette->recette_date' GROUP BY produit_id");
            $price_list = $query->getResult();
            if(count($price_list) == 3){
                $is_prix = 1;
                



                $query = $db->query("SELECT p.id as pompe_ids, p.nom as p_nom,pr.nom as pr_nom,pr.id as pr_ids, IFNULL(v.compteur_initial,0) as compteur_initial, IFNULL((v.compteur_final),0) as compteur_final ,v.id, v.pompe_id,
                                    r.id as reservoir_id,
                                    MAX(GREATEST(compteur_final, compteur_final1, compteur_final2,compteur_final3,compteur_final4,compteur_final5,compteur_final6)) as max_volucompteur_final,
                                    (SELECT prix FROM `listeprixproduits` where type = 'Vente' and  produit_id = pr.id and date_prix_debut <= CURRENT_DATE GROUP by produit_id , type HAVING max(created_at)) as pr_prix                                    
                                    FROM volucompteurs v 
                                    RIGHT JOIN pompes p ON p.id = v.pompe_id 
                                    INNER join reservoirs r on p.reservoir_id = r.id 
                                    INNER join produits pr on r.produit_id = pr.id
                                    INNER join listeprixproduits liste on liste.produit_id = pr.id
                                    -- WHERE liste.type='Vente' and liste.date_prix_debut = (SELECT max)
                                    and v.recette_id = $latest_recette->id
                                    and p.station_id = $station_id
                                    GROUP BY p.id
                                    ORDER BY pr.nom;");
                $volucompteurs = $query->getResult();

                $query = $db->query("SELECT r.id as id, r.nom as r_nom, IFNULL(s.stock_physique,0) as r_stock_initial, pr.nom as pr_nom, pr.id as produits_ids,
                                        IFNULL(s.stock_physique,0) as s_stock_comptable,
                                        liste.prix as prix_achat
                                        FROM reservoirs r 
                                        LEFT JOIN stocks s on s.reservoir_id = r.id 
                                        INNER join produits pr on r.produit_id = pr.id 
                                        INNER join listeprixproduits liste on liste.produit_id = pr.id
                                        WHERE liste.type='Vente' and liste.date_prix_debut <= '$latest_recette->recette_date' and liste.date_prix_fin >= '$latest_recette->recette_date'
                                        AND s.recette_id = $latest_recette->id 
                                        and r.station_id = $station_id
                                        AND pr.nom NOT LIKE 'Melange'
                                        GROUP BY r.id;");
                $reservoirs = $query->getResult();
             
                $moyen = new Moyenpaiement($db);
                $moyens = $moyen->findAll();

                $query = $db->query("SELECT recette_date FROM recettes");
                $recette_date = $query->getResult();

                $produit = new Produit($db);
                $produits = $produit->findAll();


                $client = new Client();
                $clients = $client->where('actif', true)->where('station_id', $station_id)->findAll();

            }else{ 
           
                return view('initial_dashboard/nouvelle_recette',['is_prix'=>$is_prix]);
            }

            return view('initial_dashboard/nouvelle_recette',['is_prix'=>$is_prix,'price_list'=>$price_list,'volucompteurs'=>$volucompteurs,'reservoirs'=>$reservoirs,'moyens'=>$moyens,'clients'=>$clients,'recette_date'=>$recette_date,'produits'=>$produits,'latest_recette' => $latest_recette]);
        }
	}
	public function oldRecette($id){

        $is_prix = 0;
        $db = \Config\Database::connect("default");

        if(isset($_SESSION['station_id'])){
            $station_id = $_SESSION['station_id'];
        }else{
            $query = $db->query("SELECT station_id from user_infos where user_id =".user_id());
            $station_id = $query->getRow()->station_id;
        }

        $query = $db->query("SELECT id, recette_date from recettes where id = $id");
        $latest_recette = $query->getRow();



        $query = $db->query("SELECT max(recette_date) from recettes where id = $id");
        $latest_recettes = $query->getRow();

        $check_last_recette = ($latest_recette->recette_date == $latest_recette->recette_date);

        


        // $query = $db->query("SELECT p.id as pompe_ids, p.nom as p_nom,pr.nom as pr_nom,liste.prix as pr_prix,pr.id as pr_ids, IFNULL(v.compteur_initial,0) as compteur_initial, IFNULL((v.compteur_final),0) as compteur_final ,v.id, v.pompe_id,
        // IFNULL((compteur_final - v.compteur_initial),0) as sortie, IFNULL((v.compteur_final - v.compteur_initial) * pr.prix,0) as ca, v.id as volu_id,
        //                         r.id as reservoir_id,
        //                         MAX(GREATEST(compteur_final, compteur_final1, compteur_final2,compteur_final3,compteur_final4,compteur_final5,compteur_final6)) as max_volucompteur_final

        //                         FROM volucompteurs v 
        //                         RIGHT JOIN pompes p ON p.id = v.pompe_id 
                                
        //                         INNER join reservoirs r on p.reservoir_id = r.id 
        //                         INNER join produits pr on r.produit_id = pr.id
        //                         INNER join listeprixproduits liste on liste.produit_id = pr.id
        //                         WHERE liste.created_at in (select max(created_at) FROM listeprixproduits where type='Vente' and date_prix_fin >= CURDATE() GROUP BY produit_id)
        //                         and v.recette_id = $latest_recette->id
        //                         and p.station_id = $station_id
        //                         and v.recette_id = $id
        //                         GROUP BY p.id
        //                         ORDER BY pr.nom;");


        $query = $db->query("SELECT p.id as pompe_ids, p.nom as p_nom,pr.nom as pr_nom,pr.id as pr_ids,v.id as volu_id,
                                    v.compteur_initial,v.compteur_final,v.prix_unitaire,v.compteur_final1,v.prix_unitaire1,v.compteur_final2,
                                    v.prix_unitaire2,v.compteur_final3,v.prix_unitaire3,v.compteur_final4,v.prix_unitaire4,v.compteur_final5,
                                    v.prix_unitaire5,v.compteur_final6,v.prix_unitaire6,
                                    r.id as reservoir_id
                                    FROM volucompteurs v 
                                    RIGHT JOIN pompes p ON p.id = v.pompe_id 
                                    INNER join reservoirs r on p.reservoir_id = r.id 
                                    INNER join produits pr on r.produit_id = pr.id
                                    WHERE v.recette_id = $id
                                    and p.station_id = $station_id
                                    GROUP BY p.id
                                    ORDER BY pr.nom;");

        $volucompteurs = $query->getResult();

        $query = $db->query("SELECT r.id as id, r.nom as r_nom, IFNULL(s.stock_physique,0) as r_stock_initial, pr.nom as pr_nom, pr.id as produits_ids,
                                IFNULL(s.entree,0) as s_entree,
                                IFNULL(s.stock_physique,0) as s_stock_physique,
                                IFNULL(s.stock_comptable,0) as s_stock_comptable,
                                IFNULL(s.manquant_excedent,0) as s_manquant_excedent,
                                liste.prix as prix_achat, 
                                s.sortie as stock_sortie, s.id as stock_id
                                FROM reservoirs r 
                                LEFT JOIN stocks s on s.reservoir_id = r.id 
                                INNER join produits pr on r.produit_id = pr.id 
                                INNER join listeprixproduits liste on liste.produit_id = pr.id
                                WHERE liste.created_at in (select max(created_at) FROM listeprixproduits where type = 'Revient' GROUP BY id)
                                and r.station_id = $station_id
                                AND pr.nom NOT LIKE 'Melange'
                                AND s.recette_id = $id
                                GROUP BY r.id;");
        $reservoirs = $query->getResult();



        $query = $db->query("SELECT credit.montant as montant,
                                    credit.reference as reference,
                                    credit.id as credit_id,
                                    cl.id as client_id,
                                    cl.nom as client_nom
                                    
                                    FROM creditclients credit
                                    INNER join clients cl on cl.id = credit.client_id 
                                
                                    AND credit.recette_id = $id");
        $credit_client = $query->getResult();


        $query = $db->query("SELECT moyen.nom as paiement_nom,
                                    paiement.id as id,
                                    paiement.type_paiement as type_paiement,
                                    paiement.montant as paiement_montant,
                                    paiement.montant_restant as paiement_montant_restant,
                                    paiement.commission as paiement_commission
                                    
                                    FROM paiements paiement
                                    INNER join moyenpaiements moyen on moyen.id = paiement.type_paiement 
                                    AND paiement.recette_id = $id");
        $paiement_client = $query->getResult();

        $query = $db->query("SELECT depense.id as id,
                                    moyen.nom as moyen_nom,
                                    moyen.id as moyen_id,
                                    produit.nom as produit_nom,
                                    produit.id as produit_id,
                                    produit.prix as produit_prix,
                                    depense.qt as depense_qt,
                                    depense.montant as depense_montant,
                                    depense.detail as depense_detail
                                    FROM depenses depense
                                    INNER join moyenpaiements moyen on moyen.id = depense.type_paiement 
                                    INNER join produits produit on produit.id = depense.produit_id 
                                    AND depense.recette_id = $id");
        $depense = $query->getResult();


        $query = $db->query("SELECT services.id as id,
                                    moyen.nom as moyen_nom,
                                    moyen.id as moyen_id,
                                    produit.nom as produit_nom,
                                    produit.id as produit_id,
                                    produit.prix as produit_prix,
                                    services.qt as services_qt,
                                    services.montant as services_montant
                                    FROM venteservices services
                                    INNER join moyenpaiements moyen on moyen.id = services.type_paiement 
                                    INNER join produits produit on produit.id = services.produit_id 
                                    AND services.recette_id = $id");
        $services = $query->getResult();

        $query = $db->query("SELECT reglement.id as id, reglement.montant as montant,reglement.objet_reglement as objet_reglement,
                                    cl.nom as client_nom,cl.id as client_id
                                    FROM reglements reglement
                                    INNER join clients cl on cl.id = reglement.client_id 
                                    AND reglement.recette_id = $id");
        $reglements = $query->getResult();

        $moyen = new Moyenpaiement($db);
        $moyens = $moyen->findAll();

        $query = $db->query("SELECT recette_date FROM recettes");
        $recette_date = $query->getResult();

        $produit = new Produit($db);
        $produits = $produit->findAll();


        $client = new Client();
        $clients = $client->where('actif', true)->where('station_id', $station_id)->findAll(); 

        return view('initial_dashboard/editRecette',['id'=>$id,'volucompteurs'=>$volucompteurs,'reservoirs'=>$reservoirs,'moyens'=>$moyens,'clients'=>$clients,'recette_date'=>$recette_date,'produits'=>$produits,'latest_recette' => $latest_recette,'credit_client'=>$credit_client,'paiement_client'=>$paiement_client,'depense'=>$depense,'services'=>$services,'reglements'=>$reglements,'check_last_recette'=>$check_last_recette]);
	}

    public function add_recette(){

        $db = \Config\Database::connect("default");

        if(isset($_SESSION['station_id'])){
            $station_id = $_SESSION['station_id'];
        }else{
            $query = $db->query("SELECT station_id from user_infos where user_id =".user_id());
            $station_id = $query->getRow()->station_id;
        }

        $recette = new Recette();
        $recettes = $recette->where('recette_date', date_format(date_create($this->request->getPost('recette_date')),"Y-m-d"))->findAll();
        $recettes_count = count($recette->findAll());
        
        // $zip = new ZipArchive;
        // $zip->open(WRITEPATH.'testPDFZip.zip', ZipArchive::CREATE);
        // foreach (glob(WRITEPATH."uploads1/*") as $file) {
        //     print(basename($file));
        //     $zip->addFile($file,basename($file));
        // }           
        // $zip->close();
        // foreach (glob(WRITEPATH."uploads1/*") as $file) {
        //     unlink($file);
        // }           

        // echo($recettes_count);
        // for($i=0; $i<count($this->request->getPost('pompe_ids')); $i++){
                
        //     echo $this->request->getPost('pompe_ids')[$i];
        //     echo "\n";
        //     echo $this->request->getPost('compteur_final')[$i];
        //     echo "\n";
        // }

        // var_dump($this->request->getPost('pompe_ids'));
        
        

        if((is_null($recettes) and $recettes_count) or count($recettes) == 0) {
            $data = array(
                'responsable_id' => user_id(),
                'recette_date' => date_format(date_create($this->request->getPost('recette_date')),"Y-m-d"),
                'station_id' => $station_id,
            );
            $recette->save($data);
            


            if(!is_null($this->request->getPost('cumul_station'))){
                $cumul = new CumulStation();
                $data = array(
                    'recette_id' => $recette->insertID,
                    'station_id' => $station_id,
                    'cumul' => $this->request->getPost('cumul_station'),
                    'date_recette' => date_format(date_create($this->request->getPost('recette_date')),"Y-m-d"),
                );
                $cumul->save($data);
            }


            $paiement = new Paiement();
            if(!is_null($this->request->getPost('p_type_paiement'))){
                for($i=0; $i<count($this->request->getPost('p_type_paiement')); $i++){
                    $data = array(
                        'recette_id' => $recette->insertID,
                        //'client_id' => $this->request->getPost('p_client_id')[$i],
                        //'reference' => $this->request->getPost('p_reference')[$i],
                        'type_paiement' => $this->request->getPost('p_type_paiement')[$i],
                        'montant' => $this->request->getPost('p_montant')[$i],
                        'commission' => $this->request->getPost('p_commission')[$i],
                        'montant_restant' => $this->request->getPost('p_montant')[$i] - $this->request->getPost('p_commission')[$i], 
                    );
                    $paiement->save($data);
                }
            }
            $volucompteur = new Volucompteur();
            if(!is_null($this->request->getPost('pompe_ids'))){
                for($i=0; $i<count($this->request->getPost('pompe_ids')); $i++){
                    $data = array(
                        'recette_id' => $recette->insertID,
                        'pompe_id' => $this->request->getPost('pompe_ids')[$i],
                        'product_id' => $this->request->getPost('pr_ids')[$i],
                        'compteur_initial' => $this->request->getPost('compteur_initial')[$i],
                        'compteur_final' => $this->request->getPost('compteur_final')[$i],
                        'prix_unitaire' => $this->request->getPost('volu_prix')[$i],
                    );         
                    $volucompteur->save($data);

                    // print($volucompteur->insertID);

                    if(!is_null($this->request->getPost('sub_pompe_id'))){
                        if (array_key_exists($i, $this->request->getPost('sub_pompe_id'))) {
                        // for($i=0; $i<count($this->request->getPost('sub_pompe_id')); $i++){
                                for($j = 1; $j<7 ; $j++){
                                    // print_r($this->request->getPost('sub_compteur_final_1'));
                                    if( isset($this->request->getPost('sub_compteur_final_'.$j)[$i]) ){
                                    // if (array_key_exists($j, $this->request->getPost('sub_compteur_final_'.$j))) {
                                        // print("mm   " . $j);
                                        $data = array(
                                            'id' => $volucompteur->insertID,
                                            'compteur_final'.$j => $this->request->getPost('sub_compteur_final_'.$j)[$i],
                                            'prix_unitaire'.$j => $this->request->getPost('sub_volu_prix_'.$j)[$i],
                                        );
                                        // print_r($data);
                                    // }
                                        $volucompteur->save($data);
                                    }
                            }
                            
                        }
                    }
                }
                // if(!is_null($this->request->getPost('sub_pompe_id'))){
                //     for($i=0; $i<count($this->request->getPost('sub_pompe_id')); $i++){
                //         $data = array(
                //             'id' => $volucompteur->insertID,
                //             'compteur_final'.$i+1 => $this->request->getPost('sub_compteur_final')[$i],
                //             'prix_unitaire'.$i+1 => $this->request->getPost('sub_volu_prix')[$i],
                //         );
                //         $volucompteur->save($data);
                //     }
                // }                
            }
            $stock = new Stock();
            if(!is_null($this->request->getPost('reservoir_id'))){
                for($i=0; $i<count($this->request->getPost('reservoir_id')); $i++){
                    $data = array(
                        'recette_id' => $recette->insertID,
                        'sortie' => $this->request->getPost('sortie_stock')[$i],
                        'entree' => $this->request->getPost('entree')[$i],
                        'stock_initial' => $this->request->getPost('stock_initial')[$i],
                        'stock_comptable' => $this->request->getPost('stock_initial')[$i] - $this->request->getPost('sortie_stock')[$i] + $this->request->getPost('entree')[$i],
                        'stock_physique' => $this->request->getPost('physique')[$i],
                        'manquant_excedent' => $this->request->getPost('physique')[$i] - ($this->request->getPost('stock_initial')[$i] - $this->request->getPost('sortie_stock')[$i] + $this->request->getPost('entree')[$i]),
                        'reservoir_id' => $this->request->getPost('reservoir_id')[$i],
                        'produit_id' => $this->request->getPost('produits_ids')[$i],
                        'prix_achat' => $this->request->getPost('prix_achat')[$i],
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
                        //'produit_id' => $this->request->getPost('select_produit_credit1')[$i],
                        'reference' => $this->request->getPost('c_reference1')[$i],
                        //'qt' => $this->request->getPost('c_quantite1')[$i],
                        'montant' => $this->request->getPost('c_montant1')[$i],
                        // 'quantite' => $this->request->getPost('quantite') 
                    );
                    $credit->save($data);
                    // $data = array(
                    //     'id' => $this->request->getPost('c_client_id1')[$i],
                    //     'solde' => $this->request->getPost('c_solde1')[$i],
                    //     'reliquat' => $this->request->getPost('c_reliquat1')[$i],
                    // );
                    // $client->save($data);
                }
            }

            // if(!is_null($this->request->getFileMultiple('credit_documents'))){
            //     for($i=0; $i<count($this->request->getFileMultiple('credit_documents')); $i++){
            //         $file = $this->request->getFileMultiple('credit_documents')[$i];
            //         if (! $file->hasMoved()) {
            //             // $filepath = WRITEPATH . 'uploads/11/' . $file->store();
            //             $file->move(WRITEPATH . $station_id . '/'. date_format(date_create($this->request->getPost('recette_date')),"Y-m-d") . '/Credits');

            //             $document = new Recettedocument();
            //             $data = array(
            //                 'rubrique' => 'Credit',
            //                 'recette_id' => $recette->insertID,
            //                 'chemin_document' => WRITEPATH . $station_id . '/'. date_format(date_create($this->request->getPost('recette_date')),"Y-m-d". '/Credits'),
            //             );
            //             $document->save($data);
            //         }
            //     }
            // }





            $v_s = new Venteservice;
            if(!is_null($this->request->getPost('select_produit_v_s1'))){
                for($i=0; $i<count($this->request->getPost('select_produit_v_s1')); $i++){
                    $data = array(
                        'recette_id' => $recette->insertID,
                        'produit_id' => $this->request->getPost('select_produit_v_s1')[$i],
                        'qt' => $this->request->getPost('qte_v_s1')[$i],
                        'immatricule' => $this->request->getPost('immatricule_v_s1')[$i],
                        'type_paiement' => 1,
                        'montant' => $this->request->getPost('total_v_s')[$i],
                    );
                    $v_s->save($data);
                }
            }
            $depense = new Depense();
            if(!is_null($this->request->getPost('select_produit_depense1'))){
                for($i=0; $i<count($this->request->getPost('select_produit_depense1')); $i++){
                    $data = array(
                        'recette_id' => $recette->insertID,
                        'produit_id' => $this->request->getPost('select_produit_depense1')[$i],
                        'qt' => $this->request->getPost('qte_depense')[$i],
                        'type_paiement' => 1,
                        'detail' => $this->request->getPost('detail')[$i],
                        'montant' => $this->request->getPost('total_depense')[$i],
                    );
                    $depense->save($data);
                }
            }


            $reglement = new Reglement();
            if(!is_null($this->request->getPost('select_client_reglement1'))){
                for($i=0; $i<count($this->request->getPost('select_client_reglement1')); $i++){
                    $data = array(
                        'recette_id' => $recette->insertID,
                        'client_id' => $this->request->getPost('select_client_reglement1')[$i],
                        'objet_reglement' => $this->request->getPost('objet_reglement1')[$i],
                        'montant' => $this->request->getPost('reglement_montant1')[$i],
                    );
                    $reglement->save($data);
                }
            }

            $query = $db->query("SELECT IFNULL(SUM((compteur_final - compteur_initial) * prix_unitaire),0) as sum_volucompteur FROM volucompteurs WHERE recette_id = $recette->insertID");
            $sum_volucompteur = $query->getRow()->sum_volucompteur;

            $query = $db->query("SELECT IFNULL(SUM(montant),0) as sum_credit FROM creditclients WHERE recette_id = $recette->insertID");
            $sum_credit = $query->getRow()->sum_credit;

            $query = $db->query("SELECT IFNULL(SUM(montant_restant),0) as sum_paiement FROM paiements WHERE recette_id = $recette->insertID");
            $sum_paiement = $query->getRow()->sum_paiement;

            $query = $db->query("SELECT IFNULL(SUM(montant),0) as sum_ventes_services FROM venteservices WHERE recette_id = $recette->insertID");
            $sum_ventes_services = $query->getRow()->sum_ventes_services;

            $query = $db->query("SELECT IFNULL(SUM(montant),0) as sum_depenses FROM depenses WHERE recette_id =$recette->insertID");
            $sum_depenses = $query->getRow()->sum_depenses;

            $data = array(
                'id' => $recette->insertID,
                'volucompteur' => $sum_volucompteur,
                'credit' => $sum_credit,
                'paiement' => $sum_paiement,
                'ventes_services' => $sum_ventes_services,
                'depense' => $sum_depenses,
                'diff' => $sum_paiement - $sum_volucompteur + $sum_credit + $sum_ventes_services,
                'recette_date' => date_format(date_create($this->request->getPost('recette_date')),"Y-m-d"),
            );
            $recette->save($data);

            // $db = \Config\Database::connect("default");

            if(isset($_SESSION['station_id'])){
                $station_id = $_SESSION['station_id'];
            }else{
                $query = $db->query("SELECT station_id from user_infos where user_id =".user_id());
                $station_id = $query->getRow()->station_id;
            }

            $query = $db->query("SELECT r.id as recette_id, r.recette_date as recette_date, r.valide,
                                (IFNULL(r.credit,0) + IFNULL(r.paiement,0) + IFNULL(r.depense,0)) as montant_a_deduire,
                                    (IFNULL(r.volucompteur,0) + IFNULL(r.ventes_services,0)) as recette_brutte,
                                    s.nom as station_nom
                                    from recettes r
                                    INNER join stations s on s.id = r.station_id
                                    where r.station_id = $station_id
                                    ORDER BY r.created_at");
            $recettes = $query->getResult();
            
            // return view('initial_dashboard/recettes_list',['recettes'=>$recettes]);

        }else{ 
            print("Error");
        }
    }



    public function edit_recette(){

        $db = \Config\Database::connect("default");

        if(isset($_SESSION['station_id'])){
            $station_id = $_SESSION['station_id'];
        }else{
            $query = $db->query("SELECT station_id from user_infos where user_id =".user_id());
            $station_id = $query->getRow()->station_id;
        }


        // print_r($this->request->getPost());

        $volucompteur = new Volucompteur();
            if(!is_null($this->request->getPost('pompe_ids'))){
                for($i=0; $i<count($this->request->getPost('pompe_ids')); $i++){
                    $data = array(                
                        'id' => $this->request->getPost('volcompteur_id')[$i],
                        'pompe_id' => $this->request->getPost('pompe_ids')[$i],
                        'product_id' => $this->request->getPost('pr_ids')[$i],
                        'compteur_initial' => $this->request->getPost('compteur_initial')[$i],
                        'compteur_final' => $this->request->getPost('compteur_final')[$i],
                        'prix_unitaire' => $this->request->getPost('volu_prix')[$i],
                    );
                    $volucompteur->save($data);
                }
            }
            
       

            $stock = new Stock();
            if(!is_null($this->request->getPost('reservoir_id'))){
                for($i=0; $i<count($this->request->getPost('reservoir_id')); $i++){
                    $data = array(
                        'id' => $this->request->getPost('stock_id')[$i],
                        'sortie' => $this->request->getPost('sortie_stock')[$i],
                        'entree' => $this->request->getPost('entree')[$i],
                        'stock_initial' => $this->request->getPost('stock_initial')[$i],
                        'stock_comptable' => $this->request->getPost('stock_initial')[$i] - $this->request->getPost('sortie_stock')[$i] + $this->request->getPost('entree')[$i],
                        'stock_physique' => $this->request->getPost('physique')[$i],
                        'manquant_excedent' => $this->request->getPost('physique')[$i] - ($this->request->getPost('stock_initial')[$i] - $this->request->getPost('sortie_stock')[$i] + $this->request->getPost('entree')[$i]),
                        'reservoir_id' => $this->request->getPost('reservoir_id')[$i],
                        'produit_id' => $this->request->getPost('produits_ids')[$i],
                        'prix_achat' => $this->request->getPost('prix_achat')[$i],
                    );
                    $stock->save($data);
                }
                
            }




        
        $paiement = new Paiement();
        if(!is_null($this->request->getPost('type_paiement1'))){
            for($i=0; $i<count($this->request->getPost('type_paiement1')); $i++){
                if(null != ($this->request->getPost('type_paiement1'))){
                    if(array_key_exists($i,$this->request->getPost('p_type_paiement1'))){
                        $data = array(
                            'id' => $this->request->getPost('p_type_paiement1')[$i],
                            'recette_id' =>$this->request->getPost('recette_id'),
                            'type_paiement' => $this->request->getPost('type_paiement1')[$i],
                            'montant' => $this->request->getPost('p_montant')[$i],
                            'commission' => $this->request->getPost('p_commission')[$i],
                            'montant_restant' => $this->request->getPost('p_montant')[$i] - $this->request->getPost('p_commission')[$i], 
                        );
                        $paiement->save($data);
                    }else{
                        $data = array(
                            'recette_id' => $this->request->getPost('recette_id'),
                            'type_paiement' => $this->request->getPost('type_paiement1')[$i],
                            'montant' => $this->request->getPost('p_montant')[$i],
                            'commission' => $this->request->getPost('p_commission')[$i],
                            'montant_restant' => $this->request->getPost('p_montant')[$i] - $this->request->getPost('p_commission')[$i], 
                        );
                        $paiement->save($data);
                    }
                }else{
                    $data = array(
                        'recette_id' => $this->request->getPost('recette_id'),
                        'type_paiement' => $this->request->getPost('type_paiement1')[$i],
                        'montant' => $this->request->getPost('p_montant')[$i],
                        'commission' => $this->request->getPost('p_commission')[$i],
                        'montant_restant' => $this->request->getPost('p_montant')[$i] - $this->request->getPost('p_commission')[$i], 
                    );
                    $paiement->save($data);
                }
            }
        
        }
            
        $credit = new Creditclient();
        $client = new Client();
        if(!is_null($this->request->getPost('c_client_id1'))){
            for($i=0; $i<count($this->request->getPost('c_client_id1')); $i++){
                if(null != ($this->request->getPost('credit_id1'))){
                    if(array_key_exists($i,$this->request->getPost('credit_id1'))){
                        $data = array(
                            'id' => $this->request->getPost('credit_id1')[$i],
                            'recette_id' => $this->request->getPost('recette_id'),
                            'client_id' => $this->request->getPost('c_client_id1')[$i],
                            'reference' => $this->request->getPost('c_reference1')[$i],
                            'montant' => $this->request->getPost('c_montant1')[$i],
                        );
                        $credit->save($data);
                    }else{
                        $data = array(
                            'recette_id' => $this->request->getPost('recette_id'),
                            'client_id' => $this->request->getPost('c_client_id1')[$i],
                            'reference' => $this->request->getPost('c_reference1')[$i],
                            'montant' => $this->request->getPost('c_montant1')[$i],
                        );
                        $credit->save($data);
                    }
                }else{
                // if($this->request->getPost('credit_id1')){
                    $data = array(
                        'recette_id' => $this->request->getPost('recette_id'),
                        'client_id' => $this->request->getPost('c_client_id1')[$i],
                        'reference' => $this->request->getPost('c_reference1')[$i],
                        'montant' => $this->request->getPost('c_montant1')[$i],
                    );
                    $credit->save($data);
                }
            }
        }
        
        $v_s = new Venteservice;
        if(!is_null($this->request->getPost('select_produit_v_s1'))){
            for($i=0; $i<count($this->request->getPost('select_produit_v_s1')); $i++){
                if(null != ($this->request->getPost('service_id'))){
                    if(array_key_exists($i,$this->request->getPost('service_id'))){
                        $data = array(
                            'id' => $this->request->getPost('service_id')[$i],
                            'recette_id' => $this->request->getPost('recette_id'),
                            'produit_id' => $this->request->getPost('select_produit_v_s1')[$i],
                            'qt' => $this->request->getPost('qte_v_s1')[$i],
                            'immatricule' => $this->request->getPost('immatricule_v_s1')[$i],
                            'type_paiement' => 1,
                            'montant' => $this->request->getPost('total_v_s')[$i],
                        );
                    $v_s->save($data);
                    }else{
                        $data = array(
                            'recette_id' => $this->request->getPost('recette_id'),
                            'produit_id' => $this->request->getPost('select_produit_v_s1')[$i],
                            'qt' => $this->request->getPost('qte_v_s1')[$i],
                            'immatricule' => $this->request->getPost('immatricule_v_s1')[$i],
                            'type_paiement' => 1,
                            'montant' => $this->request->getPost('total_v_s')[$i],
                        );
                        $v_s->save($data);
                    }
                }else{
                    $data = array(
                        'recette_id' => $this->request->getPost('recette_id'),
                        'produit_id' => $this->request->getPost('select_produit_v_s1')[$i],
                        'qt' => $this->request->getPost('qte_v_s1')[$i],
                        'immatricule' => $this->request->getPost('immatricule_v_s1')[$i],
                        'type_paiement' => 1,
                        'montant' => $this->request->getPost('total_v_s')[$i],
                    );
                    $v_s->save($data);
                
                }
            }
        }
        $depense = new Depense();
        if(!is_null($this->request->getPost('select_produit_depense1'))){
            for($i=0; $i<count($this->request->getPost('select_produit_depense1')); $i++){
                if(null != ($this->request->getPost('depense_id'))){
                    if(array_key_exists($i,$this->request->getPost('depense_id'))){
                        $data = array(
                            'id' => $this->request->getPost('depense_id')[$i],
                            'recette_id' => $this->request->getPost('recette_id'),
                            'produit_id' => $this->request->getPost('select_produit_depense1')[$i],
                            'qt' => $this->request->getPost('qte_depense')[$i],
                            'type_paiement' => 1,
                            'detail' => $this->request->getPost('detail')[$i],
                            'montant' => $this->request->getPost('total_depense')[$i],
                        );
                        $depense->save($data);
                    }else{
                        $data = array(
                            'id' => $this->request->getPost('depense_id')[$i],
                            'recette_id' => $this->request->getPost('recette_id'),
                            'produit_id' => $this->request->getPost('select_produit_depense1')[$i],
                            'qt' => $this->request->getPost('qte_depense')[$i],
                            'type_paiement' => 1,
                            'detail' => $this->request->getPost('detail')[$i],
                            'montant' => $this->request->getPost('total_depense')[$i],
                        );
                        $depense->save($data);
                    }
                }else{
                    $data = array(
                        'recette_id' => $this->request->getPost('recette_id'),
                        'produit_id' => $this->request->getPost('select_produit_depense1')[$i],
                        'qt' => $this->request->getPost('qte_depense')[$i],
                        'type_paiement' => 1,
                        'detail' => $this->request->getPost('detail')[$i],
                        'montant' => $this->request->getPost('total_depense')[$i],
                    );
                    $depense->save($data);
                }
            }
        }


        $reglement = new Reglement();
        if(!is_null($this->request->getPost('select_client_reglement1'))){
            for($i=0; $i<count($this->request->getPost('select_client_reglement1')); $i++){
                if(null != ($this->request->getPost('reglement_id'))){
                    if(array_key_exists($i,$this->request->getPost('reglement_id'))){
                        $data = array(
                            'id' => $this->request->getPost('reglement_id')[$i],
                            'recette_id' => $this->request->getPost('recette_id'),
                            'client_id' => $this->request->getPost('select_client_reglement1')[$i],
                            'objet_reglement' => $this->request->getPost('objet_reglement1')[$i],
                            'montant' => $this->request->getPost('reglement_montant1')[$i],
                        );
                        $reglement->save($data);
                    }else{
                        $data = array(
                            'recette_id' => $this->request->getPost('recette_id'),
                            'client_id' => $this->request->getPost('select_client_reglement1')[$i],
                            'objet_reglement' => $this->request->getPost('objet_reglement1')[$i],
                            'montant' => $this->request->getPost('reglement_montant1')[$i],
                        );
                        $reglement->save($data);
                    }
                }else{
                    $data = array(
                        'recette_id' => $this->request->getPost('recette_id'),
                        'client_id' => $this->request->getPost('select_client_reglement1')[$i],
                        'objet_reglement' => $this->request->getPost('objet_reglement1')[$i],
                        'montant' => $this->request->getPost('reglement_montant1')[$i],
                    );
                    $reglement->save($data);
                }
            }
        }
        

        $query = $db->query("SELECT IFNULL(SUM(montant),0) as sum_credit FROM creditclients WHERE recette_id =" .$this->request->getPost('recette_id'));
        $sum_credit = $query->getRow()->sum_credit;

        $query = $db->query("SELECT IFNULL(SUM(montant_restant),0) as sum_paiement FROM paiements WHERE recette_id =" .$this->request->getPost('recette_id'));
        $sum_paiement = $query->getRow()->sum_paiement;

        $query = $db->query("SELECT IFNULL(SUM(montant),0) as sum_ventes_services FROM venteservices WHERE recette_id =" .$this->request->getPost('recette_id'));
        $sum_ventes_services = $query->getRow()->sum_ventes_services;

        $query = $db->query("SELECT IFNULL(SUM(montant),0) as sum_depenses FROM depenses WHERE recette_id =" .$this->request->getPost('recette_id'));
        $sum_depenses = $query->getRow()->sum_depenses;

        $recette = new Recette();

        $data = array(
            'id' => $this->request->getPost('recette_id'),
            'credit' => $sum_credit,
            'paiement' => $sum_paiement,
            'ventes_services' => $sum_ventes_services,
            'depense' => $sum_depenses,
        );
        $recette->save($data);

        // $db = \Config\Database::connect("default");

        if(isset($_SESSION['station_id'])){
            $station_id = $_SESSION['station_id'];
        }else{
            $query = $db->query("SELECT station_id from user_infos where user_id =".user_id());
            $station_id = $query->getRow()->station_id;
        }

        $query = $db->query("SELECT r.id as recette_id, r.recette_date as recette_date, r.valide,
                            (IFNULL(r.credit,0) + IFNULL(r.paiement,0) + IFNULL(r.depense,0)) as montant_a_deduire,
                                (IFNULL(r.volucompteur,0) + IFNULL(r.ventes_services,0)) as recette_brutte,
                                s.nom as station_nom
                                from recettes r
                                INNER join stations s on s.id = r.station_id
                                where r.station_id = $station_id
                                ORDER BY r.created_at");
        $recettes = $query->getResult();
        
        //return view('initial_dashboard/recettes_list',['recettes'=>$recettes]);
    }

    // public function recette_lists()
    // {
    //     $recette = new Recette();
    //     $recettes = $recette->where('station_id',$station_id)->findAll();
    //     return view('recettes',['recettes'=>$recettes]);
    // }
        public function validateRecette($id)
        {
            $recette = new Recette();
            $now = date('Y-m-d H:i:s');
            $data = array(
                'id' => $id,
                'valide' => true,
                'validation_date' => $now
            );
            $recette->save($data);

            $zip = new ZipArchive;
            $zip->open(WRITEPATH.'testPDFZip.zip', ZipArchive::CREATE);
            foreach (glob(WRITEPATH."uploads1/*") as $file) {
                print(basename($file));
                $zip->addFile($file,basename($file));
            }           
            $zip->close();
            foreach (glob(WRITEPATH."uploads1/*") as $file) {
                unlink($file);
            }          
            

            $db = \Config\Database::connect("default");


            if(isset($_SESSION['station_id'])){
                $station_id = $_SESSION['station_id'];
            }else{
                $query = $db->query("SELECT station_id from user_infos where user_id =".user_id());
                $station_id = $query->getRow()->station_id;
            }

            $query = $db->query("SELECT r.id as recette_id, r.recette_date as recette_date, r.valide,
                                    (IFNULL(r.credit,0) + IFNULL(r.paiement,0) + IFNULL(r.depense,0)) as montant_a_deduire,
                                    (IFNULL(r.volucompteur,0) + IFNULL(r.ventes_services,0)) as recette_brutte,
                                    r.created_at,r.validation_date,
                                    s.nom as station_nom
                                    from recettes r
                                    INNER join stations s on s.id = r.station_id
                                    where r.station_id = $station_id");
            $recettes = $query->getResult();
            
            return view('initial_dashboard/recettes_list',['recettes'=>$recettes]);

        }

        public function viewRecette($id)
        {
            $is_prix = 0;
            $db = \Config\Database::connect("default");

            if(isset($_SESSION['station_id'])){
                $station_id = $_SESSION['station_id'];
            }else{
                $query = $db->query("SELECT station_id from user_infos where user_id =".user_id());
                $station_id = $query->getRow()->station_id;
            }

            $query = $db->query("SELECT id, recette_date from recettes where id = $id");
            $latest_recette = $query->getRow();

            // $query = $db->query("SELECT p.id as pompe_ids, p.nom as p_nom,pr.nom as pr_nom,liste.prix as pr_prix,pr.id as pr_ids, IFNULL(v.compteur_initial,0) as compteur_initial, IFNULL((v.compteur_final),0) as compteur_final ,v.id, v.pompe_id,
            //                         IFNULL((compteur_final - v.compteur_initial),0) as sortie, IFNULL((v.compteur_final - v.compteur_initial) * pr.prix,0) as ca,
            //                         r.id as reservoir_id
            //                         FROM volucompteurs v 
            //                         RIGHT JOIN pompes p ON p.id = v.pompe_id 
                                    
            //                         INNER join reservoirs r on p.reservoir_id = r.id 
            //                         INNER join produits pr on r.produit_id = pr.id
            //                         INNER join listeprixproduits liste on liste.produit_id = pr.id
            //                         WHERE liste.type='Vente' and liste.date_prix_debut <= '$latest_recette->recette_date' and liste.date_prix_fin >= '$latest_recette->recette_date'
            //                         and v.recette_id = $latest_recette->id
            //                         and p.station_id = $station_id
            //                         GROUP BY p.id
            //                         ORDER BY pr.nom;");
            $query = $db->query("SELECT p.id as pompe_ids, p.nom as p_nom,pr.nom as pr_nom,pr.id as pr_ids,
                                    v.compteur_initial,v.compteur_final,v.prix_unitaire,v.compteur_final1,v.prix_unitaire1,v.compteur_final2,
                                    v.prix_unitaire2,v.compteur_final3,v.prix_unitaire3,v.compteur_final4,v.prix_unitaire4,v.compteur_final5,
                                    v.prix_unitaire5,v.compteur_final6,v.prix_unitaire6,
                                    r.id as reservoir_id
                                    FROM volucompteurs v 
                                    RIGHT JOIN pompes p ON p.id = v.pompe_id 
                                    INNER join reservoirs r on p.reservoir_id = r.id 
                                    INNER join produits pr on r.produit_id = pr.id
                                    WHERE v.recette_id = 102
                                    and p.station_id = 1
                                    GROUP BY p.id
                                    ORDER BY pr.nom;");

            $volucompteurs = $query->getResult();
            // print("HEllo");

            // print_r($volucompteurs);


            // $query = $db->query("SELECT p.id as pompe_ids, p.nom as p_nom,pr.nom as pr_nom,liste.prix as pr_prix,pr.id as pr_ids, IFNULL(v.compteur_initial,0) as compteur_initial, IFNULL((v.compteur_final),0) as compteur_final ,v.id, v.pompe_id,
            //                     IFNULL((v.compteur_final - v.compteur_initial),0) as sortie, IFNULL((v.compteur_final - v.compteur_initial) * liste.prix,0) as ca,
            //                     r.id as reservoir_id
            //                     FROM volucompteurs v 
            //                     RIGHT JOIN pompes p ON p.id = v.pompe_id 
                                
            //                     INNER join reservoirs r on p.reservoir_id = r.id 
            //                     INNER join produits pr on r.produit_id = pr.id
            //                     INNER join listeprixproduits liste on liste.produit_id = pr.id
            //                     where liste.type = 'Vente'
                                
            //                     and v.recette_id = $id;");
            // $volucompteurs = $query->getResult();



            $query = $db->query("SELECT r.id as id, r.nom as r_nom, IFNULL(s.stock_physique,0) as r_stock_initial, pr.nom as pr_nom, pr.id as produits_ids,
                                    IFNULL(s.entree,0) as s_entree,
                                    IFNULL(s.stock_physique,0) as s_stock_physique,
                                    IFNULL(s.stock_comptable,0) as s_stock_comptable,
                                    IFNULL(s.manquant_excedent,0) as s_manquant_excedent,
                                    liste.prix as prix_achat, 
                                    s.sortie as stock_sortie
                                    FROM reservoirs r 
                                    LEFT JOIN stocks s on s.reservoir_id = r.id 
                                    INNER join produits pr on r.produit_id = pr.id 
                                    INNER join listeprixproduits liste on liste.produit_id = pr.id
                                    WHERE liste.type='Vente' and liste.date_prix_debut <= '$latest_recette->recette_date' and liste.date_prix_fin >= '$latest_recette->recette_date'
                                    AND s.recette_id = $latest_recette->id 
                                    and r.station_id = $station_id
                                    AND pr.nom NOT LIKE 'Melange'
                                    GROUP BY r.id;");
            $reservoirs = $query->getResult();



            $query = $db->query("SELECT credit.montant as montant,
                                        credit.reference as reference,
                                        credit.id as credit_id,
                                        cl.id as client_id,
                                        cl.nom as client_nom
                                        
                                        FROM creditclients credit
                                        INNER join clients cl on cl.id = credit.client_id 
                                    
                                        AND credit.recette_id = $id");
            $credit_client = $query->getResult();


            $query = $db->query("SELECT moyen.nom as paiement_nom,
                                        paiement.id as id,
                                        paiement.type_paiement as type_paiement,
                                        paiement.montant as paiement_montant,
                                        paiement.montant_restant as paiement_montant_restant,
                                        paiement.commission as paiement_commission
                                        
                                        FROM paiements paiement
                                        INNER join moyenpaiements moyen on moyen.id = paiement.type_paiement 
                                        AND paiement.recette_id = $id");
            $paiement_client = $query->getResult();

            $query = $db->query("SELECT depense.id as id,
                                        moyen.nom as moyen_nom,
                                        moyen.id as moyen_id,
                                        produit.nom as produit_nom,
                                        produit.id as produit_id,
                                        produit.prix as produit_prix,
                                        depense.qt as depense_qt,
                                        depense.montant as depense_montant,
                                        depense.detail as depense_detail
                                        FROM depenses depense
                                        INNER join moyenpaiements moyen on moyen.id = depense.type_paiement 
                                        INNER join produits produit on produit.id = depense.produit_id 
                                        AND depense.recette_id = $id");
            $depense = $query->getResult();


            $query = $db->query("SELECT services.id as id,
                                        moyen.nom as moyen_nom,
                                        moyen.id as moyen_id,
                                        produit.nom as produit_nom,
                                        produit.id as produit_id,
                                        produit.prix as produit_prix,
                                        services.qt as services_qt,
                                        services.montant as services_montant,services.immatricule as immatricule
                                        FROM venteservices services
                                        INNER join moyenpaiements moyen on moyen.id = services.type_paiement 
                                        INNER join produits produit on produit.id = services.produit_id 
                                        AND services.recette_id = $id");
            $services = $query->getResult();

            $query = $db->query("SELECT reglement.id as id, reglement.montant as montant,reglement.objet_reglement as objet_reglement,
            cl.nom as client_nom,cl.id as client_id
            FROM reglements reglement
            INNER join clients cl on cl.id = reglement.client_id 
            AND reglement.recette_id = $id");
            $reglements = $query->getResult();





            $moyen = new Moyenpaiement($db);
            $moyens = $moyen->findAll();

            $query = $db->query("SELECT recette_date FROM recettes");
            $recette_date = $query->getResult();

            $produit = new Produit($db);
            $produits = $produit->findAll();


            $client = new Client();
            $clients = $client->where('actif', true)->where('station_id', $station_id)->findAll();
            return view('initial_dashboard/viewRecette',['id'=>$id,'volucompteurs'=>$volucompteurs,'reservoirs'=>$reservoirs,'moyens'=>$moyens,'clients'=>$clients,'recette_date'=>$recette_date,'produits'=>$produits,'latest_recette' => $latest_recette,'credit_client'=>$credit_client,'paiement_client'=>$paiement_client,'depense'=>$depense,'services'=>$services,'reglements'=>$reglements]);
        }

}




// (total_recette - total_volucompteur + total_credit_client + total_vendu + total_depense - total_reg_credit)