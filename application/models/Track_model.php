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

        public function get_genres_forTracks(){
            $query = $this->db->get('genres');
            return $query->result_array();
        }

        public function create_track(){
            $slug = url_title($this->input->post('nameTrack'));
            $data = array(
                'nameTrack' => $this->input->post('nameTrack'),
                'url' => $this->input->post('url'),
                'idGenre' => $this->input->post('idGenre'),
                'idUser' => $this->session->userdata['idUser'],
                'slug' => $slug,

            );

            return $this->db->insert('tracks', $data);
        }
        public function delete_track($id){
            $this->db->where('idTrack', $id);
            $this->db->delete('tracks');
            return true;
        }

        public function update_track(){
            $slug = url_title($this->input->post('nameTrack'));
            $data = array(
                'nameTrack' => $this->input->post('nameTrack'),
                'idGenre' => $this->input->post('idGenre'),
                'idUser' => $this->session->userdata['idUser'],
                'slug' => $slug,

            );
            $this->db->where('idTrack', $this->input->post('idTrack'));

            return $this->db->update('tracks', $data);

        }
        public function get_genres_forCreate(){
            $this->db->order_by('genreName');
            $query = $this->db->get('genres');
            return $query->result_array();
        }
    }