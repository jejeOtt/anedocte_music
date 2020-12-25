<?php
    class Back_office_model extends CI_Model {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_unvalidated_genres(){
            $query = $this->db->get_where('genres', array('isValidated' => 0));
            return $query->row_array();
        }

        public function get_unvalidated_tracks(){
            $query = $this->db->get_where('tracks', array('isValidated' => 0));
    
            return $query->result_array();
        }

        // Fonction pour valider un morceau (passer isValidated de 0 à 1)
        public function validate_update_track($idTrack) {
            $data = array(
                'isValidated' => 1
            );
            $this->db->where('idTrack', $idTrack);
            return $this->db->update('tracks', $data);
        }
    }