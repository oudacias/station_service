<?php namespace App\Controllers;

use App\Model\Client;
use App\Model\Produit;
use App\Model\Station;

class Home extends BaseController
{
	public function index()
	{
		$data["title"] = "Ziz Dashboard";
		return view('dashboard', $data);
	}
	public function first_index()
	{
		$data["title"] = "Ziz Dashboard";
		$db = \Config\Database::connect("default");

		$query = $db->query("SELECT count(*) as c from clients");
		$clients = $query->getRow();

		$query = $db->query("SELECT count(*) as c from stations");
		$stations = $query->getRow();

		$query = $db->query("SELECT prix from produits where nom = 'Gasoil'");
		$prix_gasoil = $query->getRow();

		$query = $db->query("SELECT prix from produits where nom = 'SUPER SANS PLOMB'");
		$prix_sp = $query->getRow();

		// print("hey");
		// print_r(user()->roles);
		return view('initial_dashboard/index', ['clients'=>$clients,'stations'=>$stations,'prix_gasoil'=>$prix_gasoil,'prix_sp'=>$prix_sp]);
	}
	public function dashboard()
	{
		$data["title"] = "Dashboard page title";
		return view('dashboard', $data);
	}
	public function recettes()
	{
		$data["recettes"] = [["id"=>17, "produit"=>"gasoil", "marque"=>"NomMarque", "vinitiale"=>1500, "vfinale"=>1980], ["id"=>9, "produit"=>"Sans Plmob", "marque"=>"NomMarque2", "vinitiale"=>1400, "vfinale"=>1980]];
		$data["title"] = "Application de gestion de Stations de service";
		return view('header').view('recette_list', $data);
	}
}
