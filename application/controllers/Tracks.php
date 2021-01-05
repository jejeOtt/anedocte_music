<?php
    class Tracks extends CI_Controller {
        public function index(){
            $data['title'] = 'track';

            //charger la librairie pagination
            $this->load->library('pagination');

            if($this->input->post('trackSend')) {
                $data['trackSearch'] = $this->input->post('trackSearch');
                $this->session->set_userdata('trackSearch', $data['trackSearch']);
            } else {
                $data['trackSearch'] = $this->session->userdata('trackSearch');
            }
            if($this->input->post('trackGenreSend')) {
                $data['trackGenreSearch'] = $this->input->post('trackGenreSearch');
                $this->session->set_userdata('trackGenreSearch', $data['trackGenreSearch']);
            } else {
                $data['trackGenreSearch'] = $this->session->userdata('trackGenreSearch');
            }

            //Config
            //$this->db->like('genres.genreName', $data['trackGenreSearch']);
            $this->db->like('nameTrack', $data['trackSearch']);
            $this->db->from('tracks');
            $config['total_rows'] = $this->db->count_all_results();
            $data['total_rows'] = $config['total_rows'];
            $config['per_page'] = 6;
            $config['base_url'] = 'http://localhost/projetPHP/tracks/index';


            //Initialiser
            $this->pagination->initialize($config);

            $data['start'] = $this->uri->segment(3);

            $data['tracks'] = $this->track_model->get_tracks(false, $config['per_page'], $data['start'], $data['trackSearch'], $data['trackGenreSearch'] );

            $this->load->view('templates/header');
            $this->load->view('tracks/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($slug = NULL){
            $data['track'] = $this->track_model->getAll_tracks($slug);

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