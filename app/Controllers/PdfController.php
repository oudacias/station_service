<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PdfController extends BaseController
{
    public function index() 
	{
        // $db = \Config\Database::connect("default");
        // // $data  = new Paiement();
        // $id = 20;
        // $query = $db->query("SELECT p.reference as p_reference, p.type_paiement, p.montant, p.commission, p.montant_restant,p.quantite as quantite,
        //                         c.id as c_id, c.nom    
        //                         FROM paiements p 
        //                         left join recettes r on p.recette_id = r.id 
        //                         left join clients c on p.client_id = c.id
        //                         where r.id = ".$id);
        // $result = $query->getResult();
        // $query1 = $db->query("SELECT sum(montant_restant) as somme,
        //                         sum(montant) as montant
        //                         FROM paiements p 
        //                         where p.recette_id = ".$id);
        // $montant = $query1->getResult();

        $db = \Config\Database::connect("default");
        $recette_id= 53;
        $query = $db->query("SELECT s.nom 
                                FROM stations s  
                                INNER JOIN user_infos user ON user.station_id = s.id 
                                where user.user_id =" . user_id());
        $station = $query->getRow();

        $query = $db->query("SELECT v.compteur_final, v.compteur_initial,
                                p.nom as produit_nom, 
                                pompe.id as pompe_id
                                FROM volucompteurs v 
                                INNER JOIN produits p ON p.id = v.product_id
                                INNER JOIN pompes pompe ON pompe.id = v.pompe_id 
                                where recette_id = $recette_id");
        $volucompteurs = $query->getResult();

        $query = $db->query("SELECT ifnull(sum(v.compteur_final - v.compteur_initial),0) as sortie_total , ifnull(sum((v.compteur_final - v.compteur_initial) * prix_unitaire),0) as total, v.prix_unitaire as prix_unitaire,
                                p.nom as produit_nom
                                FROM volucompteurs v 
                                LEFT JOIN produits p ON p.id = v.product_id
                                where recette_id = $recette_id
                                GROUP BY p.nom");
        $volucompteur_total = $query->getResult();

        $query = $db->query("SELECT v.montant as montant,
                                p.nom as produit_nom 
                                FROM venteservices v 
                                INNER JOIN produits p ON p.id = v.produit_id
                                where recette_id = $recette_id");
        $services = $query->getResult();

        $query = $db->query("SELECT d.montant as montant,
                                p.nom as produit_nom 
                                FROM depenses d
                                INNER JOIN produits p ON p.id = d.produit_id
                                where recette_id = $recette_id");
        $depenses = $query->getResult();

        $query = $db->query("SELECT cr.montant as montant,
                                cl.nom as client_nom 
                                FROM creditclients cr
                                INNER JOIN clients cl ON cl.id = cr.client_id
                                where recette_id = $recette_id");
        $credits = $query->getResult();


        $query = $db->query("SELECT p.montant_restant as montant,
                                m.nom as moyen_nom 
                                FROM paiements p
                                INNER JOIN moyenpaiements m ON m.id = p.type_paiement
                                where recette_id = $recette_id");
        $paiements = $query->getResult();

        $query = $db->query("SELECT r.id as recette_id, r.recette_date as recette_date,
                                (IFNULL(r.credit,0) + IFNULL(r.paiement,0)) as montant_a_deduire,
                                (IFNULL(r.volucompteur,0) + IFNULL(r.ventes_services,0)) as recette_brutte,r.recette_date,
                                s.nom as station_nom
                                from recettes r
                                INNER join stations s on s.id = r.station_id
                                where r.id = $recette_id");
        $recettes = $query->getRow();



        $query = $db->query("SELECT sum(stock_initial) as stock_initial, sum(stock_comptable) as stock_comptable,
                                    sum(stock_physique) as stock_physique, sum(sortie) as sortie, sum(entree) as entree, 
                                    sum(manquant_excedent) as manquant_excedent,
                                    p.prix as prix, s.prix_achat as prix_achat
                                from stocks s
                                INNER join produits p on p.id = s.produit_id
                                where s.recette_id = $recette_id and p.nom = 'Gasoil'");
        $stock_gasoil = $query->getRow();

        $query = $db->query("SELECT sum(stock_initial) as stock_initial, sum(stock_comptable) as stock_comptable,
                                    sum(stock_physique) as stock_physique, sum(sortie) as sortie, sum(entree) as entree, 
                                    sum(manquant_excedent) as manquant_excedent,
                                    p.prix as prix, s.prix_achat as prix_achat
                                from stocks s
                                INNER join produits p on p.id = s.produit_id
                                where s.recette_id = $recette_id and p.nom = 'SUPER SANS PLOMB'");
        $stock_sp = $query->getRow();

        return view('pdf_report',['volucompteurs'=>$volucompteurs,'volucompteur_total'=>$volucompteur_total,'venteservices'=>$services,'depenses'=>$depenses,'credits'=>$credits,'paiements'=>$paiements,'recettes'=>$recettes,'stock_gasoil'=>$stock_gasoil,'stock_sp'=>$stock_sp,'station'=>$station]);
    }

    public function index2()
    {
        $db = \Config\Database::connect("default");
        $recette_id= 53;
        $query = $db->query("SELECT v.compteur_final, v.compteur_initial, v.prix_unitaire as prix,
                                p.nom as produit_nom, 
                                pompe.id as pompe_id
                                FROM volucompteurs v 
                                INNER JOIN produits p ON p.id = v.product_id
                                INNER JOIN pompes pompe ON pompe.id = v.pompe_id 
                                where recette_id = $recette_id");
        $volucompteurs = $query->getResult();

        print_r($volucompteurs);

        $query = $db->query("SELECT sum((v.compteur_final - v.compteur_initial) * prix_unitaire) as total FROM volucompteurs v where recette_id = $recette_id;");
        $volucompteur_total = $query->getRow();

        $query = $db->query("SELECT sum(stock_initial) as stock_initial, sum(stock_comptable) as stock_comptable,
                                    sum(stock_physique) as stock_physique, sum(sortie) as sortie, sum(entree) as entree, 
                                    sum(manquant_excedent) as manquant_excedent,
                                    s.prix_achat as prix
                                from stocks s
                                INNER join produits p on p.id = s.produit_id
                                where s.recette_id = $recette_id and p.nom = 'Gasoil'");
        $stock_gasoil = $query->getRow();

        $query = $db->query("SELECT sum(stock_initial) as stock_initial, sum(stock_comptable) as stock_comptable,
                                    sum(stock_physique) as stock_physique, sum(sortie) as sortie, sum(entree) as entree, 
                                    sum(manquant_excedent) as manquant_excedent,
                                    s.prix_achat as prix
                                from stocks s
                                INNER join produits p on p.id = s.produit_id
                                where s.recette_id = $recette_id and p.nom = 'SUPER SANS PLOMB' or p.nom='Melange'");
        $stock_sp = $query->getRow();

        $query = $db->query("SELECT cr.montant as montant,
                                cl.nom as client_nom 
                                FROM creditclients cr
                                RIGHT JOIN clients cl ON cl.id = cr.client_id
                                where recette_id = $recette_id or recette_id is null");
        $credits = $query->getResult();


        $query = $db->query("SELECT p.montant_restant as montant,
                                m.nom as moyen_nom 
                                FROM paiements p
                                INNER JOIN moyenpaiements m ON m.id = p.type_paiement
                                where recette_id = $recette_id");
        $paiements = $query->getResult();

        $query = $db->query("SELECT d.montant as montant,
                                p.nom as produit_nom 
                                FROM depenses d
                                INNER JOIN produits p ON p.id = d.produit_id
                                where recette_id = $recette_id");
        $depenses = $query->getResult();

        $query = $db->query("SELECT v.montant as montant,
                                p.nom as produit_nom 
                                FROM venteservices v 
                                INNER JOIN produits p ON p.id = v.produit_id
                                where recette_id = $recette_id");
        $services = $query->getResult();

        
        return view('pdf_report2',['volucompteurs'=>$volucompteurs,'volucompteur_total'=>$volucompteur_total,'stock_gasoil'=>$stock_gasoil,'stock_sp'=>$stock_sp,'credits'=>$credits,'paiements'=>$paiements,'depenses'=>$depenses,'services'=>$services]);

    }

























    function htmlToPDF($recette_id){

        $db = \Config\Database::connect("default");
        // $recette_id= 2;

        $query = $db->query("SELECT s.nom 
                                FROM stations s  
                                INNER JOIN user_infos user ON user.station_id = s.id 
                                where user.user_id =" . user_id());
        $station = $query->getRow();

        $query = $db->query("SELECT v.compteur_final, v.compteur_initial,
                                p.nom as produit_nom, 
                                pompe.id as pompe_id
                                FROM volucompteurs v 
                                INNER JOIN produits p ON p.id = v.product_id
                                INNER JOIN pompes pompe ON pompe.id = v.pompe_id 
                                where recette_id = $recette_id");
        $volucompteurs = $query->getResult();

        $query = $db->query("SELECT ifnull(sum(v.compteur_final - v.compteur_initial),0) as sortie_total , ifnull(sum((v.compteur_final - v.compteur_initial) * prix_unitaire),0) as total, v.prix_unitaire as prix_unitaire,
                                p.nom as produit_nom
                                FROM volucompteurs v 
                                LEFT JOIN produits p ON p.id = v.product_id
                                where recette_id = $recette_id
                                GROUP BY p.nom");
        $volucompteur_total = $query->getResult();

        $query = $db->query("SELECT v.montant as montant,
                                p.nom as produit_nom 
                                FROM venteservices v 
                                INNER JOIN produits p ON p.id = v.produit_id
                                where recette_id = $recette_id");
        $services = $query->getResult();

        $query = $db->query("SELECT d.montant as montant,
                                p.nom as produit_nom 
                                FROM depenses d
                                INNER JOIN produits p ON p.id = d.produit_id
                                where recette_id = $recette_id");
        $depenses = $query->getResult();

        $query = $db->query("SELECT cr.montant as montant,
                                cl.nom as client_nom 
                                FROM creditclients cr
                                INNER JOIN clients cl ON cl.id = cr.client_id
                                where recette_id = $recette_id");
        $credits = $query->getResult();


        $query = $db->query("SELECT p.montant_restant as montant,
                                m.nom as moyen_nom 
                                FROM paiements p
                                INNER JOIN moyenpaiements m ON m.id = p.type_paiement
                                where recette_id = $recette_id");
        $paiements = $query->getResult();

        $query = $db->query("SELECT r.id as recette_id, r.recette_date as recette_date,
                                (IFNULL(r.credit,0) + IFNULL(r.paiement,0)) as montant_a_deduire,
                                (IFNULL(r.volucompteur,0) + IFNULL(r.ventes_services,0)) as recette_brutte,r.recette_date,
                                s.nom as station_nom
                                from recettes r
                                INNER join stations s on s.id = r.station_id
                                where r.id = $recette_id");
        $recettes = $query->getRow();



        $query = $db->query("SELECT sum(stock_initial) as stock_initial, sum(stock_comptable) as stock_comptable,
                                    sum(stock_physique) as stock_physique, sum(sortie) as sortie, sum(entree) as entree, 
                                    sum(manquant_excedent) as manquant_excedent,
                                    p.prix as prix, s.prix_achat as prix_achat
                                from stocks s
                                INNER join produits p on p.id = s.produit_id
                                where s.recette_id = $recette_id and p.nom = 'Gasoil'");
        $stock_gasoil = $query->getRow();

        $query = $db->query("SELECT sum(stock_initial) as stock_initial, sum(stock_comptable) as stock_comptable,
                                    sum(stock_physique) as stock_physique, sum(sortie) as sortie, sum(entree) as entree, 
                                    sum(manquant_excedent) as manquant_excedent,
                                    p.prix as prix, s.prix_achat as prix_achat
                                from stocks s
                                INNER join produits p on p.id = s.produit_id
                                where s.recette_id = $recette_id and p.nom = 'SUPER SANS PLOMB'");
        $stock_sp = $query->getRow();

        // print_r($volucompteurs);


        // $dompdf = new \Dompdf\Dompdf(); 

        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('pdf_report',['volucompteurs'=>$volucompteurs,'volucompteur_total'=>$volucompteur_total,'venteservices'=>$services,'depenses'=>$depenses,'credits'=>$credits,'paiements'=>$paiements,'recettes'=>$recettes,'stock_gasoil'=>$stock_gasoil,'stock_sp'=>$stock_sp,'station'=>$station])); 
               
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();

        
        // $dompdf->loadHtml(view('pdf_report',['volucompteurs'=>$volucompteurs,'volucompteur_total'=>$volucompteur_total]));
        // $dompdf->loadHtml(view('pdf_report'));
        // $dompdf->setPaper('A4', 'portrait');

        // $dompdf->render();
        // $dompdf->stream();
       
    }
    
    
}
