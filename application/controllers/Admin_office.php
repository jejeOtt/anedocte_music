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

    public function import() {
        if($this->session->userdata('roleId') != 1 || !$this->session) {
            redirect('');
        } else {
            $data['title'] = 'Importer des donnees';
            //var_dump($data);

            $this->form_validation->set_rules('importForm', 'importForm', 'required');
    
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('admin_office/import', $data);
                $this->load->view('templates/footer');
            } else {
                $urlGenre = 'https://binaryjazz.us/wp-json/genrenator/v1/genre/20';
                $urlStory = 'https://binaryjazz.us/wp-json/genrenator/v1/story/20';
                $curlGenre = curl_init($urlGenre);
                $curlStory = curl_init($urlStory);

                curl_setopt($curlGenre, CURLOPT_HTTPHEADER, array('Accept: application/json'));
                curl_setopt($curlGenre, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curlGenre, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($curlGenre, CURLOPT_SSL_VERIFYPEER, 0);

                curl_setopt($curlStory, CURLOPT_HTTPHEADER, array('Accept: application/json'));
                curl_setopt($curlStory, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curlStory, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($curlStory, CURLOPT_SSL_VERIFYPEER, 0);
    
                $mh = curl_multi_init();

                curl_multi_add_handle($mh,$curlGenre);
                curl_multi_add_handle($mh,$curlStory);
                
                $datajsonGenre = curl_exec($curlGenre);
                $datajsonStory = curl_exec($curlStory);

                $datasearchGenre = json_decode($datajsonGenre, true);
                $datasearchStory = json_decode($datajsonStory, true);
                var_dump($datasearchGenre);
                var_dump($datasearchStory);


                if (!empty($datasearch)) {
    
                   // foreach ($datasearch as $genreName) {
                    //    $this->API_model->get_API(false, $genreName);
                    //}
                    var_dump($datasearch);
                }
                else 
                {
                    echo "Data not fetched.";
                }
                curl_multi_remove_handle($mh, $curlGenre);
                curl_multi_remove_handle($mh, $curlStory);
                curl_multi_close($mh);                
            }
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
