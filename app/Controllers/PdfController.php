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


    public function index3() 
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
        $recette_id= 70;
        $query = $db->query("SELECT s.nom 
                                FROM stations s  
                                INNER JOIN user_infos user ON user.station_id = s.id 
                                where user.user_id =" . user_id());
        $station = $query->getRow();

        $query = $db->query("SELECT count(v.id)as v_count ,p.nom 
                                FROM volucompteurs v 
                                INNER JOIN produits p ON p.id = v.product_id 
                                WHERE v.recette_id = $recette_id 
                                GROUP by v.product_id
                                ORDER BY v_count desc;");
        $volucompteurs_count = $query->getResult();


        $query = $db->query("SELECT v.compteur_final, v.compteur_initial,v.prix_unitaire,
                                p.nom as produit_nom, 
                                pompe.id as pompe_id,
                                subv.compteur_initial as compteur_initial1,subv.compteur_final as compteur_final1
                                FROM volucompteurs v 
                                INNER JOIN produits p ON p.id = v.product_id
                                INNER JOIN pompes pompe ON pompe.id = v.pompe_id 
                                LEFT JOIN subvolucompteurs subv ON subv.volucompteur_id = v.id
                                where v.recette_id = $recette_id");
        $volucompteurs = $query->getResult();

        $query = $db->query("SELECT ifnull(sum(v.compteur_final - v.compteur_initial),0) as sortie_total , ifnull(sum((v.compteur_final - v.compteur_initial) * prix_unitaire),0) as total, v.prix_unitaire as prix_unitaire,
                                p.nom as produit_nom
                                FROM volucompteurs v 
                                LEFT JOIN produits p ON p.id = v.product_id
                                where recette_id = $recette_id
                                GROUP BY p.nom");
        $volucompteur_total = $query->getResult();

        $query = $db->query("SELECT v.id, sum((v.compteur_final - v.compteur_initial) * prix_unitaire) as total 
                                FROM volucompteurs v 
                                LEFT JOIN produits p ON p.id = v.product_id 
                                INNER JOIN recettes as rct ON rct.id = v.recette_id 
                                WHERE rct.recette_date > CONCAT(DATE_FORMAT((select recette_date from recettes where id = $recette_id), '%Y-%m-'), '01') 
                                and rct.recette_date <= (select recette_date from recettes where id = $recette_id);");
        $volucompteur_total_mensuels = $query->getRow();

        $query = $db->query("SELECT cumul FROM cumulstations cumuls INNER JOIN recettes as rct ON rct.id = cumuls.recette_id  WHERE MONTH(cumuls.date_recette) = MONTH(rct.recette_date)");

        $volucompteur_total_mensuel = $query->getRow()->cumul + $volucompteur_total_mensuels->total;


        $query = $db->query("SELECT sum(v.montant) as total 
                                FROM venteservices v 
                                INNER JOIN recettes as rct ON rct.id = v.recette_id 
                                WHERE rct.recette_date > CONCAT(DATE_FORMAT((select recette_date from recettes where id = $recette_id), '%Y-%m-'), '01') 
                                and rct.recette_date <= (select recette_date from recettes where id = $recette_id);");
        $ventes_mensuel = $query->getRow();

        $query = $db->query("SELECT sum(p.montant) as total 
                                FROM paiements p
                                INNER JOIN recettes as rct ON rct.id = p.recette_id 
                                WHERE rct.recette_date > CONCAT(DATE_FORMAT((select recette_date from recettes where id = $recette_id), '%Y-%m-'), '01') 
                                and rct.recette_date <= (select recette_date from recettes where id = $recette_id);");
        $paiement_mensuel = $query->getRow();

        $query = $db->query("SELECT sum(cr.montant) as total 
                                from creditclients cr
                                INNER JOIN recettes as rct ON rct.id = cr.recette_id 
                                WHERE rct.recette_date > CONCAT(DATE_FORMAT((select recette_date from recettes where id = $recette_id), '%Y-%m-'), '01') 
                                and rct.recette_date <= (select recette_date from recettes where id = $recette_id);");
        $credit_mensuel = $query->getRow();

        $query = $db->query("SELECT sum(v.montant) as montant, sum(v.qt) as qte,
                                p.nom as produit_nom ,p.categorie as categorie,p.prix as prix
                                FROM venteservices v 
                                INNER JOIN produits p ON p.id = v.produit_id
                                where recette_id = $recette_id
                                GROUP BY p.nom");
        $services = $query->getResult();

        $query = $db->query("SELECT d.montant as montant,
                                p.nom as produit_nom 
                                FROM depenses d
                                INNER JOIN produits p ON p.id = d.produit_id
                                where recette_id = $recette_id");
        $depenses = $query->getResult();

        $query = $db->query("SELECT IFNULL(sum(montant),0) as montant
                                FROM reglements
                                where recette_id = $recette_id");
        $reglements = $query->getRow();

        // $query = $db->query("SELECT sum(cr.montant) as montant,
        //                         cl.nom as client_nom,
        //                         cl.id as client_id
        //                         FROM creditclients cr
        //                         INNER JOIN clients cl ON cl.id = cr.client_id
        //                         where recette_id = $recette_id
        //                         GROUP BY cr.client_id");
        // $credits_cumul = $query->getResult();

        $query = $db->query("SELECT cr.montants as montant,clients.nom as client_nom ,crd.cumul as cumul
                                FROM clients 
                                INNER JOIN
                                    (select sum(montant) as montants, client_id 
                                    from creditclients 
                                    where recette_id = $recette_id
                                    Group BY client_id) as cr ON cr.client_id = clients.id 
                                INNER JOIN clients cl ON cl.id = cr.client_id 
                                LEFT JOIN 
                                    (SELECT recette.id as recettes_id, IFNULL(sum(montant),0) as cumul,r.client_id as client_id 
                                        FROM clients c LEFT JOIN stations s ON s.id = c.station_id 
                                        LEFT JOIN creditclients r ON r.client_id = c.id 
                                        INNER JOIN recettes recette ON recette.id = r.recette_id 
                                        WHERE recette.recette_date > CONCAT(DATE_FORMAT(recette.recette_date, '%Y-%m-'), '01') 
                                            and recette.recette_date <= recette.recette_date 
                                            and r.client_id IN 
                                                (select credit.client_id from recettes recette 
                                                INNER JOIN creditclients credit ON recette.id = credit.recette_id where recette.id = $recette_id) 
                                                GROUP BY c.id) as crd ON crd.client_id = cr.client_id
                                            GROUP BY cl.id;");
        $credits = $query->getResult();


        $query = $db->query("SELECT sum(p.montant_restant) as montant,
                                m.nom as moyen_nom 
                                FROM paiements p
                                INNER JOIN moyenpaiements m ON m.id = p.type_paiement
                                where recette_id = $recette_id
                                GROUP BY p.type_paiement");
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

        // print_r($volucompteurs_count);
        // print_r(ceil(($volucompteurs_count[0]->v_count +5) /4));

        return view('pdf_report3',['volucompteurs_count'=>$volucompteurs_count, 'volucompteurs'=>$volucompteurs,'volucompteur_total'=>$volucompteur_total,'venteservices'=>$services,'depenses'=>$depenses,'credits'=>$credits,'paiements'=>$paiements,'recettes'=>$recettes,'stock_gasoil'=>$stock_gasoil,'stock_sp'=>$stock_sp,'station'=>$station,'volucompteur_total_mensuel'=>$volucompteur_total_mensuel,'reglements'=>$reglements,'ventes_mensuel'=>$ventes_mensuel,'paiement_mensuel'=>$paiement_mensuel,'credit_mensuel'=>$credit_mensuel]);
    }

    function htmlToPDF2($recette_id){
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
        //$recette_id= 53;
        $query = $db->query("SELECT s.nom 
                                FROM stations s  
                                INNER JOIN user_infos user ON user.station_id = s.id 
                                where user.user_id =" . user_id());
        $station = $query->getRow();

        $query = $db->query("SELECT v.compteur_final, v.compteur_initial,v.prix_unitaire,
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

        $query = $db->query("SELECT v.id, sum((v.compteur_final - v.compteur_initial) * prix_unitaire) as total 
                                FROM volucompteurs v 
                                LEFT JOIN produits p ON p.id = v.product_id 
                                INNER JOIN recettes as rct ON rct.id = v.recette_id 
                                WHERE rct.recette_date > CONCAT(DATE_FORMAT((select recette_date from recettes where id = $recette_id), '%Y-%m-'), '01') 
                                and rct.recette_date <= (select recette_date from recettes where id = $recette_id);");
        $volucompteur_total_mensuel = $query->getRow();


        $query = $db->query("SELECT sum(v.montant) as total 
                                FROM venteservices v 
                                INNER JOIN recettes as rct ON rct.id = v.recette_id 
                                WHERE rct.recette_date > CONCAT(DATE_FORMAT((select recette_date from recettes where id = $recette_id), '%Y-%m-'), '01') 
                                and rct.recette_date <= (select recette_date from recettes where id = $recette_id);");
        $ventes_mensuel = $query->getRow();

        $query = $db->query("SELECT sum(p.montant) as total 
                                FROM paiements p
                                INNER JOIN recettes as rct ON rct.id = p.recette_id 
                                WHERE rct.recette_date > CONCAT(DATE_FORMAT((select recette_date from recettes where id = $recette_id), '%Y-%m-'), '01') 
                                and rct.recette_date <= (select recette_date from recettes where id = $recette_id);");
        $paiement_mensuel = $query->getRow();

        $query = $db->query("SELECT sum(cr.montant) as total 
                                from creditclients cr
                                INNER JOIN recettes as rct ON rct.id = cr.recette_id 
                                WHERE rct.recette_date > CONCAT(DATE_FORMAT((select recette_date from recettes where id = $recette_id), '%Y-%m-'), '01') 
                                and rct.recette_date <= (select recette_date from recettes where id = $recette_id);");
        $credit_mensuel = $query->getRow();

        $query = $db->query("SELECT sum(v.montant) as montant, sum(v.qt) as qte,
                                p.nom as produit_nom ,p.categorie as categorie,p.prix as prix
                                FROM venteservices v 
                                INNER JOIN produits p ON p.id = v.produit_id
                                where recette_id = $recette_id
                                GROUP BY p.nom");
        $services = $query->getResult();

        // $query = $db->query("SELECT d.montant as montant,
        //                         p.nom as produit_nom 
        //                         FROM depenses d
        //                         INNER JOIN produits p ON p.id = d.produit_id
        //                         where recette_id = $recette_id");
        // $depenses = $query->getResult();

        $query = $db->query("SELECT IFNULL(sum(montant),0) as montant
                                FROM reglements
                                where recette_id = $recette_id");
        $reglements = $query->getRow();

        // $query = $db->query("SELECT sum(cr.montant) as montant,
        //                         cl.nom as client_nom,
        //                         cl.id as client_id
        //                         FROM creditclients cr
        //                         INNER JOIN clients cl ON cl.id = cr.client_id
        //                         where recette_id = $recette_id
        //                         GROUP BY cr.client_id");
        // $credits_cumul = $query->getResult();

        $query = $db->query("SELECT cr.montants as montant,clients.nom as client_nom ,crd.cumul as cumul
                                FROM clients 
                                INNER JOIN
                                    (select sum(montant) as montants, client_id 
                                    from creditclients 
                                    where recette_id = $recette_id
                                    Group BY client_id) as cr ON cr.client_id = clients.id 
                                INNER JOIN clients cl ON cl.id = cr.client_id 
                                LEFT JOIN 
                                    (SELECT recette.id as recettes_id, IFNULL(sum(montant),0) as cumul,r.client_id as client_id 
                                        FROM clients c LEFT JOIN stations s ON s.id = c.station_id 
                                        LEFT JOIN creditclients r ON r.client_id = c.id 
                                        INNER JOIN recettes recette ON recette.id = r.recette_id 
                                        WHERE recette.recette_date > CONCAT(DATE_FORMAT(recette.recette_date, '%Y-%m-'), '01') 
                                            and recette.recette_date <= recette.recette_date 
                                            and r.client_id IN 
                                                (select credit.client_id from recettes recette 
                                                INNER JOIN creditclients credit ON recette.id = credit.recette_id where recette.id = $recette_id) 
                                                GROUP BY c.id) as crd ON crd.client_id = cr.client_id
                                            GROUP BY cl.id;");
        $credits = $query->getResult();


        $query = $db->query("SELECT sum(p.montant_restant) as montant,
                                m.nom as moyen_nom 
                                FROM paiements p
                                INNER JOIN moyenpaiements m ON m.id = p.type_paiement
                                where recette_id = $recette_id
                                GROUP BY p.type_paiement");
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

        

        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('pdf_report3',['volucompteurs_count'=>$volucompteurs_count,'volucompteurs'=>$volucompteurs,'volucompteur_total'=>$volucompteur_total,'venteservices'=>$services,'credits'=>$credits,'paiements'=>$paiements,'recettes'=>$recettes,'stock_gasoil'=>$stock_gasoil,'stock_sp'=>$stock_sp,'station'=>$station,'volucompteur_total_mensuel'=>$volucompteur_total_mensuel,'reglements'=>$reglements,'ventes_mensuel'=>$ventes_mensuel,'paiement_mensuel'=>$paiement_mensuel,'credit_mensuel'=>$credit_mensuel])); 
               
        //$dompdf->setPaper('A4', 'landscape');
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();

       
    }
    
    
}
