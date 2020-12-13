<?php
    class Genres extends CI_Controller {
        public function index(){
            $data['title'] = 'Genre';

            $data['genres'] = $this->genre_model->get_genres();

            $this->load->view('templates/header');
            $this->load->view('genres/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($slug = NULL){
            $data['genre'] = $this->genre_model->get_genres($slug);

            if(empty($data['genre'])){
                show_404();
            }

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
                redirect('genres');
            }

        }

        public function delete($id){
            $this->genre_model->delete_genre($id);
            redirect('genres');
        }

        public function edit($slug){
            $data['genre'] = $this->genre_model->get_genres($slug);

            if(empty($data['genre'])){
                show_404();
            }

            $data['title'] = 'Edit Genre';

            $this->load->view('templates/header');
            $this->load->view('genres/edit', $data);
            $this->load->view('templates/footer');
        }
    }