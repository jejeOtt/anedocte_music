<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Back_office extends CI_Controller {

	
	public function index() {
        if($this->session->userdata('roleId') > 2 || !$this->session) {
            redirect('');
        } else {
            $this->load->view('templates/header');
            $this->load->view('back_office/index');
			$this->load->view('templates/footer');
        }
    }
    
    // Affiche tous les nouveaux genres à valider
    public function genres_review() {
        if($this->session->userdata('roleId') > 2 || !$this->session) {
            redirect('');
        } else {
            $data['genres'] = $this->back_office_model->get_unvalidated_genres();

            $this->load->view('templates/header');
            $this->load->view('back_office/genres', $data);
			$this->load->view('templates/footer');
        }
    }

    // Valide un genre
    public function validate_genre() {
        if($this->session->userdata('roleId') > 2 || !$this->session) {
            redirect('');
        } else {
            // uri->segment est utilisé pour récupérer l'id du genre qu'on a passé en URL dans la view genres.php
            $this->back_office_model->validate_update_genre($this->uri->segment(3));

            // Affiche la vue avec les données qu'il faut
            $data['genres'] = $this->back_office_model->get_unvalidated_genres();
            $this->load->view('templates/header');
            $this->load->view('back_office/genres', $data);
			$this->load->view('templates/footer');
        }
    }

    // Affiche toutes les tracks à valider
    public function tracks_review() {
        if($this->session->userdata('roleId') > 2 || !$this->session) {
            redirect('');
        } else {
            $data['tracks'] = $this->back_office_model->get_unvalidated_tracks();
            //var_dump($data['tracks']);

            $this->load->view('templates/header');
            $this->load->view('back_office/tracks', $data);
			$this->load->view('templates/footer');
        }
    }

    // Valide une track 
    public function validate_track() {
        if($this->session->userdata('roleId') > 2 || !$this->session) {
            redirect('');
        } else {
            // uri->segment est utilisé pour récupérer l'id de la track qu'on a passé en URL dans la view tracks.php
            $this->back_office_model->validate_update_track($this->uri->segment(3));

            // Affiche la vue avec les données qu'il faut
            $data['tracks'] = $this->back_office_model->get_unvalidated_tracks();
            $this->load->view('templates/header');
            $this->load->view('back_office/tracks', $data);
			$this->load->view('templates/footer');
        }
    }
}
