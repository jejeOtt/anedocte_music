<?php
    class Genre_model extends CI_Model {
        public function __construct()
        {
            $this->load->database();
        }

        public function getAll_genres($slug = FALSE){
            if($slug === FALSE){
            $query = $this->db->get('genres');
            return $query->result_array();
            }
            $query = $this->db->get_where('genres', array('slug' => $slug));
            return $query->row_array();
        }

        public function get_genres($slug = FALSE, $limit, $start, $genreSearch = NULL){
            if($slug === FALSE){
            $this->db->order_by('createdAt', 'DESC');
            if ($genreSearch) {
                $this->db->like('genreName',$genreSearch);
            }
            $query = $this->db->get('genres', $limit, $start);
            return $query->result_array();
            }
            $query = $this->db->get_where('genres', array('slug' => $slug));
            return $query->row_array();
        }

        public function countGenres()
        {
            return $this->db->get('genres')->num_rows();
        }

        public function create_genre($unwanted_array){
            $slug = url_title($this->input->post('genreName'));
            $slug = strtr( $slug, $unwanted_array );
            var_dump($slug);
            
            $data = array(
                'genreName' => $this->input->post('genreName'),
                'story' => $this->input->post('story'),
                'idUser' => $this->session->userdata['idUser'],
                'slug' => $slug,

            );

            return $this->db->insert('genres', $data);
        }
        public function delete_genre($id){
            $this->db->where('idGenre', $id);
            $this->db->delete('genres');
            return true;
        }

        public function update_genre(){
            $slug = url_title($this->input->post('genreName'));
            $data = array(
                'genreName' => $this->input->post('genreName'),
                'story' => $this->input->post('story'),
                'slug' => $slug,

            );
            $this->db->where('idGenre', $this->input->post('idGenre'));

            return $this->db->update('genres', $data);

        }

        // public function get_nb_tracks($idGenre){
        //     $query = $this->db->count_all_results('tracks');
        // }
    }