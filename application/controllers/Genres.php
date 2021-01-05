<?php
    class Genres extends CI_Controller {
        public function index(){
            $data['title'] = 'Genre';

            //$data['genres'] = $this->genre_model->get_genres();
            //var_dump($data);
            // foreach($data['genres'] as $idGenre){
            //     echo($idGenre['idGenre']);
            //     $data['nbTracks'] =  $this->genre_model->get_nb_tracks($idGenre['idGenre']);
            // }
            //charger la librairie pagination
            $this->load->library('pagination');

            //Config
            $this->db->from('genres');
            $config['total_rows'] = $this->db->count_all_results();
            $data['total_rows'] = $config['total_rows'];
            $config['per_page'] = 6;
            $config['base_url'] = 'http://localhost/projetPHP/genres/index';

            //Initialiser
            $this->pagination->initialize($config);

            $data['start'] = $this->uri->segment(3);
            $data['genres'] = $this->genre_model->get_genres(false, $config['per_page'], $data['start'], $data['genreSearch'] = NULL);

            $this->load->view('templates/header');
            $this->load->view('genres/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($slug = NULL){
            $data['genre'] = $this->genre_model->getAll_genres($slug);
            
            if(empty($data['genre'])){
                show_404();
            }

            // Récupérer les tracks liées aux genres
            $data['tracks'] = $this->track_model->get_tracks_by_idGenre($data['genre']['idGenre']);

            $data['genreName'] = $data['genre']['genreName'];

            $this->load->view('templates/header');
            $this->load->view('genres/view', $data);
            $this->load->view('templates/footer');
        }

        public function create(){
            
            $data['title'] = 'Create Genre';

            $this->form_validation->set_rules('genreName', 'GenreName', 'required');
            $this->form_validation->set_rules('story', 'story', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('genres/create', $data);
                $this->load->view('templates/footer');
            } else {
                $this->genre_model->create_genre();
                $this->session->set_flashdata('created_genre', 'Votre genre a été créée est est en attente de validation');
                redirect('genres');
            }

        }

        public function delete($id){
            $this->genre_model->delete_genre($id);
            redirect('genres');
        }

        public function edit($slug){
            $data['genre'] = $this->genre_model->getAll_genres($slug);

            if(empty($data['genre'])){
                show_404();
            }

            $data['title'] = 'Edit Genre';

            $this->load->view('templates/header');
            $this->load->view('genres/edit', $data);
            $this->load->view('templates/footer');
        }
        public function update() {
            $this->genre_model->update_genre();
            redirect('genres');

        }
    }