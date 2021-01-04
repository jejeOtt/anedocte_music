<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_office extends CI_Controller {
	
	public function index() {
        if($this->session->userdata('roleId') != 1 || !$this->session) {
            redirect('');
        } else {
            $this->load->view('templates/header');
            $this->load->view('admin_office/index');
			$this->load->view('templates/footer');
        }
    }
    
    public function users_list() {
        if($this->session->userdata('roleId') != 1 || !$this->session) {
            redirect('');
        } else {
            $data['users'] = $this->admin_office_model->get_users_list();
            //var_dump($data);

            $this->load->view('templates/header');
            $this->load->view('admin_office/users_list', $data);
			$this->load->view('templates/footer');
        }
    }

    // Récupère le userName, email et password d'un utilisateur
    public function user_detail($idUser) {
        if($this->session->userdata('roleId') != 1 || !$this->session) {
            redirect('');
        } else {
            $data['user'] = $this->admin_office_model->get_user_detail($idUser);
            var_dump($data);

            $this->load->view('templates/header');
            $this->load->view('admin_office/user_detail', $data);
			$this->load->view('templates/footer');
        }
    }

    // Update le role d'un utilisateur.
    public function update_role_user() {
        $this->form_validation->set_rules('roleId', 'Role', 'required');
        
        if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
            //$this->load->view('admin_office/users_detail');
            echo('there was an error');
			$this->load->view('templates/footer');
		} else {
            echo('No error, cool');
			$this->admin_office_model->update_role_user();

			// Message pour indiquer à l'utilisateur qu'il a été inscrit
			$this->session->set_flashdata('user_update', "L'utilisateur a bien été mise à jour");

			redirect('admin_office/users_list');
        }
        
    }

    // Supprime un utilisateur
    public function delete_user($idUser) {
        $check_delete = $this->admin_office_model->delete_user($idUser);
        if(!$check_delete) {
            echo('Une erreur est survenue');
        } else {
            $this->session->set_flashdata('user_delete', "L'utilisateur a bien été supprimé");
            redirect('admin_office/users_list');
        } 
    }
}
