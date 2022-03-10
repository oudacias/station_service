<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


$routes->get('/volucompteurs/(:any)', 'VolucompteurController::index/$1');
$routes->post('Volucompteurs', 'VolucompteurController::editCompteurFinal');

$routes->get('/index', 'Home::index');
$routes->get('/dashboard/(:any)', 'Home::dashboard/$1');
$routes->get('/articles', 'Home::dashboard');
$routes->get('/services', 'Home::dashboard');


$routes->get('/Configuration/Utilisateurs', 'ExtrainfoController::register');
$routes->post('/Configuration/Utilisateurs', 'ExtrainfoController::attemptRegister');

$routes->get('/Configuration/Utilisateurs/(:num)/(:any)', 'ExtrainfoController::updateRole/$1/$2');
$routes->post('/Configuration/Utilisateurs/(:num)/(:any)', 'ExtrainfoController::updateRole/$1/$2');
// $routes->match(["get", "post"],'updaterole/(:num)/(:any)',  'ExtrainfoController::updateRole/$1/$2');


$routes->group('newuser', ['filter' => 'role:admin,gerant,user,admin_central'], function ($routes) {
	$routes->match(["get", "post"],'getUser',  'ExtrainfoController::getUser');
	$routes->match(["get", "post"],'activateUser',  'ExtrainfoController::activateUser');
	$routes->match(["get", "post"],'deactivateUser',  'ExtrainfoController::deactivateUser');


	$routes->match(["get", "post"],'deleteuser/(:num)',  'ExtrainfoController::deleteUser/$1');
	$routes->match(["get", "post"],'updaterole/(:num)/(:any)',  'ExtrainfoController::updateRole/$1/$2');
});
$routes->group('/group_list',['filter' => 'role:admin,gerant,user,admin_central'],function($routes){
	$routes->get('/', 'GroupsController::index');
	$routes->post('/', 'GroupsController::addGroups');
});





$routes->get('/Recettes/Recettes', 'RecetteController::recette_list');



$routes->get('Recettes/nouvelle_recette', 'RecetteController::newRecette');


$routes->get('Recettes/editRecette/(:any)', 'RecetteController::oldRecette/$1');
$routes->get('Recettes/validateRecette/(:any)', 'RecetteController::validateRecette/$1');
$routes->get('Recettes/voirRecette/(:any)', 'RecetteController::viewRecette/$1');


$routes->post('Ajouter_Recette', 'RecetteController::add_recette');
$routes->post('modifier_Recette', 'RecetteController::edit_recette');



$routes->get('Configuration/Clients', 'ClientController::index');
$routes->get('/Configuration/Clients/Historique/(:any)', 'ClientController::client_history/$1');
$routes->post('Clients', 'ClientController::addClient');
$routes->post('activateClient', 'ClientController::activateClient', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);
$routes->post('activatSolde', 'ClientController::activateSolde', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);







$routes->get('paiements/(:any)', 'PaiementController::index/$1');
$routes->post('paiements', 'PaiementController::addPaiement');
$routes->post('editPaiement', 'PaiementController::editPaiement');

$routes->get('Recettes/Liste', 'RecetteController::index', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);





$routes->get('/', 'Home::first_index');
// $routes->get('/', 'Home::first_index', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);


$routes->get('Configuration/Stations', 'StationController::index', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);
$routes->post('Stations', 'StationController::addStation', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);
$routes->post('StationsEdit', 'StationController::editStation', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);




$routes->get('Configuration/Produits', 'ProduitController::index', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);
$routes->post('Produits', 'ProduitController::addProduit', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);
$routes->post('addListeProduit', 'ProduitController::addListeProduit', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);




$routes->get('Configuration/Reservoirs', 'ReservoirController::index', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);
$routes->post('Reservoirs', 'ReservoirController::addReservoir', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);
$routes->post('ReservoirsEdit', 'ReservoirController::editReservoir', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);

$routes->get('Configuration/Pompes', 'PompeController::index', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);
$routes->post('Pompes', 'PompeController::addPompe', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);
$routes->post('PompesEdit', 'PompeController::editPompe', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);


$routes->get('Configuration/Moyens', 'PaiementController::Moyenpaiement', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);
$routes->post('Moyens', 'PaiementController::addMoyen', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);

// $routes->get('Configuration/Utilisateurs', 'ExtrainfoController::register');

$routes->post('Moyens', 'PaiementController::addMoyen', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);

// $routes->group('admin', ['filter' => 'role:admin,superadmin,user,admin_central,gerant'], function($routes) {

// 	$routes->get('/', 'Home::first_index');
// });


$routes->get('/p','PdfController::index', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);
$routes->get('/p2','PdfController::index2', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);
$routes->get('/p3','PdfController::index3', ['filter' => 'role:admin,superadmin,user,admin_central,gerant']);



//$routes->get('PdfController/Rapport/(:any)', 'PdfController::htmlToPDF/$1');
$routes->get('PdfController/Rapport/(:any)', 'PdfController::htmlToPDF2/$1');


$routes->get('login2', 'ExtrainfoController::controleur_station');


$routes->get('Stock/Stock', 'InventoryController::inventoryIndex');
$routes->post('Stock/index', 'InventoryController::InventoryAdd');
$routes->get('Stock/historique', 'InventoryController::inventoryHistorique');





if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
