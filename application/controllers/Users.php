<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	
	public function index() {
        echo('hello test');
        //$this->load->view('users/login');
	}

	public function register() {
		$this->form_validation->set_rules('userName', 'UserName', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('users/register');
			$this->load->view('templates/footer');
		} else {
			// Crypte le mot de passe en md5
			$enc_password = md5($this->input->post('password'));

			$this->user_model->register($enc_password);

			// Message pour indiquer à l'utilisateur qu'il a été inscrit
			$this->session->set_flashdata('user_registered', 'Vous êtes bien enregistré et pouvez maintenant vous logger');

			redirect('users/login');
		}
	}

	// vérifie si l'utilisateur existe
	public function check_username_exists($username){
		$this->form_validation->set_message('check_username_exists', 'Ce nom est pris');
		if($this->user_model->check_userName_exists($username)){
			return true;
		} else {
			return false;
		}
	}

	// Vérifie si l'email existe
	public function check_email_exists($email){
		$this->form_validation->set_message('check_email_exists', 'Cet email est pris');
		if($this->user_model->check_email_exists($email)){
			return true;
		} else {
			return false;
		}
	}

	// Fonction pour que l'utilisateur puisse se logguer
	public function login(){
		$this->form_validation->set_rules('userName', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('users/login');
			$this->load->view('templates/footer');
		} else {
			
			// Récupère le username
			$username = $this->input->post('userName');
			// récupère le mot de passe et le crypte
			$password = md5($this->input->post('password'));
			
			// Login user, on fait appel à la méthode login de User_model
			$user_info = $this->user_model->login($username, $password);
			//print_r($user_info['roleId']);
			if($user_info){
				// Créer la session utilisateur
				$user_data = array(
					'idUser' => $user_info['idUser'],
					'userName' => $user_info['userName'],
					'email' => $user_info['email'],
					'roleId' => $user_info['roleId'],
					'logged_in' => true,

				);

				$this->session->set_userdata($user_data);

				// créer un message
				$this->session->set_flashdata('user_loggedin', 'Vous êtes maintenant connecté(e)');

				redirect('pages/view');

			} else {
				//die('Failed');
				// Set message
				$this->session->set_flashdata('login_failed', 'Votre nom d\'utilisateur ou votre mot de passe est invalide');

				redirect('users/login');
			}		
		}
	}

	// fonction pour log out l'utilisateur
	public function logout() {
		// on détruit les données de l'utilisateur
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('idUser');
		$this->session->unset_userdata('userName');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('roleId');

		// créer un message
		$this->session->set_flashdata('user_loggedout', 'Vous êtes maintenant déconnecté');

		// Redirige vers la page de login
		redirect('users/login');
	}

	// espace personnel de l'utilisateur
	public function account($idUser) {
		if($this->session->userdata['idUser'] == $idUser) {
			$this->load->view('templates/header');
			$this->load->view('users/index');
			$this->load->view('templates/footer');
		} else {
			echo('Accès non autorisé !!!');
		}
	}

	// consulter les genres crées
	public function created_genres() {
		//var_dump($data);

		//charger la librairie pagination
		$this->load->library('pagination');
		$idUser = $this->session->userdata['idUser'];
		//Config
		$this->db->from('genres');
		$array = array('isValidated' => 1, 'idUser' => $idUser,);
		$this->db->where($array);
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 6;
		$config['base_url'] = 'http://localhost/projetPHP/users/created_genres';

		//Initialiser
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);

		$data['my_genres'] = $this->user_model->get_created_genres($config['per_page'], $data['start'],$idUser);

		$this->load->view('templates/header');
		$this->load->view('users/created_genres', $data);
		$this->load->view('templates/footer');
	}

	// consulter les tracks crées
	public function created_tracks() {
		//var_dump($data);
		$idUser = $this->session->userdata['idUser'];
		//charger la librairie pagination
		$this->load->library('pagination');

		//Config
		$this->db->from('genres');
		$array = array('isValidated' => 1, 'idUser' => $idUser,);
		$this->db->where($array);
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 6;
		$config['base_url'] = 'http://localhost/projetPHP/users/created_tracks';

		//Initialiser
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['my_tracks'] = $this->user_model->get_created_tracks($config['per_page'], $data['start'], $idUser);

		$this->load->view('templates/header');
		$this->load->view('users/created_tracks', $data);
		$this->load->view('templates/footer');
	}

	// changer ses informations personnelles
	public function update_profil() {
		$this->form_validation->set_rules('userName', 'UserName', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('users/update_profil');
			$this->load->view('templates/footer');
		} else {
			if($this->input->post('userName') == $this->session->userdata['userName']){
				$userName = $this->input->post('userName');
			} else {
				if(!$this->user_model->check_username_exists($this->input->post('userName'))) {
					//die('ce nom est pris test');
					$this->session->set_flashdata('user_name_error', 'Ce nom est déjà pris. Si vous voulez changer de nom veuillez en prendre un autre');
					redirect('users/update_profil');
				} else {
					$userName = $this->input->post('userName');
				}
			}
	
			if($this->input->post('email') == $this->session->userdata('email')){
				$email = $this->input->post('email');
			} else {
				if(!$this->user_model->check_email_exists($this->input->post('email'))) {
					$this->session->set_flashdata('user_email_error', 'Cet email est déjà pris. Si vous voulez changer d\'email veuillez en entrer un autre');
					redirect('users/update_profil');
				} else {
					$email = $this->input->post('email');
				}
			}
			
			$idUser = $this->session->userdata['idUser'];

			$this->user_model->update_profil($userName, $email, $idUser);

			// Message pour indiquer à l'utilisateur que son profil a été mise à jour
			$this->session->set_flashdata('user_update', 'Votre profil a bien été mise à jour. Cependant vos informations seront à jour lors de votre prochaine connexion.');

			redirect('users/account/'.$this->session->userdata['idUser']);
		}
	}
}
