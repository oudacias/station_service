<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="URF-8">

        <!-- BackEnd Variables Verification -->
        <?php
            if(!isset($pageTitle)){
                $pageTitle = "Application de gestion de Station de service";
            }
            if (!isset($pageDescription)) {
                $pageDescription = "Inserer une description de la page dans la variable pageDescription";
            }
        ?>

        <!-- Page Parameters -->
        <title><?php echo $pageTitle; ?></title>
        <meta name="description" content=<?php echo $pageDescription; ?> >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

        <!-- Page Imports -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/assets/css/bootstrap.css">

        <link rel="stylesheet" href="/assets/vendors/iconly/bold.css">

        <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
        <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" href="/assets/css/app.css">
    </head>
