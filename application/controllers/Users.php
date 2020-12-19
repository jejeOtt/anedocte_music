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
		$this->form_validation->set_rules('dateOfBirth', 'DateDeNaissance', 'required');
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
			$this->session->set_flashdata('user_registered', 'Vous êtes bien enregistré et pouvez maintenat vous logger');

			redirect('users/register');
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
			
			// Login user
			$user_id = $this->user_model->login($username, $password);

			if($user_id){
				// Créer la session utilisateur
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'logged_in' => true
				);

				$this->session->set_userdata($user_data);

				// créer un message
				$this->session->set_flashdata('user_loggedin', 'Vous êtes maintenant connecté');

				redirect('pages/view');
			} else {
				die('Failed');
				// Set message
				// $this->session->set_flashdata('login_failed', 'Le login est invalide');

				// redirect('users/login');
			}		
		}
	}

	// fonction pour log out l'utilisateur
	public function logout() {
		// on détruit les données de l'utilisateur
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		// créer un message
		$this->session->set_flashdata('user_loggedout', 'Vous êtes maintenant déconnecté');

		// Redirige vers la page de login
		redirect('users/login');
	}
}
