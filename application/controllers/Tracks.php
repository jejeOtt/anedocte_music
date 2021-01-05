<?php
    class Tracks extends CI_Controller {
        public function index(){
            $data['title'] = 'track';

            $data['tracks'] = $this->track_model->get_tracks();

            $this->load->view('templates/header');
            $this->load->view('tracks/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($slug = NULL){
            $data['track'] = $this->track_model->get_tracks($slug);

            if(empty($data['track'])){
                show_404();
            }

            $data['nameTrack'] = $data['track']['nameTrack'];

            $this->load->view('templates/header');
            $this->load->view('tracks/view', $data);
            $this->load->view('templates/footer');
        }

        public function create(){
            
            $data['title'] = 'Create track';

            $data['genres'] = $this->track_model->get_genres_forCreate();

            $this->form_validation->set_rules('nameTrack', 'nameTrack', 'required');
            $this->form_validation->set_rules('url', 'url', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('tracks/create', $data);
                $this->load->view('templates/footer');
            } else {
                $this->track_model->create_track();
                $this->session->set_flashdata('created_track', 'Votre track a été créée est est en attente de validation');
                redirect('tracks');
            }

        }

        public function delete($id){
            $this->track_model->delete_track($id);
            redirect('tracks');
        }

        public function edit($slug){
            $data['track'] = $this->track_model->get_tracks($slug);
            $data['genres'] = $this->track_model->get_genres_forCreate();

            if(empty($data['track'])){
                show_404();
            }

            $data['title'] = 'Edit track';

            $this->load->view('templates/header');
            $this->load->view('tracks/edit', $data);
            $this->load->view('templates/footer');
        }
        
        public function update() {
            $this->track_model->update_track();
            redirect('tracks');

        }
    }