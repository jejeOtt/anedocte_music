<?php
    class Posts extends CI_Controller {
        public function index(){
            $data['title'] = 'Latest Tracks';

            $data['posts'] = $this->post_model->get_posts();

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($slug = NULL){
            $data['post'] = $this->post_model->get_posts($slug);

            if(empty($data['post'])){
                show_404();
            }

            $data['tracks'] = $data['post']['tracks'];

            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }
    }