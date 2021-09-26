<?php namespace App\Controllers;

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
		// print("hey");
		// print_r(user()->roles);
		return view('initial_dashboard/index', $data);
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
