<?php
    class Tracks extends CI_Controller {
        public function index(){
            $data['title'] = 'track';

            //charger la librairie pagination
            $this->load->library('pagination');

            //Config
            //$this->db->like('genres.genreName', $data['trackGenreSearch']);

            $this->db->from('tracks');
            $config['total_rows'] = $this->db->count_all_results();
            $data['total_rows'] = $config['total_rows'];
            $config['per_page'] = 6;
            $config['base_url'] = 'http://localhost/projetPHP/tracks/index';


            //Initialiser
            $this->pagination->initialize($config);

            $data['start'] = $this->uri->segment(3);

            $data['tracks'] = $this->track_model->get_tracks(false, $config['per_page'], $data['start'], $data['trackSearch'] = NULL );

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

            
            $unwanted_array = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

            $data['genres'] = $this->track_model->get_genres_forCreate();

            $this->form_validation->set_rules('nameTrack', 'nameTrack', 'required');
            $this->form_validation->set_rules('url', 'url', 'required');

            if($this->form_validation->run() === FALSE ){
                $this->load->view('templates/header');
                $this->load->view('tracks/create', $data);
                $this->load->view('templates/footer');
            } else {
                $this->track_model->create_track($unwanted_array);
                $this->session->set_flashdata('created_track', 'Votre track a été créée est est en attente de validation');
                redirect('tracks');
            }

        }

        public function delete($id){
            $this->track_model->delete_track($id);
            redirect('tracks');
        }

        public function edit($slug){
            $data['track'] = $this->track_model->getAll_tracks($slug);
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