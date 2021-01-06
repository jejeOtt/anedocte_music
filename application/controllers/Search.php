<?php
    class Search extends CI_Controller {
        public function index(){
            $this->load->view('templates/header');
            $this->load->view('search/index');
            $this->load->view('templates/footer');
        }


        public function search_genre_result(){
            $data['title'] = 'Genre';

            //charger la librairie pagination
            $this->load->library('pagination');

            if($this->input->post('genreSend')) {
                $data['genreSearch'] = $this->input->post('genreSearch');
                $this->session->set_userdata('genreSearch', $data['genreSearch']);
            } else {
                $data['genreSearch'] = $this->session->userdata('genreSearch');
            }

            //Config
            $this->db->like('genreName', $data['genreSearch']);
            $this->db->from('genres');
            $config['total_rows'] = $this->db->count_all_results();
            $data['total_rows'] = $config['total_rows'];
            $config['per_page'] = 6;
            $config['base_url'] = 'http://localhost/projetPHP/index.php/search/search_genre_result';

            //Initialiser
            $this->pagination->initialize($config);

            $data['start'] = $this->uri->segment(3);
            $data['genres'] = $this->genre_model->get_genres(false, $config['per_page'], $data['start'], $data['genreSearch']);

            $this->load->view('templates/header');
            $this->load->view('search/search_genre_result', $data);
            $this->load->view('templates/footer');
        }     

        public function search_track_result(){
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
            $config['base_url'] = 'http://localhost/projetPHP/index.php/search/search_track_result';


            //Initialiser
            $this->pagination->initialize($config);

            $data['start'] = $this->uri->segment(3);

            $data['tracks'] = $this->track_model->get_tracks(false, $config['per_page'], $data['start'], $data['trackSearch'], $data['trackGenreSearch'] );

            $this->load->view('templates/header');
            $this->load->view('search/search_track_result', $data);
            $this->load->view('templates/footer');
        }     
    }