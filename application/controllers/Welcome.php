<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function index()
	{
		$this->load->model('Fonction');
		$data['vue'] = "actualites";
		$data['act'] = $this->Fonction->getActualites();
		$data['cont'] = $this->Fonction->getContinents();
		$data['titre'] = "Actualites";
		$this->load->view('template', $data);
		$this->load->helper('image_helper');
		$this->load->helper('css_helper');
	}

	public function detailsactualite($url, $id){
		$this->load->model('Fonction');
		$data['vue'] = "detailsactualite";
		$data['cont'] = $this->Fonction->getContinents();
		$data['actu'] = $this->Fonction->getActualiteById($id);
		$data['continent'] = $this->Fonction->getContinentById($data['actu']['idcontinent']);
		$data['titre'] = $data['actu']['titre'];
		$continent = $this->Fonction->getContinentById($data['actu']['idcontinent']);
		if($url != $data['actu']['url']) $this->load->view('error');
		if(!(file_exists($data['actu']['url']."html"))){
			$this->Fonction->actuHtml($data['actu'], $continent);
		}
		$this->load->view('template', $data);
	}


	public function actualiteCont($id){
		$this->load->model('Fonction');
		$data['vue'] = "actualites";
		$data['act'] = $this->Fonction->getActualiteByCont($id);
		$data['cont'] = $this->Fonction->getContinents();
		$titre = $this->Fonction->getContinentById($id);
		$data['titre'] = 'Actualites-'.$titre;
		$this->load->view('template', $data);
	}
	
	public function causes(){
		$this->load->model('Fonction');
		$data['liste'] = $this->Fonction->getCauses();
		$data['cont'] = $this->Fonction->getContinents();
		$data['vue'] = "causes";
		$data['titre'] = "Causes";
		$this->load->view('template', $data);
		$this->load->helper('image_helper');
	}
	public function detailscause($url, $id){
		$this->load->Model('Fonction');
		$data['cause'] = $this->Fonction->getCauseById($id);
		$data['vue'] = 'detailscause';
		$data['titre'] = $data['cause']['titre'];
		$data['cont'] = $this->Fonction->getContinents();
		
		$image = image_url($data['cause']['photo'].".jpg");

		if($url != $data['cause']['url']) $this->load->view('error');
		if(!(file_exists($data['cause']['url']."html"))){
			$this->Fonction->causeHtml($data['cause'], $image);
		}
		$this->load->view('template', $data);
	}

	public function consequences(){
		$this->load->model('Fonction');
		$data['vue'] = 'consequences';
		$data['titre'] = "Consequences";
		$data['liste'] = $this->Fonction->getConsequences();
		$data['cont'] = $this->Fonction->getContinents();
		$this->load->view('template', $data);
	}

	public function detailsconsequence($url, $id){
		$this->load->model('Fonction');
		$data['cons']= $this->Fonction->getConsequenceById($id);
		$data['vue'] = 'detailsconsequence';
		$data['titre'] = $data['cons']['titre'];
		$data['cont'] = $this->Fonction->getContinents();

		
		$image = image_url($data['cons']['photo'].".jpg");

		if($url != $data['cons']['url']) $this->load->view('error');
		if(!(file_exists($data['cons']['url']."html"))){
			$this->Fonction->consHtml($data['cons'], $image);
		}
		$this->load->view('template', $data);
	}

	public function solutions(){
		$this->load->model('Fonction');
		$data['liste'] = $this->Fonction->getSolutions();
		$data['vue'] = 'solutions';
		$data['titre'] = "Solutions";
		$data['cont'] = $this->Fonction->getContinents();
		$this->load->view('template', $data);
	}

	public function detailssolution($url, $id){
		$this->load->model('Fonction');
		$data['sol'] = $this->Fonction->getSolutionById($id);
		$data['vue'] = 'detailssolution';
		$data['titre'] = $data['sol']['titre'];
		$data['cont'] = $this->Fonction->getContinents();

		$image = image_url($data['sol']['photo'].".jpg");

		if($url != $data['sol']['url']) $this->load->view('error');
		if(!(file_exists($data['sol']['url']."html"))){
			$this->Fonction->consHtml($data['sol'], $image);
		}
		$this->load->view('template', $data);
	}

	public function pageloginadmin(){
		$this->load->view('login');
	}

	public function traitlogin(){
		$this->load->model('Fonction');
		$mail = $this->input->post('mail');
		$mdp = $this->input->post('mdp');
		$login = $this->Fonction->login($mail, $mdp);
		if($login == 0){
			$data['vue'] = "accueilAdmin";
			$data['table'] = $this->Fonction->getAllTable();
			$this->session->set_userdata("mail", $login);
			$this->load->view('templateAdmin', $data);
		}
		if($login == 1){
			$data['message'] = "mot de passe incorrecte";
			$this->load->view('login', $data);
		}
		if($login == 2){
			$data['message'] = "Utilisateur non-existant";
			$this->load->view('login', $data);
		}
	}

	public function select(){
		$table = $this->input->get('nom');
		$this->load->model('Fonction');
		$data['vue'] = "liste".$table;
		$data['table'] = $this->Fonction->getAllTable();
		$data['liste'] = $this->Fonction->selectgen($table);
		$this->load->view('templateAdmin', $data);
	}

	public function deco(){
		$this->load->library("session");
		$this->session->sess_destroy();
		$this->load->view("login");
	}

	public function supprActu(){
		$id = $this->input->get("id");
		$this->load->model('Fonction');
		$this->Fonction->supprActu($id);
		$data['vue'] = "listeactualite";
		$data['table'] = $this->Fonction->getAllTable();
		$data['liste'] = $this->Fonction->selectgen("actualite");
		$this->load->view('templateAdmin', $data);
	}
	public function supprCause(){
		$id = $this->input->get("id");
		$this->load->model('Fonction');
		$this->Fonction->supprCause($id);
		$data['vue'] = "listecause";
		$data['table'] = $this->Fonction->getAllTable();
		$data['liste'] = $this->Fonction->selectgen("cause");
		$this->load->view('templateAdmin', $data);
	}
	public function supprConsequence(){
		$id = $this->input->get("id");
		$this->load->model('Fonction');
		$this->Fonction->supprConsequence($id);
		$data['vue'] = "listeconsequence";
		$data['table'] = $this->Fonction->getAllTable();
		$data['liste'] = $this->Fonction->selectgen("consequence");
		$this->load->view('templateAdmin', $data);
	}
	public function supprSolution(){
		$id = $this->input->get("id");
		$this->load->model('Fonction');
		$this->Fonction->supprSolution($id);
		$data['vue'] = "listesolution";
		$data['table'] = $this->Fonction->getAllTable();
		$data['liste'] = $this->Fonction->selectgen("solution");
		$this->load->view('templateAdmin', $data);
	}
	public function supprContinent(){
		$id = $this->input->get("id");
		$this->load->model('Fonction');
		$this->Fonction->supprContinent($id);
		$data['vue'] = "listecontinent";
		$data['table'] = $this->Fonction->getAllTable();
		$data['liste'] = $this->Fonction->selectgen("continent");
		$this->load->view('templateAdmin', $data);
	}

	public function modifActu(){
		$id = $this->input->get("id");
		$titre = $this->input->get("titre");
		$idcont = $this->input->get("idcontinent");
		$description = $this->input->get("description");
		$date = $this->input->get("date"); 
		$this->load->model('Fonction');
		$url = $this->Fonction->createSlug($titre);
		$data['vue'] = "listeactualite";
		$this->Fonction->modifActu($id, $titre, $idcont, $description, $date, $url);
		$data['table'] = $this->Fonction->getAllTable();
		$data['liste'] = $this->Fonction->selectgen("actualite");

		$actu = $this->Fonction->getActualiteById($id);
		unlink($actu['url'].".html");
		$this->load->view('templateAdmin', $data);
	}
	public function modifContinent(){
		$id = $this->input->get("id");
		$nom = $this->input->get("nom");
		$this->load->model('Fonction');
		$this->Fonction->modifierContinent($nom, $id);
		$data['table'] = $this->Fonction->getAllTable();
		$data['liste'] = $this->Fonction->selectgen("continent");
		$date['vue'] = "listecontinent";
		$this->load->view('templateAdmin', $data);
	}

	public function pageModif(){
		$id = $this->input->get("id");
		$data['id'] = $id;
		$this->load->model('Fonction');
		$data['vue'] = "modifActu";
		$data['table'] = $this->Fonction->getAllTable();
		$data['cont'] = $this->Fonction->getContinents();
		$data['actu'] = $this->Fonction->getActualiteById($id);
		$this->load->view('templateAdmin', $data);
	}
	public function pageModifCont(){
		$id = $this->input->get("id");
		$data['id'] = $id;
		$this->load->model('Fonction');
		$data['vue'] = "modifContinent";
		$data['table'] = $this->Fonction->getAllTable();
		$data['cont'] = $this->Fonction->getContinents();
		$data['continent'] = $this->Fonction->getContinentById($id);
		$this->load->view('templateAdmin', $data);
	}

	public function pageInsertActu(){
		$this->load->model('Fonction');
		$data['vue'] = "insertActu";
		$data['table'] = $this->Fonction->getAllTable();
		$data['cont'] = $this->Fonction->getContinents();
		$this->load->view('templateAdmin', $data);
	}
	public function pageInsertCause(){
		$this->load->model('Fonction');
		$data['vue'] = "insertCause";
		$data['table'] = $this->Fonction->getAllTable();
		$data['cont'] = $this->Fonction->getContinents();
		$this->load->view('templateAdmin', $data);
	}
	public function pageInsertConsequence(){
		$this->load->model('Fonction');
		$data['vue'] = "insertConsequence";
		$data['table'] = $this->Fonction->getAllTable();
		$data['cont'] = $this->Fonction->getContinents();
		$this->load->view('templateAdmin', $data);
	}
	public function pageInsertSolution(){
		$this->load->model('Fonction');
		$data['vue'] = "insertSolution";
		$data['table'] = $this->Fonction->getAllTable();
		$data['cont'] = $this->Fonction->getContinents();
		$this->load->view('templateAdmin', $data);
	}
	public function pageInsertContinent(){
		$this->load->model('Fonction');
		$data['vue'] = "insertContinent";
		$data['table'] = $this->Fonction->getAllTable();
		$data['cont'] = $this->Fonction->getContinents();
		$this->load->view('templateAdmin', $data);
	}

	public function insertActu(){
		$this->load->model('Fonction');
		$titre = $this->input->get("titre");
		$idcont = $this->input->get("idcontinent");
		$description = $this->input->get("description");
		$date = $this->input->get("date");
		$data['vue'] = "listeactualite"; 
		$data['table'] = $this->Fonction->getAllTable();
		$data['liste'] = $this->Fonction->selectgen("actualite");
		$this->Fonction->insertActu($titre, $idcont, $description, $date);
		$this->load->view('templateAdmin', $data);
	}
	public function insertContinent(){
		$nom = $this->input->get("nom");
		$this->load->model('Fonction');
		$this->Fonction->insertContinent($nom);
		$data['vue'] = "listecontinent";
		$data['table'] = $this->Fonction->getAllTable();
		$data['cont'] = $this->Fonction->getContinents();
		$data['liste'] = $this->Fonction->selectgen("continent");
		$this->load->view('templateAdmin', $data);
	}

	

}
?>