<html>
    <body>
    <style>
        table {
            border-spacing: 1;
            border-collapse: collapse;
            background: white;
            border-radius: 6px;
            overflow: hidden;
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }
        table * {
            position: relative;
        }
        table td, table th {
            padding-left: 8px;
        }
        table thead tr {
            height: 60px;
            background: #BCD1F5;
            font-size: 16px;
        }
        table tbody tr {
            height: 48px;
            border-bottom: 1px solid #e3f1d5;
        }
        table tbody tr:last-child{
            border: 0;
        }
        table td, table th {
            text-align: left;
        }
        table td.l, table th.l {
            text-align: right;
        }
        table td.c, table th.c {
            text-align: center;
        }
        table td.r, table th.r {
            text-align: center;
        }

    </style>
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Montant</th>
                    <th>Net</th>
                    <th>Quantité</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    if($paiements){
                        foreach($paiements as $paiement){                
                ?>
                <tr>
                    <td style="width:300px" class="text-bold-500"><?php echo $paiement->nom; ?></td>
                    <td><?php echo $paiement->montant; ?></td>
                    
                    <td><?php echo $paiement->montant_restant;?></td>
                    <td></td>
                </tr>
                
                <?php } ?> 
                
                <?php
                    }
                ?>
                <tr>
                    <td>Total Recettes</td>
                    <?php foreach ($montant as $row) { ?>
                        <td><?php echo($row->montant);?></td>
                        <td><?php echo($row->somme);?></td>
                    <?php } ?>
                </tr>
            </tbody>
        </table>
    </body>
    
</html>