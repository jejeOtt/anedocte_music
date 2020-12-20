<?php
    class Track_model extends CI_Model {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_tracks($slug = FALSE){
            if($slug === FALSE){
            $query = $this->db->get('tracks');
            return $query->result_array();
            }
            $query = $this->db->get_where('tracks', array('slug' => $slug));
            return $query->row_array();
        }

        public function create_track(){
            $slug = url_title($this->input->post('trackName'));
            $data = array(
                'trackName' => $this->input->post('trackName'),
                'url' => $this->intput->post('url'),
                'idGenre' => $this->intput->post('idGenre'),
                'slug' => $slug,

            );

            return $this->db->insert('tracks', $data);
        }
        public function delete_track($id){
            $this->db->where('id', $id);
            $this->db->delete('tracks');
            return true;
        }
    }