<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PdfController extends BaseController
{
    public function index() 
	{
        $db = \Config\Database::connect("default");
        // $data  = new Paiement();
        $id = 20;
        $query = $db->query("SELECT p.reference as p_reference, p.type_paiement, p.montant, p.commission, p.montant_restant,p.quantite as quantite,
                                c.id as c_id, c.nom    
                                FROM paiements p 
                                left join recettes r on p.recette_id = r.id 
                                left join clients c on p.client_id = c.id
                                where r.id = ".$id);
        $result = $query->getResult();
        $query1 = $db->query("SELECT sum(montant_restant) as somme,
                                sum(montant) as montant
                                FROM paiements p 
                                where p.recette_id = ".$id);
        $montant = $query1->getResult();
        
        return view('pdf_report',['paiements'=>$result,'montant'=>$montant]);
    }


    function htmlToPDF($id){
        $db = \Config\Database::connect("default");
        // $data  = new Paiement();
        
        $query = $db->query("SELECT p.reference as p_reference, p.type_paiement, p.montant, p.commission, p.montant_restant,p.quantite as quantite,
                                c.id as c_id, c.nom    
                                FROM paiements p 
                                left join recettes r on p.recette_id = r.id 
                                left join clients c on p.client_id = c.id
                                where r.id = ".$id);
        $result = $query->getResult();
        $query1 = $db->query("SELECT sum(montant_restant) as somme,
                                sum(montant) as montant
                                FROM paiements p 
                                where p.recette_id = ".$id);
        $montant = $query1->getResult();


        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('pdf_report',['paiements'=>$result,'montant'=>$montant]));
        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();
        $dompdf->stream();
    }
    
    
}
